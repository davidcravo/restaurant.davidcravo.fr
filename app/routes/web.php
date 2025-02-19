<?php


use App\Controllers\HomeController;

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . 'HomeController.php';


return $routes = [
    '' => [HomeController::class, 'index'],
    '/' => [HomeController::class, 'index'],
    '/menu' => [HomeController::class, 'index'],
];