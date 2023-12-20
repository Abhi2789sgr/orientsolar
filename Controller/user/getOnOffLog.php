<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();
require '../../Controller/connection.php';
if (isSession("uid") && isSession("pass")) {
	$uid  = session("uid");
	$pass = session("pass");
} else
	header("Location: index.php");


$offset = 0;
$limit = 10;

if (isset($_GET['limit'])) {
	$limit = intval($_GET['limit']);
}
if (isset($_GET['pageNo'])) {
	$offset = intval($_GET['pageNo']) * $limit;
}

if (isGet("imei")) {
	$imei = get("imei");

	$sql = "SELECT * FROM light_on_off where device_imei='{$imei}' ORDER BY id DESC LIMIT $offset,$limit";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$outp = "";

		while ($row = $result->fetch_assoc()) {
			if ($outp != "") {
				$outp .= ",";
			}
			$onDuration = "";
			if($row["on_time"] != null && $row["on_time"] != "" && $row["off_time"] != null && $row["off_time"] != ""){
				$on = date_create($row["on_time"]);
				$off = date_create($row["off_time"]);
				$diff = date_diff($on, $off);
				$onDuration = $diff->h . ':' . $diff->i . ':' . $diff->s;
			}

			$outp .= '{"OnTime":"' . $row["on_time"] . '",';
			$outp .= '"OffTime":"' . $row["off_time"] . '",';
			$outp .= '"OnDuration":"' . $onDuration . '"}';

		}
		$outp = '{"result":[' . $outp . ']}';
		echo ($outp);
		
	} else {
		$outp = '{"OnTime":"--","OffTime":"--","OnDuration":"--"}';
		echo '{"result":[' . $outp . ']}';
	}
}
