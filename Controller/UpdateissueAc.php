<?php
require '../../Model/Dbconnect.php';
session_start();
// Initialize variables

$id=$title = $author = $publisher = $publication_year = $genre =  $quantity = $issue_date= $expired_date = $customer_Name=$customer_id="";

if(isset($_POST['update_button'])) {
    // Retrieve form data
    $title = $_POST["title"];
    $authors = $_POST["authors"];
    $publisher = $_POST["publisher"];
    $publication_year = $_POST["publication_year"];
    $genre = $_POST["genre"];
    $quantity = $_POST["quantity"];// This input's only take 1 or 0 1== Yes and 0== No
    $issue_date = $_POST["issue_date"];
    $expired_date = $_POST["expired_date"];
    $customer_Name = $_POST["customer_Name"];
    $customer_id= $_POST["customer_id"];

    // Validate form data
    if ( empty($title) || empty($authors) ||  empty($publisher) || empty($publication_year) || empty($genre)  || empty($quantity) || empty($shelf_number) || empty($language) || empty($total_pages) || empty($price)) {
        $error_msg = "Please fill in all fields.";
    } else {


        $query = "UPDATE book SET title = '$title', authors = '$authors', publisher = '$publisher', publication_year = '$publication_year', genre = '$genre', quantity = '$quantity', issue_Date = '$issue_date', expired_date = '$expired_date', customer_Name = '$customer_Name', customer_id = '$customer_id' WHERE id = '$Id'";

        if (mysqli_query($conn, $query)) {
           
            header("Location:../../View/admin/ShowBooks.php");

        } else {
            $error_msg = "Error: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}

