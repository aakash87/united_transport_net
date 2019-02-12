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
							<h1>View Expense Report</h1>
							<small> </small>
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i> Home</a></li>

								<li class="active">View Expense Report</li>
							</ol>
						</div>
					</div> <!-- /. Content Header (Page header) -->

					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-bd">
								<div class="panel-heading">
									<div class="panel-title">
										<h4>View Expense Report</h4>
										<?php 
											if ($permission["created"] == "1") {
										?>
										<a href="<?php echo base_url("admin/expense/create") ?>"><button class="btn btn-info pull-right">Add Expense</button></a>
										<?php } ?>
									</div>
								</div>

								 <form method="post" action="<?php echo base_url() ?>admin/expense/general_expenses_reports" enctype="multipart/form-data">
					                  <div class="panel-body">
					                    
					                    <div class="form-group row">
					                        <div class="form-group col-lg-6">
					                           <label for="">Expense Type</label>
					                            <select class="form-control" name="exp_cat">
					                            <option value="">Select Expense Type</option>
					                            <?php 
					                               foreach ($expense_type as $exp_type) {
					                                   echo '<option value="'.$exp_type['id'].'">'.$exp_type['expense_cate_title'].'</option>';
					                               }
					                               ?>
					                         </select>
					                        </div>
					                        <div class="form-group col-lg-6">
					                           <label for="">Date</label>
					                            <input class="form-control" type="text" id="date_range_input" name="daterange" value="<?php echo  date("m/d/Y");?> - <?php echo  date("m/d/Y", strtotime(' +2 day'));?>" />
					                        </div>
					                    </div>
					                    <div class="form-group row" >
					                      
					                      <div class="form-group col-lg-12">
					                        
					                          <button type="submit" id="customer_report_by_dateID" class="btn pull-right btn-success w-md m-b-5 m-t-5">Search</button>

					                      </div>
					                    </div>         

					                  </div>
					                </form>


								<div class="panel-body">
									
									<div class="table-responsive">
										<table id="dataTableExample2" class="table table-bordered table-striped table-hover">
											<thead>
												<tr>
													<th>Id</th>
													<th>Expense Title</th>
													<th>Expense Type</th>
													<th>Expense Description</th>
													<th>Ref #</th>
													<th>Date Of Submission</th>
													<th>Expense Amount</th>
													
												</tr>
											</thead>
										    <tbody>
										    	<?php
										    	$total=0;
										    	// echo "<pre>";
										    	// print_r($expense);
                                                     $i=1;
										    		foreach ($expense as $module) {
										    	?>
												<tr>
													<td><?php echo $module["id"] ?></td>
													<td><?php echo $module["Expense_Title"] ?></td>
													<td><?php echo $module["expense_cate_title"] ?></td>
													<td><?php echo $module["Expense_Description"] ?></td>
													<td><?php echo $module["Expense_Voucher"] ?></td>
													<td><?php echo $newDate = date("d-m-Y", strtotime($module["Date_Of_Submission"])) ?></td>
													<td><?php echo  number_format($module["Expense_Amount"]) ?></td>
													<!-- <?php 
														if ($permission["edit"] == "1" || $permission["deleted"] == "1"){
													?> -->
													<!-- <td>
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
		                                                <button type="button" class="btn btn-purple" data-toggle="modal" onclick="get_showing(<?php echo $module["id"] ?>)"  data-target="#modal-lg">View Detail</button>
		                                                 <a data-toggle="modal" onclick="get_showing(<?php echo $module["id"] ?>)"  data-target="#modal-lg"><img src="<?php echo base_url() ?>assets/icons/view.png" title="" alt="" width="35" height="35"></a>
	                                                </td>
	                                                <?php } ?> -->
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
													<td></td>
													<td></td>
													<td></td>
													<td><strong><?php echo number_format($total); ?></strong></td>
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




