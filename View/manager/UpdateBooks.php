<?php 
// Connect to the database
require '../../Model/Dbconnect.php';

require '../../Controller/UpdateBookAc.php';



$id=$title = $author = $publisher = $publication_year = $genre =  $quantity = $shelf_number = $language = $total_pages = $price ="";

// Retrieve the issue details based on the issue ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the issue record from the database
    $query = "SELECT * FROM book WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Issue record found
        $row = mysqli_fetch_assoc($result);
        $id=$row['id'];
        $title = $row["title"];
        $author = $row["author"];
        $publisher =$row["publisher"];
        $publication_year = $row["publication_year"];
        $genre = $row["genre"];
        $quantity = $row["Quantity"];
        $shelf_number = $row["shelf_number"];
        $language = $row["language"];
        $total_pages = $row["total_pages"];
        $price = $row["price"];
    } else {
        // Issue record not found
        echo "Issue record not found.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
</head>
<body>
	<table border="1" width="100%">
		<tr width="100%">
			<td width="15%"><img src="../Image/logo.jpg" width="15%" height="20%"></td>
			<td><?php include "../Header.php"; ?></td>
		</tr>
		<tr>
			<td>Welcome, ADMIN </td>
		</tr>
		<tr>
			<td align="middle" width="25%">
				<h3><strong>User Dashboard</strong></h3>
				<hr>
				<ul>
				<li><a href="ShowBooks.php">Book</a></li>
					<li><a href="ShowEmployee.php">Employee</a></li>
					<li><a href="ShowCustomer.php">Customer</a></li>
                    <li><a href="Showissue.php">Issued Book</a></li>
				</ul>  
				<br>
				<strong>User Profile</strong></h3>
				<hr>
				<ul>
					
					<li><a href="../../Controller/Logout.php">Logout</a></li>
				</ul> 
			</td>
			<td width="75%">
				<center>
					<h2><strong>Admin</strong></h2>
				
					<table border="">
                    <form method="post" action="UpdateBooks.php">
					<tr>
					<td><label for="id">Book id:</label></td>
					<td><input type="text" id="id" name="id" value="<?php echo $id; ?>" required></td>
					</tr>
                                        <tr>
					<td><label for="title">Title:</label></td>
					<td><input type="text" id="title" name="title" value="<?php echo $title; ?>" required></td>
					</tr>
					<tr>
					<td><label for="author">Author:</label></td>
					<td><input type="text" id="author" name="author" value="<?php echo $author; ?>" required></td>
					</tr>
                  
					<tr>
					<td><label for="publisher">Publisher:</label></td>
					<td><input type="text" id="publisher" name="publisher" value="<?php echo $publisher; ?>" required></td>
					</tr>

					<tr>
					<td><label for="publication_year">Publication Year:</label></td>
					<td><input type="text" id="publication_year" name="publication_year" value="<?php echo $publication_year; ?>" required></td>
					</tr>
					<tr>
					<td><label for="genre">Genre:</label></td>
					<td><input type="text" id="genre" name="genre" value="<?php echo $genre; ?>" required></td>
					</tr>
					<tr>
					<td><label for="quantity">Quantity:</label></td>
					<td><input type="text" id="quantity" name="quantity" value="<?php echo $quantity; ?>" required></td>
					</tr>
					<tr>
					<td><label for="shelf_number">Shelf Number:</label></td>
					<td><input type="text" id="shelf_number" name="shelf_number" value="<?php echo $shelf_number; ?>" required></td>
					</tr>
					<tr>
					<td><label for="language">Language:</label></td>
					<td><input type="text" id="language" name="language" value="<?php echo $language; ?>" required></td>
					</tr>
					<tr>
					<td><label for="total_pages">Total Pages:</label></td>
					<td><input type="text" id="total_pages" name="total_pages"  value="<?php echo $total_pages; ?>"required></td>
					</tr>
					<tr>
					<td><label for="price">Price:</label></td>
					<td><input type="text" id="price" name="price" value="<?php echo $price; ?>" required></td>
					</tr>
						<td><input type="submit" name="update_button" value="Update">
                    </form>
					</table>
				</center>
		
		</tr>
		<tr>
			<td colspan="2"><?php include "../Footer.php"; ?></td>
		</tr>
	</table>
</body>
</html>
