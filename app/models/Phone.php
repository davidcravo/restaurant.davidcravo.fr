<?php

namespace App\Models;

use App\Models\Database;

class Phone{

    private int $id;
    private string $phone_number;

    public function __construct(int $id, string $phone_number)
    {
        $this->id = $id;
        $this->phone_number = $phone_number;
    }

    public static function getPhones(): array{
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM phones");
        $results = $stmt->fetchAll();
        return array_map(fn($row) => new self(
            $row['id'],
            $row['phone_number']
        ), $results);
    }

    public function toHTML(){
        return <<<HTML
            <li>
                $this->phone_number
            </li>
        HTML;
    }
}