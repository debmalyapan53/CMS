<?php
		switch($page){
			case 'dashboard':
			
			break;
			case 'settings':
				if(isset($_POST['submitted'])==1){
					if($_GET['id']!='')
							{
								$q="update settings set id='$_POST[id]', label='$_POST[label]', value='$_POST[value]' where id='$_GET[id]'";
							}
							$r=mysqli_query($con,$q);
							if($r)
								echo"<script>alert('Setting was updated');</script>";
							else
								echo "<script>alert('Setting was not updated');</script>".mysqli_error($con)."<br>Query: ".$q;
						}
			break;
			case 'pages':
			
				if(isset($_POST['submitted'])==1)
				{
					if($_POST['id']!=0)
					{
						$q="update pages set user=$_POST[user], title='$_POST[title]', slug='$_POST[slug]', label='$_POST[label]', header='$_POST[header]', body='$_POST[body]' where id=$_GET[id]";
						$q1="update navigation set label='$_POST[label]', slug='$_POST[slug]' where label='$_POST[navlabel]'";
						$action="updated";
					}
					else
					{
						$q="insert into pages (user,title,slug,label,header,body) values ('$_POST[user]','$_POST[title]','$_POST[slug]','$_POST[label]','$_POST[header]','$_POST[body]')";
						$q1="insert into navigation (label,slug) values ('$_POST[label]','$_POST[slug]')";
						$action="added";
					}
					$r=mysqli_query($con,$q);
					$r1=mysqli_query($con,$q1); //Fixing the navigation template
					if($r)
						echo"<script>alert('Page was $action');</script>";
					else
						echo "<script>alert('Page was not added');</script>".mysqli_error($con)."<br>Query: ".$q;
				}  
				
				
		if(isset($_GET['id']))
		{
			$x=mysqli_query($con,"select * from pages where id=$_GET[id]");
			$res=mysqli_fetch_assoc($x);
		}
		
			break;
			case 'users':

				if(isset($_POST['submitted'])==1)
				{
					if($_POST['password']!=''){
						if($_POST['password']==$_POST['passwordv']){
							$password="password=SHA1('$_POST[password]'),";
							$verify=true;
							} else {
							$verify=false;
							}
						}else {
							$verify=false;
							}
					
					
					
					if($_POST['id']!=0)
					{
						$q="update users set first='$_POST[first]', last='$_POST[last]', email='$_POST[email]', $password status=$_POST[status] where id=$_GET[id]";
						$action="updated";
						$r=mysqli_query($con,$q);
					}
					else
					{
						$q="insert into users (first,last,email,password,status) values ('$_POST[first]','$_POST[last]','$_POST[email]',SHA1('$_POST[password]'),$_POST[status])";
						if($verify==true){
							$action="added";
							$r=mysqli_query($con,$q);
							}
					}						
					if($r)
						echo"<script>alert('User was $action');</script>";
					else{
						echo "<script>alert('Password fields are either empty and/or they do not match!');</script>";
						echo "<script>alert('User was not added');</script>".mysqli_error($con)."Query: ".$q;
						}
				}
				
				
		if(isset($_GET['id']))
		{
			$x=mysqli_query($con,"select * from users where id=$_GET[id]");
			$res=mysqli_fetch_assoc($x);
		}

			break;
			default:
			break;
}
		
		
		
		
		
		
		
		

?>