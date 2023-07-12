
<?php 
// Connect to the database
require '../../Model/Dbconnect.php';

require '../../Controller/UpdateissueAc.php';


// Initialize variables
$id= $title = $author = $publisher = $publication_year = $genre =  $quantity = $issue_date = $expired_date = $customer_Name = $customer_id = "";

// Retrieve the issue details based on the issue ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the issue record from the database
    $query = "SELECT * FROM issue WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        // Issue record found
        $row = mysqli_fetch_assoc($result);
        $title = $row["title"];
        $author = $row["author"];
        $publisher = $row["publisher"];
        $publication_year = $row["publication_year"];
        $genre = $row["genre"];
        $quantity = $row["quantity"];
        $issue_date = $row["issue_date"];
        $expired_date = $row["expired_date"];
        $customer_Name = $row["customer_Name"];
        $customer_id = $row["customer_id"];
        
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
                    <form method="post" action="Updateissue.php">
                    <tr>
					<td><label for="id">Issue id:</label></td>
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
					<td><label for="issue_date">Issue Date:</label></td>
					<td><input type="text" id="issue_date" name="issue_date" value="<?php echo $issue_date; ?>" required></td>
					</tr>
					<tr>
					<td><label for="expired_date">Expired Date:</label></td>
					<td><input type="text" id="expired_date" name="expired_date" value="<?php echo $expired_date; ?>" required></td>
					</tr>
					<tr>
					<td><label for="customer_Name">Customer Name:</label></td>
					<td><input type="text" id="customer_Name" name="customer_Name"  value="<?php echo $customer_Name; ?>"required></td>
					</tr>
					<tr>
					<td><label for="customer_id">Customer Id:</label></td>
					<td><input type="text" id="customer_id" name="customer_id" value="<?php echo $customer_id; ?>" required></td>
					</tr>
       
					
					<tr>
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