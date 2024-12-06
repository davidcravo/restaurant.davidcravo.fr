<?php
    require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'navigation.php';
?>

<header class="header">
    <div class="topbar">
        <div class="logo">
            <a href="/templates/home.php"><img src="/assets/images/logo.jpeg" alt="Restaurant's logo"></a>
        </div>
        <nav class="menu">
            <?= nav_item('/templates/home.php', 'Accueil', 'menu-item') ?>
            <?= nav_item('/templates/menu.php', 'Menu', 'menu-item') ?>
            <?= nav_item('/templates/recipes.php', 'Recettes', 'menu-item') ?>
            <?= nav_item('/templates/find_us.php', 'Nous trouver', 'menu-item') ?>
            <?= nav_item('/templates/contact.php', 'Contact', 'menu-item') ?>
            <?= nav_item('/templates/guestbook.php', "Livre d'or", 'menu-item') ?>
            <?= nav_item('/templates/reservation.php', 'Réserver', 'menu-item menu-button') ?>

        </nav>
    </div>
    <div class="baseline">
            <span class="baseline-welcome">Bienvenue</span>
            <strong class="baseline-name">Saudade Lisboa</strong>
            <span class="baseline-slogan">Spécialités portugaises</span>
        </div>
</header>