<?php
require '../../Model/Dbconnect.php';
session_start();
// Initialize variables

$id=$title = $author = $publisher = $publication_year = $genre =  $quantity = $shelf_number = $language = $total_pages = $price ="";


if(isset($_POST['upbook_button'])) {
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


        $query = "UPDATE book SET title = '$title', authors = '$authors', publisher = '$publisher', publication_year = '$publication_year', genre = '$genre', quantity = '$quantity', shelf_number = '$shelf_number', language = '$language', total_pages = '$total_pages', price = '$price' WHERE book_id = '$bookId'";

        if (mysqli_query($conn, $query)) {
           
            header("Location:../../View/admin/ShowBooks.php");

        } else {
            $error_msg = "Error: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}

