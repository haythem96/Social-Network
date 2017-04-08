<?php
    //Check if cookies exist
    if(!empty($_COOKIE['username']) && !empty($_COOKIE['id'])){
        $_SESSION['username'] = $_COOKIE['username'];
        $_SESSION['id'] = $_COOKIE['id'];
    }
?>