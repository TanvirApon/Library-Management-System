<?php
// Connect database
require '../Model/Dbconnect.php';
session_start();
//Declaring variables to prevent errors
$fname = ""; //First name
$lname = ""; //Last name
$em = ""; //email
$em2 = ""; //email 2
$password = ""; //password
$password2 = ""; //cpassword 
$dob = ""; //Sign up date 
$error_array = array(); //Holds error messages

if(isset($_POST['register_button'])){
    // Sanitize input data
      //First name
	$fname = strip_tags($_POST['fname']); //Remove html tags
	$fname = str_replace(' ', '', $fname); //remove spaces
	$fname = ucfirst(strtolower($fname)); //Uppercase first letter
	$_SESSION['fname'] = $fname; //Stores first name into session variable

	//Last name
	$lname = strip_tags($_POST['lname']); //Remove html tags
	$lname = str_replace(' ', '', $lname); //remove spaces
	$lname = ucfirst(strtolower($lname)); //Uppercase first letter
	$_SESSION['lname'] = $lname; //Stores last name into session variable

	//email
	$em = strip_tags($_POST['email']); //Remove html tags
	$em = str_replace(' ', '', $em); //remove spaces
	//$em = ucfirst(strtolower($em)); //Uppercase first letter
	$_SESSION['email'] = $em; //Stores email into session variable

	//email 2
	$em2 = strip_tags($_POST['email2']); //Remove html tags
	$em2 = str_replace(' ', '', $em2); //remove spaces
	//$em2 = ucfirst(strtolower($em2)); //Uppercase first letter
	$_SESSION['email2'] = $em2; //Stores email2 into session variable

	//Password
	$password = strip_tags($_POST['password']); //Remove html tags
	$password2 = strip_tags($_POST['cpassword']); //Remove html tags

	$dob = $_POST['dob'];

	if($em == $em2) {
		//Check if email is in valid format 
		if(filter_var($em, FILTER_VALIDATE_EMAIL)) {

			$em = filter_var($em, FILTER_VALIDATE_EMAIL);

			//Check if email already exists 
			$e_check = mysqli_query($conn, "SELECT email FROM customer WHERE email='$em'");

			//Count the number of rows returned
			$num_rows = mysqli_num_rows($e_check);

			if($num_rows > 0) {
				array_push($error_array, "Email already in use<br>");
			}

		}
		else {
			array_push($error_array, "Invalid email format<br>");
		}


	}
	else {
		array_push($error_array, "Emails don't match<br>");
	}


	if(strlen($fname) > 25 || strlen($fname) < 2) {
		array_push($error_array, "Your first name must be between 2 and 25 characters<br>");
	}

	if(strlen($lname) > 25 || strlen($lname) < 2) {
		array_push($error_array,  "Your last name must be between 2 and 25 characters<br>");
	}

	if($password != $password2) {
		array_push($error_array,  "Your passwords do not match<br>");
	}
	else {
		if(preg_match('/[^A-Za-z0-9]/', $password)) {
			array_push($error_array, "Your password can only contain english characters or numbers<br>");
		}
	}

	if(strlen($password > 30 || strlen($password) < 4)) {
		array_push($error_array, "Your password must be between 4 and 30 characters<br>");
	}


	if(empty($error_array)) {
		// $password = md5($password); //Encrypt password before sending to database

		//Generate username by concatenating first name and last name
		$username = strtolower($fname . "_" . $lname);
		$check_username_query = mysqli_query($conn, "SELECT username FROM customer WHERE username='$username'");


		$i = 0; 
		//if username exists add number to username
		while(mysqli_num_rows($check_username_query) != 0) {
			$i++; //Add 1 to i
			$username = $username . "_" . $i;
			$check_username_query = mysqli_query($conn, "SELECT username FROM customer WHERE username='$username'");
		}

		//Profile picture assignment
		$rand = rand(1, 2); //Random number between 1 and 2
		if($rand == 1)
			$profile_pic = "assets/head_deep_blue.png";
		else if($rand == 2)
			$profile_pic = "assets/head_emerald.png";

           

              $query = mysqli_query($conn,"INSERT INTO customer VALUES ('','$fname', '$lname', '$username', '$em', '$password', '$dob', '$profile_pic')");

            //   $query = "INSERT INTO customer (firstname, lastname, username, email, password, dob, profile_pic) VALUES ('$fname', '$lname', '$username', '$em', '$password', '$dob', '$profile_pic')";
             
             
            if ($query) {
                array_push($error_array, "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>");
                $_SESSION['fname'] = "";
                $_SESSION['lname'] = "";
                $_SESSION['email'] = "";
                $_SESSION['email2'] = "";
                header("Location: ../View/login.php");
                exit();
            } else {
                $_SESSION['error_msg'] = "Error: " . mysqli_error($conn);
                header("Location: ../View/Register.php");
                exit();
            }
            
              







              //prepared satetment with error 

            //   $stmt = $conn->prepare("INSERT INTO customer ('',firstname, lastname, username, email, password, dob, profile_pic) VALUES (?, ?, ?, ?, ?, ?, ?)");
            //   $stmt->bind_param('sssssss', $fname, $lname, $username, $em, $password, $dob, $profile_pic);
              
            //   if ($stmt->execute()) {
            //       array_push($error_array, "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>");
            //       $_SESSION['fname'] = "";
            //       $_SESSION['lname'] = "";
            //       $_SESSION['email'] = "";
            //       $_SESSION['email2'] = "";
            //       header("Location: ../View/login.php");
            //       exit();
            //   } else {
            //       $_SESSION['error_msg'] = "Error: " . $stmt->error;
            //       header("Location: ../View/Register.php");
            //       exit();
            //   }
              
            //   $stmt->close();
            //   $conn->close();
              



    }

}





?>