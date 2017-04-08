<?php
    if((isset($_SESSION['id'])) && (isset($_SESSION['username']))){
        $id = $_SESSION['id'];
        header("location: account.php?id=$id");
    }
?>