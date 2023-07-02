<!-- Login Backend code for View/ Login  -->


<?php
// Login  Backend Verification 
session_start();

// Dbconnect for Database connect 
include('../../Model/Dbconnect.php');

$email=$password="";



if($_SERVER['REQUEST_METHOD'] === "POST")
{
  $email = sanitize($_POST['email']);
  $password = sanitize($_POST['password']);
  

    if(empty($email))
      { $_SESSION['email_error_msg']= "Email can not be empty!";
        $flag = false; }

    if(empty($password))
      { $_SESSION['password_error_msg']= "Password field can not be empty!";
        $flag = false; }


 if($email==="admin@gmail.com" and $password==="admin555")
{
  header("Location:../View/admin/test.php");
}

else
{

  $_SESSION['global_error_msg'] = "Invalid user and password ";

}
}





/* 
Sanitize Function for checking input data is valid or not 
*/
function sanitize($data)
{
$data= trim($data);
$data= stripslashes($data);
$data= htmlspecialchars($data);
return $data;
}

?>