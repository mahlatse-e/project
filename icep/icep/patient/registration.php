<?php
include_once('inc/db.php');
if(isset($_POST['submit']))
{
$fname=$_POST['full_name'];
$address=$_POST['address'];
$city=$_POST['city'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$query=mysqli_query($con,"insert into users(fullname,address,city,gender,email,password) 
values('$fname','$address','$city','$gender','$email','$password')");
if($query)
{
	echo "<script>alert('Successfully Registered. You can login now');</script>";
	header('location:index.php');
}
}
?>


<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Registration</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		
<script type="text/javascript">
function valid()
{
 if(document.registration.password.value!= document.registration.password_again.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.registration.password_again.focus();
return false;
}
return true;
}
</script>
		

	</head>

	<body class="login">
		<!-- start: REGISTRATION -->
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a href="../../index.php"><h2>Account Registration</h2></a>
				</div>
				
				<div class="box-register">
					<form name="registration" id="registration"  method="post" onSubmit="return valid();">
						<fieldset>
							<legend>
								create an Account
							</legend>
							<p>
								Enter your personal details below:
							</p>
						<br />
							<div class="form-group">
							<label><b> Full name</b></label>
								<input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
							</div>
							<br />
							
							<div class="form-group">
							<label for="lastname" class="control-label"><b>home address</b></label>							
							<textarea class="form-control" rows="3"  name="address"  placeholder="Enter your address" id="add" required></textarea>					
						</div>
							<br />
							<div class="form-group">
							<label><b> City/Town</b></label>
								<input type="text" class="form-control" name="city" placeholder="City/Town" required>
							</div>
							<br />
							<div class="form-group">
								<label class="block">
									<b>Gender</b>
								</label>
								
								<select name="gender" class="form-control" required="required" >
								<option value="">Select</option>
									<option value="male">Male</option>	
									<option value="female">Female</option>	
									<option value="other">prefere not to say</option>	
							</select>
								
							</div>
							<p>
								<b>Enter your login account details below:</b>
							</p>
							<br />
							<div class="form-group">
							<label><b>Email</b></label>
								<span class="input-icon">
									<input type="email" class="form-control" name="email" id="email" onBlur="userAvailability()"  placeholder="Email" required>
									<i class="fa fa-envelope"></i> </span>
									 <span id="user-availability-status1" style="font-size:12px;"></span>
							</div>
							<br />
							<div class="form-group">
							<label><b> password<b></label>
								<span class="input-icon">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							<br />
							<div class="form-group">
							<label><b>confirm password</b></label>
								<span class="input-icon">
									<input type="password" class="form-control"  id="password_again" name="password_again" placeholder="Password Again" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							<!--div class="form-group">
								<div class="checkbox clip-check check-primary">
									<input type="checkbox" id="agree" value="agree" checked="true" readonly=" true">
									<label for="agree">
										I agree
									</label>
								</div>
							</div-->
							<div class="form-actions">
								<p>
									Already have an account?
									<a href="index.php">
										Log-in
									</a>
								</p>
								<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
									continue <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</fieldset>
					</form>

				</div>

			</div>
		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
		
	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>	
		
	</body>
	<!-- end: BODY -->
</html>