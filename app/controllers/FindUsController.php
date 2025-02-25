<?php

namespace App\Controllers;

use App\Models\View;
use App\Models\Address;
use App\Models\Phone;
use App\Models\TimeSlot;

class FindUsController{

    public function findUs(): void{
        try{
            $addresses = Address::getAddresses();
            $phones = Phone::getPhones();
            $time_slots = TimeSlot::getTimeSlots();
        }catch(\Exception $e){
            $addresses = [];
            $phones = [];
            $time_slots = [];
            error_log('Erreur lors de la récupération des données : ' . $e->getMessage());
        }

        View::render('find_us', compact('addresses', 'phones', 'time_slots'));
    }
}