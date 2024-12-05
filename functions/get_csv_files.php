<?php

function get_csv_files($file, $template){

    // Ouverture du fichier
    $csv_file = fopen($file, 'r');

    // Ignorer la première ligne (en-têtes)
    fgetcsv($csv_file);

    // tableau pour stocker les fichiers
    $files = [];

    // lecture des lignes du fichier csv
    while(($data = fgetcsv($csv_file, 1000, ';')) !== FALSE){
        if($template === 'home'){
            $files[] = [
                'id' => $data[0],
                'article-id' => $data[2],
                'image' => $data[1],
                'link' => $data[3],
                'description' => $data[4],
                'text' => $data[5]
            ];
        }elseif($template === 'portugal'){
            $files[] = [
                'id' => $data[0],
                'article-id' => $data[1],
                'image' => $data[2],
                'link' => $data[3],
                'description' => $data[4],
                'text' => $data[5]
            ];
        }elseif($template === 'menu'){
            $files[] = [
                'id' => $data[0],
                'image' => $data[1],
                'description' => $data[2],
                'name' => $data[3],
                'price' => $data[4],
                'type' => $data[5],
                'link' => $data[6],
                'text' => $data[7]
            ];
        }elseif($template === 'address'){
            $files[] = [
                'id' => $data[0],
                'street_address' => $data[1],
                'postal_code' => $data[2],
                'city' => $data[3],
                'country' => $data[4]
            ];
        }elseif($template === 'phone'){
            $files[] = [
                'id' => $data[0],
                'phone_number' => $data[1]
            ];
        }elseif($template === 'time_slot'){
            $files[] = [
                'id' => $data[0],
                'day_of_the_week' => $data[1],
                'am_start' => $data[2],
                'am_end' => $data[3],
                'pm_start' => $data[4],
                'pm_end' => $data[5]
            ];
        }
    }

    // fermeture du fichier
    fclose($csv_file);

    return $files;
}