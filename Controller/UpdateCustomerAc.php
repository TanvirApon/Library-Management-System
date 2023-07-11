<?php
require '../../Model/Dbconnect.php';
session_start();
// Initialize variables
$id = $fname = $lname = $username=  $email = $password = $role =  "";


// Check if the form is submitted
if(isset($_POST['update_button'])) {
    // Retrieve form data
    $id = $_POST["eid"];
    $fname = $row["first_name"];
        $lname = $row["last_name"];
        $lname = $row["username"];
        $email = $row["email"];
        $password = $row["password"];
        $dob = $row["dob"];
    

    // Validate form data
    if ( empty($id) || empty($fname) ||  empty($lname) || empty($email) || empty($email)  || empty($password)|| empty($role)) {
        $error_msg = "Please fill in all fields.";
    } else {
        $query = "UPDATE customer SET first_name = '$fname', last_name = '$lname', username = '$username', email = '$email', password = '$password', dob = '$dob' WHERE id = '$id'";
        if (mysqli_query($conn, $query)) {
            
           header("Location:../../View/admin/ShowEmployee.php");


        } else {
            $error_msg = "Error: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}


?>