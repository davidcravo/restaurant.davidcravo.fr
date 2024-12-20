<?php

namespace App\Models;

use App\Config\Config;

class Dish{

    private int $id;

    private string $image;

    private string $alternative;

    private string $name;

    private float $price;

    private string $course;

    private string $link;

    private string $description;

    private string $dirImage = Config::DIR['images'] . 'menu/';

    private string $dirView = Config::DIR['views'];

    public function getCourse(){
        return $this->course;
    }

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