<?php 
session_start();
require '../connection.php';
if( isSession("uid") && isSession("pass") )
{
$uid  = session("uid");
$pass = session("pass");
}
else
header("Location: index.php");

$sql = "SELECT id FROM login where uname='{$uid}' and pass='{$pass}' and type='1' and active=1";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
	$row = $result->fetch_assoc();
	$id = $row["id"];
	
	$tree = array("_a_project", "_b_district", "_c_block", "_d_panchayat", "_e_ward");

	$uname  = $_POST["uname"];
	$name   = $_POST['name'];
	$email  = $_POST["email"];
	$mob1   = $_POST["mob1"];
	$mob2   = $_POST["mob2"];
	$pass   = $_POST["pass"];
	$type   = $_POST["type"];
	$branch = $_POST["branch"];
	$branchValue = $_POST["branchValue"];
	// $fileName = $_FILES["file"];

	if (isset($_FILES['file'])) {
		$file = $_FILES['file'];
		$targetDir = '../../upload/image/';
		$fileName = $file['name'];
		$destinationPath = $targetDir . $fileName;
	
		$sql = "SELECT id FROM login where uname='{$uname}'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0)
			echo "2";
		else if($branch>0 && $branchValue>0)
		{
			if (move_uploaded_file($file['tmp_name'], $destinationPath)) {
			$sql = "INSERT INTO login (uname,name,email,mob1,mob2,pass,type,branch,branch_value,added_by,profile_pic) VALUES ('{$uname}','{$name}','{$email}','{$mob1}','{$mob2}','{$pass}','{$type}','{$branch}','{$branchValue}','{$id}','{$destinationPath}')";
			if ($conn->query($sql) === TRUE)
				echo "1";
				}
			else
				echo "3";
		}
		else
			echo "3";
		}
	}
else
{
session_unset();
session_destroy();
header("Location: ../Views/index.php?err");
}
?>