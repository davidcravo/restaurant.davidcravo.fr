<?php
    include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'init.php';
    require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'head.php';
    require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'header.php';

    $file_addresses = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'addresses.csv';
    $addresses = get_csv_files($file_addresses, 'address');

    $file_phones = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'phones.csv';
    $phones = get_csv_files($file_phones, 'phone');

    $file_time_slots = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'time_slots.csv';
    $time_slots = get_csv_files($file_time_slots, 'time_slot');
?>

<main class="main-find_us">
    <img src="/assets/images/about/restaurant.jpeg" alt="Photo du restaurant">
    <section class="section-time-slots">
        <h1>Horaires d'ouverture</h1>
        <ul>
            <?php foreach($time_slots as $time_slot){
                $time_slot_object = new Time_slot($time_slot['id'], $time_slot['day_of_the_week'], $time_slot['am_start'], $time_slot['am_end'], $time_slot['pm_start'], $time_slot['pm_end']);
                echo $time_slot_object->time_slot_html();
            }
            ?>
        </ul>
    </section>
    <section class="section-information">
        <h1>Informations</h1>
        <i class="fa-solid fa-location-dot"></i>
        <ul>
            <?php foreach($addresses as $address){
                $address_object = new Address($address['id'], $address['street_address'], $address['postal_code'], $address['city'], $address['country']);
                echo $address_object->address_html();
            }
            ?>
        </ul>
        <i class="fa-solid fa-phone-volume"></i>
        <ul>
            <?php foreach($phones as $phone){
                $phone_object = new Phone($phone['id'], $phone['phone_number']);
                echo $phone_object->phones_html();
            } 
            ?>
        </ul>
    </section>
    <section class="section-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d1600.1288531437438!2d1.334815805264776!3d47.585584205116454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1s12%20Rue%20des%20restaurateurs!5e0!3m2!1sfr!2sfr!4v1730823160436!5m2!1sfr!2sfr" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
</main>

<?php require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'footer.php' ?>