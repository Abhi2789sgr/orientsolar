<?php
session_start();
require '../connection.php';
if( isSession("uid") && isSession("pass") )
{
    $uid  = session("uid");
    $pass = session("pass");
} else {
    header("Location: index.php");
}

$sql = "SELECT id FROM login where uname='{$uid}' and pass='{$pass}' and type='1' and active=1";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
	if(isset($_POST['imei']) && trim($_POST['imei']) != "" && isset($_POST['newimei']) && trim($_POST['newimei']) != ""){

		$selectDevice = "SELECT id FROM _f_device WHERE dev_id = '".$_POST['newimei']."'";
		$resDevice = $conn->query($selectDevice);
		if($resDevice->num_rows == 0){
			$updateDeviceQuery = "UPDATE `_f_device` SET dev_id = '".$_POST["newimei"]."' WHERE dev_id = '".intval($_POST["imei"])."'";
			if ($conn->query($updateDeviceQuery) == TRUE){
				$updateLatestDataQuery = "UPDATE _g_data_latest SET device = '".$_POST["newimei"]."' WHERE device = '".$_POST["imei"]."'";
				$conn->query($updateLatestDataQuery);

				$updateFaultDataQuery = "UPDATE _h_fault_data SET device = '".$_POST["newimei"]."' WHERE device = '".$_POST["imei"]."'";
				$conn->query($updateFaultDataQuery);

				$updateDataQuery = "UPDATE _g_data SET device = '".$_POST["newimei"]."' WHERE device = '".$_POST["imei"]."'";
				$conn->query($updateDataQuery);
				echo "1";
			}else{
				echo "2";
			}
		}else{
			echo "3";
		}
	}
} else {
    session_unset();
    session_destroy();
    header("Location: ../Views/index.php?err");
}
?>
