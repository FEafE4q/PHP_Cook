<?php
    $host = "localhost"; /* Host name */
    $user = ""; /* User */
    $password = ""; /* Password */
    $dbname = ""; /* Database name */
	$con = new mysqli($host, $user, $password, $dbname);
    // Check connection
	if (mysqli_connect_error()){
	die('Connection error ('.mysqli_connect_errno().')'.mysqli_connect_error());
	}
	mysqli_set_charset($con, "UTF-8");
?>