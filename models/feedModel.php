<?php
    require("config/database.php");

class feedModel{
    function getFriendsPost($user_id)
    {
        $db = new database();
        $pdo = $db->connect();
        $query = $pdo->prepare("SELECT U.id as userId, U.username, Pr.imageUrl, P.id, P.post,P.postImgUrl, P.created_at
                                FROM users U, profile Pr, posts P, friends_relationships F 
                                WHERE (P.user_id = U.id) 
                                AND (Pr.id = U.id) 
                                AND (CASE
                                  WHEN F.user_id1 = ?
                                  THEN F.user_id2 = U.id
                                  WHEN F.user_id2 = ?
                                  THEN F.user_id1 = U.id
                                END)
                                AND (F.status = '2')
                                ORDER BY P.created_at DESC");
        $query->bindParam(1, $user_id);
        $query->bindParam(2, $user_id);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }
}


?>