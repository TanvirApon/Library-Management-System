<?php
// Connect to the database
require '../../Model/Dbconnect.php';

// Check if the ID parameter is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record from the database
    $query = "DELETE FROM customer WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        
        header("Location:../../View/admin/ShowCustomer.php");


    } else {
        // Failed to delete the record
        echo "Failed to delete the record. Please try again.";
    }
} else {
    // ID parameter not provided
    echo "ID parameter not provided.";
}
?>
