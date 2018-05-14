<?php 
	session_start();
	include('../config/connection.php'); 
	if($_POST){
		$res=mysqli_query($con,"select * from users where email='$_POST[email]' AND password = SHA1('$_POST[password]')"); 
	if(mysqli_num_rows($res)==1){
		$_SESSION['username']=$_POST['email'];
		header('location:index.php');
					}
		}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Login</title>
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<?php include('config/css.php'); include('config/js.php'); ?>
	</head>
	<body>
	<div id="wrap">
		<div class="container">
		<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="panel-title">Login</h2>
			</div>
		<div class="panel-body">
		<form action="login.php" method="post">
  			<div class="form-group">
    				<label for="email">Email ID</label>
					<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    				<input type="email" class="form-control" name="email" placeholder="Enter email">
					</div>
			 </div>
  			<div class="form-group">
    				<label for="password">Password</label>
					<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    				<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
			</div>
  			<!--<div class="checkbox">
    				<label>
      				<input type="checkbox"> Check me out
   				 </label>
  			</div>-->
  			<button type="submit" class="btn btn-default">Submit</button>
		</form>
		</div>
		</div>
		</div>
		</div>
	</div>
	<footer id="footer">
		<p>This is my footer.</p>
	</footer>
	</body>
</html>