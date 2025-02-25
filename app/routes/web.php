<?php

use App\Controllers\FindUsController;
use App\Controllers\HomeController;
use App\Controllers\MenuController;
use App\Controllers\RecipesController;

return $routes = [
    'home' => [HomeController::class, 'home'],
    'menu' => [MenuController::class, 'menu'],
    'recipes' => [RecipesController::class, 'recipes'],
    'find_us' => [FindUsController::class, 'findUs']
];