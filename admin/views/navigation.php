<h2>Navigation</h2>
<div class="row">
	<div class="col-md-4">
		<ul id="sort-nav" class="list-group">
			<?php
			$x=mysqli_query($con,"select * from navigation order by position asc");
			while($res=mysqli_fetch_assoc($x)){ ?>
			<li id="list_<?php echo $res['id'];?>" class="list-group-item">
				<a data-toggle="collapse" data-target="#form_<?php echo $res['id'];?>">
					<?php echo $res['label'];?> <i class="fa fa-chevron-down"></i>
				</a>
				<div id="form_<?php echo $res['id'];?>" class="collapse"><br>
					<form class="form-horizontal nav-form" method="post">
						<div class="form-group">
							<label class="col-sm-2 control-label" for="label">Label</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="label" placeholder="Label" autocomplete="off" value="<?php if($x) echo $res['label']; else echo '';?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="target">Target</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="target" placeholder="Add Target" autocomplete="off" value="<?php if($x) echo $res['target']; else echo '';?>">
							</div>
						</div>
						<!--<div class="form-group">
							<label class="col-sm-2 control-label" for="position">Position</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="position" placeholder="Enter Position" autocomplete="off" value="<?php if($x) echo $res['position']; else echo '';?>">
							</div>
						</div>-->
						<div class="form-group">
							<label class="col-sm-2 control-label" for="status">Status</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="status" placeholder="Change Status" autocomplete="off" value="<?php if($x) echo $res['status']; else echo '';?>">
							</div>
						</div>
						<input type="hidden" name="open_id" value="<?php if($x) echo $res['id']; else echo '0';?>">
						<button type="submit" class="btn btn-default" name="Submit">Save</button>
						<!--<input type="hidden" name="submitted" value="1">-->
					</form>				
				</div>
			</li>
			<?php } ?>
		</ul>
</div>
	<div class="col-md-8">
	</div>
</div>