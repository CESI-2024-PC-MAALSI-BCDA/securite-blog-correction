<?php

namespace App\Core;

class Router
{
    public function handleRequest()
    {
        $uri = $_GET['url'] ?? 'home';

        $parts = explode('/', trim($uri, '/'));
        $controllerName = ucfirst($parts[0]) . 'Controller';
        $method = $parts[1] ?? 'index';

        $controllerClass = "App\\Controllers\\$controllerName";

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
}
