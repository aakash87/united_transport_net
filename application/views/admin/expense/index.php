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
							<h1>View Expense</h1>
							<small> </small>
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i> Home</a></li>

								<li class="active">View Expense</li>
							</ol>
						</div>
					</div> <!-- /. Content Header (Page header) -->

					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-bd">
								<div class="panel-heading">
									<div class="panel-title">
										<h4>View Expense</h4>
										<?php 
											if ($permission["created"] == "1") {
										?>
										<a href="<?php echo base_url("admin/expense/create") ?>"><button class="btn btn-info pull-right">Add Expense</button></a>
										<a href="<?php echo base_url("admin/expense/general_expenses_reports") ?>"><button class="btn btn-info pull-right">View Expance Report</button></a>
										<?php } ?>
									</div>
								</div>
								<div class="panel-body">
									
									<div class="table-responsive">
										<table id="dataTableExample2" class="table table-bordered table-striped table-hover">
											<thead>
												<tr>
													<th>S#</th><th>Expense Title</th><th>Expense Description</th><th>Expense Amount</th><th>Date Of Submission</th><?php 
														if ($permission["edit"] == "1" || $permission["deleted"] == "1"){
													?>
													<th>Action</th>
													<?php } ?>
												</tr>
											</thead>
										    <tbody>
										    	<?php
										    	$total=0;
                                                     $i=1;
                                                     $s_number = 1;
										    		foreach ($expense as $module) {
										    	?>
												<tr>
													<td><?php echo $s_number++ ?></td><td><?php echo $module["Expense_Title"] ?></td><td><?php echo $module["Expense_Description"] ?></td><td><?php echo number_format($module["Expense_Amount"]) ?></td><td><?php echo $module["Date_Of_Submission"] ?></td><?php 
														if ($permission["edit"] == "1" || $permission["deleted"] == "1"){
													?>
													<td>
														<?php 
															if ($permission["edit"] == "1") {
														?>
														<a href="<?php echo base_url() ?>admin/expense/edit/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/record1.png" title="View Order" alt="View Order" width="35" height="35"></a>
														<?php } ?>
														<?php 
															if ($permission["deleted"] == "1") {
														?>
		                                                <a href="<?php echo base_url() ?>admin/expense/delete/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/d-icon.png" title="Delete" alt="Delete" width="35" height="35"></a>
		                                                <?php } ?>
		                                                <!-- <button type="button" class="btn btn-purple" data-toggle="modal" onclick="get_showing(<?php echo $module["id"] ?>)"  data-target="#modal-lg">View Detail</button> -->
		                                                 <a data-toggle="modal" onclick="get_showing(<?php echo $module["id"] ?>)"  data-target="#modal-lg"><img src="<?php echo base_url() ?>assets/icons/view.png" title="" alt="" width="35" height="35"></a>
	                                                </td>
	                                                <?php } ?>
												</tr>
												<?php
												    $total+=$module['Expense_Amount'];
												     $i++; 
												 ?>
												<?php } ?>
											</tbody>
											<tfoot>
												<tr>
													<td></td>
													<td></td>
													<td><strong>Total </strong></td>
													<td><strong><?php echo number_format($total); ?></strong></td>
													<td></td>
													<td></td>
												</tr>
											</tfoot>
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
	function get_showing(id) {
		
		 $.ajax({
   
           url: '<?php echo base_url();?>/admin/Expense/get_model_detail_data',
   
           data: { id:id },
   
           type: 'POST',
   
   
   
           success:function(resp)
           {
   
               $('.append_exp_detail_tr').html(resp);
               // alert(resp);
   
           }
   
   
       });

	}

</script>
   <div class="modal fade" id="modal-lg" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h1 class="modal-title">Modal title</h1>
                </div>
                <div class="modal-body">
                    <p>
                    	

                    </p>
                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Expense Title</th>
                                                    <th>Expense Amount </th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody  class="append_exp_detail_tr">
                                                
                                              
                                            </tbody>
                                        </table>
                                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->




