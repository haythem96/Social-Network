<?php
session_start();
include("filters/auth_filter.php");
include("filters/init.php");
require("includes/functions.php");
require("models/profileModel.php");
require("models/messageModel.php");

if (!isset($_GET['id'])) {
    $id = $_SESSION['id'];
    header("location: message.php?id=$id");
}

$profile = new profileModel();
$url1 = $profile->getImageUrl($_SESSION['id']);         //Get user image profil (By user ID)

$msg = new messageModel();
$messagesRec = $msg->getRecMessages($_SESSION['id']);   //Received Messages
$messagesSent = $msg->getSentMessages($_SESSION['id']); //Sent Messages

if(isset($_POST['envoi'])){
    extract($_POST);
    $errorMessage = [];
    if(empty($pseudo)){
        $errorMessage[] = "Saisir un utilisateur";
    }
    if(empty($message)){
        $errorMessage[] = "Entrer votre message";
    }
    if(!empty($message) && !empty($pseudo)){
        $id = $msg->getId($pseudo);
        $msg->sendMessage($_SESSION['id'],$id->id,$message);
    }
}


require("views/message.view.php");
?>