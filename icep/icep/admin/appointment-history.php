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
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Appointment History</h1>
								</div>
							
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
						

									<div class="row">
								<div class="col-md-12">
									
									<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>	
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">Number</th>
												<th class="hidden-xs">Doctor Name</th>
												<th>Patient Name</th>
												<th>Specialization</th>
												<th>Consultancy Fee</th>
												<th>Appointment Date / Time </th>
												<th>Appointment Creation Date  </th>
												<th>Current Status</th>
												<th>Action</th>
												
											</tr>
										</thead>
										<tbody>
												<?php
												//code for showing an appointment made by ser to a doctor
												$sql=mysqli_query($con,"select doctors.doctorName as docname,users.fullName as pname,appointment.*  from appointment join doctors on doctors.id=appointment.doctorId join users on users.id=appointment.userId ");
												$cnt=1;
												while($row=mysqli_fetch_array($sql))
												{
												?>
											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['docname'];?></td>
												<td class="hidden-xs"><?php echo $row['pname'];?></td>
												<td><?php echo $row['doctorSpecialization'];?></td>
												<td><?php echo $row['consultancyFees'];?></td>
												<td><?php echo $row['appointmentDate'];?> / <?php echo
												 $row['appointmentTime'];?>
												</td>
												<td><?php echo $row['postingDate'];?></td>
												<td>
														<?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
														{
															echo "Active";
														}
														if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
														{
															echo "Cancel by Patient";
														}

														if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
														{
															echo "Cancel by Doctor";
														}

												?></td>
												<td >
												<div class="visible-md visible-lg hidden-sm hidden-xs">
									<?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
									{ 
									echo "No Action yet";
									} else 
									{

											echo "Canceled";
									} ?>
												</div>
												<div class="visible-xs visible-sm hidden-md hidden-lg">
													<div class="btn-group" dropdown is-open="status.isopen">
														<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
															<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
														</button>
														<ul class="dropdown-menu pull-right dropdown-light" role="menu">
															<li>
																<a href="#">
																	Edit
																</a>
															</li>
															<li>
																<a href="#">
																	Share
																</a>
															</li>
															<li>
																<a href="#">
																	Remove
																</a>
															</li>
														</ul>
													</div>
												</div></td>
											</tr>
											
											<?php 
												$cnt=$cnt+1;
											 }?>
											
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
				</div>
			</div>
			
			<!-- end: SETTINGS -->
		</div>
		
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
