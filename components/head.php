<?php
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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pinyon+Script&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/home.css">
</head>
<body>
