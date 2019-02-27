<style type="text/css">
	.ovel_css{
		margin-right: 11px;
		border-radius: 15px;
		background-color: green;
	}
</style>
<style type="text/css">
	@import url(https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300);


.lid{
  position: relative;
  top: 2px;
  width: 24px;
  height: 6px;
  background: white;
  border: solid 2px rgb(247, 16, 16);
  transition: all .2s ease-in-out;
  transform-origin: left;
  transform: rotate(0deg) translateY(0px);
}
.lid:before,
.lid:after{
  content: '';
  position: absolute;
}
.lid:before{
  width: 10px;
  height: 5px;
  top: -5px;
  left: 5px;
  background: rgb(247, 16, 16);
}
.lid:after{
  width: 6px;
  height: 4px;
  top: -3px;
  left: 7px;
  background: white;
}
.can{
  position: relative;
  left: 2px;
  width: 20px;
  height: 20px;
  background: white;
  border: solid 2px rgb(247, 16, 16);
  border-radius: 0 0 3px 3px;
}
.can:before{
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 0;
  height: 0;
  box-shadow: 4px 5px 0px 1px rgb(247, 16, 16),
    4px 7px 0px 1px rgb(247, 16, 16),
    4px 9px 0px 1px rgb(247, 16, 16),
    4px 11px 0px 1px rgb(247, 16, 16),
    4px 13px 0px 1px rgb(247, 16, 16),
    8px 5px 0px 1px rgb(247, 16, 16),
    8px 7px 0px 1px rgb(247, 16, 16),
    8px 9px 0px 1px rgb(247, 16, 16),
    8px 11px 0px 1px rgb(247, 16, 16),
    8px 13px 0px 1px rgb(247, 16, 16),
    12px 5px 0px 1px rgb(247, 16, 16),
    12px 7px 0px 1px rgb(247, 16, 16),
    12px 9px 0px 1px rgb(247, 16, 16),
    12px 11px 0px 1px rgb(247, 16, 16),
    12px 13px 0px 1px rgb(247, 16, 16);
}

.my_lib:hover .lid{
  transform: rotate(-30deg) translateY(-2px);
}
.my_lib:hover span{
  bottom: -22px;
  opacity: 1;
}
.dialog{
  width: 200px;
  height: auto;
  padding-bottom: 20px;
  background: rgb(250,250,250);
  border: solid 1px rgb(247, 16, 16);
  border-radius: 3px;
  position: absolute;
  text-align: center;
  left: -85px;
  top: -350px;
  opacity: 0;
  box-shadow: 0 0 5px 2px rgb(150,150,150);
  transition: all .5s ease-in-out;
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
									<div class="container">

</div>
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
														<span class="my_lib delete" id='del_<?php echo $module["id"] ?>' style="position: absolute; margin-left: 4px;">
		                                                   	<div class="lid"></div>
		                                                   	<div class="can"></div>
		                                                </span>
														<?php } ?>
														<?php 
															if ($permission["deleted"] == "1") {
														?>
														<!-- <img src="<?php echo base_url() ?>assets/d-icon.png" title="Delete" alt="Delete" width="25" height="25" class="delete" id='del_<?php echo $module["id"] ?>' > -->
		                                                 
		                                                   
		                                                    
		                                              
		                                               
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