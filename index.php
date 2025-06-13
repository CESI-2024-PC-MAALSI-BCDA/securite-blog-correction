<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/Core/helpers.php';

use App\Core\Router;
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/../logs/error.log');
set_exception_handler(function ($e) {
    error_log($e);
    http_response_code(500);
    echo "<div style='color: red; padding: 1rem;'>Une erreur est survenue. Veuillez contacter l'administrateur.</div>";
});
$router = new Router();
$router->handleRequest();
