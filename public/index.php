<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
//require_once __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'scripts' . DIRECTORY_SEPARATOR . 'create_tables.php';

// use App\Routes\Web;
// dump($_SERVER['SCRIPT_NAME']);
// dump($_SERVER['REQUEST_URI']);
// dump($_SERVER['REQUEST_METHOD']);
// dump(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
// dump(trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));

// Récupération de l'URI
// dump($_SERVER);
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
if ($uri === ''){
    $uri = 'home';
}
//$uri = $_SERVER['REQUEST_URI'];

// Chargement des routes
$routes = require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR . 'web.php';

// Appel du contrôleur
if(array_key_exists($uri, $routes)){
    [$controller, $method] = $routes[$uri];
    $instance = new $controller();
    $instance->$method();
}else{
    //http_response_code(404);
    echo "Page non trouvée.";
}

//header('Location: app/views/home.php');