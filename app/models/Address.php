<?php

namespace App\Models;

/**
 * Classe représentant une adresse
 */
class Address{

    /**
     * Identifiant unique de l'adresse
     * 
     * @var int
     */
    private int $id;

    /**
     * Rue et numéro de l'adresse
     * 
     * @var string
     */
    private string $street_address;

    /**
     * Code postal de l'adresse
     * 
     * @var string
     */
    private string $postal_code;

    /**
     * Ville de l'adresse
     * 
     * @var string
     */
    private string $city;

    /**
     * Pays de l'adresse
     * 
     * @var string
     */
    private string $country;

    /**
     * Constructeur de la classe Address.
     *
     * @param int|null $id Identifiant unique de l'adresse (null si non défini).
     * @param string $street_address Rue et numéro de l'adresse.
     * @param string $postal_code Code postal de l'adresse.
     * @param string $city Ville de l'adresse.
     * @param string $country Pays de l'adresse.
     */
    public function __construct(?int $id, string $street_address, string $postal_code, string $city, string $country){
        $this->id = $id;
        $this->street_address = $street_address;
        $this->postal_code = $postal_code;
        $this->city = $city;
        $this->country = $country;
    }

    /**
     * Récupère toutes les adresses depuis la base de données.
     *
     * @return Address[] Liste des adresses sous forme d'objets Address.
     */
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