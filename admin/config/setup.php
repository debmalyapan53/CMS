<?php
	error_reporting(0);
	include('../config/connection.php');
	if(isset($_GET['page']))
		$page=$_GET['page'];
	else
		$page='dashboard';
	include('queries.php');
	//$result=mysqli_fetch_assoc(mysqli_query($con,"select * from pages where id=$pageid"));
	$debug=mysqli_fetch_assoc(mysqli_query($con,"select * from settings where id='debug-status'"));
	$user=mysqli_fetch_assoc(mysqli_query($con,"select * from users where email='$_SESSION[username]'"));
	$site_title=mysqli_fetch_assoc(mysqli_query($con,"select value from settings where id='site-title'"));
	mysqli_query($con,"delete from navigation where label not in (select label from pages)");
?>
