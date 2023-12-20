<?php 
session_start();
require '../connection.php';
if( isSession("uid") && isSession("pass") ) {
	$uid  = session("uid");
	$pass = session("pass");
} else {
	header("Location: index.php");
}

$sql = "SELECT id FROM login WHERE uname='".$uid."' AND pass='".$pass."' AND type='1' AND active=1";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
	$row = $result->fetch_assoc();
	
	if($_POST["devId"])
	{
		$imei = $_POST['devId'];
	
		$sql = "UPDATE _f_device SET active='1' WHERE dev_id='".$imei."'";
		if ($conn->query($sql) === TRUE){
			echo "1";
		} else {
			echo "2";
		}
	}
} else {
	session_unset();
	session_destroy();
	header("Location: ../Views/index.php?err");
}
?>
