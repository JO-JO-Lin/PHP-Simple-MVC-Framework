<?php

header('Content-Type: application/json; charset=UTF-8');
require_once "../model/lib/db.php";

$pdo       = connect_db();
$number    = !empty($_POST['stu_number'])?trim($_POST['stu_number']):NULL;
$name      = !empty($_POST['stu_name'])?trim($_POST['stu_name']):NULL;
$age       = !empty($_POST['stu_age'])?$_POST['stu_age']:NULL;
$gender    = !empty($_POST['stu_gender'])?$_POST['stu_gender']:NULL;
$class     = !empty($_POST['stu_class'])?$_POST['stu_class']:NULL;
$status    = false;
$result    = array();

try 
{
	if (!empty($name) && !empty($number) && !empty($age) && !empty($gender) && !empty($class)) 
	{
		$query     = "INSERT INTO `student`(`id`,`name`,`number`,`age`,`gender`,`class`) VALUES (NULL,:stu_name,:stu_number,:stu_age,:stu_gender,:stu_class)";
		$statement = $pdo->prepare($query);
		$statement->bindValue(':stu_name', $name, PDO::PARAM_STR);
		$statement->bindValue(':stu_number', $number, PDO::PARAM_STR);
		$statement->bindValue(':stu_age', $age, PDO::PARAM_INT);
		$statement->bindValue(':stu_gender', $gender, PDO::PARAM_INT);
		$statement->bindValue(':stu_class', $class, PDO::PARAM_STR);
		$statement->execute();

		$status = true;
		$result = [
			"Status" => $status
		];

		echo json_encode($result);
	}
} 
catch (PDOException $e) 
{
	$result = [
		"Status" => $status,
		"message" => $e->getMessage()
	];

	echo json_encode($result);
	exit;
}