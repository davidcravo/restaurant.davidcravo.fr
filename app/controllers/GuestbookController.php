<?php

namespace App\Controllers;

use App\Models\View;

/**
 * Contrôleur pour la gestion de la page du Livre d'Or
 * 
 * Ce contrôleur est responsable de l'affichage de la page du Livre d'Or
 */
class GuestbookController{

    /**
     * Affiche la page du Livre d'Or
     * 
     * Cette méthode charge simplement la vue "guestbook.php"
     * sans transmettre de données pour le moment.
     * 
     * @return void
     */
    public function guestbook(): void{
        // Affichage de la vue "guestbook.php" sans données spécifiques
        View::render('guestbook', []);
    }
}