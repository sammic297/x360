<!DOCTYPE html>
<?php 
	require 'validator.php';
	require_once '../admin/conn.php'
?>
<html lang = "en">
	<head>
		<title>Dashboard</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "../admin/css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../admin/css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../admin/css/style.css" />
	</head>
<body class="bg-light">
	<?php include('nav.php') ?>
	<?php
		$query = mysqli_query($conn, "SELECT * FROM `student` WHERE `stud_id` = '$_SESSION[student]'") or die(mysqli_error());
		$fetch = mysqli_fetch_array($query);
	?>
	


	<br><br>
	<!-- Upload files -->
	<div class="col-md-4 mx-auto pt-4 mt-3">
		<div class="card">
		  <h5 class="card-header bg-warning">
		    Upload
		  </h5>
		  <div class="card-body mx-auto bg-light">
			  <form method="POST" enctype="multipart/form-data" action="save_file.php">
					<input class="m-1 bg-light" type="file" name="file" size="4" style="background-color:#fff;" required="required" />
					<input class="" type="hidden" name="userl" value="<?php echo $fetch['userl']?>"/>
					<button class=" m-1 btn btn-success btn-sm" name="save"><span class="glyphicon glyphicon-plus"></span> Add File</button>
			  </form>
		  </div>
		</div>
	</div>

	<div class="d-lg-flex col-md-10 mx-auto pb-5">
		<div class="panel panel-default m-2 p-3">
			<div class="panel-body">
				<table id="table" class="table table-responsive table-bordered">
					<thead>
						<tr class="bg-warning">
							<th>Filename</th>
							<th>File Type</th>
							<th>Date Uploaded</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$userl = $fetch['userl'];
							$query = mysqli_query($conn, "SELECT * FROM `storage` WHERE `userl` = '$userl'") or die(mysqli_error());
							while($fetch = mysqli_fetch_array($query)){
						?>
						<tr class="del_file<?php echo $fetch['store_id']?>">
							<td class="text-light bg-dark"><?php echo substr($fetch['filename'], 0 ,30)."..."?></td>
							<td class="text-light bg-dark"><?php echo $fetch['file_type']?></td>
							<td class="text-light bg-dark"><?php echo $fetch['date_uploaded']?></td>
							<td class="bg-dark"><a href="download.php?store_id=<?php echo $fetch['store_id']?>" class="btn btn-success m-1"><span class="glyphicon glyphicon-download"></span> Download</a> . <button class="btn btn-danger btn_remove m-1" type="button" id="<?php echo $fetch['store_id']?>" ><span class="glyphicon glyphicon-trash"></span> Remove</button></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php include('footer.php') ?>
	<div class="modal fade" id="modal_confirm" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header bg-warning">
					<h3 class="modal-title">Altarsound360</h3>
				</div>
				<div class="modal-body">
					<center><h4 class="text-danger">Are you sure you want to logout?</h4></center>
				</div>
				<div class="modal-footer">
					<a type="button" class="btn btn-success text-light" data-dismiss="modal">Cancel</a>
					<a href="logout.php" class="btn btn-danger text-light">Logout</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal_remove" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header bg-warning">
					<h3 class="modal-title">Altarsound360</h3>
				</div>
				<div class="modal-body">
					<center><h4 class="text-danger">Are you sure you want to remove this file?</h4></center>
				</div>
				<div class="modal-footer">
					<a type="button" class="btn btn-success text-light" data-dismiss="modal">No</a>
					<button type="button" class="btn btn-danger text-light" id="btn_yes">Yes</button>
				</div>
			</div>
		</div>
	</div>
<?php include 'script.php'?>
<script type="text/javascript">
$(document).ready(function(){
	$('.btn_remove').on('click', function(){
		var store_id = $(this).attr('id');
		$("#modal_remove").modal('show');
		$('#btn_yes').attr('name', store_id);
	});
	
	$('#btn_yes').on('click', function(){
		var id = $(this).attr('name');
		$.ajax({
			type: "POST",
			url: "remove_file.php",
			data:{
				store_id: id
			},
			success: function(data){
				$("#modal_remove").modal('hide');
				$(".del_file" + id).empty();
				$(".del_file" + id).html("<td colspan='4'><center class='text-danger'>Deleting...</center></td>");
				setTimeout(function(){
					$(".del_file" + id).fadeOut('slow');
				}, 1000);
			}
		});
	});
});
</script>	
</body>
</html>