<?php
require '../Model/Dbconnect.php';
session_start();
// Initialize variables
$bid=$title = $author =  $publisher = $publication_year = $genre =  $quantity = $name=$id="";
$error_msg = "";

// Check if the form is submitted
if(isset($_POST['issue_button'])) {
    // Retrieve form data
    $bid = $_POST["bid"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $publisher = $_POST["publisher"];
    $publication_year = $_POST["publication_year"];
    $genre = $_POST["genre"];
    $quantity = $_POST["quantity"];
    $cdate = date('Y-m-d');
    $date = $_POST['date'];
    $name=$_POST["name"];
    $id=$_POST["id"];

    // Validate form data
    if ( empty($title) || empty($author) ||  empty($publisher) || empty($publication_year) || empty($genre)  || empty($quantity)|| empty($name)|| empty($id)) {
        $error_msg = "Please fill in all fields.";
    } else {
        $query = mysqli_query($conn,"INSERT INTO issue VALUES ('', '$title', '$author',  '$publisher', '$publication_year', '$genre',  '$quantity', '$cdate', '$date', '$name', '$id')");

        if (mysqli_query($conn, $query)) {
            
          header("Location:../View/customer/issue.php");


        } else {
            $error_msg = "Error: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}


?>