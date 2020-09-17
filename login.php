
<?php include 'admin/server.php'?>
<section class="col-md-7 mx-auto my-5 py-5">
	<div class="card">
	  <h5 class="card-header">Login</h5>
	  <div class="card-body">

	  	<form method="POST">
		  <div class="form-group row">
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="userl" placeholder="Username" required="required">
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col-sm-10">
		      <input type="password" name="password" class="form-control" placeholder="Password" required="required">
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col-sm-10">
		      <button type="submit" name="login" class="btn btn-primary">Login</button>
		    </div>
		  </div>
		</form>
	  </div>
	</div>
</section>
