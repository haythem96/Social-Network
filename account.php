<?php
    session_start();
    include("filters/auth_filter.php");
    include("filters/init.php");
    require("includes/functions.php");
    require("models/accountModel.php");

    $account = new accountModel();
    $url1 = $account->getImageUrl($_SESSION['id']);         //Get user image profil (By user ID)
    $url2 = $account->getImageUrl($_GET['id']);             //Get user image profil (By user ID)

    $res = $account->getUserInfoById($_GET['id']);

    if(!empty($_GET['id'])){
        $Verify = verifyId($_GET['id'],$_SESSION['id']);
        if(!$Verify){
            $id = $_SESSION['id'];
            header("location: account.php?id=$id");
        }
    }
    else{
        $id = $_SESSION['id'];
        header("location: account.php?id=$id");
    }

    //Upload user profil image using imgur api
    if(isset($_POST['submitPic'])) {
        $img=$_FILES['profileImg'];
        if ($img['name'] == '') {
            $errorImg = [];
            $errorImg[] = "Choisir une image!";
        } else{
            $permanentUrl = UploadImage($img);
            $account = new accountModel();
            $account->setImageUrl($permanentUrl,$_GET['id']);
            $id = $_SESSION['id'];
            header("location: account.php?id=$id");
        }
    }

    //Insert data into database
    if(isset($_POST['submitInfo'])){
        extract($_POST);
        if(isset($nom)){
            $account->setName($_GET['id'],$nom);
        }
        if(isset($sex)){
            $account->setSex($_GET['id'],$sex);
        }
        if(isset($ville)){
            $account->setCity($_GET['id'],$ville);
        }
        if(isset($adresse)){
            $account->setAdd($_GET['id'],$adresse);
        }
        if(isset($codePostal)){
            $account->setPostalCode($_GET['id'],$codePostal);
        }
        if(isset($numTel)){
            $account->setTel($_GET['id'],$numTel);
        }
        if(isset($facebookAccount)){
            $account->setFacebookAccount($_GET['id'],$facebookAccount);
        }
        if(isset($twitterAccount)){
            $account->setTwitterAccount($_GET['id'],$twitterAccount);
        }
        if(isset($available_for_hire)){
            $account->setWorkStatus($_GET['id'],'oui');
        }
        $errorInfo = [];
    }
    if(isset($_POST['submitBio'])){
        extract($_POST);
        if(!empty($bio)){
            $account->setBio($_GET['id'], $bio);
        }
    }

    //Change password
    if(isset($_POST['changePassword'])){
        extract($_POST);
        $errorPassword = [];
        if(empty($currentPassword) || empty($newPassword) || empty($confirmNewPassword)){
            $errorPassword[] = "Veuillez emplir tous les champs!";
        }
        else{
            $checkOldPassword = $account->passwordCheck($_GET['id'],$currentPassword);
            if($checkOldPassword == false){
                $errorPassword[] = "Verifier votre mote de passe courant!";
            }
            else{
                if($newPassword != $confirmNewPassword){
                    $errorPassword[] = "Veuillez confirmer votre nouveau mot de passe!";
                }
                else{
                    $account->updatePassword($_GET['id'],$newPassword);
                }
            }
        }
    }

require("views/account.view.php");
?>