<?php
    require_once("config/database.php");

    class profileModel
    {
        function getUserInfoById($id)
        {
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("SELECT name,username,email,city,adresse,codePostal,sex,tel,bio,workStatus,facebook,twitter  FROM users,profile WHERE (users.id = ?) AND (profile.id = ?)");
            $query->bindParam(1, $id);
            $query->bindParam(2, $id);
            $query->execute();
            $res = current($query->fetchAll(PDO::FETCH_OBJ));
            $query->closeCursor();
            return $res;
        }

        function getImageUrl($id)
        {
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("SELECT imageUrl FROM profile WHERE profile.id = ?");
            $query->bindParam(1, $id);
            $query->execute();
            $res = $query->fetch();
            return $res[0];
        }

        function setPost($id, $post)
        {
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("INSERT INTO posts(user_id,post,created_at) VALUES(?,?,NOW())");
            $query->bindParam(1, $id);
            $query->bindParam(2, $post);
            $query->execute();
        }
        function setPostWithImage($id, $post, $imgUrl){
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("INSERT INTO posts(user_id,post,postImgUrl,created_at) VALUES(?,?,?,NOW())");
            $query->bindParam(1, $id);
            $query->bindParam(2, $post);
            $query->bindParam(3, $imgUrl);
            $query->execute();
            if (!$query) {
                echo "\nPDO::errorInfo():\n";
                print_r($pdo->errorInfo());
            }
        }

        function getPosts($id)
        {
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("SELECT post,postImgUrl,created_at FROM posts WHERE posts.user_id = ? ORDER BY created_at DESC ");
            $query->bindParam(1, $id);
            $query->execute();
            $res = $query->fetchAll(PDO::FETCH_OBJ);
            return $res;
        }

        //Check if invitation request already sent
        function checkRequest($user_id1, $user_id2)
        {
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("SELECT status FROM friends_relationships WHERE friends_relationships.user_id1=? AND friends_relationships.user_id2=?");
            $query->bindParam(1, $user_id1);
            $query->bindParam(2, $user_id2);
            $query->execute();
            $res = $query->fetch();
            return $res;
        }

        //Send invitation request
        function sendInvitation($user_id1, $user_id2)
        {
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("INSERT INTO friends_relationships(user_id1, user_id2,status) VALUES(?,?,'1')");
            $query->bindParam(1, $user_id1);
            $query->bindParam(2, $user_id2);
            $query->execute();
        }

        //Remove invitation request
        function removeInvitation($user_id1, $user_id2)
        {
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("DELETE FROM friends_relationships WHERE user_id1 = ? AND user_id2 = ?");
            $query->bindParam(1, $user_id1);
            $query->bindParam(2, $user_id2);
            $query->execute();
        }

        //Accept invitation request
        function acceptInvitation($user_id1, $user_id2){
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("UPDATE friends_relationships SET status = '2' WHERE user_id1 = ? AND user_id2 = ?");
            $query->bindParam(1, $user_id1);
            $query->bindParam(2, $user_id2);
            $query->execute();
        }

        //Delete invitation
        function deleteFriend($user_id1, $user_id2)
        {
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("DELETE FROM friends_relationships WHERE (user_id1 = ? AND user_id2 = ?) OR (user_id1 = ? AND user_id2 = ?)");
            $query->bindParam(1, $user_id1);
            $query->bindParam(2, $user_id2);
            $query->bindParam(3, $user_id2);
            $query->bindParam(4, $user_id1);
            $query->execute();
        }

        //Check if friends
        function checkIfFriends($user_id1, $user_id2){
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("SELECT status FROM friends_relationships WHERE (user_id1 = ? AND user_id2 = ?) OR (user_id1 = ? AND user_id2 = ?)");
            $query->bindParam(1, $user_id1);
            $query->bindParam(2, $user_id2);
            $query->bindParam(3, $user_id2);
            $query->bindParam(4, $user_id1);
            $query->execute();
            $res = $query->fetch();
            return $res;
        }
    }
?>