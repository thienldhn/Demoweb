<?php
include('session.php');
?>
<html>
<head>
    <title>Your Home Page</title>
    <link href="style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="profile">
    <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
    <b id="Value"><a href="value.php">Value</a></b>
    <b id="logout"><a href="logout.php">Log Out</a></b>
    </div>
    </body>
<?php 

$username = "thien"; // Khai báo username
$password = "123456";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "lv";      // Khai báo database
$tb_name  = "login";
// kết nối database
	$connect = mysqli_connect($server, $username, $password, $dbname);

	if (!$connect) 
		{
    		die("Không kết nối :" . mysqli_connect_error());
    		exit();
		}	
//	$error = "";
	$msg = "";
    $nn_username = $_SESSION['login_user'];

		$sql = "SELECT username, password, SensorT, SensorS FROM login WHERE username = '$username' ";
   		$retval = mysqli_query( $connect, $sql);
   
    if(!$retval )
    {
      die('Không thể lấy dữ liệu: ' . mysqli_error());
  	}
   
    while($row = mysqli_fetch_array($retval))
   		{
   			echo "<table border=0 cellspacing=0 cellpading=0>  
   			<tr> 
   				<td> Tài khoản: </td> 
   				<td> </td>
   				<td> {$row['username']}</td>
   			</tr>
   			<tr>
  				<td> Mật khẩu: </td>
  				<td> </td>
          <td> ********</td>
   			</tr>
   			<tr>
   				<td> SensorT:</td>
   				<td> </td>
   				<td> {$row['SensorT']} </td>
          </td>
   			</tr>
   			<tr>
   				<td> SensorS: </td>
   				<td> </td>
   				<td> {$row['SensorS']} </td>
   			</tr>
   			<tr>
   				<td> &nbsp;</td>
   			</tr>
			</table>";  
        echo $msg;
   		}
		mysqli_close($connect);

?>

</html>