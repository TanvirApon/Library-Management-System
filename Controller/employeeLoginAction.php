<?php
// Login Backend Verification
require '../Model/Dbconnect.php';
session_start();

$error_array = array(); // Initialize the error array

if (isset($_POST['login_button'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // Sanitize email

    setcookie('remember_email', $email, time() + (86400 * 30), "/"); // Set the cookie to remember the email id

    $_SESSION['email'] = $email; // Store email into session variable
    $password = $_POST['password']; // Get password

    // Check if the user is an employee
    $check_employee_query = mysqli_query($conn, "SELECT * FROM employee WHERE email='$email' AND password='$password'");
    $check_employee_login = mysqli_num_rows($check_employee_query);

    if ($check_employee_login == 1) {
        $row = mysqli_fetch_array($check_employee_query);
        $employee_id = $row['id'];
        $employee_name = $row['first_name'];
        $role = $row['role'];

        $_SESSION['id'] = $employee_id; // Store employee ID in session
        $_SESSION['username'] = $employee_name; // Store employee name in session

        if ($role === 'manager') {
            header("Location: ../View/manager/Dashboard.php");

        } 
        

        else if ($role === 'librarian') {
            
            header("Location: ../View/librarian/Dashboard.php");
        }
        exit();
    } else {
        // If the login credentials are invalid, show error message
        array_push($error_array, "Email or password was incorrect<br>");
    }
}
?>
