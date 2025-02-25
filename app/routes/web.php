<?php

use App\Controllers\HomeController;
use App\Controllers\MenuController;
use App\Controllers\RecipesController;

return $routes = [
    'home' => [HomeController::class, 'index'],
    'menu' => [MenuController::class, 'menu'],
    'recipes' => [RecipesController::class, 'recipes'],
];