<?php
// Login Backend Verification
require '../Model/Dbconnect.php';
session_start();

$error_array = array(); // Initialize the error array

if (isset($_POST['login_button'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); //sanitize email

    setcookie('remember_email', $email, time() + (86400 * 30), "/"); //set the cookie to remember the email id

    $_SESSION['email'] = $email; //Store email into session variable
    $password = $_POST['password']; //Get password

    if ($email === "admin.admin@gmail.com" && $password === "admin555") {
        header("Location:../View/admin/Dashboard.php");
        exit();
    } else {
        $password = md5($_POST['password']); //Get password

        // Check if the user is a customer
        $check_database_query = mysqli_query($conn, "SELECT * FROM customer WHERE email='$email' AND password='$password'");
        $check_login_query = mysqli_num_rows($check_database_query);

        if ($check_login_query == 1) {
            $row = mysqli_fetch_array($check_database_query);
            $customer_id = $row['id'];
            $customer_name = $row['username'];

            $_SESSION['id'] = $customer_id; // Store customer ID in session
            $_SESSION['username'] = $customer_name; // Store customer name in session

            header("Location: ../View/customer/Dashboard.php");
            exit();
        } else {
            // If neither customer nor admin, show error message
            array_push($error_array, "Email or password was incorrect<br>");
        }
    }
}




          // Using binding techniques code has a bug 

          // if ($email === "Admin.admin@gmail.com" && $password === "admin555") {
              
          //   echo "Admin login successful";
          //   //header("Location:../View/admin/Dashboard.php");
          //     exit();
          // } 
          // else {
          //   // Dbconnect for Database connect 
          //   include('../Model/Dbconnect.php');

          //     $stmt = $conn->prepare("SELECT * FROM customer WHERE email = ?");
          //     $stmt->bind_param("s", $email);
          //     $stmt->execute();
          //     $result = $stmt->get_result();
      
          //     if ($result->num_rows > 0) {
          //         $row = $result->fetch_assoc();
          //         // echo  $row['cpassword']; 
          //         // echo $row['email'];
          //         // echo $password;
          //         if ($password ===$row['cpassword']) {

          //           echo "Customer login successful";
          //             // header("Location:../View/customer/Dashboard.php");
          //             exit();
          //         } else {
          //             // Password is incorrect
          //             $_SESSION['global_error_msg'] = "Invalid password";
          //             header("Location:../View/login.php");

          //         }
          //     } else {
          //         // User does not exist
          //         $_SESSION['global_error_msg'] = "Invalid user";
          //         header("Location:../View/login.php");

          //     }
      
          //     $stmt->close();
          //     $conn->close();
          // }
    








?>