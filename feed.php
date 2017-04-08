<?php
    session_start();
    include("filters/auth_filter.php");
    include("filters/init.php");
    require("models/feedModel.php");
    require("models/profileModel.php");
    require("includes/functions.php");

    $profile = new profileModel();
    $url1 = $profile->getImageUrl($_SESSION['id']);      //Get user image profil (By user ID)

    $fil = new feedModel();
    $res = $fil->getFriendsPost($_SESSION['id']);

    include("views/feed.view.php");
?>