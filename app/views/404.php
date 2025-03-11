<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur 404 - Page Introuvable</title>
    <link rel="stylesheet" href="/assets/css/404.css">
    <script>
        setTimeout(function() {
            window.location.href = "/home";
        }, 5000); // Redirection après 5 secondes
    </script>
</head>
<body>
    <div class="container">
        <div class="animation"></div>
        <h1>404</h1>
        <p>Oups ! La page que vous recherchez est introuvable.</p>
        <p>Vous serez redirigé vers l'accueil dans quelques secondes.</p>
        <a href="/home" class="btn">Retour à l'accueil</a>
    </div>
</body>
</html>
