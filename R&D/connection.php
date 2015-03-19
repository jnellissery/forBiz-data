<?php
function connection()
{
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname="test";
	
	// Create connection
	 $conn = mysqli_connect($servername, $username, $password,$dbname);
	 // Check connection
	 if (!$conn) {
		 die("Connection failed: " . mysqli_connect_error());
	}
	else{
			$GLOBALS["conn"]=$conn;
	}
}

 ?> 