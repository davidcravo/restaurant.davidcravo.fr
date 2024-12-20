<?php

require dirname(__DIR__,2) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'Database.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'Config.php';

use App\Config\Config;
use App\Models\Database;

$pdo = Database::getConnection();

$sql_files = [
    'home_articles' => 'create_table_home_articles.sql',
    'adresses' => 'create_table_addresses.sql',
    'phones' => 'create_table_phones.sql',
    'time_slots' => 'create_table_time_slots.sql',
    'guestbook' => 'create_table_guestbook.sql',
    'dishes' => 'create_table_dishes.sql'
];

foreach($sql_files as $table_name => $file){
    $file_path = Config::DIR['sql'] . $file;
    if(file_exists($file_path)){
        echo "Exécution du fichier : $file" . PHP_EOL;
        $sql = file_get_contents($file_path);
        if(!Database::table_exists($table_name)){
            Database::create_table($sql);
        }
    }else{
        echo "fichier SQL introuvable : $file_path" . PHP_EOL;
    }
}