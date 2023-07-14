
<!-- Code for Admin Test  -->

<?php 


session_start();

$customer_id = $_SESSION['id'];
$customer_name = $_SESSION['username'];


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
</head>
<body>

	<table border= "1" width= "100%">
<tr width="100%">
 <td width="15%"><img src="../Image/logo.jpg" width="15%" height="20%">
 	<td><?php include "../Header.php"; ?></td>
</tr>

<tr>
	<td>Welcome, <?php echo $customer_name;?> </td>
</tr>

<tr>
	<td align ="middle"width= "25%"><h3><strong>User DashBoard</strong></h3><hr>

<ul>
  <li> <a href="ShowBooks.php">Show Books</a> </li>
  <li> <a href="Showissue.php">Book Issue</a></li>
  <li> <a href="Books.php">Book Request</a> </li>
</ul>  

<br>
<strong>User Profile</strong></h3><hr>
<ul>
<?php
			
			// $data = file_get_contents('../Model/user.json');
		
			// $data = json_decode($data,true);
		
		
			//   $index = 0;
			// foreach($data as $row){
			// 	echo "
			// 	<li> <a href='EditProfile.php?index=".$index."'>Edit Profile</a></li>";
		
		
			// 	$index++;
			// }
		?>
		
		 
		<li><a href="../../Controller/Logout.php">Logout</a></li>
</ul> 
</td>

<td width="75%">
<center>
      <h2><strong> Product Details</strong></h2><hr>

<table border="">
      <tr>
         <th>Welcome To Library Management System</th>
      
   </table>

</center>



	
</tr>

<tr>
	<td colspan="2"><?php include "../Footer.php"; ?></td>
</tr>

</table>
</body>
</html>