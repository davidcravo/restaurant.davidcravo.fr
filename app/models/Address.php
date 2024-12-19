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

    public static function getAddresses(){
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM addresses");
        $results = $stmt->fetchAll();
        return array_map(fn($row) => new self(
            $row['id'],
            $row['street_address'],
            $row['postal_code'],
            $row['city'],
            $row['country']
        ), $results);
    }

    public function toHTML(){
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