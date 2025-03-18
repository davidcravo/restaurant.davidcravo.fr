<?php

namespace App\Models;

use App\Config\Config;
use App\Models\Database;

class Destination{

    private int $id;

    private string $article_id;

    private string $image;

    private string $link;

    private string $description;

    private string $text;

    private string $dirImage = Config::DIR['images'] . 'home' . DIRECTORY_SEPARATOR;

    private string $dirView = Config::DIR['views'];

    public function __construct(
        int $id, 
        string $article_id,
        string $image,
        string $link,
        string $description,
        string $text
        )
    {
        $this->id = $id;
        $this->article_id = $article_id;
        $this->image = $this->dirImage . $image;
        $this->link = $this->dirView . $link;
        $this->description = $description;
        $this->text = $text;
    }

    public static function getDestinations(): array{
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM destinations");
        $results = $stmt->fetchAll();
        return array_map(fn($row) => new self(
            $row['id'],
            $row['article_id'],
            $row['image'],
            $row['link'],
            $row['description'],
            $row['text']
        ), $results);
    }

    public static function getDestination($destinations, $anchor){
        switch($anchor){
            case 'obidos': 
                $destination = $destinations[0];
                break;
            case 'lisbonne':
                $destination = $destinations[1];
                break;
            case 'porto':
                $destination = $destinations[2];
                break;
            case 'faro':
                $destination = $destinations[3];
                break;
        }
        return $destination;
    }

    public function toHTML(){
        return <<<HTML
            <main class="main-destination">
                <a onclick="window.history.back()"><img src="$this->image" alt="$this->description"></a>
                <div class="content"> $this->text </div>
                <button onclick="window.history.back()">Retour</button>
            </main>
        HTML;
    }
}