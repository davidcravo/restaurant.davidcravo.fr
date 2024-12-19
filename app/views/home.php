<?php

use App\Models\HomeArticle;

    include dirname(__DIR__,2) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'init.php';
    require __DIR__ . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR . 'header.php';
    require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'HomeArticle.php';

    // $file = dirname(__DIR__,2) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'home.csv';
    // $articles = get_csv_files($file, 'home');

    $articleModel = new HomeArticle(0, '', '', '', '', '');
    $articles = $articleModel->getArticles();
?>

<main class="home-main">
    <?php 
        foreach($articles as $article){
            echo $article->toHTML();
        } 
    ?>
</main>

<?php require __DIR__ . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR . 'footer.php' ?>