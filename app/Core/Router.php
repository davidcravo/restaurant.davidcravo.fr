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

        if (!$match || !isset($match['target'])) {
            http_response_code(404);
            require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . '404.php';
            return;
        }

        // Récupère le contrôleur et la méthode associés à cette route
        [$controller, $method] = $match['target'];

        // Vérification de l'existence du contrôleur
        if (!class_exists($controller)) {
            http_response_code(500);
            die("Erreur 500 - Le contrôleur `$controller` n'existe pas.");
        }

        // Vérification de l'existence de la méthode
        if (!method_exists($controller, $method)) {
            http_response_code(500);
            die("Erreur 500 - La méthode `$method` n'existe pas dans `$controller`.");
        }

        // Instanciation et appel de la méthode
        $instance = new $controller();
        call_user_func_array([$instance, $method], $match['params']);
        return;
    }
}