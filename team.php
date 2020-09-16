<!DOCTYPE html>
<?php 
	require 'validator.php';
	require_once 'admin/conn.php'
?>
<html lang = "en">
	<head>
		<title>Altarsound360</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "admin/css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "admin/css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "admin/css/style.css" />
	</head>
<body>
	<?php include('nav.php') ?>
		<!-- File table -->
		<section class="col-md-10 justify-content-center text-center mx-auto my-5">
			<?php
				$query = mysqli_query($conn, "SELECT * FROM `student` WHERE `stud_id` = '$_SESSION[student]'") or die(mysqli_error());
				$fetch = mysqli_fetch_array($query);
			?>
			<div class="container panel panel-default">
				<div class="panel-body">
					<table id="table" class="table table-bordered table-dark table-hover">
						<thead>
							<tr>
								<th class="bg-warning text-dark">Filename</th>
								<th class="bg-warning text-dark">File Type</th>
								<th class="bg-warning text-dark">Date Uploaded</th>
								<th class="bg-warning text-dark">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$userl = $fetch['userl'];
								$query = mysqli_query($conn, "SELECT * FROM `storage` WHERE `userl` = '$userl'") or die(mysqli_error());
								while($fetch = mysqli_fetch_array($query)){
							?>
							<tr class="del_file<?php echo $fetch['store_id']?>">
								<td class=""><?php echo substr($fetch['filename'], 0 ,30)?></td>
								<td class=""><?php echo $fetch['file_type']?></td>
								<td class=""><?php echo $fetch['date_uploaded']?></td>
								<td class="">
									<a href="download.php?store_id=<?php echo $fetch['store_id']?>" class="btn btn-success">Download</a>
								</td>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</section>

		<!-- Script for Logout -->
		<script>
		function myFunction() {
		  var txt;
		  if (confirm("Are you sure you want to logout?")) {
		    window.location.replace("logout.php");
		  } else {
		    close();
		  }
		}
		</script>

	<?php include('footer.php') ?>
	
	<div class="modal fade" id="modal_remove" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">System</h3>
				</div>
				<div class="modal-body">
					<center><h4 class="text-danger">Are you sure you want to remove this file?</h4></center>
				</div>
				<div class="modal-footer">
					<a type="button" class="btn btn-success" data-dismiss="modal">No</a>
					<button type="button" class="btn btn-danger" id="btn_yes">Yes</button>
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