<?php
session_start();
include("include/config.php");
error_reporting(0);
if(isset($_POST['submit']))
{
$ret=mysqli_query($con,"SELECT * FROM doctors WHERE docEmail='".$_POST['username']."' and password='".md5($_POST['password'])."'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="dashboard.php";
$_SESSION['dlogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($con,"insert into doctorslog(uid,username,userip,status) values('".$_SESSION['id']."','".$_SESSION['dlogin']."','$uip','$status')");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$host  = $_SERVER['HTTP_HOST'];
$_SESSION['dlogin']=$_POST['username'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
mysqli_query($con,"insert into doctorslog(username,userip,status) values('".$_SESSION['dlogin']."','$uip','$status')");
$_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>
<?php include "include/header2.php";?>
	
	<body>
	
	
	
	<section id="main">
	
	<div class="container" class="center">
		<div class="row">	
			<div class="col-md-5">
				<div class="panel panel-default">
				 
				  <div class="panel-body">
				  
				  <h3>Please enter your name and password to log in.<br />
				<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span></h3>
				  
					
					<form class="form-login" method="post">
						<h2>sign In to your Account</h2>
							<div class="form-group">
							<label >Email</label>
							<input type="text" class="form-control" name="username" placeholder="EMAIL">
							</div>
							
							<div class="form-group">
							<label >password</label>
							<input type="password" class="form-control password" name="password" placeholder="Password">
							</div>
							
							
							<div class="form-group">
							<input type="submit" value="continue" class="btn btn-primary" name="submit" >
							</div>
							
							<div class="new-account">
								forgot password 
								<a href="forgot-password.php">
									reset
								</a>
							</div>
							
							
						</form>
    </div>
				</div>
			</div>
		 </div>
	</div>
</section>
	

	
	</body>
	<!-- end: BODY -->
</html>