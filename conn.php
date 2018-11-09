<?php
	$server = "localhost";
	$username = "root";
	$pass = "root";
	$db = "info_tbl";

	$conn = mysqli_connect($server,$username,$pass,$db);

	if($conn->connect_error){

		die ("Connection Failed!". $conn->connect_error);
	}

?>
