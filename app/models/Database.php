<?php

namespace App\Models;

use \PDO;
use \PDOException;

/**
 * Classe pour gérer la connexion à la base de données.
 */
class Database{

    /**
     * Instance unique de la connexion PDO.
     *
     * @var PDO|null
     */
    private static ?PDO $pdo = null;

    /**
     * Établit une connexion à la base de données et la retourne.
     *
     * @return PDO Instance de la connexion PDO.
     * @throws PDOException En cas d'erreur de connexion.
     */
    public static function getConnection(): PDO{
        if(self::$pdo === null){
            $config = require dirname(__DIR__,2) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'db_config.php';
            $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4";
            try{
                self::$pdo = new PDO($dsn, $config['user'], $config['password'], [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
            } catch(PDOException $e){
                throw new PDOException(("Erreur de connexion à la base de données : " . $e->getMessage()));
            }
        }
        return self::$pdo;
    }

    /**
     * Vérifie si une table existe dans la base de données.
     *
     * @param string $table_name Nom de la table à vérifier.
     * @return bool Retourne `true` si la table existe, `false` sinon.
     */
    public static function table_exists(string $table_name): bool{
        $pdo = self::getConnection();
        try{
            $pdo->query("DESCRIBE $table_name");
            echo "La table $table_name existe déjà !" . PHP_EOL;
            return true;
        }catch(PDOException $e){
            echo $e->getMessage() . PHP_EOL;
            return false;
        }
    }

    /**
     * Crée une table dans la base de données à partir d'une requête SQL.
     *
     * @param string $sql Requête SQL de création de table.
     * @return bool Retourne `true` si la table a été créée avec succès, `false` sinon.
     */
    public static function create_table(string $sql): bool{
        $pdo = self::getConnection();
        try{
            $pdo->exec($sql);
            echo "Table créée avec succès !" . PHP_EOL;
            return true;
        }catch(PDOException $e){
            echo "Erreur : " . $e->getMessage() . PHP_EOL;
            return false;
        }
    }
}