<?php

include('../../config/connection.php');
$q="update navigation set target='$_POST[target]',status=$_POST[status] where id=$_POST[open_id]"; 
$r=mysqli_query($con,$q);
if($r)
	echo 'Saved<br>'.$q;
else
	echo mysqli_error($con).'<br>'.$q;
?>