<?php include('config/setup.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo "$result[title] | $site_title[value]" ?></title>
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<?php include('config/css.php'); include('config/js.php'); ?>
	</head>
	<body>
	<div id="wrap">
		<nav class="navbar navbar-default">
		<?php if($debug['value']==1) { ?>
		<button id="btn-debug" class="btn btn-default"><i class="fa fa-bug"></i></button><?php } ?>
			<div class="container">
				<ul class="nav navbar-nav">
					<?php
						//$res=mysqli_query($con,"select * from pages");
						$res=mysqli_query($con,"select * from navigation order by position asc");
						while($nav=mysqli_fetch_assoc($res)){
					?>
					<li<?php if($path['call_parts'][0]==$nav['slug']) echo " class='active'";?>><a href="<?php echo $nav['slug'];?>"><?php echo $nav['label'];?></a></li>
					<?php } ?>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="admin" target="_blank">Admin Panel</a></li>
				</ul>
			</div>
		</nav>
		<div class="container">
			<h1><?php echo $result['header'];?></h1>
			<?php echo $result['body'];?>
		</div>
	</div>
		<footer id="footer">
			<div class="container">
				<p>This is my footer.</p>
			</div>
		</footer>
		<?php if($debug['value']==1){include('widgets/debug.php');} ?>
	</body>
</html>