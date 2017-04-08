<?php
require_once("config/database.php");

class chatModel{
    function getConversation($senderid,$id){
        $db = new database();
        $pdo = $db->connect();
        $query = $pdo->prepare("SELECT M.content, U.id, U.username, Pr.imageUrl FROM message M, users U, profile Pr
                                WHERE (senderId = ? AND recieverId = ? OR senderId = ? AND recieverId = ?)
                                AND (U.id = senderId)
                                AND (U.id = Pr.id)
                                ORDER BY created_at DESC");
        $query->bindParam(1, $senderid);
        $query->bindParam(2, $id);
        $query->bindParam(3, $id);
        $query->bindParam(4, $senderid);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }
}


?>