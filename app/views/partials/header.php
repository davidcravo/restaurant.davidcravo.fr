<?php
    require dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'navigation.php';

    $title = $title ?? 'Restaurant';
    $description = $description ?? 'Le restaurant Saudade Lisboa de spécialités portugaises'
?>

<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <meta name="description" content="<?= htmlentities($description) ?>">
    <link rel="shortcut icon" href="/public/logo.jpeg" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pinyon+Script&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/assets/css/site.css">
    <link rel="stylesheet" href="/assets/css/header.css">
    <link rel="stylesheet" href="/assets/css/find_us.css">
    <link rel="stylesheet" href="/assets/css/home.css">
    <link rel="stylesheet" href="/assets/css/portugal.css">
    <link rel="stylesheet" href="/assets/css/menu.css">

    <script src="assets/js/home.js" defer></script>
    <script src="assets/js/menu.js" defer></script>
    <script src="https://kit.fontawesome.com/f129c06877.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <header class="header">
        <div class="topbar">
            <div class="logo">
                <a href="/templates/home.php"><img src="/logo.jpeg" alt="Restaurant's logo"></a>
            </div>
            <nav class="menu">
                <?= nav_item('/home', 'Accueil', 'menu-item') ?>
                <?= nav_item('/menu', 'Menu', 'menu-item') ?>
                <?= nav_item('/recipes', 'Recettes', 'menu-item') ?>
                <?= nav_item('/find_us', 'Nous trouver', 'menu-item') ?>
                <?= nav_item('/app/views/contact.php', 'Contact', 'menu-item') ?>
                <?= nav_item('/app/views/guestbook.php', "Livre d'or", 'menu-item') ?>
                <?= nav_item('/app/views/reservation.php', 'Réserver', 'menu-item menu-button') ?>

            </nav>
        </div>
        <div class="baseline">
                <span class="baseline-welcome">Bienvenue</span>
                <strong class="baseline-name">Saudade Lisboa</strong>
                <span class="baseline-slogan">Spécialités portugaises</span>
            </div>
    </header>