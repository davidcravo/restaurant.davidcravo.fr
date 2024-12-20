<?php

namespace App\Models;

use App\Models\Message;
use App\Models\Database;
use DateTime;
use DateTimeZone;

require __DIR__ . DIRECTORY_SEPARATOR . 'Database.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'Message.php';

/**
 * Classe pour gérer un livre d'or.
 */
class Guestbook{

    /**
     * @var string Fichier utilisé pour stocker les messages localement.
     */
    private string $file;

    /**
     * Constructeur de la classe Guestbook.
     *
     * @param string $file Chemin vers le fichier de stockage des messages.
     */
    public function __construct(string $file){
        $directory = dirname($file);
        if(!is_dir($directory)){
            mkdir($directory, 0777, true);
        }
        if(!file_exists($file)){
            touch($file);
        }
        $this->file = $file;
    }
    
    /**
     * Ajoute un message dans le fichier local du livre d'or.
     *
     * @param Message $message Instance du message à ajouter.
     * @return void
     */
    public function addMessage(Message $message): void{
        file_put_contents($this->file, $message->toJSON() . PHP_EOL, FILE_APPEND);
    }

    /**
     * Récupère les messages stockés localement.
     *
     * @return Message[] Liste des messages.
     */
    public function getMessages(): array{
        $messages = [];
        $content = trim(file_get_contents($this->file));
        if($content !== ''){
            $lines = explode(PHP_EOL, $content);
            
            foreach($lines as $line){
                $messages[] = Message::fromJSON($line);
            }
        }
        return array_reverse($messages);
    }

    /**
     * Sauvegarde un message dans la base de données.
     *
     * @param Message $message Instance du message à sauvegarder.
     * @return void
     */
    public function saveMessage(Message $message): void{
        $pdo = Database::getConnection();
        $sql = "INSERT INTO guestbook (username, message, date) VALUES (:username, :message, :date)";
        $stmt = $pdo->prepare($sql);
        $date = $message->getDate()->setTimezone(new DateTimeZone('Europe/Paris'));
        $stmt->execute([
            ':username' => htmlentities($message->getUsername()),
            ':message' => htmlentities($message->getMessage()),
            ':date' => $date->format('Y-m-d H:i:s')
        ]);
    }

    /**
     * Charge tous les messages depuis la base de données.
     *
     * @return Message[] Liste des messages sous forme d'objets Message.
     */
    public function loadMessages(): array{
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM guestbook");
        $results = array_reverse($stmt->fetchAll());
        return array_map(fn($row) => new Message(
            $row['username'],
            $row['message'],
            new DateTime($row['date'])
        ), $results);
    }
}