<?php

namespace App\Core;

use AltoRouter;

class Router{
    // Instance de AltoRouter pour gérer les routes
    private AltoRouter $router;

    /**
     * Constructeur du routeur
     * Initialise AltoRouter et définit le chemin de base si nécessaire
     */
    public function __construct(){
        $this->router = new AltoRouter();

        // Définition de la base de l'URL si nécessaire (ex: '/mon-projet')
        $this->router->setBasePath('');
    }

    /**
     * Ajouter une route
     * 
     * @param string $method Méthode HTTP acceptée
     * @param string $route L'URL du chemin (ex: '/home' ou '/article/[i:id]')
     * @param string $controller Nom du contrôleur responsable du traitement
     * @param string $action Méthode du contrôleur à exécuter
     * @return void
     */
    public function add(string $method, string $route, string $controller, string $action): void{
        $this->router->map($method, $route, [$controller, $action]);
    }

    /**
     * Analyse l'URL actuelle et exécute le contrôleur correspondant
     * 
     * @return void
     */
    public function dispatch(): void{

        // Tente de trouver une correspondance avec les routes définies
        $match = $this->router->match();

        // Si une route correspond
        if($match){
            // Récupère le contrôleur et la méthode associés à cette route
            [$controller, $method] = $match['target'];

            // Vérifie si le contrôleur et la méthode existent
            if (class_exists($controller) && method_exists($controller, $method)){
                $instance = new $controller();
                call_user_func_array([$instance, $method], $match['params']);
                return;
            }else{
                // Si le contrôleur et la méthode n'existent pas, erreur 500
                http_response_code(500);
                echo "Erreur 500 - Méthode ou contrôleur introuvable";
                return;
            }
        }

        // Si aucune route ne correspond, erreur 404 et affichage d'une page personnalisée
        http_response_code(404);
        require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . '404.php';
    }
}