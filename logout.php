<?php
    session_start();
    session_destroy();
    $_SESSION = [];

    setcookie('username', '', time()-3600);
    setcookie('id', '', time()-3600);

    header('location: login.php');
?>