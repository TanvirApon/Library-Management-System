<!-- Code for Admin Test  -->

<?php 
session_start();


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
			<tdalign="middle">Welcome, ADMIN </td>
		</tr>
		<tr>
			<td align="middle" width="25%">
				<h3><strong>User Dashboard</strong></h3>
				<hr>
				<ul>
					<li><a href="ShowBooks.php">Book</a></li>
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
						<tr>
							<th>Total Number of Customer</th>
							<th>Total Number of Book</th>
							<th>Total Number of Employee</th>
							<!-- <th>Total Number of Librarian</th> --> 
						</tr>
						<?php
						// Connect to the database
						require '../../Model/Dbconnect.php';

						// Total Number of Customers
						$query = "SELECT COUNT(*) AS total_customers FROM customer";
						$result = mysqli_query($conn, $query);
						$row = mysqli_fetch_assoc($result);
						$total_customers = $row['total_customers'];

						// Total Number of Books
						$query = "SELECT COUNT(*) AS total_books FROM book";
						$result = mysqli_query($conn, $query);
						$row = mysqli_fetch_assoc($result);
						$total_books = $row['total_books'];

						// // Total Number of Managers
						$query = "SELECT COUNT(*) AS total_employee FROM employee";
						$result = mysqli_query($conn, $query);
						$row = mysqli_fetch_assoc($result);
						$total_employee = $row['total_employee'];

						// // Total Number of Librarians
						// $query = "SELECT COUNT(*) AS total_librarians FROM librarian";
						// $result = mysqli_query($conn, $query);
						// $row = mysqli_fetch_assoc($result);
						// $total_librarians = $row['total_librarians'];

						echo "<tr>";
						echo "<td align='middle' >".$total_customers."</td>";
						echo "<td align='middle' >".$total_books."</td>";
						echo "<td align='middle' >".$total_employee."</td>";
						// echo "<td align='middle'>".$total_librarians."</td>";
						echo "</tr>";

						mysqli_close($conn);
						?>
					</table>
				</center>
			</td>
		</tr>
		<tr>
			<td colspan="2"><?php include "../Footer.php"; ?></td>
		</tr>
	</table>
</body>
</html>
