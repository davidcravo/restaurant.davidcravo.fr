<?php
    use App\Models\Destination;

    $anchor = "";
    if(isset($_GET['anchor'])){
        $anchor = htmlspecialchars($_GET['anchor']);
        if(empty($anchor)){
            header("Location: 404.php");
        }
    }
   
    $destination = Destination::getDestination($destinations, $anchor);

    if (!$destination) {
        header("Location: 404.php");
        exit;
    }
    
    echo $destination->toHTML();

    ?>

    <link rel="stylesheet" href="/assets/css/destination.css">