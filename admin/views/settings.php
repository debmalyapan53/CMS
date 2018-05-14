<h2>Settings</h2>
<div class="row">
	<div class="col-md-12">
		<?php
			$x=mysqli_query($con,"select * from settings order by id asc");
			while($res=mysqli_fetch_assoc($x)) { ?>
		<form class="form-inline" action="index.php?page=settings&<?php if($x) echo 'id='.$res['id'];?>" method="post">
			<div class="form-group">
				<label for="id">ID</label>
				<input type="text" class="form-control" name="id" placeholder="ID Name" autocomplete="off" value="<?php if($x) echo $res['id']; else echo '';?>" readonly>
		</div>
			<div class="form-group">
				<label for="label">Label</label>
				<input type="text" class="form-control" name="label" placeholder="Label" autocomplete="off" value="<?php if($x) echo $res['label']; else echo '';?>">
		</div>
			<div class="form-group">
				<label for="value">Value</label>
				<input type="text" class="form-control" name="value" placeholder="Value" autocomplete="off" value="<?php if($x) echo $res['value']; else echo '';?>">
		</div>
			<button type="submit" class="btn btn-default" name="Submit">Save</button>
			<input type="hidden" name="submitted" value="1">
			<!--<input type="hidden" name="open_id" value="<?php //if($x) echo $res['id']; else echo '0';?>">-->
		</form>
		<br>
		<?php } ?>
	</div>
</div>