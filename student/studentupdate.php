<?php
header('Content-Type: application/json; charset=UTF-8');

require_once "../model/lib/db.php";

$pdo       = connect_db();
$id        = base64_decode($_POST['stu_id']);
$id        = intval(str_replace('student', '', $id));
$number    = trim($_POST['stu_number']);
$name      = trim($_POST['stu_name']);
$age       = $_POST['stu_age'];
$gender    = $_POST['stu_gender'];
$class     = $_POST['stu_class'];
$status    = false;
$result    = array();

try 
{
	if (!empty($name) && !empty($number) && !empty($age) && !empty($gender) && !empty($class)) 
	{
		$query     = "UPDATE `student` SET `name`=:stu_name,`number`=:stu_number,`age`=:stu_age,`gender`=:stu_gender,`class`=:stu_class WHERE `id`=:stu_id";
		$statement = $pdo->prepare($query);
		$statement->bindValue(':stu_name', $name, PDO::PARAM_STR);
		$statement->bindValue(':stu_number', $number, PDO::PARAM_STR);
		$statement->bindValue(':stu_age', $age, PDO::PARAM_INT);
		$statement->bindValue(':stu_gender', $gender, PDO::PARAM_INT);
		$statement->bindValue(':stu_class', $class, PDO::PARAM_STR);
		$statement->bindValue(':stu_id', $id, PDO::PARAM_INT);
		$status = $statement->execute();
	}
	$result = [
		"Status" => $status,
		"id"     => $id
	];

	echo json_encode($result);

} 
catch (PDOException $e) 
{
	$result = [
		"Status" => $status,
		"message" => $e->getMessage()
	];

	echo json_encode($result);
	// exit;
}

