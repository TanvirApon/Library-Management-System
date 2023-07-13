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

    if ($email === "admin.admin@gmail.com" && $password === "admin555") {
        header("Location:../View/admin/Dashboard.php");
        exit();
    } else {
        // If the login credentials are invalid, show error message
        array_push($error_array, "Email or password was incorrect<br>");
    }
}
?>
