<?php

namespace App\Controllers;

use App\Models\Guestbook;
use App\Models\Message;
use App\Models\View;

/**
 * Contrôleur pour la gestion de la page du Livre d'Or
 * 
 * Ce contrôleur est responsable de l'affichage de la page du Livre d'Or
 */
class GuestbookController{

    /**
     * Affiche la page du Livre d'Or
     * 
     * Cette méthode charge simplement la vue "guestbook.php"
     * sans transmettre de données pour le moment.
     * 
     * @return void
     */
    public function guestbook(): void{
        $errors = null;
        $success = false;
        $guestbook = new Guestbook();

        // Vérification de l'envoi du formulaire
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['message'])){
            $message = new Message($_POST['username'], $_POST['message']);
            
            if($message->isValid()){
                // Sauvegarde du message dans la base de données
                $guestbook->saveMessage($message);
                $success = true;
                $_POST = [];
            }else{
                $errors = $message->getErrors();
            }
        }

        // Récupération des messages
        $messages = $guestbook->loadMessages();

        // Affichage de la vue "guestbook.php" avec les données
        View::render('guestbook', compact('errors', 'success', 'messages'));
    }
}