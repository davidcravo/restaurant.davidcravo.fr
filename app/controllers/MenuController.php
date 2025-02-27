<?php

namespace App\Controllers;

use App\Models\Dish;
use App\Models\View;

/**
 * Controleur pour la gestion de la page de menu
 * 
 * Ce contrôleur est responsable de l'affichage de la liste des plats disponibles
 * en récupérant les données depuis le modèle "Dish" et en les transmettant à la vue "menu.php".
 */
class MenuController{
    
    /**
     * Affiche la page du menu avec la liste des plats disponibles
     * 
     * Cette méthode tente de récupérer les plats via le modèle "Dish".
     * En cas d'erreur, une exception est capturée et un message est enregistré dans les logs.
     * 
     * @return void
     */
    public function menu(): void{
        // Initialisation de la variable
        $error_message = null;

        try{
            // Récupération de la liste des plats depuis le modèle Dish
            $dishes = Dish::getDishes();
        }catch(\Exception $e){
            // En cas d'erreur, on initialise un tableau vide pour éviter un problème d'affichage
            $dishes = [];

            // Détermine si un message d'erreur doit être affiché
            $error_message = empty($dishes) ? "Les plats ne sont pas disponibles pour le moment." : null;

            // Enregistre l'erreur dans les logs du serveur
            error_log("Erreur lors de la récupération des plats : " . $e->getMessage());
        }

        // Affichage de la vue "menu.php" avec les plats récupérés
        View::render('menu', compact('dishes', 'error_message'));
    }
}