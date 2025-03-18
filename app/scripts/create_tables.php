<?php

require dirname(__DIR__,2) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'Database.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'Config.php';

use App\Config\Config;
use App\Models\Database;


/**
 * Script de création des tables de la base de données.
 *
 * Ce script exécute des fichiers SQL pour créer des tables nécessaires à l'application,
 * uniquement si elles n'existent pas déjà dans la base de données.
 */

// Connexion à la base de données.
$pdo = Database::getConnection();

/**
 * Liste des fichiers SQL pour la création des tables.
 *
 * Le tableau associe le nom des tables à leurs fichiers SQL correspondants.
 *
 * @var array<string, string>
 */
$sql_files = [
    'home_articles' => 'create_table_home_articles.sql',
    'adresses' => 'create_table_addresses.sql',
    'phones' => 'create_table_phones.sql',
    'time_slots' => 'create_table_time_slots.sql',
    'guestbook' => 'create_table_guestbook.sql',
    'dishes' => 'create_table_dishes.sql',
    'destinations' => 'create_table_destinations.sql'
];

// Parcours de chaque table à créer.
foreach($sql_files as $table_name => $file){

    // Construction du chemin complet du fichier SQL.
    $file_path = Config::DIR['sql'] . $file;

    if(file_exists($file_path)){
        echo "Exécution du fichier : $file" . PHP_EOL;

        // Lecture du contenu du fichier SQL.
        $sql = file_get_contents($file_path);

        // Vérification si la table existe déjà.
        if(!Database::table_exists($table_name)){
            // Création de la table si elle n'existe pas.
            Database::create_table($sql);
        }
    }else{
        echo "fichier SQL introuvable : $file_path" . PHP_EOL;
    }
}