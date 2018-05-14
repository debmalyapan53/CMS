
		<h2>Page Manager</h2>
		
		<div class="row">
			<div class="col-md-3">
				<div class="list-group">
					<a class="list-group-item" href="?page=pages">
    						<h4 class="list-group-item-heading"><i class="fa fa-plus"></i> New Page</h4>	
					</a>
				<?php
					$result=mysqli_query($con,"select * from pages order by title asc");
					while($page_list=mysqli_fetch_assoc($result)) {
						$blurb=substr(strip_tags($page_list['body']),0,125);
				?>
					<div id="page_<?php echo $page_list['id'];?>" class="list-group-item<?php if($page_list['id']==$res['id']) {echo ' active';}?>">
    					<h4 class="list-group-item-heading">
							<?php echo $page_list['title'];?>
							<span class="pull-right">
								<a href="#" id="del_<?php echo $page_list['id'];?>" class="btn btn-danger btn-delete"><i class="fa fa-trash-o"></i></a>
								<a href="index.php?page=pages&id=<?php echo $page_list['id'];?>" class="btn btn-default"><i class="fa fa-chevron-right"></i>
								</a>
							</span>
						</h4>	
						<p class="list-group-item-text"><?php echo $blurb; ?></p>
					</div>
					<?php } ?>
				</div>	
			</div>
			<div class="col-md-9">

				<form action="index.php?page=pages&<?php if($x) echo 'id='.$res['id'];?>" method="post">
					<div class="form-group">
    						<label for="title">Title:</label>
    						<input type="text" class="form-control" name="title" placeholder="Page Title" value="<?php if($x) echo $res['title']; else echo '';?>">
  					</div>
					<div class="form-group">
						<label for="user">User:</label>
						<select class="form-control" name="user">
							<option value="0">No user</option>
							<?php 
								$r=mysqli_query($con,"select * from users order by first asc");
								while($user_list=mysqli_fetch_assoc($r)){   
									$user_data=mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='$user_list[id]'"));?>
								<option value="<?php echo $user_data['id']; ?>" 
									<?php 
									if(isset($_GET['id']))
										{if($user_data['id']==$res['user']) echo "selected"; }
									else
										{if($user_data['id']==$user['id']) echo "selected"; }
								?>><?php echo $user_data['first'].' '.$user_data['last']; ?></option>	
							<?php } ?>

						</select>
					</div>
					<div class="form-group">
    						<label for="slug">Slug:</label>
    						<input type="text" class="form-control" name="slug" placeholder="Page Slug" value="<?php if($x) echo $res['slug']; else echo '';?>">
					</div>
					<div class="form-group">
    						<label for="label">Label:</label>
    						<input type="text" class="form-control" name="label" placeholder="Page Label" value="<?php if($x) echo $res['label']; else echo '';?>">
					</div>
					<div class="form-group">
    						<label for="header">Header:</label>
    						<input type="text" class="form-control" name="header" placeholder="Page Header" value="<?php if($x) echo $res['header']; else echo '';?>">
  					</div>
					<div class="form-group">
    						<label for="body">Body:</label>
    						<textarea class="form-control editor" name="body" rows="8" placeholder="Page Body"><?php if($x) echo $res['body']; else echo '';?></textarea>
  					</div>
					<button type="submit" class="btn btn-default" name="Submit">Save</button>
					<input type="hidden" name="submitted" value="1">
					<input type="hidden" name="id" value="<?php if($x) echo $res['id']; else echo '0';?>">
					<input type="hidden" name="navlabel" value="<?php if($x) echo $res['label']; else echo '';?>">
				</form>
			</div>
		</div>