<?php
header('Content-Type: application/json; charset=UTF-8');
require_once "../model/lib/db.php";

$pdo    = connect_db();
$id     = str_replace('del', '', $_POST['id']);
$status = false;
$result = array();

try 
{
	$query     = "DELETE FROM `student` WHERE `id`=:id";
	$statement = $pdo->prepare($query);
	$statement->bindValue(':id', $id, PDO::PARAM_INT);
	$status    = $statement->execute();

	if ($status) {
		$result = [
			'Status' => $status
		];

		echo json_encode($result);exit;
	}
} 
catch (PDOException $e) 
{
	$result = [
		'Status' => $status,
		'Msg'    => $e->getMessage()
	];

	echo json_encode($result);exit;
}

