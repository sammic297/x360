<?php
	require_once '../admin/conn.php';
	
	if(ISSET($_POST['save'])){
		$userl = $_POST['userl'];
		$file_name = $_FILES['file']['name'];
		$file_type = $_FILES['file']['type'];
		$file_temp = $_FILES['file']['tmp_name'];
		$location = "../files/".$userl."/".$file_name;
		$date = date("Y-m-d, h:i A", strtotime("+8 HOURS"));
		if(!file_exists("../files/".$userl)){
			mkdir("../files/".$userl);
		}
		
		if(move_uploaded_file($file_temp, $location)){
			mysqli_query($conn, "INSERT INTO `storage` VALUES('', '$file_name', '$file_type', '$date', '$userl')") or die(mysqli_error());
			header('location: team.php');
		}
	}
?>