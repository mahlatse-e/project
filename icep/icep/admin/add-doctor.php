<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

//adding doctor to the database and creating a new account

if(isset($_POST['submit']))
{	$docspecialization=$_POST['Doctorspecialization'];
$docname=$_POST['docname'];
$docaddress=$_POST['address'];
$docfees=$_POST['docfees'];
$doccontactno=$_POST['doccontact'];
$docemail=$_POST['docemail'];
$password=md5($_POST['npass']);
$sql=mysqli_query($con,"insert into doctors(specilization,doctorName,address,docFees,contactno,docEmail,password) values('$docspecialization','$docname','$docaddress','$docfees','$doccontactno','$docemail','$password')");
if($sql)
{
echo "<script>alert('Doctor info added Successfully');</script>";
echo "<script>window.location.href ='manage-doctors.php'</script>";

}
}
?>
<?php include "include/header2.php";?>
<?php include ('include/pass_check.php');?>
<?php include ('include/email_check.php');?>
	<body>
		<div id="app">		

			<div class="app-content">
				
					
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<?php include('nav/snav.php');?>
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle"> Add Doctor</h1>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Add Doctor</h5>
												</div>
												<div class="panel-body">
									
													<form role="form" name="adddoc" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="DoctorSpecialization">
																Doctor Specialization
															</label>
																<select name="Doctorspecialization" class="form-control" required="true">
																<option value="">Select Specialization</option>
																<?php 
																
																//Select  code for retriving all specilization from database
																
																$ret=mysqli_query($con,"select * from doctorspecilization");
																while($row=mysqli_fetch_array($ret))
																{
																?>
																<option value="<?php echo htmlentities($row['specilization']);?>">
																	<?php echo htmlentities($row['specilization']);?>
																</option>
																<?php } ?>
																
															</select>
														</div>

														<div class="form-group">
															<label for="doctorname">
																 Doctor Name
															</label>
															<input type="text" name="docname" class="form-control"  placeholder="Enter Doctor Name" required="true">
															</div>


															<div class="form-group">
															<label for="address">
																 Address
															</label>
														<textarea name="address" class="form-control"  placeholder="Enter Doctor Address" required="true"></textarea>
														</div>
															<div class="form-group">
															<label for="fess">
																 Doctor's Consultancy Fees
															</label>
													<input type="text" name="docfees" class="form-control"  placeholder="Enter Doctor Consultancy Fees" required="true">
														</div>
	
														<div class="form-group">
														<label for="fess">
																 Doctor Contact no
															</label>
														<input type="text" name="doccontact" class="form-control"  placeholder="Enter Doctor Contact no" required="true">
														</div>

															<div class="form-group">
																<label >
																 Doctor Email
															</label>
														<input type="email" id="docemail" name="docemail" class="form-control"  placeholder="Enter Doctor Email id" required="true" onBlur="checkemailAvailability()">
														<span id="email-availability-status"></span>
														</div>



														
														<div class="form-group">
															<label for="exampleInputPassword1">
																 Password
																		</label>
																		<input type="password" name="npass" class="form-control"  placeholder="New Password" required="required">
																	</div>
														
																<div class="form-group">
															<label for="exampleInputPassword2">
																Confirm Password
															</label>
																<input type="password" name="cfpass" class="form-control"  placeholder="Confirm Password" required="required">
														</div>
														
														
														
														<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
															Submit
														</button>
													</form>
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

		</div>
		<!-- start: MAIN JAVASCRIPTS -->
	
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
