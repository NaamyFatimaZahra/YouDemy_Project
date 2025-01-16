<?php
namespace App\config;

use Dotenv\Dotenv;

use PDO;
use PDOException;

class Database
{
    private static $conn = null;

    public static function connect()
    {
        if (self::$conn === null) {
            $dotenv = Dotenv::createImmutable(__DIR__. '/../../');
            $dotenv->load();
             $dsn = "mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'] ;
            try {
                self::$conn = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
                               
            } catch (PDOException $e) {
                header('Location',"../Views/Errors/500.php");
                exit();
            }
        }

        return self::$conn;
    }
}

