<?php
header("content-type:text/html;charset=utf-8");
require_once "../model/lib/db.php";

$pdo = connect_db();
$_id = base64_decode($_GET['edit']);
$_id = intval(str_replace('student', '', $_id));


$query = "SELECT * FROM `student` WHERE `id`=:_id";		
$statement = $pdo->prepare($query);
$statement->bindValue(":_id", $_id);
$statement->execute();
$statement = $statement->fetchAll(PDO::FETCH_ASSOC);
$arr = $statement[0];
include "../view/studenteditview.php";


