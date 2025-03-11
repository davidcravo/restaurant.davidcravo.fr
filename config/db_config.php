<?php
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

return [
    'host' => $_ENV['DB_HOST'] ?? '',
    'dbname' => $_ENV['DB_NAME'] ?? '',
    'user' => $_ENV['DB_USER'] ?? '',
    'password' => $_ENV['DB_PASS'] ?? '',
];