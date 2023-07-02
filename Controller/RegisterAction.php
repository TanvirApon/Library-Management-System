
<!-- Code for Backend work of  View / Register page  -->


<?php 
session_start();

if($_SERVER['REQUEST_METHOD']==="POST")
{
$fname = sanitize($_POST['fname']);
$lname = sanitize($_POST['lname']);
$email = sanitize($_POST['email']);
$date = sanitize(date('Y-m-d', strtotime($_POST['dateFrom'])));
$password = sanitize($_POST['password']);
$cpassword = sanitize($_POST['cpassword']);
$flag = true;

    if(empty($fname))
      { $_SESSION['fname_error_msg']= "First Name can not be empty!";
        $flag = false; }

	if(empty($lname))
	{ $_SESSION['lname_error_msg']= "Last Name can not be empty!";
	  $flag = false; }


	if(empty($lname))
	{ $_SESSION['lname_error_msg']= "Last Name can not be empty!";
	  $flag = false; }

	  


    if(empty($email))
	{ $_SESSION['email_error_msg']= "Email can nor be empty!";
	   $flag = false; }

    if(empty($password))
      { $_SESSION['password_error_msg']= "Password field can not be empty!";
        $flag = false; }

	if(empty($cpassword))
	{ $_SESSION['cpassword_error_msg']= "Confirm Password field can not be empty!";
	  $flag = false; }


if($flag===true)
{
$_SESSION['fname_error_msg']="";
$_SESSION['lname_error_msg']="";
$_SESSION['email_error_msg']="";
$_SESSION['password_error_msg']="";
$_SESSION['cpassword_error_msg']="";

// Create connection
include('../Model/Dbconnect.php');

// prepare and bind
$stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
$stmt->bind_param("",, ,);

$stmt->execute();

header("Location:../View/Login.php");
}


}


function sanitize($data)
{
$data= trim($data);
$data= stripslashes($data);
$data= htmlspecialchars($data);
return $data;
}


?>