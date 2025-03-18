<?php

namespace App\Models;

use App\Models\Database;
use App\Config\Config;

/**
 * Modèle pour gérer les articles de la section home
 * 
 * Cette classe représente un article affiché dans la section Home et
 * permet de récupérer les articles depuis une base de données et de
 * générer leur représentation HTML.
 */
class HomeArticle{

    /**
     * Identifiant unique de l'article.
     * 
     * @var int 
     */
    private int $id;

    /**
     * Chemin vers l'image associée à l'article.
     * 
     * @var string 
     */
    private string $image;

    /**
     * Description de l'article (utilisée dans l'attribut alt de l'image).
     * 
     * @var string 
     */
    private string $description;
    
    /**
     * Identifiant du lieu associé à l'article (ID HTML).
     * 
     * @var string 
     */
    private string $place;

    /**
     * Lien relatif associé à l'article.
     * 
     * @var string 
     */
    private string $link;

    /**
     * Texte affiché sous l'image de l'article.
     * 
     * @var string 
     */
    private string $text;

    /**
     * Répertoire de base pour les vues (utilisé pour générer les liens).
     * 
     * @var string 
     */
    private string $dir = '/app/views/';

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
        $this->link = $link;
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
    public static function getArticles(): array{
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM home_articles");
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
                <a href="{$this->link}?anchor={$this->place}">
                    <img src="$this->image" alt="$this->description" class="home-article-image">
                </a>
                <p>$this->text</p>
            </article>
        HTML;
    }

}