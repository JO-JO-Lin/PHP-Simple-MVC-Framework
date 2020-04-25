<?php //資料庫連線
function connect_db(){

	$db_server = 'localhost';
	$db_name = 'stuclass';
	$db_username = 'root';
	$db_password = 'leolin!@#';
	$dbconnect = "mysql:host=$db_server; dbname=$db_name";

	 // $db_server = 'localhost';
	 // $db_name = 'stuclass';
	 // $db_username = 'root';
	 // $db_password = 'admin!@#';
	 // $dbconnect = "mysql:host=$db_server;dbname=$db_name";

	try 
	{
		$pdo = new PDO($dbconnect, $db_username, $db_password);
		$pdo->exec('SET NAMES UTF8');

		return $pdo;
	} 
	catch (PDOException $e)
	{
		// echo $e->getMessage() . "<br>";
		echo '資料庫連結錯誤';exit;
	}
}
