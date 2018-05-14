<?php
	error_reporting(0);
	include('config/connection.php');
	$site_title=mysqli_fetch_assoc(mysqli_query($con,"select value from settings where id='site-title'"));
	include('functions/sandbox.php');
	$path=get_path();
	if(!isset($path['call_parts'][0]) || $path['call_parts'][0]==''){
		//$path['call_parts'][0]='home';
		header('location:home');
	}
	if(is_numeric($path['call_parts'][0]))
		$cond="where id=$path[call_parts][0]";
	else
		$cond="where slug='".$path['call_parts'][0]."'";
	$q="select * from pages $cond";
	$result=mysqli_fetch_assoc(mysqli_query($con,$q));
	$debug=mysqli_fetch_assoc(mysqli_query($con,"select * from settings where id='debug-status'"));

?>