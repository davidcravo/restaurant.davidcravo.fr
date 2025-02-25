<?php
    require __DIR__ . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR . 'header.php';
?>

<main class="main-find_us">
    <img src="/assets/images/about/restaurant.jpeg" alt="Photo du restaurant">
    <section class="section-time-slots">
        <h1>Horaires d'ouverture</h1>
        <ul>
            <?php 
                foreach($time_slots as $time_slot){
                    echo $time_slot->toHTML();
                }
            ?>
        </ul>
    </section>
    <section class="section-information">
        <h1>Informations</h1>
        <i class="fa-solid fa-location-dot"></i>
        <ul>
            <?php foreach($addresses as $address){
                echo $address->toHTML();
            }
            ?>
        </ul>
        <i class="fa-solid fa-phone-volume"></i>
        <ul>
            <?php foreach($phones as $phone){
                echo $phone->toHTML();
            } 
            ?>
        </ul>
    </section>
    <section class="section-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d1600.1288531437438!2d1.334815805264776!3d47.585584205116454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1s12%20Rue%20des%20restaurateurs!5e0!3m2!1sfr!2sfr!4v1730823160436!5m2!1sfr!2sfr" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
</main>

<?php require __DIR__ . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR . 'footer.php' ?>