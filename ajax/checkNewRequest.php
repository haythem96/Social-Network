<?php
    session_start();
    include("../filters/auth_filter.php");
    include("../filters/init.php");
    require("../includes/functions.php");
    require("../config/database.php");

    $db = new database();
    $pdo = $db->connect();
    $query = $pdo->prepare("SELECT * FROM friends_relationships WHERE (friends_relationships.user_id2 = :id) AND (friends_relationships.status = '1')");
    $query->execute([
        'id' => $_SESSION['id']
    ]);
    $request =  $query->rowCount();

    echo $request;
?>