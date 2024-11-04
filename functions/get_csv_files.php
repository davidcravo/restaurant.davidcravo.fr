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
        }
    }

    // fermeture du fichier
    fclose($csv_file);

    return $files;
}