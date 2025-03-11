<?php

namespace App\Controllers;

use App\Models\View;

/**
 * Contrôleur gérant la page de contact
 */
class ContactController{

    /**
     * Affiche la page de contact
     * 
     * Cette méthode charge simplement la vue "contact.php"
     * sans transmettre de données pour le moment
     * 
     * @return void
     */
    public function contact(){
        // Charge la vue "contact" sans paramètres supplémentaires
        View::render('contact', []);
    }
}