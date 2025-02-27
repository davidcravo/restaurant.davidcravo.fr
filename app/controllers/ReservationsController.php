<?php

namespace App\Controllers;

use App\Models\View;

/**
 * Contrôleur pour la gestion des reservations
 * 
 * Ce contrôleur est responsable de l'affichage de la page des réservations.
 * Il transmet les données nécessaires à la vue "reservations.php"
 */
class ReservationsController{

    /**
     * Affiche la page des réservations.
     * 
     * Cette méthode charge simplement la vue "reservation.php"
     * sansn transmettre de données pour le moment
     */
    public function reservations(): void{
        // Affichage de la vue "reservations.php" sans données spécifiques
        View::render('reservations', []);
    }
}