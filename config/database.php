<?php
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'SocialNetwork');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');

    class database{

        function connect()
        {
            try {
                $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
            }
            catch (PDOException $e){
                die($e->getMessage());
            }
            return $pdo;
        }
    }
?>