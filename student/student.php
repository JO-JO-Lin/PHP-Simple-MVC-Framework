<?php
header("content-type:text/html;charset=utf-8");

require_once "../model/lib/db.php";

$pdo       = connect_db();
$query     = "SELECT * FROM `student`";
$Statement = $pdo->query($query);
$result    = $Statement->fetchAll(PDO::FETCH_ASSOC);
$count     = count($result);

include "../view/studentview.php";