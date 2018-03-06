<?php
	$server = "localhost";
    $username = "";
    $password = "";
	$dbasename = "";

	try {
    	$db = new PDO("mysql:host=$server;dbname=$dbasename", "$username", "$password");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		die("Oops. Something went wrong in the datadase.");
	}
?>