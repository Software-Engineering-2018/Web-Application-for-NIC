<?php

function openConnection() {	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "nic";
	
	$conn = @mysqli_connect($servername, $username);
	if (!$conn){
	    die("Connection failed: " . mysqli_connect_error());
	}
	elseif (!@mysqli_select_db($conn, $db)) {
		die("Database not Found.");
	}

	return $conn;
}

function closeConnection($conn) {
	mysqli_close($conn);
}

?>