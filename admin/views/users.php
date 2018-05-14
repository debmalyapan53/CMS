<!--<script>
	Dropzone.autoDiscover= false;
	$(document).ready(function(){

		var myDropzone= new Dropzone("#image",{url:"uploads.php"});
	});
</script>-->
<?php //include('uploads.php');?>
<h2>User Manager</h2>
<div class="row">
			<div class="col-md-3">
				<div class="list-group">
					<a class="list-group-item" href="?page=users">
    						<h4 class="list-group-item-heading"><i class="fa fa-plus"></i> New User</h4>	
					</a>
				<?php
					$result=mysqli_query($con,"select * from users order by first asc");
					while($page_list=mysqli_fetch_assoc($result)) {
						//$blurb=substr(strip_tags($page_list['body']),0,125);
				?>
					<a class="list-group-item<?php if($page_list['id']==$res['id']) {echo ' active';}?>" href="index.php?page=users&id=<?php echo $page_list['id'];?>">
    						<h4 class="list-group-item-heading"><?php echo $page_list['first'].' '.$page_list['last'];?></h4>	
						<!--<p class="list-group-item-text"><?php //echo $blurb; ?></p>-->
					</a>
					<?php } ?>
				</div>	
			</div>
			<div class="col-md-9">

				<form action="index.php?page=users&<?php if($x) echo 'id='.$res['id'];?>" method="post">
					<div class="form-group">
    						<label for="first">First Name:</label>
    						<input type="text" class="form-control" name="first" placeholder="First Name" autocomplete="off" value="<?php if($x) echo $res['first']; else echo '';?>">
  					</div>
					<div class="form-group">
    						<label for="last">Last Name:</label>
    						<input type="text" class="form-control" name="last" autocomplete="off" placeholder="Last Name" value="<?php if($x) echo $res['last']; else echo '';?>">
  					</div>
					<div class="form-group">
    						<label for="email">Email ID:</label>
    						<input type="email" class="form-control" name="email" autocomplete="off" placeholder="Enter Email" value="<?php if($x) echo $res['email']; else echo '';?>">
  					</div>
					<div class="form-group">
						<label for="status">Status:</label>
						<select class="form-control" name="status">
							<option value="0" <?php if(isset($_GET['id'])){if(0==$res['status']) echo 'selected';} ?>>Inactive</option>
							<option value="1" <?php if(isset($_GET['id'])){if(1==$res['status']) echo 'selected';} ?>>Active</option>
						</select>
					</div>
					<div class="form-group">
    						<label for="password">Password:</label>
    						<input type="password" class="form-control" name="password" autocomplete="off" placeholder="Type Password" value="">
					</div>
					<div class="form-group">
    						<label for="passwordv">Verify Password:</label>
    						<input type="password" class="form-control" name="passwordv" autocomplete="off" placeholder="Re-type Password" value="">
					</div>
					<button type="submit" class="btn btn-default" name="Submit">Save</button>
					<input type="hidden" name="submitted" value="1">
					<input type="hidden" name="id" value="<?php if($x) echo $res['id']; else echo '0';?>">
				</form>
				<!--<form action="?page=users" enctype="multipart/form-data" method="post">
					<input type="file" name="image" id="image">
					<input type="submit" name="submit">
					<ul>
						<li>Sent file: <?php //echo $_FILES['image']['name'];  ?>
						<li>File size: <?php //echo $_FILES['image']['size'];  ?>
						<li>File type: <?php //echo $_FILES['image']['type'] ?>
					</ul>
				</form>-->
			</div>
</div>	