<?php
	$user = 'localhost';
	$name = '';
	$pass = '';
	$db = '';

	$con = mysqli_connect($user,$name,$pass,$db);

	if (!$con){
	die("DataSent" . mysqli_connect_error());
	}
?>
