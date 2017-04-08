<?php
session_start();
include("../filters/auth_filter.php");
include("../filters/init.php");
require("../includes/functions.php");
require("../config/database.php");
extract($_POST);

$db = new database();
$pdo = $db->connect();
$q = $pdo->prepare("UPDATE message SET seen = '1' WHERE id = :id");
$q->execute([
    'id' => $id
]);

?>