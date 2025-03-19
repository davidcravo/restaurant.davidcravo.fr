<?php

namespace App\controllers;

use App\Models\View;
use App\Models\Destination;

class DestinationController{

    public function destination():void{
        // Initialisation de la variable
        $error_message = null;

        try{
            $destinations = Destination::getDestinations();
        }catch(\Exception $e){
            $destinations = [];

            $error_message = empty($destinations) ? "Aucune destination disponible pour le moment" : null;

            error_log("Erreur lors de la récupération des destinations : " . $e->getMessage());
        }

        View::render('destination', compact('destinations', 'error_message'));
    }
}