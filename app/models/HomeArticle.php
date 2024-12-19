<?php

namespace App\Models;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'Config.php';
require 'Database.php';

use App\Config\Config;
use PDO;

/**
 * Modèle pour gérer les articles de la section home
 * 
 * Cette classe représente un article affiché dans la section Home et
 * permet de récupérer les articles depuis une base de données et de
 * générer leur représentation HTML.
 */
class HomeArticle{

    /**
     * @var int Identifiant unique de l'article.
     */
    private int $id;

    /**
     * @var string Chemin vers l'image associée à l'article.
     */
    private string $image;

    /**
     * @var string Description de l'article (utilisée dans l'attribut alt de l'image).
     */
    private string $description;
    
    /**
     * @var string Identifiant du lieu associé à l'article (ID HTML).
     */
    private string $place;

    /**
     * @var string Lien relatif associé à l'article.
     */
    private string $link;

    /**
     * @var string Texte affiché sous l'image de l'article.
     */
    private string $text;

    /**
     * @var string Répertoire de base pour les vues (utilisé pour générer les liens).
     */
    private string $dir = '/app/views/';

    /**
     * @var PDO Connexion à la base de données.
     */
    private PDO $db;

    /**
     * Constructeur de la classe HomeArticle.
     *
     * @param int $id Identifiant unique de l'article.
     * @param string $image Chemin vers l'image associée à l'article.
     * @param string $description Description de l'article.
     * @param string $place Identifiant du lieu associé à l'article (ID HTML).
     * @param string $link Lien relatif associé à l'article.
     * @param string $text Texte affiché sous l'image de l'article.
     */
    public function __construct(
        int $id,
        string $image,
        string $description,
        string $place,
        string $link,
        string $text
    ){
        $this->id = $id;
        $this->image = Config::DIR['images'] . '/home/' . $image;
        $this->description = $description;
        $this->place = $place;
        $this->link = $this->dir . $link;
        $this->text = $text;
    }

    /**
     * Récupère tous les articles de la table "home_article" dans la base de données.
     *
     * Cette méthode utilise la connexion à la base de données pour exécuter une requête
     * SQL qui sélectionne toutes les lignes de la table "home". Chaque ligne est ensuite
     * convertie en une instance de la classe `HomeArticle` à l'aide de `array_map`.
     *
     * @return array<HomeArticle> Tableau d'instances de `HomeArticle` représentant les articles.
     * @throws \PDOException En cas d'erreur lors de l'exécution de la requête SQL.
     */
    public function getArticles(): array{
        $this->db = Database::getConnection();
        $stmt = $this->db->query("SELECT * FROM home_articles");
        $results = $stmt->fetchAll();
        return array_map(fn($row) => new self(
            $row['id'],
            $row['image'],
            $row['description'],
            $row['place'],
            $row['link'],
            $row['text']
        ), $results);
    }

    /**
     * Génère le code HTML pour afficher l'article.
     *
     * @return string Code HTML représentant l'article.
     */
    public function toHTML(): string{
        return <<<HTML
            <article class="home-article" id="$this->place">
                <a href="{$this->link}#{$this->place}">
                    <img src="$this->image" alt="$this->description" class="home-article-image">
                </a>
                <p>$this->text</p>
            </article>
        HTML;
    }

}