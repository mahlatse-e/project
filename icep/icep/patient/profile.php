<?php
session_start();
include('inc/db.php');
include('inc/login_check.php');
login_check();
if(isset($_POST['submit']))
{
	$fname=$_POST['fname'];
$address=$_POST['address'];
$city=$_POST['city'];
$gender=$_POST['gender'];

$sql=mysqli_query($con,"Update users set fullName='$fname',address='$address',city='$city',gender='$gender' where id='".$_SESSION['id']."'");
if($sql)
{
$msg="Your Profile updated Successfully";


}

}
?>
<?php include "files/header2.php";?>
	<body>
		<div id="app">		

			<div class="app-content">
				
						
				<!-- end: TOP NAVpBAR -->
				<div class="main-content" >
				<?php include"nav/snav.php";?>
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
								<?php 
														$sql=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
														$data=mysqli_fetch_assoc($sql);
														//while($data=mysqli_fetch_array($sql))
														//{//
														?>
									<h1 class="mainTitle">update <?php  echo htmlentities($data['fullName']);?> Profile</h1>
																	</div>
								
							</div>
						</section>
						
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<h5 style="color: green; font-size:18px; ">
									<?php if($msg) { echo htmlentities($msg);}?> </h5>
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h1 class="panel-title">Edit Profile</h1>
												</div>
												<div class="panel-body">
														<?php 
														$sql=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
														$data=mysqli_fetch_assoc($sql);
														//while($data=mysqli_fetch_array($sql))
														//{//
														?>
														<h4><?php echo htmlentities($data['fullName']);?>'s Profile</h4>
														<p><b>Profile Reg. Date: </b><?php echo htmlentities($data['regDate']);?></p>
														<?php if($data['updationDate']){?>
														<p><b>Profile Last Updation Date: </b><?php echo htmlentities($data['updationDate']);?></p>
														<?php } ?>
														<hr />	
														<form role="form" name="edit" method="post">
													

															<div class="form-group">
															<label for="fname">
																 User Name
															</label>
														<input type="text" name="fname" class="form-control" value="<?php echo htmlentities($data['fullName']);?>" >
														</div>


															<div class="form-group">
															<label for="address">
																 Address
															</label>
														<textarea name="address" class="form-control"><?php echo htmlentities($data['address']);?></textarea>
														</div>
															<div class="form-group">
															<label for="city">
																 City
															</label>
															<input type="text" name="city" class="form-control" required="required"  value="<?php echo htmlentities($data['city']);?>" >
														</div>
	
														<div class="form-group">
																<label for="gender">Gender</label>

															<select name="gender" class="form-control" required="required" >
															<option value="<?php echo htmlentities($data['gender']);?>"><?php echo htmlentities($data['gender']);?></option>
															<option value="male">Male</option>	
															<option value="female">Female</option>	
															<option value="other">Other</option>	
															</select>

														</div>

															<div class="form-group">
																<label for="fess">
																 User Email
															</label>
													<input type="email" name="uemail" class="form-control"  readonly="readonly"  value="<?php echo htmlentities($data['email']);?>">
													<a href="change-emaild.php">Update your email id</a>
														</div>
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Update
														</button>
													</form>
													<?php //} //?>
												</div>
											</div>
										</div>
											
											</div>
										</div>
									<div class="col-lg-12 col-md-12">
								<div class="panel panel-white">
												
												
											</div>
										</div>
									</div>
								</div>
					
					</div>
				</div>
			</div>
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
