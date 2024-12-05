<?php
    include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'init.php';
    require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'head.php';
    require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'header.php';

    $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'menu.csv';
    $articles = get_csv_files($file, 'menu');
    $command = [];
    $types = Type::getTypeKeysValues();
?>

<main class="menu-main">
    <section class="menu-section-command">
        <div class="command">
            <h1>Commande</h1>
            <p>En cours d'étude</p>
        </div>
    </section>
    <section class="menu-section-menu">
        <?php foreach($types as $k => $type): ?>
            <h1><?= $type ?></h1>
            <?php foreach ($articles as $article) : ?>
                <?php if($article['type'] === $k): ?>
                    <article class="menu-article">
                        <div class="menu-image">
                            <a href="<?= $article['link'] ?>">
                                <img src="<?= $article['image'] ?>" alt="<?= $article['description'] ?>">
                            </a>
                        </div>
                        <div class="menu-content">
                            <a href="<?= $article['link'] ?>">
                                <h2><?= $article['name'] ?></h2>
                            </a>
                            <p><?= $article['text'] ?></p>
                            <span><?= $article['price'] ?>€</span>
                            <button>Ajouter</button>
                        </div>
                    </article>
                <?php endif ?>
            <?php endforeach ?>
        <?php endforeach ?>
    </section>
</main>

<?php require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'footer.php' ?>