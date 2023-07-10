<?php
require '../../Model/Dbconnect.php';
session_start();
// Initialize variables
$id = $fname = $lname =  $email = $password = $role =  "";
$error_msg = "";

// Check if the form is submitted
if(isset($_POST['update_button'])) {
    // Retrieve form data
    $id = $_POST["eid"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    

    // Validate form data
    if ( empty($id) || empty($fname) ||  empty($lname) || empty($email) || empty($email)  || empty($password)|| empty($role)) {
        $error_msg = "Please fill in all fields.";
    } else {
        $query = "UPDATE employee SET first_name = '$fname', last_name = '$lname', email = '$email', password = '$password', role = '$role' WHERE id = '$id'";
        if (mysqli_query($conn, $query)) {
            
           header("Location:../../View/admin/ShowEmployee.php");


        } else {
            $error_msg = "Error: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}


?>