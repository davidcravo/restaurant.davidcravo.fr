<?php

namespace App\Controllers;

use App\Models\HomeArticle;
use App\Models\View;

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'HomeArticle.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'View.php';

/**
 * Controleur pour la gestion de la page d'accueil.
 */
class HomeController{

    /**
     * Affiche la page d'accueil avec les articles.
     * 
     * @return void
     */
    public function index(): void{
        try{
            $articles = HomeArticle::getArticles();
        }catch(\Exception $e){
            $articles = [];
            error_log("Erreur lors de la récupération des articles : " . $e->getMessage());
        }
        
        View::render('home', compact('articles'));
    }
}