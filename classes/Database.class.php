<?php

class Database {

    const DATABASE_SERVER = "127.0.0.1";
    const DATABASE_NAME = "recipes_app";
    const DATABASE_USER = "root";
    const DATABASE_PASSWORD = "";
    const DATABASE_CHARSET = "utf8mb4";
    const HASH_METHOD = "crc32b";

    protected function connectDatabase(){

        $dsn = "mysql:host=".self::DATABASE_SERVER.";dbname=".self::DATABASE_NAME.";charset=".self::DATABASE_CHARSET;
        
        try{
            $conn = new PDO($dsn, self::DATABASE_USER, self::DATABASE_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch(PDOException $e){
            echo "Connection failed: ".$e->getMessage();
        }

    }

    protected static function setNotificationMessage($message){
        $_SESSION["NOTIFICATION"] = $message;
    }

}