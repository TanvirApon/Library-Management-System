
<!-- Code for Admin Test  -->

<?php 
// Connect to the database
require '../../Model/Dbconnect.php';

require '../../Controller/UpdateEmployee.php';



// Initialize variables
$id = $fname = $lname =  $email = $password = $role =  "";

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    // Retrieve the book details based on the ID
    $id = $_GET['id'];
    $query = "SELECT * FROM employee WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    // Check if the book record exists
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $fname = $row["first_name"];
        $lname = $row["last_name"];
        $email = $row["email"];
        $password = $row["password"];
        $role = $row["role"];
        // ...
    } else {
        // Redirect to an error page or display an error message
        echo "Book not found!";
        exit();
    }
} else {
    // Redirect to an error page or display an error message
    echo "Book ID not provided!";
    exit();
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
					<li><a href="Books.php">Book</a></li>
					<li><a href="Manager.php">Manager</a></li>
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
                    <form method="post" action="UpdateEmployee.php">
                    <tr>
					<td><label for="eid">Employee Id:</label></td>
					<td><input type="text" id="eid" name="eid" value="<?php echo $id; ?>" required></td>
					</tr>
					<tr>
					<td><label for="fname">First Name:</label></td>
					<td><input type="text" id="fname" name="fname" value="<?php echo $fname; ?>" required></td>
					</tr>
					<tr>
					<td><label for="lname">Last Name:</label></td>
					<td><input type="text" id="lname" name="lname" value="<?php echo $lname; ?>"required></td>
					</tr>
                  
					<tr>
					<td><label for="email">Email:</label></td>
					<td><input type="text" id="email" name="email" value="<?php echo $email; ?>" required></td>
					</tr>

					<tr>
					<td><label for="password">Password:</label></td>
					<td><input type="text" id="password" name="password" value="<?php echo $password; ?>" required></td>
					</tr>
					<tr>
					<td><label for="role">Role:</label></td>
					<td><input type="text" id="role" name="role" value="<?php echo $role; ?>" required></td>
					</tr>
					
					<tr>
						<td><input type="submit" name="update_button" value="Update Employee">
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
