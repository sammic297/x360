<?php 
session_start();

//connect to the database

$conn = mysqli_connect("localhost", "root", "", "db_sfms");
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
	
	$default_query = mysqli_query($conn, "SELECT * FROM `user`") or die(mysqli_error());
	$check_default = mysqli_num_rows($default_query);
	
	if($check_default === 0){
		$enrypted_password = md5('admin');
		mysqli_query($conn, "INSERT INTO `user` VALUES('', 'Administrator', '', 'admin', '$enrypted_password', 'administrator')") or die(mysqli_error());
		return false;
	}


// LOGIN USER
if(ISSET($_POST['login'])){
		$userl = $_POST['userl'];
		$password = md5($_POST['password']);
		
		$query = mysqli_query($conn, "SELECT * FROM `student` WHERE `userl` = '$userl' && `password` = '$password'") or die(mysqli_error());
		$fetch = mysqli_fetch_array($query);
		$row = $query->num_rows;
		
		if($row > 0){
			$_SESSION['student'] = $fetch['stud_id'];
			header("location:dashboard.php");
		}else{
			echo "<script>window.alert('Invalid username or password');</script>";
		}
	}