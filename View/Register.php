<?php


require '../Controller/RegisterAction.php';

?>
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
			<form action="Register.php" method="POST">
			<fieldset style="text-align:center; height: 70%; width: 50%;">
					<legend> <h3><strong>Resgister</strong></h3></legend> 
<table>

                 <!-- First Name -->
	<tr>
		<td><label for="fname">First Name:</label></td>
		<td><input type="text" name="fname" id="fname" value="<?php 
					if(isset($_SESSION['fname'])) {
						echo $_SESSION['fname'];
					} 
					?>" required></td>
		<td><?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "Your first name must be between 2 and 25 characters<br>";?></td></tr>

	</tr>

	              <!-- Last Name -->
    <tr>
		<td><label for="Lname">Last Name:</label></td>
		<td><input type="text" name="lname" id="lname" value="<?php 
					if(isset($_SESSION['reg_lname'])) {
						echo $_SESSION['reg_lname'];
					} 
					?>" required></td>
        <td><?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "Your last name must be between 2 and 25 characters<br>";?></td></tr>   
	</tr>

	   
	 
                   <!-- Email -->
	<tr>
		<td><label for="email">Email:</label></td>
		<td><input type="text" name="email" id="email" value="<?php 
					if(isset($_SESSION['reg_email'])) {
						echo $_SESSION['reg_email'];
					} 
					?>" required></td>
	</tr>

	      
	     <!-- Email2 -->
	<tr>
		<td><label for="email2">Email:</label></td>
		<td><input type="text" name="email2" id="email2" value="<?php 
					if(isset($_SESSION['reg_email2'])) {
						echo $_SESSION['reg_email2'];
					} 
					?>" required></td>
		<td><?php if(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>"; 
					else if(in_array("Invalid email format<br>", $error_array)) echo "Invalid email format<br>";
					else if(in_array("Emails don't match<br>", $error_array)) echo "Emails don't match<br>"; ?></td></tr>
	</tr>

                     <!-- Password -->

    <tr>
		<td><label for="password">Password:</label></td>
		<td><input type="password" name="password" id="password" required></td>
		


	              <!-- Confirm Password -->
    <tr>
		<td><label for="cpassword">Confirm Password:</label></td>
		<td><input type="password" name="cpassword" id="cpassword" required></td>
		<td><?php if(in_array("Your passwords do not match<br>", $error_array)) echo "Your passwords do not match<br>"; 
					else if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "Your password can only contain english characters or numbers<br>";
					else if(in_array("Your password must be between 4 and 30 characters<br>", $error_array)) echo "Your password must be betwen 5 and 30 characters<br>";?></td></tr>
	</tr>


	             <!-- Date of Birth -->
      
	<tr>
		<td><label for="DOB">DOB:</label></td>
		<td><input type="date" id="dob" name="dob"></td>
		<td><?php ?></td></tr>
	</tr>


    
<tr>
		<td><input type="submit" name="register_button" value="Register">
		

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