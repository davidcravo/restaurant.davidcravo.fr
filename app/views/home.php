<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR . 'header.php'; ?>

<main class="home-main">
    <?php 
        foreach($articles as $article){
            echo $article->toHTML();
        } 
    ?>
</main>

<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR . 'footer.php'; ?>