<?php
require_once("config/database.php");

class friendsModel
{
    function findUser($name)
    {
        $db = new database();
        $pdo = $db->connect();
        $query = $pdo->prepare("SELECT name FROM users WHERE users.name = ?");
        $query->bindParam(1, $name);
        $query->execute();
        $count = $query->rowCount();
        return $count;
    }

    function getUserId($name)
    {
        $db = new database();
        $pdo = $db->connect();
        $query = $pdo->prepare("SELECT id FROM users WHERE users.name = ?");
        $query->bindParam(1, $name);
        $query->execute();
        $res = $query->fetch();
        return $res;
    }

    function getUserImageUsername($id)
    {
        $db = new database();
        $pdo = $db->connect();
        $query = $pdo->prepare("SELECT username,imageUrl FROM users,profile WHERE (users.id = ?) AND (profile.id = ?)");
        $query->bindParam(1, $id);
        $query->bindParam(2, $id);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_OBJ);
        $query->closeCursor();
        return $res;
    }

    function checkRecievedRequest($user_id2)
    {
        $db = new database();
        $pdo = $db->connect();
        $query = $pdo->prepare("SELECT user_id1 FROM friends_relationships WHERE (friends_relationships.user_id2 = ?) AND (friends_relationships.status = '1')");
        $query->bindParam(1, $user_id2);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }

    function getFriendsInfo($user_id){
        $db = new database();
        $pdo = $db->connect();
        /*$query = $pdo->prepare("SELECT U.username, Pr.imageUrl FROM users U, profile Pr, friends_relationships F
                                WHERE Pr.id = U.id
                                AND F.status = 2
                                AND CASE 
                                  WHEN F.user_id1 = ? THEN F.user_id2 = Pr.id
                                  WHEN F.user_id1 = Pr.id THEN F.user_id2 = ?
                                END");*/
        //$query = $pdo->prepare("SELECT user_id1, user_id2 from friends_relationships F WHERE F.status = '2' AND F.user_id1 = ? OR F.user_id2 = ?");
        $query = $pdo->prepare("SELECT U.username FROM users U, friends_relationships F
                                WHERE F.status = '2' AND F.user_id2 = U.username AND F.user_id1 = ?");
        $query->bindParam(1, $user_id);
        //$query->bindParam(2, $user_id);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }
    function getFriends($user_id)
    {
        $db = new database();
        $pdo = $db->connect();
        $query = $pdo->prepare("SELECT U.id, U.username, Pr.imageUrl 
                                FROM users U, profile Pr, friends_relationships F 
                                WHERE (Pr.id = U.id) 
                                AND (CASE
                                  WHEN F.user_id1 = ?
                                  THEN F.user_id2 = U.id
                                  WHEN F.user_id2 = ?
                                  THEN F.user_id1 = U.id
                                END)
                                AND (F.status = '2')
                                AND (F.user_id1 != F.user_id2)
                                ORDER BY F.created_at DESC");
        $query->bindParam(1, $user_id);
        $query->bindParam(2, $user_id);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }

}

?>