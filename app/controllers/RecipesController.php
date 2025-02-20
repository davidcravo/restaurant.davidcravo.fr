<?php

namespace App\Controllers;

use App\Models\View;

class RecipesController{
    public function recipes(): void{

        View::render('recipes', []);
    }
}