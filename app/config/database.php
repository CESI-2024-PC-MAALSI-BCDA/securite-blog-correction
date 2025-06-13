<?php

namespace App\config;

use PDO;
use PDOException;

class Database
{
    private static $instance = null;

    public static function getConnection()
    {
        if (!self::$instance) {
            try {
                $host   = 'db5018028413.hosting-data.io';
                $port    = 3306;
                $db     = 'dbs14329504';
                $user   = 'dbu2417985';
                $pass   = 'Micromania.21';
                $charset= 'utf8mb4';

                $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
                self::$instance = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ]);
            } catch (PDOException $e) {
                // En prod, on ne meurt pas en affichant le message brut :
                error_log('DB Connection Error: ' . $e->getMessage());
                // Affichez un erreur générique à l’écran
                die('Impossible de se connecter à la base de données.');
            }
        }
        return self::$instance;
    }
}
