<?php
    use App\Enums\Course;

    require __DIR__ . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR . 'header.php';

    $command = [];
    $courses = Course::getTypeKeysValues();
?>

<main class="menu-main">
    <section class="menu-section-command">
        <div class="command">
            <h1>Commande</h1>
            <p>En cours d'étude</p>
        </div>
    </section>
    <section class="menu-section-menu">
        <?php foreach($courses as $k => $course): ?>
            <h1><?= $course ?></h1>
            <?php 
                foreach ($dishes as $dish){
                    if($dish->getCourse() === $k){
                        echo $dish->toHTML();
                    }
                }    
            ?>
        <?php endforeach ?>
    </section>
</main>

<?php require __DIR__ . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR . 'footer.php' ?>