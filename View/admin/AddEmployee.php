
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
			<td align="middle">Welcome, ADMIN </td>
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
                    <form method="post" action="AddEmployee.php">
					<tr>
					<td><label for="fname">First Name:</label></td>
					<td><input type="text" id="fname" name="fname" required></td>
					</tr>
					<tr>
					<td><label for="lname">Last Name:</label></td>
					<td><input type="text" id="lname" name="lname" required></td>
					</tr>
                  
					<tr>
					<td><label for="email">Email:</label></td>
					<td><input type="text" id="email" name="email" required></td>
                    </tr>

					<tr>
					<td><label for="password">Password:</label></td>
					<td><input type="password" id="password" name="password" required></td>
					</tr>

					<tr>
					<td><label for="role">Role:</label></td>
					<td><input type="text" id="role" name="role" required></td>
					</tr>
					
					<!-- Display error message if it exists -->
					<?php if (isset($_SESSION['error_msg'])): ?>
            		<p><?php echo $_SESSION['error_msg']; ?></p>
            		<?php unset($_SESSION['error_msg']); ?>
        			<?php endif; ?>
					
					<tr>
						<td><input type="submit" name="addemployee_button" value="Add Employee">
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
