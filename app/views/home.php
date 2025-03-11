<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR . 'header.php'; ?>

<?php if (!empty($error_message)): ?>
    <div class="alert alert-danger text-center" role="alert">
        <?= htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8'); ?>
    </div>
<?php endif; ?>

<main class="home-main">
    <?php 
        foreach($articles as $article){
            echo $article->toHTML();
        } 
    ?>
</main>

<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR . 'footer.php'; ?>