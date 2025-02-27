<?php

namespace App\Controllers;

use App\Models\HomeArticle;
use App\Models\View;

/**
 * Controleur pour la gestion de la page d'accueil.
 * 
 * Ce contrôleur est responsable de l'affichage des articles sur la page d'accueil.
 */
class HomeController{

    /**
     * Affiche la page d'accueil avec les articles.
     * 
     * Cette méthode récupère les articles depuis le modèle 'HomeArticle'
     * et les transmet à la vue 'home.php' pour l'affichage.
     * En cas d'erreur lors de la récupération des articles, une exception est
     * capturée et un message d'erreur est enregistré dans les logs du serveur.
     * 
     * @return void
     */
    public function home(): void{
        // Initialisation de la variable
        $error_message = null;

        try{
            // Récupération des articles depuis le modèle HomeArticle
            $articles = HomeArticle::getArticles();
        }catch(\Exception $e){
            // En cas d'erreur, on initialise un tableau vide pour éviter une erreur d'affichage
            $articles = [];

            // Détermine si un message d'erreur doit être affiché
            $error_message = empty($articles) ? "Aucun article disponible pour le moment." : null;

            // Enregistre l'erreur dans les logs du serveur
            error_log("Erreur lors de la récupération des articles : " . $e->getMessage());
        }
        
        // Affichage de la vue "home.php" avec la liste des articles
        View::render('home', compact('articles', 'error_message'));
    }
}