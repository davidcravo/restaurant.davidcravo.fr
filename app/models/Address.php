<?php

namespace App\Models;

class Address{

    private int $id;
    private string $street_address;
    private string $postal_code;
    private string $city;
    private string $country;

    public function __construct(?int $id, string $street_address, string $postal_code, string $city, string $country){
        $this->id = $id;
        $this->street_address = $street_address;
        $this->postal_code = $postal_code;
        $this->city = $city;
        $this->country = $country;
    }

    public function address_html(){
        return <<<HTML
            <li>
                $this->street_address<br>
                $this->postal_code<br>
                $this->city<br>
                $this->country
            </li>
HTML;
    }
}