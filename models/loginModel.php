<?php
    require_once("config/database.php");

    class loginModel{
        function usernameCheck($username){
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("SELECT username FROM users WHERE username = ?");
            $query->bindParam(1, $username);
            $query->execute();
            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }
        function getInfo($username){
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("SELECT id, username, email FROM users WHERE username =?");
            $query->bindParam(1, $username);
            $query->execute();
            $res = $query->fetch(PDO::FETCH_OBJ);
            return $res;
        }
        function passwordCheck($username,$password){
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("SELECT password FROM users WHERE username = ?");
            $query->bindParam(1, $username);
            $query->execute();
            $res = $query->fetchAll(PDO::FETCH_COLUMN);
            if(password_verify($password, $res[0])){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>