<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use App\Core\SecurityMiddleware;

SecurityMiddleware::protect();

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);


// Charger le router depuis web.php
$router = require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Routes' . DIRECTORY_SEPARATOR . 'web.php';

// Détecte si le projet est dans un sous-dossier
$basePath = str_replace('/public', '', dirname($_SERVER['SCRIPT_NAME']));
$uri = trim(str_replace($basePath, '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)), '/');

// Redirige vers "home" si l’URL est vide
if ($uri === ''){
    header("Location: /home", true, 301);
    exit();
}

// Exécuter le router
$router->dispatch();



// Chargement des routes
// $routes = require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Routes' . DIRECTORY_SEPARATOR . 'web.php';

// Appel du contrôleur
// if(array_key_exists($uri, $routes)){
//     [$controller, $method] = $routes[$uri];

//     if(class_exists($controller) && method_exists($controller, $method)){
//         $instance = new $controller();
//         call_user_func([$instance, $method]);
//     }else{
//         http_response_code(500);
//         echo "Erreur 500 - Contrôleur ou méthode introuvable.";
//     }
// }else{
//     http_response_code(404);
//         require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . '404.php';
// }