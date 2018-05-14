<?php
include('../../config/connection.php');
$id=$_GET['id'];
$q="delete from pages where id=$id";
$r=mysqli_query($con,$q);
if($r)
	echo "Page was deleted";
else
	echo "Page was not deleted because: ".mysqli_error($con)."<br>Query: ".$q;
?>