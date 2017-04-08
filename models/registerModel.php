<?php
    require("config/database.php");

    class registerModel{
        function register($name,$username,$email,$password){
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("INSERT INTO users(name, username, email, password) VALUES (?, ?, ?, ?)");
            $query->bindParam(1, $name);
            $query->bindParam(2, $username);
            $query->bindParam(3, $email);
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $query->bindParam(4, $passwordHash);
            $query->execute();
            if($query){
                $query2 = $pdo->prepare("SELECT id FROM users WHERE users.username = ?");
                $query2->bindParam(1, $username);
                $query2->execute();
                $res = $query2->fetch();
                $query2->closeCursor();
                $query3 = $pdo->prepare("INSERT INTO profile(id) VALUES(?)");
                $query3->bindParam(1,$res[0]);
                $query3->execute();
                $query3 = $pdo->prepare("INSERT INTO friends_relationships(user_id1, user_id2, status) VALUES(?, ?, ?)");
                $query3->execute([$res[0],$res[0],'2']);
            }
        }
        function activate($username,$email){
        }
        function is_already_in_use($field, $value, $table){
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("SELECT id FROM $table WHERE $field = ?");
            $query->execute([$value]);
            $count = $query->rowCount();
            $query->closeCursor();
            return $count;
        }
    }
?>