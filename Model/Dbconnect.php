<?php
/*
 Backend Mysql connection with binding technique

*/
// This code was giving error and changing the username and password of database 
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "library";
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }



$conn = mysqli_connect("localhost", "root", "", "library"); //Connection variable

if(mysqli_connect_errno()) 
{
	echo "Failed to connect: " . mysqli_connect_errno();
}





?>