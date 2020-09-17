
<?php include '../admin/server.php'?>
<section class="col-md-7 mx-auto my-5 py-5">
	<div class="card">
	  <h5 class="card-header">Login</h5>
	  <div class="card-body bg-light">

	  	<form method="POST">
		  <div class="form-group row">
		    <div class="col-sm-10">
		      <input type="text" class="form-control bg-light" name="userl" placeholder="Username" required="required">
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col-sm-10">
		      <input type="password" name="password" class="form-control bg-light" placeholder="Password" required="required">
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col-sm-10">
		      <button type="submit" name="login" class="btn btn-light border-danger">Login</button>
		    </div>
		  </div>
		</form>
	  </div>
	</div>
</section>
