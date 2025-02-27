<?php

namespace App\Controllers;

use App\Models\View;
use App\Models\Address;
use App\Models\Phone;
use App\Models\TimeSlot;

/**
 * Contrôleur pour la page "Nous Trouver".
 * 
 * Ce contrôleur gère l'affichage des informations de localisation,
 * y compris l'adresse, le téléphone et les horaires d'ouverture.
 */
class FindUsController{

    /**
     * Affiche la page Nous Trouver avec adresse, téléphone et horaires d'ouverture.
     * 
     * Cette méthode récupère les données depuis les modèles Address, Phone et TimeSlot.
     * En cas d'erreur, elle capture l'exception et affiche la page avec les données vides.
     * 
     * @return void
     */
    public function findUs(): void{
        // Initialisation de la variable
        $error_message = null;

        try{
            // Récupération des adresses depuis le modèle Address
            $addresses = Address::getAddresses();

            // Récupération des numéros de téléphone depuis le modèle Phone
            $phones = Phone::getPhones();

            // Récupération des créneaux horaires depuis le modèle TimeSlot
            $time_slots = TimeSlot::getTimeSlots();
        }catch(\Exception $e){
            // En cas d'erreur, on initialise des tableaux vides
            $addresses = [];
            $phones = [];
            $time_slots = [];

            // Détermine si un message d'erreur doit être affiché
            $error_message = (empty($address) && empty($phones) && empty($time_slots))
                ? "Les informations de localisation ne sont pas disponibles pour le moment."
                : null;

            // Enregistre l'erreur dans les logs du serveur
            error_log('Erreur lors de la récupération des données : ' . $e->getMessage());
        }

        // Affichage de la vue "find_us" avec les données récupérées
        View::render('find_us', compact('addresses', 'phones', 'time_slots', 'error_message'));
    }
}