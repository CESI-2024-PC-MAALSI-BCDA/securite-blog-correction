<?php

namespace App\Core;

class Router
{
    public function handleRequest(): void
    {
        $uri = $_GET['url'] ?? 'home';
        $parts = explode('/', trim($uri, '/'));

        // Controller
        $controllerName = ucfirst($parts[0]) . 'Controller';
        $controllerClass = "App\\Controllers\\$controllerName";

        // Méthode transformée en camelCase
        $rawMethod = $parts[1] ?? 'index';
        $method    = $this->toCamelCase($rawMethod);

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();
            if (method_exists($controller, $method)) {
                call_user_func([$controller, $method]);
                return;
            }
        }

        http_response_code(404);
        echo "404 - Page not found";
    }

    /**
     * Convertit une chaîne en camelCase:
     *   'create-user'  → 'createUser'
     *   'edit-article' → 'editArticle'
     */
    private function toCamelCase(string $str): string
    {
        return preg_replace_callback(
            '/-([a-z])/',
            function ($matches) {
                return strtoupper($matches[1]);
            },
            $str
        );
    }
}
