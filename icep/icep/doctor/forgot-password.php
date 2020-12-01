<?php
session_start();
error_reporting(0);
include("include/config.php");
//Checking Details for reset password
if(isset($_POST['submit'])){
$contactno=$_POST['contactno'];
$email=$_POST['email'];
$query=mysqli_query($con,"select id from  doctors where contactno='$contactno' and docEmail='$email'");
$row=mysqli_num_rows($query);
if($row>0){

$_SESSION['cnumber']=$contactno;
$_SESSION['email']=$email;
header('location:reset-password.php');
} else {
echo "<script>alert('Invalid details. Please try with valid details');</script>";
echo "<script>window.location.href ='forgot-password.php'</script>";


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
				  
				  <p>Please update your password.<br />
								<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
							</p>
				  
					
					<form role="form" class="form" method="post">
						
							<p>
								Please enter your  Contact number and Email to recover your password.<br />
					
							</p>
							<div class="form-group">
							<label >Contact Number</label>
							<input type="text" class="form-control" name="contactno" placeholder="Contact Number">
							</div>
							
							<div class="form-group">
							<label >Email address</label>
							<input type="email" class="form-control" name="email" placeholder="Email">
							</div>
							
							
							<div class="form-group">
							<input type="submit" value="continue" class="btn btn-primary" name="submit" >
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