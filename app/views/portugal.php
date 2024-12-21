<?php
    include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'init.php';
    include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'head.php';

    $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'portugal.csv';
    $articles = get_csv_files($file, 'portugal');
    $anchor = "";
    if(isset($_GET['anchor'])){
        $anchor = htmlentities($_GET['anchor']);
    }
    $article = get_article($articles, $anchor);
?>

<main class="main-portugal">
    <a onclick="window.history.back()"><img src="<?= $article['image'] ?>" alt="<?= $article['description'] ?>"></a>
    <div class="content"><?= $article['text'] ?></div>
    <button onclick="window.history.back()">Retour</button>
</main>