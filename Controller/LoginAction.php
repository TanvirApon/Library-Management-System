<!-- Login Backend code for View/ Login  -->


<?php
// Login  Backend Verification 
session_start();


$email=$password="";
$flag = true;



if($_SERVER['REQUEST_METHOD'] === "POST")
{
  $email = sanitize($_POST['email']);
  //remember the email address
  setcookie('remember_email', $email, time() + (86400 * 30), "/");
  $password = md5($_POST['password']);
  //$en_password = md5($password);

    if(empty($email))
      { $_SESSION['email_error_msg']= "Email can not be empty!";
        $flag = false; }

    if(empty($password))
      { $_SESSION['password_error_msg']= "Password field can not be empty!";
        $flag = false; }

        if ($flag === true) {

          if ($email === "Admin.admin@gmail.com" && $password === "admin555") {
              
            echo "Admin login successful";
            //header("Location:../View/admin/Dashboard.php");
              exit();
          } 
          else {
            // Dbconnect for Database connect 
            include('../Model/Dbconnect.php');

              $stmt = $conn->prepare("SELECT * FROM customer WHERE email = ?");
              $stmt->bind_param("s", $email);
              $stmt->execute();
              $result = $stmt->get_result();
      
               
              if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                   echo  $row['cpassword']; 
                   echo $row['email'];
                   echo $password;
                  if ($password ===$row['cpassword']) {

                    echo "Customer login successful";
                      // header("Location:../View/customer/Dashboard.php");
                      exit();
                  } else {
                      // Password is incorrect
                      $_SESSION['global_error_msg'] = "Invalid password";
                      header("Location:../View/login.php");

                  }
              } else {
                  // User does not exist
                  $_SESSION['global_error_msg'] = "Invalid user";
                  header("Location:../View/login.php");
              }
      
              $stmt->close();
              $conn->close();
          }
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