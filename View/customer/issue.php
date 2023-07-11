
<!-- Code for Admin Test  -->

<?php 
require '../../Controller/AddEmployeeAction.php';

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
					<li><a href="../admin/ShowBooks.php">Show Books</a></li>
					<li><a href="../admin/AddBooks.php">Manager</a></li>
					<li><a href="Libarian.php">Librarian</a></li>
					<li><a href="Books.php">Customer</a></li>
                    <li><a href="Books.php">Whish List</a></li>
                    <li><a href="Books.php">Book Request</a></li>
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
                    <form method="post" action="../../Controller/issueAction.php">
                    <tr>
					<td><label for="title">Book Id:</label></td>
					<td><input type="text" id="bid" name="bid" value="<?php echo $id; ?>" required></td>
					</tr>
					<tr>
					<td><label for="title">Title:</label></td>
					<td><input type="text" id="title" name="title" value="<?php echo $title; ?>" required></td>
					</tr>
					<tr>
					<td><label for="author">Author:</label></td>
					<td><input type="text" id="author" name="author" value="<?php echo $author; ?>"required></td>
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
					<td><input type="text" id="quantity" name="quantity" required></td>
					</tr>
					<tr>
                    <td><label for="Date">Issue Date:</label></td>
                    <td><input type="date" id="issue_date" name="issue_date"></td>
                    </tr>

					<tr>
                    <td><label for="Date">Expired Date:</label></td>
                    <td><input type="date" id="expired_date" name="expired_date"></td>
                    </tr>
                    <tr>
					<td><label for="name">Customer User Name:</label></td>
					<td><input type="text" id="name" name="name" required></td>
					</tr>
       
                    <tr>
					<td><label for="id">Customer Id:</label></td>
					<td><input type="text" id="id" name="id" required></td>
					</tr>                     
					
					
					<tr>
						<td><input type="submit" name="issue_button" value="Issue Book">
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
