<?php

use App\Models\HomeArticle;

    include dirname(__DIR__,2) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'init.php';
    require __DIR__ . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR . 'header.php';
    require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'HomeArticle.php';

    $articles = HomeArticle::getArticles();
?>

<main class="home-main">
    <?php 
        foreach($articles as $article){
            echo $article->toHTML();
        } 
    ?>
</main>

<?php require __DIR__ . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR . 'footer.php' ?>