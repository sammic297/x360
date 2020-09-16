<section class="container my-5">	
	<div class="card text-center pb-3">
  		<h5 class="card-header text-left">Login</h5>
  		<div class="card-body">	
		  <form method="POST" class="container col-md-10 pt-3">
			  <div class="form-group">
			    <label for="inputUsername" style="float: left;">Username</label>
			    <input name="userl" type="text" class="form-control" id="inputUsername" placeholder="Username" required="required">
			  </div>
			  <div class="form-group">
			    <label for="inputPassword" style="float: left;">Password</label>
			    <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password" required="required">
			  </div>
			  <?php include 'login_query.php'?>
			  <button type="submit" class="btn btn-primary" name="login">Login</button>
		  </form>
		</div>
	</div>


	<!--div class="panel panel-success" id="panel-margin">
		<div class="panel-heading">
			<center><h1 class="panel-title">Login</h1></center>
		</div>
		<div class="panel-body">
			<form method="POST">
				<div class="form-group">
					<label for="username">Username</label>
					<input class="form-control" name="userl" placeholder="Username" type="text" required="required" >
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input class="form-control" name="password" placeholder="Password" type="password" required="required" >
				</div>
				<?php include 'login_query.php'?>
				<div class="form-group">
					<button class="btn btn-block btn-primary"  name="login"><span class="glyphicon glyphicon-log-in"></span> Login</button>
				</div>
			</form>
		</div>
	</div-->
</section>