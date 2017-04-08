<?php
    session_start();
    include("../filters/auth_filter.php");
    include("../filters/init.php");
    require("../includes/functions.php");
    require("../config/database.php");
    extract($_POST);

    $db = new database();
    $pdo = $db->connect();
    $q = $pdo->prepare("SELECT username, imageUrl, profile.id FROM users,profile WHERE (users.name LIKE :query) AND (profile.nameP LIKE :query) LIMIT 1");
    $q->execute([
        'query' => $query.'%'
    ]);
    $users = $q->fetchAll(PDO::FETCH_OBJ);

    foreach ($users as $user){ ?>
        <a href="profile.php?id=<?= $user->id ?>">
            <div class="display-box">
                <img src="<?= $user->imageUrl ?>" alt="<?= $user->username ?>" class="demo-avatar">&nbsp;<?= $user->username ?>
            </div>
        </a>
    <?php
    }
?>