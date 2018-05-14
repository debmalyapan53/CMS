		<nav class="navbar navbar-default">
				<ul class="nav navbar-nav">
					<!--<li<?php if($pageid==1) echo " class='active'";?>><a href="?page=1">Home</a></li>-->
					<!--<li<?php if($pageid==2) echo " class='active'";?>><a href="?page=2">About Us</a></li>-->
					<li<?php if($page=="dashboard") echo " class='active'";?>><a href="?page=dashboard">Dashboard</a></li>
					<li<?php if($page=="pages") echo " class='active'";?>><a href="?page=pages">Pages</a></li>
					<li<?php if($page=="users") echo " class='active'";?>><a href="?page=users">Users</a></li>
					<li<?php if($page=="navigation") echo " class='active'";?>><a href="?page=navigation">Navigation</a></li>
					<li<?php if($page=="settings") echo " class='active'";?>><a href="?page=settings">Settings</a></li>
				</ul>
				<div class="pull-right">
				<ul class="nav navbar-nav">
					<li><?php if($debug['value']==1) { ?>
					<button id="btn-debug" class="btn btn-default navbar-btn"><i class="fa fa-bug"></i></button><?php } ?></li>
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $user['first'].' '.$user['last']; ?><span class="caret"></span></a>
          				<ul class="dropdown-menu">
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
				</div>
		</nav>