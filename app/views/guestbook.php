<?php

use App\Models\Guestbook;
use App\Models\Message;

require_once 'partials' . DIRECTORY_SEPARATOR . 'header.php';
require_once dirname(__DIR__,2) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'Guestbook.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'Message.php';

$file = dirname(__DIR__,2) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'guestbook' . DIRECTORY_SEPARATOR . 'messages';

$errors = null;
$success = false;
$guestbook = new Guestbook($file);
if(isset($_POST['username'], $_POST['message'])){
    $message = new Message($_POST['username'], $_POST['message']);
    if($message->isValid()){
        //$guestbook->addMessage($message);
        $guestbook->saveMessage($message);
        $success = true;
        $_POST=[];
    }else{
        $errors = $message->getErrors();
    }
}
//$messages = $guestbook->getMessages();
$messages = $guestbook->loadMessages();
?>

<main class="main_guestbook">
    <div class="container">
        <h1 class="mt-4">Livre d'Or</h1>

        <?php if(!empty($errors)): ?>
            <div class="alert alert-danger">
                Formulaire invalide
            </div>
        <?php endif; ?>

        <?php if($success): ?>
            <div class="alert alert-success">
                Merci pour votre message
            </div>
        <?php endif; ?>

        <form action="" method="post">
            <div class="form-group">
                <input type="text" name="username" placeholder="Votre pseudo" class="form-control <?= isset($errors['username']) ? 'is-invalid' : ''; ?>" value="<?= htmlentities($_POST['username'] ?? '') ?>">
                <?php if(isset($errors['username'])): ?>
                    <div class="invalid-feedback"><?= $errors['username'] ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <textarea name="message" id="message" placeholder="Votre message" class="form-control <?= isset($errors['message']) ? 'is-invalid' : ''; ?>"><?= htmlentities($_POST['message'] ?? '') ?></textarea>
                <?php if(isset($errors['message'])): ?>
                    <div class="invalid-feedback"><?= $errors['message'] ?></div>
                <?php endif; ?>
            </div>
            <button class="btn btn-primary">Envoyer</button>
        </form>
        
        <?php if(!empty($messages)): ?>
            <h1 class="mt-4">Vos messages</h1>
            <?php 
                foreach($messages as $message){
                    echo $message->toHTML();
                }
            ?>
        <?php endif ?>            
        
    </div>
</main>

<? 
    require_once 'partials' . DIRECTORY_SEPARATOR . 'footer.php'; 
?>