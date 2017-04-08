<?php
    session_start();
    include("filters/auth_filter.php");
    include("filters/init.php");
    require("models/profileModel.php");
    require("includes/functions.php");

    if(!isset($_GET['id'])){
        $id = $_SESSION['id'];
        header("location: profile.php?id=$id");
    }

    $profile = new profileModel();
    $url1 = $profile->getImageUrl($_SESSION['id']);         //Get user image profil (By user ID)
    $url2 = $profile->getImageUrl($_GET['id']);             //Get user image profil (By user ID)
    $res= $profile->getUserInfoById($_GET['id']);

    $checkFriends = $profile->checkIfFriends($_SESSION['id'],$_GET['id']);

    /* Post submission */
    if(isset($_POST['submitPost'])){
        $errorPost = [];
        //Add image to post
        $img=$_FILES['addPic'];
        if($img['name'] != '') {
            $url = UploadImage($img);
            $profile->setPostWithImage($_SESSION['id'], $_POST['postContent'], $url);
        }
        else{
            if(trim($_POST['postContent']) == ""){
                $errorPost[] = "Veuillez ecrire une publication!";
            }
            else {
                $profile->setPost($_SESSION['id'], $_POST['postContent']);
            }
        }
    }

    /* Retrieve all post */
    $posts = $profile->getPosts($_GET['id']);


    //Check if invitation request already sent
    $checkRequest = $profile->checkRequest($_SESSION['id'],$_GET['id']);

    //Check if there is a recieved invitaton from specific profil
    $checkRecievedRequest = $profile->checkRequest($_GET['id'],$_SESSION['id']);

    //Send invitation request
    if(isset($_POST['sendInvitation'])){
        $errorSendInvitation = [];
        $profile->sendInvitation($_SESSION['id'],$_GET['id']);
        $id = $_GET['id'];
        header("location: profile.php?id=$id");
    }
    //Remove invitation
    if(isset($_POST['removeInvitation'])){
        $errorRemoveInvitation = [];
        $profile->removeInvitation($_SESSION['id'],$_GET['id']);
        $id = $_GET['id'];
        header("location: profile.php?id=$id");
    }
    //Accept invitation request
    if(isset($_POST['acceptRequest'])){
        $profile->acceptInvitation($_GET['id'],$_SESSION['id']);
        $id = $_GET['id'];
        header("location: profile.php?id=$id");
    }
    //Refuse request
    if(isset($_POST['refuseRequest'])){
        $errorRemoveInvitation = [];
        $profile->removeInvitation($_GET['id'],$_SESSION['id']);
        $id = $_GET['id'];
        header("location: profile.php?id=$id");
    }

    //Delete friend
    if(isset($_POST['removeFriend'])){
        $profile->deleteFriend($_GET['id'],$_SESSION['id']);
        $id = $_GET['id'];
        header("location: profile.php?id=$id");
    }

    require("views/profile.view.php");
?>