<?php

/**
 * 資料庫連接類
 */
class DB
{
	private $DB_TYPE = 'mysql';
	private $DB_HOST = 'localhost';
	private $DB_NAME = 'stuclass';
	private $USER_NAME = 'root';
	private $USER_PASSWORD = 'leolin!@#';
	private $dsn = "";
	private $pdo = NULL;

	function __construct()
	{
		$this->dsn = "{$this->DB_TYPE}:host={$this->DB_HOST};dbname={$this->DB_NAME};charset=utf8";
		try 
		{
			$this->pdo = new PDO($this->dsn, $this->USER_NAME, $this->USER_PASSWORD);
			echo "Success";
			return $this->pdo;
		} 
		catch (PDOException $e) 
		{
			echo $e->getMessage();exit;
		}
	}
}
