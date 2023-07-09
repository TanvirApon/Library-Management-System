<?php
require '../../Model/Dbconnect.php';
session_start();
// Initialize variables
$title = $authors =  $publisher = $publication_year = $genre =  $quantity = $shelf_number = $language = $total_pages = $price ="";
$error_msg = "";

// Check if the form is submitted
if(isset($_POST['addbook_button'])) {
    // Retrieve form data
    $title = $_POST["title"];
    $authors = $_POST["authors"];
    $publisher = $_POST["publisher"];
    $publication_year = $_POST["publication_year"];
    $genre = $_POST["genre"];
    $quantity = $_POST["quantity"];// This input's only take 1 or 0 1== Yes and 0== No
    $shelf_number = $_POST["shelf_number"];
    $language = $_POST["language"];
    $total_pages = $_POST["total_pages"];
    $price = $_POST["price"];

    // Validate form data
    if ( empty($title) || empty($authors) ||  empty($publisher) || empty($publication_year) || empty($genre)  || empty($quantity) || empty($shelf_number) || empty($language) || empty($total_pages) || empty($price)) {
        $error_msg = "Please fill in all fields.";
    } else {


        $query = mysqli_query($conn,"INSERT INTO book VALUES ('', '$title', '$authors',  '$publisher', '$publication_year', '$genre',  '$quantity', '$shelf_number', '$language', '$total_pages', '$price')");

        if (mysqli_query($conn, $query)) {
            $success_msg = "Book information added successfully.";
        } else {
            $error_msg = "Error: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}


?>