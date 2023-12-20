<?php 
header("Content-Type: application/json; charset=UTF-8");
session_start();
require '../connection.php';
if( isSession("uid") && isSession("pass") ){
	$uid  = session("uid");
	$pass = session("pass");
} else {
	header("Location: ../../index.php");
}


$userSql = "SELECT branch, branch_value FROM login where uname='{$uid}' and pass='{$pass}' and type='2' and active=1";
$userResult = $conn->query($userSql);

if($userResult->num_rows > 0){

	$tree = array("_g_data", "_f_device", "_e_ward", "_d_panchayat", "_c_block", "_b_district", "_a_project");
	$userRow = $userResult->fetch_assoc();
	$branch = $tree[$userRow["branch"]];
	$fieldNameArr = explode("_", $branch);
	$fieldName = end($fieldNameArr);
	$parent = $userRow["branch_value"];

	$sql = "SELECT name,dev_id FROM _f_device WHERE active = 1 AND ".$fieldName." = ".intval($parent);

	$result = $conn->query($sql);
	if ($result->num_rows > 0)
	{
		$tempDevArr = array();
		$tempDev = array();
		while($row = $result->fetch_assoc())
		{
			$tempDev[] = $row["dev_id"];
			$tempDevArr[$row["dev_id"]] = $row["name"];
		}

		$devices_cond = "'".implode("','", $tempDev)."'";


		$outp = "";
		$sql2 = "SELECT * FROM _h_fault_data WHERE device IN(".$devices_cond.") AND (panel_fault = 1 OR luminary_fault = 1 OR battery_fault = 1)";
		$result2 = $conn->query($sql2);
		if($result2->num_rows > 0){
			$faultinmilli = 0;
			$faulttimereported = "";
			while($row2 = $result2->fetch_assoc()){
				if($row2['luminary_fault_reported'] != null){
					$temptime = strtotime($row2['luminary_fault_reported']) * 1000;
					if($temptime  > $faultinmilli){
						$faultinmilli = $temptime;
						$faulttimereported = $row2['luminary_fault_reported'];
					} 
				}
				if($row2['panel_fault_reported'] != null){
					$temptime = strtotime($row2['panel_fault_reported']) * 1000;
					if($temptime  > $faultinmilli){
						$faultinmilli = $temptime;
						$faulttimereported = $row2['panel_fault_reported'];
					} 
				}
				if($row2['battery_fault_reported'] != null){
					$temptime = strtotime($row2['battery_fault_reported']) * 1000;
					if($temptime  > $faultinmilli){
						$faultinmilli = $temptime;
						$faulttimereported = $row2['battery_fault_reported'];
					} 
				}

				
				if(isset($tempDevArr[$row2["device"]])){
					if ($outp != "") {
						$outp .= ",";
					}
					$outp .= '{"IMEI":"'.$row2["device"].'","Name":"'.$tempDevArr[$row2["device"]].'","Time":"'.$faulttimereported.'"}';
				}
			}
		}
		
		$outp = '{"result":['.$outp.']}';
		echo($outp);
	}
	else
	{
		echo '{"result":[{"IMEI":"Empty","Name":"Empty","Time":"No Faulty Device"}]}';
	}
} else {
	session_unset();
	session_destroy();
	header("Location: ../../index.php?err");
}
?>
