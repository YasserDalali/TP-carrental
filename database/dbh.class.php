<?php

class Dbh
{
    private static $host = "localhost";
    private static $user = "root";
    private static $password = "";
    private static $dbName = "carrental";

    protected static function connect()
    {
        $dsn = 'mysql:host=' . self::$host . ';dbname=' . self::$dbName;
        $pdo = new PDO($dsn, self::$user, self::$password);
        return $pdo;
    }
    public static function executeQ($sql)
    {
        try {
            $result = self::connect()->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}