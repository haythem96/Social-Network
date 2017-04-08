<?php
session_start();
include("filters/auth_filter.php");
include("filters/init.php");
require("includes/functions.php");
require("models/profileModel.php");
require("models/chatModel.php");


if (!isset($_GET['senderId'])) {
    $id = $_SESSION['id'];
    header("location: message.php?id=$id");
}

$profile = new profileModel();
$url1 = $profile->getImageUrl($_SESSION['id']);         //Get user image profil (By user ID)

$chat = new chatModel();
$res = $chat->getConversation($_GET['senderId'],$_SESSION['id']);

require("views/chat.view.php");
?>