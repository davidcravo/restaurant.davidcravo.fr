<?php
    include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'init.php';
    require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'head.php';
    require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'header.php';

    $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'home.csv';
    $articles = get_csv_files($file, 'home');
?>

<main class="home-main">
    <?php foreach($articles as $article): ?> 
        <article class="home-article" id="<?= $article['article-id'] ?>">
            <a href="<?= $article['link'] ?>#<?= $article['article-id'] ?>">
                <img src="<?= $article['image'] ?>" alt="<?= $article['description'] ?>" class="home-article-image">
            </a>
            <p><?= $article['text'] ?></p>
        </article>
    <?php endforeach; ?>
</main>

<?php require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'footer.php' ?>