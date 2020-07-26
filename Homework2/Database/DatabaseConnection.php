<?php

class DatabaseConnection
{
    private static ?PDO $instance = null;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance(): PDO
    {
        $host = "127.0.0.1";
        $database = "pentalog";
        $username = "root";
        $password = "";

        if (is_null(self::$instance)) {
            self::$instance = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        self::$instance->exec('ALTER TABLE books AUTO_INCREMENT = 0');
        return self::$instance;
    }
}
