<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

?>
<?php include "include/header2.php";?>
	<body>
		<div id="app">		

			<div class="app-content">
				
					
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
				<?php include('nav/snav.php');?>
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Admin | Dashboard</h1>
																	</div>
								
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
							<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle">Manage Users</h2>
											
											<p class="links cl-effect-1">
												<a href="manage-users.php">
												<?php $result = mysqli_query($con,"SELECT * FROM users ");
													$num_rows = mysqli_num_rows($result);
													{
													?>
												Total Users :<?php echo htmlentities($num_rows);  } ?>		
												</a>
											</p>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle">Manage Doctors</h2>
										
											<p class="cl-effect-1">
												<a href="manage-doctors.php">
												<?php $result1 = mysqli_query($con,"SELECT * FROM doctors ");
												$num_rows1 = mysqli_num_rows($result1);
												{
												?>
											Total Doctors :<?php echo htmlentities($num_rows1);  } ?>		
												</a>
												
											</p>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle"> Appointments</h2>
											
											<p class="links cl-effect-1">
												<a href="book-appointment.php">
													<a href="appointment-history.php">
												<?php $sql= mysqli_query($con,"SELECT * FROM appointment");
													$num_rows2 = mysqli_num_rows($sql);
													{
													?>
											Total Appointments :<?php echo htmlentities($num_rows2);  } ?>	
												</a>
												</a>
											</p>
										</div>
									</div>
								</div>

													<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<a href="manage-patient.php">
											<h2 class="StepTitle">Manage Patients</h2>
											
											<p class="links cl-effect-1">
												
											<?php $result = mysqli_query($con,"SELECT * FROM tblpatient ");
											$num_rows = mysqli_num_rows($result);
											{
											?>
											Total Patients :<?php echo htmlentities($num_rows);  
											} ?>		
											</a>
											</p>
										</div>
									</div>
								</div>





									<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> <i class="ti-files fa-1x text-primary"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle"> New Queries</h2>
											
											<p class="links cl-effect-1">
												<a href="book-appointment.php">
													<a href="unread-queries.php">
												<?php 
												$sql= mysqli_query($con,"SELECT * FROM tblcontactus where  IsRead is null");
												$num_rows22 = mysqli_num_rows($sql);
												?>
											Total New Queries :<?php echo htmlentities($num_rows22);   ?>	
												</a>
												</a>
											</p>
										</div>
									</div>
								</div>



							</div>
						</div>
			
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->

			<!-- end: SETTINGS -->
		</div>
		
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
