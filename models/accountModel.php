<?php
    require_once("config/database.php");

    class accountModel {
        function setName($id,$nameP){
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("UPDATE profile SET nameP = ? WHERE profile.id = ?");
            $query->bindParam(1, $nameP);
            $query->bindParam(2, $id);
            $query->execute();
            if (!$query) {
                echo "\nPDO::errorInfo():\n";
                print_r($pdo->errorInfo());
            }
        }
        function setCity($id,$city){
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("UPDATE profile SET city = ? WHERE profile.id = ?");
            $query->bindParam(1, $city);
            $query->bindParam(2, $id);
            $query->execute();
            if (!$query) {
                echo "\nPDO::errorInfo():\n";
                print_r($pdo->errorInfo());
            }
        }
        function setAdd($id,$add){
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("UPDATE profile SET adresse = ? WHERE profile.id = ?");
            $query->bindParam(1, $add);
            $query->bindParam(2, $id);
            $query->execute();
            if (!$query) {
                echo "\nPDO::errorInfo():\n";
                print_r($pdo->errorInfo());
            }
        }
        function setPostalCode($id,$postalCode){
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("UPDATE profile SET codePostal = ? WHERE profile.id = ?");
            $query->bindParam(1, $postalCode);
            $query->bindParam(2, $id);
            $query->execute();
            if (!$query) {
                echo "\nPDO::errorInfo():\n";
                print_r($pdo->errorInfo());
            }
        }
        function setSex($id,$sex){
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("UPDATE profile SET sex = ? WHERE profile.id = ?");
            $query->bindParam(1, $sex);
            $query->bindParam(2, $id);
            $query->execute();
            if (!$query) {
                echo "\nPDO::errorInfo():\n";
                print_r($pdo->errorInfo());
            }
        }
        function setTel($id,$tel){
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("UPDATE profile SET tel = ? WHERE profile.id = ?");
            $query->bindParam(1, $tel);
            $query->bindParam(2, $id);
            $query->execute();
            if (!$query) {
                echo "\nPDO::errorInfo():\n";
                print_r($pdo->errorInfo());
            }
        }
        function setBio($id,$bio){
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("UPDATE profile SET bio = ? WHERE profile.id = ?");
            $bioHTML = nl2br($bio);
            $query->bindParam(1, $bioHTML);
            $query->bindParam(2, $id);
            $query->execute();
            if (!$query) {
                echo "\nPDO::errorInfo():\n";
                print_r($pdo->errorInfo());
            }
        }
        function setFacebookAccount($id,$fb){
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("UPDATE profile SET facebook = ? WHERE profile.id = ?");
            $query->bindParam(1, $fb);
            $query->bindParam(2, $id);
            $query->execute();
            if (!$query) {
                echo "\nPDO::errorInfo():\n";
                print_r($pdo->errorInfo());
            }
        }
        function setTwitterAccount($id,$tw){
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("UPDATE profile SET twitter = ? WHERE profile.id = ?");
            $query->bindParam(1, $tw);
            $query->bindParam(2, $id);
            $query->execute();
            if (!$query) {
                echo "\nPDO::errorInfo():\n";
                print_r($pdo->errorInfo());
            }
        }
        function setWorkStatus($id,$status){
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("UPDATE profile SET workStatus = ? WHERE profile.id = ?");
            $query->bindParam(1, $status);
            $query->bindParam(2, $id);
            $query->execute();
            if (!$query) {
                echo "\nPDO::errorInfo():\n";
                print_r($pdo->errorInfo());
            }
        }
        function setImageUrl($url,$id){
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("UPDATE profile SET imageUrl = ? WHERE profile.id = ?");
            $query->bindParam(1, $url);
            $query->bindParam(2, $id);
            $query->execute();
            if (!$query) {
                echo "\nPDO::errorInfo():\n";
                print_r($pdo->errorInfo());
            }
        }

        function getImageUrl($id){
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("SELECT imageUrl FROM profile WHERE profile.id = ?");
            $query->bindParam(1, $id);
            $query->execute();
            $res = $query->fetch();
            return $res[0];
        }
        function getUserInfoById($id){
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("SELECT name,username,email,nameP,city,adresse,codePostal,sex,tel,bio,workStatus,facebook,twitter  FROM users,profile WHERE (users.id = ?) AND (profile.id = ?)");
            $query->bindParam(1, $id);
            $query->bindParam(2, $id);
            $query->execute();
            $res = current($query->fetchAll(PDO::FETCH_OBJ));
            $query->closeCursor();
            return $res;
        }
        function passwordCheck($id,$password){
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("SELECT password FROM users WHERE id = ?");
            $query->bindParam(1, $id);
            $query->execute();
            $res = $query->fetchAll(PDO::FETCH_COLUMN);
            if(password_verify($password, $res[0])){
                return true;
            }
            else{
                return false;
            }
        }
        function updatePassword($id,$newPassword){
            $db = new database();
            $pdo = $db->connect();
            $query = $pdo->prepare("UPDATE users SET password = ? WHERE users.id = ?");
            $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
            $query->bindParam(1, $passwordHash);
            $query->bindParam(2, $id);
            $query->execute();
        }
    }
?>