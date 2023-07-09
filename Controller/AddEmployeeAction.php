<?php
require '../../Model/Dbconnect.php';
session_start();
// Initialize variables
$first_name=$last_name=$email=$password=$role= "";
$error_msg = "";

// Check if the form is submitted
if(isset($_POST['addemployee_button'])) {
    // Retrieve form data
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    
    // Validate form data
    if ( empty($fname) || empty($lname) || empty($email) || empty($password) || empty($role)) {
        $error_msg = "Please fill in all fields.";
    } else {

        //$query = "INSERT INTO book (id, title, author, isbn, publisher, publication_year, genre, description, availability, shelf_number, language, total_pages) VALUES ('', '$title', '$authors', '$isbn', '$publisher', '$publication_year', '$genre', '$description', '$availability', '$shelf_number', '$language', '$total_pages')";

        $query = mysqli_query($conn,"INSERT INTO employee VALUES ('', '$fname', '$lname', '$email', '$password', '$role')");

        if (mysqli_query($conn, $query)) {
            $success_msg = "Book information added successfully.";
        } else {
            $error_msg = "Error: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}


?>