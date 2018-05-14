<?php
include('../../config/connection.php');
$list=$_GET['list'];
//print_r($list);
foreach ($list as $position => $id){
	$r=mysqli_query($con,"update navigation set position=$position where id=$id");
	echo mysqli_error($con);
	
}
?>