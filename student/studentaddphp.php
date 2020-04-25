<?php

header("content-type:text/html;charset=utf-8");

$number    = !empty($_POST['stu_number'])?trim($_POST['stu_number']):NULL;
$name      = !empty($_POST['stu_name'])?trim($_POST['stu_name']):NULL;
$age       = !empty($_POST['stu_age'])?$_POST['stu_age']:NULL;
$gender    = !empty($_POST['stu_gender'])?$_POST['stu_gender']:NULL;
$class     = !empty($_POST['stu_class'])?$_POST['stu_class']:NULL;

$number_error = $name_error = $age_error = $class_error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($number)) 
	{
		$number_error = "請輸入學號";
	}
	elseif (strlen($number) != 9) 
	{
		$number_error = "學號長度須為9";
	}

	if (empty($name)) {
		$name_error = "請輸入姓名";
	}

	if (empty($age)) {
		$age_error = "請輸入年齡數值";
	}

	if (empty($class)) {
		$class_error = "請選擇班級";
	}
}


include "../view/studentaddphpview.php";