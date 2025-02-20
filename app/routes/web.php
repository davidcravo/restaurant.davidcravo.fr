<?php

use App\Controllers\HomeController;
use App\Controllers\MenuController;
use App\Controllers\RecipesController;

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . 'HomeController.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . 'MenuController.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . 'RecipesController.php';

return $routes = [
    'home' => [HomeController::class, 'index'],
    'menu' => [MenuController::class, 'menu'],
    'recipes' => [RecipesController::class, 'recipes'],
];