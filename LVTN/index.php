<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: info.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title> Session Application </title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1> Welcome to our page! </h1>
<div id="login">
<h2>Login</h2>
<form action="" method="post">
<label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<input name="submit" type="submit" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>