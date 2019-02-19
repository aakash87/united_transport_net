<style type="text/css">
	.ovel_css{
		margin-right: 11px;
		border-radius: 15px;
		background-color: green;
	}
</style>
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
							<h1>View Customer</h1>
							<small> </small>
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i> Home</a></li>

								<li class="active">View Customer</li>
							</ol>
						</div>
					</div> <!-- /. Content Header (Page header) -->

					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-bd">
								<div class="panel-heading">
									<div class="panel-title">
										<h4>View Customer</h4>
										<?php 
											if ($permission["created"] == "1") {
										?>
										<a href="<?php echo base_url("admin/customer/create") ?>"><button class="btn btn-info pull-right ovel_css">Add Customer</button></a>
										<?php } ?>
									</div>
								</div>
								<div class="panel-body">
									
									<div class="table-responsive">
										<table id="dataTableExample2" class="table table-bordered table-striped table-hover">
											<thead>
												<tr>
													<th>S#</th>
													<th>Full Name</th>
													<th>Company Name</th>
													<th>Phone Number</th>
													<th>Sales Person</th>
													<th>Address</th><?php 
														if ($permission["edit"] == "1" || $permission["deleted"] == "1"){
													?>
													<th>Action</th>
													<?php } ?>
												</tr>
											</thead>
										    <tbody>
										    	<?php
										    		$s_number = 1;
										    		foreach ($customer as $module) {
										    	?>
												<tr>
													<td><?php echo $s_number++; ?></td><td><?php echo $module["full_name"] ?></td><td><?php echo $module["company_name"] ?></td><td><?php echo $module["Phone_Number"] ?></td>
													<td><?php echo $module["name"] ?></td>				
													<td><?php echo $module["Address"] ?></td><?php 
														if ($permission["edit"] == "1" || $permission["deleted"] == "1"){
													?>
													<td>
														<?php 
															if ($permission["edit"] == "1") {
														?>
														<a href="<?php echo base_url() ?>admin/customer/edit/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/record1.png" title="View Order" alt="View Order" width="25" height="25"></a>
														<?php } ?>
														<?php 
															if ($permission["deleted"] == "1") {
														?>
														<img src="<?php echo base_url() ?>assets/d-icon.png" title="Delete" alt="Delete" width="25" height="25" class="delete" id='del_<?php echo $module["id"] ?>' >
		                                               <!--  <a href="<?php echo base_url() ?>admin/customer/delete/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/d-icon.png" title="Delete" alt="Delete" width="35" height="35"></a> -->
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







<script type="text/javascript">
	$(document).ready(function(){

	  // Delete 
	  $('.delete').click(function(){
	    var el = this;
	    var id = this.id;
	    var splitid = id.split("_");

	    // Delete id
	    var deleteid = splitid[1];
	 	// alert(deleteid);
	    // Confirm box
	    bootbox.confirm("Are you sure want to delete?", function(result) {
	 
	       if(result){

	          $.ajax({
	             type: 'POST',
            		data: { id:deleteid },
	             url: '<?php echo base_url() ?>admin/customer/delete_customer/',
	             success: function(resp){
 		             $(el).closest('tr').css('background','tomato');
 		             $(el).closest('tr').fadeOut(800, function(){ 
 	               	$(this).remove();
 		             });

	             

	                  
	                
	             }
	         });
	       }
	 
	    });
	 
	  });
	});
</script>