<?php
session_start();
require '../connection.php';
if (isSession("uid") && isSession("pass")) {
    $uid  = session("uid");
    $pass = session("pass");
} else {
    header("Location: index.php");
}


$sql = "SELECT id FROM login where uname='{$uid}' and pass='{$pass}' and type='1' and active=1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row["id"];

    $tree = array("_a_project", "_b_district", "_c_block", "_d_panchayat", "_e_ward");


    $projectId  = "projectId";
    $districtId   = "districtId";
    $blockId   = "blockId";
    $panchId   = "panchId";
    $wardId  = "wardId";
    $enterImei   = "enterImei";
    $enterName = "enterName";
    $enterAddedBy   = "enterAddedBy";
    $enterLuminary = "enterLuminary";
    $enterBattery = "enterBattery";
    $enterPanel = "enterPanel";
    $enterLocation = "enterLocation";
    $enterLatitude = "enterLatitude";
    $enterLongitude = "enterLongitude";

    if (
        isPost($projectId) && isPost($districtId) && isPost($blockId) && isPost($panchId) && isPost($wardId) && isPost($enterImei)
        && isPost($enterName) && isPost($enterAddedBy) && isPost($enterLuminary) && isPost($enterBattery) && isPost($enterPanel) &&
        isPost($enterLocation) && isPost($enterLatitude) && isPost($enterLongitude)
    ) {
        $projectId  = post($projectId);
        $districtId   = post($districtId);
        $blockId  = post($blockId);
        $panchId   = post($panchId);
        $wardId   = post($wardId);
        $enterImei   = post($enterImei);
        $enterName   = post($enterName);
        $enterAddedBy = post($enterAddedBy);
        $enterLuminary = post($enterLuminary);
        $enterBattery = post($enterBattery);
        $enterPanel = post($enterPanel);
        $enterLocation = post($enterLocation);
        $enterLatitude = post($enterLatitude);
        $enterLongitude = post($enterLongitude);
        
        if (isset($_FILES['file'])) {
            $file = $_FILES['file'];
            $tempFile = $file['tmp_name'];
            $tempName = $file['name'];
            $fileExtesion = explode(".", $tempName);
            $extName = $fileExtesion[count($fileExtesion) - 1];
            $targetDir = '../../upload/addDevice/' . $enterName . "." . $extName;
            $ImageSaveDb = 'upload/addDevice/'. $enterName . "." . $extName;
        }

        if(move_uploaded_file($tempFile, $targetDir)) {
            $sql = "INSERT INTO _f_device (parent,project,district,block,panchayat,ward,dev_id,name,updated_by,luminary_qr,battery_qr,panel_qr,remark,lat,lng,file) VALUES('{$wardId}','{$projectId}','{$districtId}','{$blockId}','{$panchId}','{$wardId}','{$enterImei}','{$enterName}','{$enterAddedBy}','{$enterLuminary}','{$enterBattery}','{$enterPanel}','{$enterLocation}','{$enterLatitude}','{$enterLongitude}','{$ImageSaveDb}')";
            if ($conn->query($sql) === TRUE) {
                echo "1";
            } 
            else {
                echo "2";
            }
        } 
        else
            echo "3";
    }
} else {
    session_unset();
    session_destroy();
    header("Location: ../Views/index.php?err");
}
