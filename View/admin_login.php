
<!-- Code for Login -->

<?php
$rememberedEmail = isset($_COOKIE['remember_email']) ? $_COOKIE['remember_email'] : "";
require '../Controller/adminLoginAction.php';
//require '../Controller/RegisterAction.php';
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login Page</title>

</head>
<body>
	<form action="admin_login.php" method="POST" >
    <center>
			<fieldset style="text-align:center; height: 300px; width: 400px;">
			<legend>Login Here</legend>
		<table>
			<tr>
		<td><label for="email">Email:</label></td>
		<td><input type="email" name="email" id="email" placeholder="Enter your Email"value="<?php 
					if(isset($_SESSION['email'])) {
						echo $_SESSION['email'];
					} 
					else
					{
						echo $rememberedEmail;
					}
					?>" required></td>
		<td></td></tr>

<tr>
		<td><label for="password">Password:</label></td>
		<td><input type="password" name="password" id="password" placeholder="Enter your Password"></td>
		<td><?php if(in_array("Email or password was incorrect<br>", $error_array)) echo  "Email or password was incorrect<br>";?></td> </tr>
		<td></td> </tr>

		<tr><td></td>
		<td><input type="submit" name="login_button" value="Login"></td></tr>
		<td></td>

		<tr><td colspan="3"><?php echo isset($_SESSION['global_error_msg']) ? $_SESSION['global_error_msg'] : ""?></td></tr>


		<tr><td colspan="3">Employee Login<a href="employee_login.php">Click here</a></td></tr>
		<tr><td colspan="3">Customer Login <a href="customer_login.php">Click here</a></td></tr>
		<tr><td colspan="3"> Customer Register <a href="Register.php">Click here</a></td></tr>
	</table>

		</fieldset>
	<center>
</form>
	<hr> 
<?php include "Footer.php"; ?>

</body>
</html>