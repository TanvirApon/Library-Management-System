
<!-- Code for Login -->

<?php
session_start();
$rememberedEmail = isset($_COOKIE['remember_email']) ? $_COOKIE['remember_email'] : "";
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login Page</title>

</head>
<body>
	<form action="../Controller/LoginAction.php" method="POST" >
    <center>
			<fieldset style="text-align:center; height: 300px; width: 400px;">
			<legend>Login Here</legend>
		<table>
			<tr>
		<td><label for="email">Email:</label></td>
		<td><input type="email" name="email" id="email" placeholder="Enter your Email"value="<?php echo $rememberedEmail; ?>"></td>
        <td><?php echo isset($_SESSION['email_error_msg']) ? $_SESSION['email_error_msg'] : ""?></td></tr>
		<td></td></tr>

<tr>
		<td><label for="password">Password:</label></td>
		<td><input type="password" name="password" id="password" placeholder="Enter your Password"></td>
		<td><?php echo isset($_SESSION['password_error_msg']) ? $_SESSION['password_error_msg'] : ""?></td> </tr>
		<td></td> </tr>

		<tr><td></td>
		<td><input type="submit" name="login" value="Login"></td></tr>
		<td></td>

		<tr><td colspan="3"><?php echo isset($_SESSION['global_error_msg']) ? $_SESSION['global_error_msg'] : ""?></td></tr>


		<tr><td colspan="3">Register <a href="Register.php">Click here</a></td></tr>
	</table>

		</fieldset>
	<center>
</form>
	<hr> 
<?php include "Footer.php"; ?>

</body>
</html>