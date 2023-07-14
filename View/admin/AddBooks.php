
<!-- Code for Admin Test  -->

<?php 
require '../../Controller/AddBookAction.php';

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
                    <form method="post" action="AddBooks.php">
					<tr>
					<td><label for="title">Title:</label></td>
					<td><input type="text" id="title" name="title" required></td>
					</tr>
					<tr>
					<td><label for="authors">Author:</label></td>
					<td><input type="text" id="authors" name="authors" required></td>
					</tr>
                  
					<tr>
					<td><label for="publisher">Publisher:</label></td>
					<td><input type="text" id="publisher" name="publisher" required></td>
					</tr>

					<tr>
					<td><label for="publication_year">Publication Year:</label></td>
					<td><input type="text" id="publication_year" name="publication_year" required></td>
					</tr>
					<tr>
					<td><label for="genre">Genre:</label></td>
					<td><input type="text" id="genre" name="genre" required></td>
					</tr>
					<tr>
					<td><label for="quantity">Quantity:</label></td>
					<td><input type="text" id="quantity" name="quantity" required></td>
					</tr>
					<tr>
					<td><label for="shelf_number">Shelf Number:</label></td>
					<td><input type="text" id="shelf_number" name="shelf_number" required></td>
					</tr>
					<tr>
					<td><label for="language">Language:</label></td>
					<td><input type="text" id="language" name="language" required></td>
					</tr>
					<tr>
					<td><label for="total_pages">Total Pages:</label></td>
					<td><input type="text" id="total_pages" name="total_pages" required></td>
					</tr>
					<tr>
					<td><label for="price">Price:</label></td>
					<td><input type="text" id="price" name="price" required></td>
					</tr>
					<!-- Display error message if it exists -->
					<?php if (isset($_SESSION['error_msg'])): ?>
            		<p><?php echo $_SESSION['error_msg']; ?></p>
            		<?php unset($_SESSION['error_msg']); ?>
        			<?php endif; ?>
					
					<tr>
						<td><input type="submit" name="addbook_button" value="Add Book">
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
