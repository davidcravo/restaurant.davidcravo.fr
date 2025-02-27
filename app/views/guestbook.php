<?php require_once 'partials' . DIRECTORY_SEPARATOR . 'header.php'; ?>

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

        <form action="/guestbook" method="post">
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

<? require_once 'partials' . DIRECTORY_SEPARATOR . 'footer.php'; ?>