<?php
session_start();
$squantity=$_SESSION['quantity'] ;

$conn = mysqli_connect("localhost", "root", "", "library"); //Connection variable

if(mysqli_connect_errno()) 
{
	echo "Failed to connect: " . mysqli_connect_errno();
}


// Initialize variables
$bid=$title = $author =  $publisher = $publication_year = $genre = $issue_date = $expired_date =  $quantity = $name= $id="";
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
    $nquantity = $quantity-$quantity;
    $cdate = date('Y-m-d');
    $issue_date = $_POST['issue_date'];
    $expired_date = $_POST['expired_date'];
    $name=$_POST["name"];
    $id=$_POST["id"];

    // Validate form data
    if ( empty($title) || empty($author) ||  empty($publisher) || empty($publication_year) || empty($genre)  || empty($quantity)|| empty($name)|| empty($id)) {
        $error_msg = "Please fill in all fields.";
    } else {
        $query = mysqli_query($conn,"INSERT INTO issue VALUES ('', '$title', '$author',  '$publisher', '$publication_year', '$genre',  '$quantity', '$issue_date', '$expired_date', '$name', '$id')");

        if (mysqli_query($conn, $query)) {
            
            $query = "UPDATE book SET quantity = '$nquantity'";

            if (mysqli_query($conn, $query)) {
             
                header("Location:../View/Customer/Dashboard.php");

            }


        } else {
            $error_msg = "Error: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}


?>