<?php 

namespace App\Models;

use \DateTime;

/**
 * Classe représentant un message du livre d'or.
 * 
 * Cette classe gère la création, validation, conversion et affichage
 * des messages du livre d'or.
 */
class Message {

    /**
     * Longueur minimale du pseudo.
     *
     * @var int
     */
    const LIMIT_USERNAME = 3;

    /**
     * Longueur minimale du message.
     *
     * @var int
     */
    const LIMIT_MESSAGE = 10;

    /**
     * Identifiant unique du message (nullable).
     *
     * @var int|null
     */
    private ?int $id;

    /**
     * Nom d'utilisateur associé au message.
     *
     * @var string
     */
    private string $username;

    /**
     * Contenu du message.
     *
     * @var string
     */
    private string $message;

    /**
     * Date à laquelle le message a été créé.
     *
     * @var DateTime
     */
    private DateTime $date;
    
    /**
     * Constructeur de la classe Message.
     * 
     * @param string $username Nom d'utilisateur associé au message.
     * @param string $message Contenu du message.
     * @param DateTime|null $date Date du message (par défaut, la date actuelle).
     * @param int|null $id Identifiant unique du message (facultatif).
     */
    public function __construct(string $username, string $message, ?DateTime $date = null, ?int $id = null){
        $this->id = $id;
        $this->username = $username;
        $this->message = $message;
        $this->date = $date ?: new DateTime();
    }

    /**
     * Récupère le pseudo de l'utilisateur.
     * 
     * @return string Le pseudo de l'utilisateur.
     */
    public function getUsername(): string{
        return $this->username;
    }

    /**
     * Récupère le contenu du message.
     * 
     * @return string Le contenu du message.
     */
    public function getMessage(): string{
        return $this->message;
    }

    /**
     * Récupère la date du message.
     * 
     * @return DateTime La date du message.
     */
    public function getDate(): DateTime{
        return $this->date;
    }

    /**
     * Vérifie si le message est valide.
     * 
     * @return bool `true` si le message est valide, `false` sinon.
     */
    public function isValid(): bool{
        return empty($this->getErrors());
    }

    /**
     * Récupère les erreurs de validation.
     * 
     * @return array Liste des erreurs de validation (vide si le message est valide).
     */
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

    /**
     * Génère le code HTML pour afficher le message.
     * 
     * @return string Le code HTML représentant le message.
     */
    public function toHTML() : string{
        $username = htmlentities($this->username);
        $message = nl2br(htmlentities($this->message));
        $date = $this->date->format("d/m/Y à H:i");
        return <<<HTML
            <p>
                <strong>{$username}</strong> <em>le {$date}</em><br>
                {$message}
            </p>
        HTML;
    }

    /**
     * Crée une instance de Message à partir d'une chaîne JSON.
     * 
     * @param string $json Chaîne JSON représentant un message.
     * @return Message Instance de la classe Message.
     */
    public static function fromJSON(string $json): Message{
        $data = json_decode($json, true);
        return new self($data['username'], $data['message'], new DateTime("@" . $data['date']));
    }

    /**
     * Convertit l'instance de Message en chaîne JSON.
     * 
     * @return string La représentation JSON du message.
     */
    public function toJSON(): string{
        return json_encode([
            'username' => $this->username,
            'message' => $this->message,
            'date' => $this->date->getTimestamp()

        ]);
    }
}