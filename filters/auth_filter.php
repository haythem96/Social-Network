<?php
    if((!isset($_SESSION['id'])) && (!isset($_SESSION['username']))){
        header('location: login.php');

    }
?>