<?php
	session_start();
	require '../admin/conn.php';
	
	if(ISSET($_POST['login'])){
		$userl = $_POST['userl'];
		$password = md5($_POST['password']);
		
		$query = mysqli_query($conn, "SELECT * FROM `student` WHERE `userl` = '$userl' && `password` = '$password'") or die(mysqli_error());
		$fetch = mysqli_fetch_array($query);
		$row = $query->num_rows;
		
		if($row > 0){
			$_SESSION['student'] = $fetch['stud_id'];
			header("location:team.php");
		}else{
			echo "<center><label class='text-danger'>Invalid username or password</label></center>";
		}
	}
?>