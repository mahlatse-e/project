<?php
session_start();
//error_reporting(0);
include("include/config.php");
// Code for updating Password
if(isset($_POST['change']))
{
$cno=$_SESSION['cnumber'];
$email=$_SESSION['email'];
$newpassword=md5($_POST['password']);
$query=mysqli_query($con,"update doctors set password='$newpassword' where contactno='$cno' and docEmail='$email'");
if ($query) {
echo "<script>alert('Password successfully updated.');</script>";
echo "<script>window.location.href ='index.php'</script>";
}

}


?>

<?php include "include/header2.php";?>
<?php include "include/pass_reset.php";?>
	<body >
	<section id="main">
	
	<div class="container" class="center">
		<div class="row">	
			<div class="col-md-5">
				<div class="panel panel-default">
				 
				  <div class="panel-body">
				  
				  <p>Please update your password.<br />
								<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
							</p>
				  
					
					<form class="form-login"  name="passwordreset" method="post" onSubmit="return valid();" autocomplete="off">
						<h2>New password</h2>
							<div class="form-group">
							<label >New Password</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
							</div>
							
							<div class="form-group">
							<label >confirm password</label>
							<input type="password" class="form-control"  id="password_again" name="password_again" placeholder="Password Again" required>
							</div>
							
							
							<div class="form-group">
							<input type="submit" value="continue" class="btn btn-primary" name="change" >
							</div>
							
							<div class="new-account">
								Already have an account? 
								<a href="index.php">
									Log-in
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