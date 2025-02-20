<?php

namespace App\Controllers;

use App\Models\Dish;
use App\Models\View;

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'Dish.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'View.php';

/**
 * Controleur pour la gestion de la page de menu
 */
class MenuController{
    
    /**
     * Affiche la page de menu avec les plats
     * 
     * @return void
     */
    public function menu(): void{
        try{
            $dishes = Dish::getDishes();
        }catch(\Exception $e){
            $dishes = [];
            error_log("Erreur lors de la récupération des plats : " . $e->getMessage());
        }

        View::render('menu', compact('dishes'));
    }
}