		<!-- /.Navbar  Static Side -->
			<div class="control-sidebar-bg"></div>
			<!-- Page Content -->
			<div id="page-wrapper">
				<!-- main content -->
				<div class="content">
					<!-- Content Header (Page header) -->
					<div class="content-header">
						<div class="header-icon">
							<i class="pe-7s-box1"></i>
						</div>
						<div class="header-title">
							<h1>View Vehicle</h1>
							<small> </small>
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i> Home</a></li>

								<li class="active">View Vehicle</li>
							</ol>
						</div>
					</div> <!-- /. Content Header (Page header) -->

					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-bd">
								<div class="panel-heading">
									<div class="panel-title">
										<h4>View Vehicle</h4>
										<?php 
											if ($permission["created"] == "1") {
										?>
										<a href="<?php echo base_url("admin/vehicle/create") ?>"><button class="btn btn-info pull-right">Add Vehicle</button></a>
										<?php } ?>
									</div>
								</div>
								<div class="panel-body">
									
									<div class="table-responsive">
										<table id="dataTableExample2" class="table table-bordered table-striped table-hover">
											<thead>
												<tr>
													<th>Id</th><th>Vehicle maker</th><th>Vehicle engine type</th><th>Vehicle model</th><th>Vehicle type</th><th>Color</th><th>Vehicle year</th><th>Vin</th><th>Initial mileage</th><th>License plate</th><th>Vehicle image</th><th>Licence expiry date</th><th>Registration expiry date</th><th>Vehicle group id</th><th>Vehicle status</th><?php 
														if ($permission["edit"] == "1" || $permission["deleted"] == "1"){
													?>
													<th>Action</th>
													<?php } ?>
												</tr>
											</thead>
										    <tbody>
										    	<?php
										    		foreach ($vehicle as $module) {
										    	?>
												<tr>
													<td><?php echo $module["id"] ?></td><td><?php echo $module["vehicle_maker"] ?></td><td><?php echo $module["vehicle_engine_type"] ?></td><td><?php echo $module["vehicle_model"] ?></td><td><?php echo $module["vehicle_type"] ?></td><td><?php echo $module["Color"] ?></td><td><?php echo $module["vehicle_year"] ?></td><td><?php echo $module["vin"] ?></td><td><?php echo $module["initial_mileage"] ?></td><td><?php echo $module["license_plate"] ?></td><td><?php echo $module["vehicle_image"] ?></td><td><?php echo $module["licence_expiry_date"] ?></td><td><?php echo $module["registration_expiry_date"] ?></td><td><?php echo $module["vehicle_group_id"] ?></td><td><?php echo $module["vehicle_status"] ?></td><?php 
														if ($permission["edit"] == "1" || $permission["deleted"] == "1"){
													?>
													<td>
														<?php 
															if ($permission["edit"] == "1") {
														?>
														<a href="<?php echo base_url() ?>admin/vehicle/edit/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/record1.png" title="View Order" alt="View Order" width="35" height="35"></a>
														<?php } ?>
														<?php 
															if ($permission["deleted"] == "1") {
														?>
		                                                <a href="<?php echo base_url() ?>admin/vehicle/delete/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/d-icon.png" title="Delete" alt="Delete" width="35" height="35"></a>
		                                                <?php } ?>
	                                                </td>
	                                                <?php } ?>
												</tr>
												<?php } ?>
											</tbody>
										</table>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="height: 450px;"></div>
				</div> <!-- /.main content -->
			</div><!-- /#page-wrapper -->
		</div><!-- /#wrapper -->
		<!-- START CORE PLUGINS -->






