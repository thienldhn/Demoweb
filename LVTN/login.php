<?php
session_start();
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$connection = mysqli_connect("localhost", "root", "");
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);
	$db = mysqli_select_db($connection, "lv");
	$query = mysqli_query($connection, "select * from login where password='$password' AND username='$username'");
	$rows = mysqli_num_rows($query);
	if ($rows == 1) {
$_SESSION['login_user']=$username; 
header("location: profile.php"); 
} else {
$error = "Username or Password is invalid";
}
mysqli_close($connection);
}
}
?>