<?php

use App\Controllers\ContactController;
use App\Controllers\FindUsController;
use App\Controllers\HomeController;
use App\Controllers\MenuController;
use App\Controllers\RecipesController;
use App\Controllers\GuestbookController;
use App\Controllers\ReservationsController;
use App\Core\Router;

/**
 * Initialisation du router
 * 
 * Ce fichier définit toutes les routes de l'application
 * et les associe aux contrôleurs et méthodes correspondants.
 */
$router = new Router();

/**
 * Définition des routes de l'application.
 * 
 * Chaque route est associé à une méthode HTTP et à un contrôleur.
 * Le router fait correspondre les URLs aux bonnes méthodes des contrôleurs.
 */
// Route pour la page d'accueil
$router->add('GET', '/home', HomeController::class, 'home');
// Route pour la page de menu
$router->add('GET', '/menu', MenuController::class, 'menu');
// Route pour la page des recettes
$router->add('GET', '/recipes', RecipesController::class, 'recipes');
// Route pour la page Nous Trouver
$router->add('GET', '/find_us', FindUsController::class, 'findUs');
// Route pour la page de contact
$router->add('GET', '/contact', ContactController::class, 'contact');
// Route pour la page du Livre d'Or
$router->add('GET', '/guestbook', GuestbookController::class, 'guestbook');
// Route pour la page des réservations
$router->add('GET', '/reservations', ReservationsController::class, 'reservations');

/**
 * Retourne l'objet "$router" afin qu'il puisse être utilisé dans "index.php".
 */
return $router;