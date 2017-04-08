<?php
session_start();
include("../filters/auth_filter.php");
include("../filters/init.php");
require("../includes/functions.php");
require("../config/database.php");

$db = new database();
$pdo = $db->connect();
$query = $pdo->prepare("SELECT * FROM message WHERE (message.recieverId = :id) AND (message.seen = '0')");
$query->execute([
    'id' => $_SESSION['id']
]);
$request =  $query->rowCount();

echo $request;
?>