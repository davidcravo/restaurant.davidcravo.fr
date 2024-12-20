<?php

namespace App\Models;

use App\Models\Message;
use App\Models\Database;
use DateTime;
use DateTimeZone;

class Guestbook{

    private string $file;

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
     * addMessage
     *
     * @param  mixed $message
     * @return void
     */
    public function addMessage(Message $message): void{
        file_put_contents($this->file, $message->toJSON() . PHP_EOL, FILE_APPEND);
    }

    // public function getMessages(): array{
    //     $messages = [];
    //     $content = trim(file_get_contents($this->file));
    //     if($content !== ''){
    //         $lines = explode(PHP_EOL, $content);
            
    //         foreach($lines as $line){
    //             $messages[] = Message::fromJSON($line);
    //         }
    //     }
    //     return array_reverse($messages);
    // }

    public function saveMessage(Message $message){
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

    public function loadMessages(): array{
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM guestbook");
        $results = $stmt->fetchAll();
        return array_map(fn($row) => new Message(
            $row['username'],
            $row['message'],
            new DateTime($row['date'])
        ), $results);
    }
}