<?php
    use App\Enums\Course;
    use App\Models\Dish;

    require dirname(__DIR__,2) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
    require __DIR__ . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR . 'header.php';

    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'enums' . DIRECTORY_SEPARATOR . 'Course.php';
    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'Dish.php';

    $command = [];
    $courses = Course::getTypeKeysValues();
    //$dishes = Dish::getDishes();
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