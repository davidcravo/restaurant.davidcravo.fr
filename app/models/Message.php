<?php 

namespace App\Models;

use \DateTime;
use \DateTimeZone;

class Message {

    const LIMIT_USERNAME = 3;
    const LIMIT_MESSAGE = 10;
    private ?int $id;
    private string $username;
    private string $message;
    private DateTime $date;

    

    public function __construct(string $username, string $message, ?DateTime $date = null, ?int $id = null){
        $this->id = $id;
        $this->username = $username;
        $this->message = $message;
        $this->date = $date ?: new DateTime();
    }

    public function getUsername(): string{
        return $this->username;
    }

    public function getMessage(): string{
        return $this->message;
    }

    public function getDate(): DateTime{
        return $this->date;
    }

    public function isValid(): bool{
        return empty($this->getErrors());
    }

    public function getErrors(): array{
        $errors = [];
        if(strlen($this->username) < self::LIMIT_USERNAME){
            $errors['username'] = "Votre pseudo est trop court";
        }
        if(strlen($this->message) < self::LIMIT_MESSAGE){
            $errors['message'] = "Votre message est trop court";
        }
        return $errors;
    }

    public function toHTML() : string{
        $username = htmlentities($this->username);
        $message = nl2br(htmlentities($this->message));
        //$this->date->setTimezone(new DateTimeZone('Europe/Paris'));
        $date = $this->date->format("d/m/Y à H:i");
        return <<<HTML
            <p>
                <strong>{$username}</strong> <em>le {$date}</em><br>
                {$message}
            </p>
        HTML;
    }

    public static function fromJSON(string $json): Message{
        $data = json_decode($json, true);
        return new self($data['username'], $data['message'], new DateTime("@" . $data['date']));
    }

    public function toJSON(): string{
        return json_encode([
            'username' => $this->username,
            'message' => $this->message,
            'date' => $this->date->getTimestamp()

        ]);
    }

    
}