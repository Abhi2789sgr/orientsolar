<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();
require '../../Controller/connection.php';
if (isSession("uid") && isSession("pass")) {
	$uid  = session("uid");
	$pass = session("pass");
} else {
	header("Location: index.php");
}

if (isGet("imei")) {
	$imei = get("imei");
	$device_cond="";
	if ($imei == 0) {
		if (isset($_GET["project_id"]) && trim($_GET["project_id"]) != "") {
			$device_cond .= "project=" . $_GET["project_id"];
		}
		if (isset($_GET['district_id']) && trim($_GET['district_id']) != "") {
			$device_cond .= " AND district = " . $_GET["district_id"];
		}
		if (isset($_GET['block_id']) && trim($_GET['block_id']) != "") {
			$device_cond .= " AND block = " . $_GET["block_id"];
		}
		if (isset($_GET['panchayat_id']) && trim($_GET['panchayat_id']) != "") {
			$device_cond .= " AND panchayat = " . $_GET["panchayat_id"] ;
		}
		if (isset($_GET['ward_id']) && trim($_GET['ward_id']) != "") {
			$device_cond .= " AND ward = " . $_GET["ward_id"] ;
		}

		$device_query = "SELECT dev_id FROM _f_device WHERE ".$device_cond;

		$devices_result = $conn->query($device_query);

		$devices = "";
		if($devices_result->num_rows > 0){
			$devicesArr = array();
			while($deviceRow = $devices_result->fetch_assoc()){
				$devicesArr[] = $deviceRow['dev_id'];
			}
			$devices = "'".implode("','", $devicesArr)."'";
		}

		$sql = "SELECT light_on_off.*, _f_device.name FROM light_on_off LEFT OUTER JOIN _f_device ON light_on_off.device_imei = _f_device.dev_id WHERE light_on_off.device_imei IN($devices) AND light_on_off.on_time >= '{$_GET['startDate']} 00:00:00' AND light_on_off.off_time <= '{$_GET['endDate']} 23:59:59' ORDER BY light_on_off.device_imei DESC, light_on_off.id";
	} else {

		$sql = "SELECT light_on_off.* , _f_device.name FROM light_on_off LEFT OUTER JOIN _f_device ON light_on_off.device_imei = _f_device.dev_id WHERE light_on_off.device_imei='{$imei}' AND light_on_off.on_time >= '{$_GET['startDate']} 00:00:00' AND light_on_off.off_time <= '{$_GET['endDate']} 23:59:59' ORDER BY light_on_off.device_id DESC, light_on_off.id";
	}

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$outp = "";

		$myArr = array();
		while ($row = $result->fetch_assoc()) {		
			if ($outp != "") {
				$outp .= ",";
			}

			$elapsed = "";

			if($row["on_time"] != null && $row["on_time"] != "" && $row["off_time"] != null && $row["off_time"] != ""){
				$on = date_create($row["on_time"]);
				$off = date_create($row["off_time"]);
				$diff = date_diff($on, $off);
				$elapsed = $diff->h . ':' . $diff->i . ':' . $diff->s;
			}
			$outp .= '{"OnTime":"' . $row["on_time"] . '",';
			$outp .= '"OffTime":"' . $row["off_time"] . '",';
			$outp .= '"PoleID":"' . $row["name"] . '",';
			$outp .= '"dev_imei":"' . $row["device_imei"] . '",';
			$outp .= '"OnDuration":"' . $elapsed . '"}';
		}
		$outp = '{"result":[' . $outp . ']}';
		echo ($outp);
	} else {
		$outp = '{"OnTime":"--","OffTime":"--","PoleID":"--","dev_imei":"--","OnDuration":"--"}';
		echo '{"result":[' . $outp . ']}';
	}
}
