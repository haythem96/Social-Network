<?php
session_start();
include("filters/auth_filter.php");
include("filters/init.php");
require("includes/functions.php");
require("models/accountModel.php");
require("models/profileModel.php");
require("models/friendsModel.php");

$account = new accountModel();
$url1 = $account->getImageUrl($_SESSION['id']);         //Get user image profil (By user ID)
$url2 = $account->getImageUrl($_GET['id']);             //Get user image profil (By user ID)


$friend = new friendsModel();
if (isset($_POST['search'])) {
    extract($_POST);
    if (!empty($searchInput)) {
        $exist = $friend->findUser($searchInput);
        if ($exist > 0) {
            $id = $friend->getUserId($searchInput);
            $res = $friend->getUserImageUsername($id[0]);
            echo $res->username;
        }
    }
}

$id = $_SESSION['id'];

//Get recieved request
$recievedRequest = $friend->checkRecievedRequest($id);

//Accept invitation request
if (isset($_POST['accept'])) {
    $id = $_SESSION['id'];
    header("location: friends.php?id=$id");
}
//Remove invitation request
if (isset($_POST['remove'])) {
    $id = $_SESSION['id'];
    header("location: friends.php?id=$id");
}

//Get friends list
$friendsList = $friend->getFriends($id);

require("views/friends.view.php");
?>