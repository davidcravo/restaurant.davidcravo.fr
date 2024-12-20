<?php

namespace App\Models;

use App\Models\Database;

/**
 * Classe représentant un numéro de téléphone.
 * 
 * Cette classe gère la création, récupération et affichage des numéros de téléphone.
 */
class Phone{

    /**
     * Identifiant unique du numéro de téléphone.
     *
     * @var int
     */
    private int $id;

    /**
     * Numéro de téléphone au format chaîne.
     *
     * @var string
     */
    private string $phone_number;

    /**
     * Constructeur de la classe Phone.
     *
     * @param int $id Identifiant unique du numéro.
     * @param string $phone_number Numéro de téléphone.
     */
    public function __construct(int $id, string $phone_number)
    {
        $this->id = $id;
        $this->phone_number = $phone_number;
    }

    /**
     * Récupère tous les numéros de téléphone de la base de données.
     * 
     * Cette méthode effectue une requête SQL pour sélectionner toutes les lignes
     * de la table `phones` et retourne un tableau d'instances de la classe `Phone`.
     *
     * @return array<Phone> Tableau contenant les instances de Phone.
     * @throws \PDOException En cas d'erreur lors de l'exécution de la requête SQL.
     */
    public static function getPhones(): array{
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM phones");
        $results = $stmt->fetchAll();
        return array_map(fn($row) => new self(
            $row['id'],
            $row['phone_number']
        ), $results);
    }

    /**
     * Génère le code HTML pour afficher un numéro de téléphone.
     * 
     * @return string Le code HTML représentant le numéro de téléphone.
     */
    public function toHTML(){
        return <<<HTML
            <li>
                $this->phone_number
            </li>
        HTML;
    }
}