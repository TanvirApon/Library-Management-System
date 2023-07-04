
<!-- Code for Customer Register -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Customer Registration</title>
</head>
<body>

		<center>
			<form action="../Controller/RegisterAction.php" method="POST" enctype="multipart/form-data">
			<fieldset style="text-align:center; height: 70%; width: 50%;">
					<legend> <h3><strong>Resgister</strong></h3></legend> 
<table>

                 <!-- First Name -->
	<tr>
		<td><label for="fname">First Name:</label></td>
		<td><input type="text" name="fname" id="fname"></td>
		<td><?php echo isset($_SESSION['fname_error_msg']) ? $_SESSION['fname_error_msg'] : ""?></td></tr>

	</tr>

	              <!-- Last Name -->
    <tr>
		<td><label for="Lname">Last Name:</label></td>
		<td><input type="text" name="lname" id="lname"></td>
        <td><?php echo isset($_SESSION['lname_error_msg']) ? $_SESSION['lname_error_msg'] : ""?></td></tr>   
	</tr>

	   
	 
                   <!-- Email -->
	<tr>
		<td><label for="email">Email:</label></td>
		<td><input type="text" name="email" id="email"></td>
		<td><?php echo isset($_SESSION['email_error_msg']) ? $_SESSION['email_error_msg'] : ""?></td></tr>
	</tr>


                     <!-- Password -->

    <tr>
		<td><label for="password">Password:</label></td>
		<td><input type="password" name="password" id="password"></td>
		<td><?php echo isset($_SESSION['password_error_msg']) ? $_SESSION['password_error_msg'] : ""?></td></tr>
	</tr>


	              <!-- Confirm Password -->
    <tr>
		<td><label for="cpassword">Confirm Password:</label></td>
		<td><input type="password" name="cpassword" id="cpassword"></td>
		<td><?php echo isset($_SESSION['cpassword_error_msg']) ? $_SESSION['cpassword_error_msg'] : ""?></td></tr>
	</tr>


	             <!-- Date of Birth -->
      
	<tr>
		<td><label for="DOB">DOB:</label></td>
		<td><input type="date" id="dob" name="dob"></td>
		<td><?php echo isset($_SESSION['dob_error_msg']) ? $_SESSION['email_error_msg'] : ""?></td></tr>
	</tr>



					<!-- File Upload  -->
	<tr>
		<td><label for="profile_picture">Select a file:</label></td>
  		<td><input type="file" id="profile_picture" name="profile_picture"></td>
	   <td><?php echo isset($_SESSION['myfile_error_msg']) ? $_SESSION['cpassword_error_msg'] : ""?></td></tr>
	</tr>


    
<tr>
		<td><input type="submit" name="Submit" value="Add">
		

</table>
			</fieldset> 

			</form>

		</center>


	</td>
</tr>

<tr>
	<td colspan="2"><?php include "Footer.php"; ?></td>
</tr>

</table>
</body>
</html>