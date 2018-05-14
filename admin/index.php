<?php 
	session_start();
	include('config/setup.php'); 
	if(!isset($_SESSION['username']))
		header('location:login.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $page.' | '.$site_title['value']; ?></title>
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<?php include('config/css.php'); include('config/js.php'); ?>
	</head>
	<body>
	<div id="wrap" class="container-fluid">
		<?php include('template/navigation.php');
		 include('views/'.$page.'.php'); ?>
	</div>
		<footer id="footer">
				<p>This is my footer.</p>
		</footer>
		<?php if($debug['value']==1){include('widgets/debug.php');} ?>
	</body>
</html>