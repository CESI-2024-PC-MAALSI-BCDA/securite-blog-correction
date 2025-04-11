<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/Core/helpers.php';

use App\Core\Router;

$router = new Router();
$router->handleRequest();
