<?php
require_once("config/database.php");

class messageModel
{
    function getId($username){
        $db = new database();
        $pdo = $db->connect();
        $query = $pdo->prepare("SELECT id FROM users WHERE users.username = ?");
        $query->bindParam(1, $username);
        $query->execute();
        $res = $query->fetch(PDO::FETCH_OBJ);
        return $res;
    }

    function sendMessage($senderId, $recieverId, $content)
    {
        $db = new database();
        $pdo = $db->connect();
        $query = $pdo->prepare("INSERT INTO message(senderId,recieverId,content) VALUES(?,?,?)");
        $query->bindParam(1, $senderId);
        $query->bindParam(2, $recieverId);
        $query->bindParam(3, $content);
        $query->execute();
        if (!$query) {
            echo "\nPDO::errorInfo():\n";
            print_r($pdo->errorInfo());
        }
    }

    function getRecMessages($recieverId){
        $db = new database();
        $pdo = $db->connect();
        $query = $pdo->prepare("SELECT M.id, M.senderId, M.content, M.created_at, Pr.imageUrl, U.username 
                                FROM message M, profile Pr, users U  
                                WHERE (recieverId = ?) AND (Pr.id = senderId) AND (U.id = senderId) 
                                ORDER BY created_at DESC");
        $query->bindParam(1, $recieverId);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }
    function getSentMessages($senderId){
        $db = new database();
        $pdo = $db->connect();
        $query = $pdo->prepare("SELECT M.id, M.senderId, M.recieverId, M.content, M.created_at, Pr.imageUrl, U.username 
                                FROM message M, profile Pr, users U  
                                WHERE (senderId = ?) AND (Pr.id = recieverId) AND (U.id = recieverId) 
                                ORDER BY created_at DESC");
        $query->bindParam(1, $senderId);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }
}

?>