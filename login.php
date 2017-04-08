<?php
    session_start();
    include("filters/guest_filter.php");
    include("filters/init.php");
    require("includes/constants.php");
    require("models/loginModel.php");
    require("includes/functions.php");

    $user = new loginModel();

    if(isset($_POST['login'])) {
        if(not_empty(['lg_username', 'lg_password'])) {
            $errors = [];        //errors table
            $username = $_POST['lg_username'];
            $password = $_POST['lg_password'];
            if(($user->usernameCheck($username) == false)) {
                $errors[] = "Utilisateur n'existe pas!";
            }
            elseif(($user->passwordCheck($username,$password) == false)){
                $errors[] = "Mot de passe invalide!";
            }
            if(count($errors) == 0){
                //account.php filter
                $res = $user->getInfo($username);
                $_SESSION['id'] = $res->id;
                $_SESSION['username'] = $res->username;
                $_SESSION['email'] = $res->email;

                //Remember me cookies
                if(isset($_POST['lg_remember']) && $_POST['lg_remember'] == 'on'){
                    setcookie('username', $res->username, time()+3600*24*30, null, null, false, true);
                    setcookie('id', $res->id, time()+3600*24*30, null, null, false, true);
                }
                header("location: account.php?id=$res->id");
            }
        }
    }

    include("views/login.view.php");
?>