<?php

namespace App\Models;

use App\Models\Message;
use App\Models\Database;
use DateTime;
use DateTimeZone;

/**
 * Classe pour gérer un livre d'or.
 */
class Guestbook{

    /**
     * Sauvegarde un message dans la base de données.
     *
     * @param Message $message Instance du message à sauvegarder.
     * @return bool Succès ou échec de l'insertion
     */
    public function saveMessage(Message $message): bool{
        $pdo = Database::getConnection();
        $sql = "INSERT INTO guestbook (username, message, date) VALUES (:username, :message, :date)";
        $stmt = $pdo->prepare($sql);
        $date = $message->getDate()->setTimezone(new DateTimeZone('Europe/Paris'));
        return $stmt->execute([
            ':username' => htmlentities($message->getUsername()),
            ':message' => htmlentities($message->getMessage()),
            ':date' => $date->format('Y-m-d H:i:s')
        ]);
    }

    /**
     * Charge tous les messages depuis la base de données.
     *
     * @return array Liste des messages sous forme d'objets Message.
     */
    public function loadMessages(): array{
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM guestbook ORDER BY date DESC");
        $results = $stmt->fetchAll();
        return array_map(fn($row) => new Message(
            $row['username'],
            $row['message'],
            new DateTime($row['date'])
        ), $results);
    }
}