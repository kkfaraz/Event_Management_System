<?php 

	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "event_management";

	$conn = mysqli_connect( $servername, $username, $password, $database);
	if ($conn) {
		
	} else {
		echo "Error in connecting!";
	}


 ?>