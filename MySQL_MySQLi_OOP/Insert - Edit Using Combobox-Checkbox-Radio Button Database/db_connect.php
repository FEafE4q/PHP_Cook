<?php
	$user = 'localhost';
	$name = '';
	$pass = '';
	$dbname = '';

	$db = mysqli_connect($user,$name,$pass,$dbname);

	if (!$db){
	die("DataSent" . mysqli_connect_error());
	}
?>
