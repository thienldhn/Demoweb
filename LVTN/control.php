<?php 
session_start();

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
  $n_username = $_SESSION['login_user'];
	if (isset($_POST["n_submit"])) 
	{
		//Tên đăng nhập gửi về từ form
		$n_username = $_POST['n_username'];
		$n_password = $_POST['n_password'];
		$n_SensorT = $_POST['n_SensorT'];
		$n_SensorS = $_POST['n_SensorS'];
	// xử lý tránh MySQL injection
		$username = stripslashes($n_username);
		$password = stripslashes($n_password);
		$SensorT = stripslashes($n_SensorT);
		$SensorS = stripslashes($n_SensorS);

		$password = mysqli_real_escape_string($connect, $_POST['n_password']);
		$SensorT = mysqli_real_escape_string($connect, $_POST['n_SensorT']);
		$SensorS = mysqli_real_escape_string($connect, $_POST['n_SensorS']);

          if($n_SensorT != ""  & $n_SensorS != "")
          {

            $sql = "UPDATE login SET SensorT = '$n_SensorT',  SensorS ='$n_SensorS' where username = '$n_username' ";
            $change = mysqli_query($connect, $sql);
            header("location: value.php"); 
          }
    
}
mysqli_close($connect);
?>
<form>
    <h2>Control Sensor</h2><br>
    <table >
    <tr>
      <td>SensorT:</td>
      <td><input type="text" name="n_SensorT" value=""> </td>
    </tr>
    <tr>
      <td>SensorS:</td>
      <td><input type="text" name="n_SensorS" value=""> </td>
    </tr>
    </table>
    <input name="n_submit" type="submit" value=" Đồng ý ">
</form>
