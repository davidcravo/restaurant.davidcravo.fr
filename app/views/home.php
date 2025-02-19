<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR . 'header.php'; ?>
<?php require_once dirname(__DIR__,2) . '/vendor/autoload.php'; ?>

<main class="home-main">
    <?php 
        foreach($articles as $article){
            echo $article->toHTML();
        } 
    ?>
</main>

<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR . 'footer.php'; ?>