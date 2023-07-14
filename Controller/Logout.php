<?php 

session_start();
session_unset();
session_destroy();

header("Location:../View/customer_login.php");


?>