<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Sanitize input data
    $fname = sanitize($_POST['fname']);
    $lname = sanitize($_POST['lname']);
    $email = sanitize($_POST['email']);
    $dob = sanitize($_POST['dob']);
    $profilePicture = $_FILES['profile_picture']['name'];
    $password = sanitize($_POST['password']);
    $cpassword = sanitize($_POST['cpassword']);
    $flag = true;

    // Backend Validation
    if (empty($fname)) {
        $_SESSION['fname_error_msg'] = "First Name cannot be empty!";
        $flag = false;
    }

    if (empty($lname)) {
        $_SESSION['lname_error_msg'] = "Last Name cannot be empty!";
        $flag = false;
    }

    if (empty($email)) {
        $_SESSION['email_error_msg'] = "Email cannot be empty!";
        $flag = false;
    }

    if (empty($dob)) {
        $_SESSION['dob_error_msg'] = "Date of Birth cannot be empty!";
        $flag = false;
    }

    if (empty($password)) {
        $_SESSION['password_error_msg'] = "Password cannot be empty!";
        $flag = false;
    }

    if (empty($cpassword)) {
        $_SESSION['cpassword_error_msg'] = "Confirm Password cannot be empty!";
        $flag = false;
    }

    if($password != $cpassword) {

        $_SESSION['cpassword_error_msg'] = "Confirm Password cannot be empty!";
        $flag = false;

	}





    if ($flag === true) {
        // Create connection to the database
		include('../Model/Dbconnect.php');

        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("INSERT INTO customer (username, firstname, lastname, dob, cpassword, picture, email) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssssss',$user_name, $fname, $lname, $dob, $sanitized_password, $profilePicture, $email);

        // Generate a unique username based on the first two letters of first name and last name
        $tw = substr($fname, 0, 2);
        $lw = substr($lname, 0, 2);
        $user_name = $tw . $lw;

		 // Encrypt the password 
		 $sanitized_password = md5($password);


        // Upload the profile picture
        $targetDir = "profile_pictures/";
        $targetFile = $targetDir . basename($_FILES["profile_picture"]["name"]);

        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFile)) {
            // Execute the SQL statement
            // ...
        } else {
            $_SESSION['error_msg'] = "Error uploading the profile picture.";
            header("Location: ../View/Register.php");
            exit();
        }

        // Execute the SQL statement
        if ($stmt->execute()) {
            //$_SESSION['success_msg'] = "Registration successful!";
            header("Location: ../View/Login.php");
        } else {
            $_SESSION['error_msg'] = "Error: " . $conn->error;
            header("Location: ../View/Register.php");
        }

        // Close the connection
        $stmt->close();
        $conn->close();
    } else {
        header("Location: ../View/Register.php");
    }
}


//Sanitize function
function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
