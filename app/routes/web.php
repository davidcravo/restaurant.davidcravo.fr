<?php


use App\Controllers\HomeController;
use App\Controllers\MenuController;

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . 'HomeController.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . 'MenuController.php';


return $routes = [
    'home' => [HomeController::class, 'index'],
    'menu' => [MenuController::class, 'menu'],
];