<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname="bakery";

//creating connection
$conn=new mysqli($servername,$username,$password);

//check connection
if($conn->connect_error){
	die("connection failed: " . $conn->connect_error);
	}
else {
	mysqli_select_db($conn,$dbname);
	//echo "Connection successfull!";
}

?>