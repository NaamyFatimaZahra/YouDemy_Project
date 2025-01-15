<?php

require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

class Database
{
    private static $conn = null;

    public static function connect()
    {
        if (self::$pdo === null) {
            $dotenv = Dotenv::createImmutable(__DIR__);
            $dotenv->load();

            $dsn = "mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'] . ";charset=" . $_ENV['DB_CHARSET'];
            try {
                self::$pdo = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            } catch (PDOException $e) {
                header('Location',"../Views/");
            }
        }

        return self::$conn;
    }
}
