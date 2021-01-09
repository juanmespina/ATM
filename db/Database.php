<?php
class Database
{
    public static $db = "cajero";
    public static $user = "root";
    public static $pass = "";
    public static $server = "localhost";
    public static $connection;

     static function  connection()
    {
        try {
            Database::$connection = mysqli_connect(Database::$server, Database::$user, Database::$pass, Database::$db);
            return Database::$connection;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
