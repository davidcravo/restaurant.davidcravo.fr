<?php

namespace App\Models;

use App\Config\Config;

/**
 * Classe représentant un plat du menu
 */
class Dish{

    /**
     * Identifiant unique du plat
     */
    private int $id;

    /**
     * Chemin vers l'image du plat
     */
    private string $image;

    /**
     * Texte alternatif pour l'image du plat
     */
    private string $alternative;

    /**
     * Nom du plat
     */
    private string $name;

    /**
     * Prix du plat
     */
    private float $price;

    /**
     * Catégorie du plat (entrée, plat principal, dessert, etc.)
     */
    private string $course;

    /**
     * Lien vers la recette du plat
     */
    private string $link;

    /**
     * Description du plat
     */
    private string $description;

    /**
     * Répertoire des images des plats
     */
    private string $dirImage = Config::DIR['images'] . 'menu/';

    /**
     * Répertoire des vues
     */
    private string $dirView = Config::DIR['views'];

    /**
     * Récupère la catégorie du plat
     */
    public function getCourse(){
        return $this->course;
    }

    /**
     * Constructeur de la classe Dish
     */
    public function __construct(
        int $id,
        string $image,
        string $alternative,
        string $name,
        float $price,
        string $course,
        string $link,
        string $description
    ){
        $this->id = $id;
        $this->image = $this->dirImage . $image;
        $this->alternative = $alternative;
        $this->name = $name;
        $this->price = $price;
        $this->course = $course;
        $this->link = $this->dirView . $link;
        $this->description = $description;
    }

    /**
     * Récupère tous les plats depuis la base de données
     * 
     * @return Dish[] Liste des plats sous forme d'objet Dish
     */
    public static function getDishes(): array{
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM dishes");
        $results = $stmt->fetchAll();
        return array_map(fn($row) => new self(
            $row['id'],
            $row['image'],
            $row['alternative'],
            $row['name'],
            $row['price'],
            $row['course'],
            $row['link'],
            $row['description']
        ), $results);
    }

    /**
     * Génère le code HTML pour afficher un plat du menu
     * 
     * @return string Code HTML du plat
     */
    public function toHTML(){
        return <<<HTML
            <article class="menu-article">
                <div class="menu-image">
                    <a href="$this->link">
                        <img src="$this->image" alt="$this->alternative">
                    </a>
                </div>
                <div class="menu-content">
                    <a href="$this->link">
                        <h2>$this->name</h2>
                    </a>
                    <p>$this->description</p>
                    <span>{$this->price}€</span>
                    <button>Ajouter</button>
                </div>
            </article>
        HTML;
    }
}