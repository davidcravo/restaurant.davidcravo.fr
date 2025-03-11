<?php

namespace App\Controllers;

use App\Models\View;

/**
 * Contrôleur pour la gestion des recettes
 * 
 * Ce contrôleur est responsable de l'affichage de la page des recettes.
 * Il transmet les données nécessaires à la vue "recipes.php".
 */
class RecipesController{

    /**
     * Affiche la page des recettes.
     * 
     * Cette méthode charge simplement la vue "recipes.php"
     * sans transmettre de données pour le moment.
     * 
     * @return void
     */
    public function recipes(): void{
        // Affichage de la vue "recipes.php" sans données spécifiques
        View::render('recipes', []);
    }
}