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
							<h1>View Vehicle Ledger</h1>
							<small> </small>
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i> Home</a></li>

								<li class="active">View Vehicle Ledger</li>
							</ol>
						</div>
					</div> <!-- /. Content Header (Page header) -->

					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-bd">
								<div class="panel-heading">
									<div class="panel-title">
										<h4>View Vehicle Ledger</h4>
										<?php 
											if ($permission["created"] == "1") {
										?>
										<a href="<?php echo base_url("admin/expense/create") ?>"><button class="btn btn-info pull-right">Add Expense</button></a>
										<?php } ?>
									</div>
								</div>

								 <form method="post" action="<?php echo base_url() ?>admin/vehicle/vehicle_ledger" enctype="multipart/form-data">
					                  <div class="panel-body">
					                    <div class="form-group row" >
					                      <div class="col-lg-6"">
					              
					                        <label for="example-text-input" class="col-sm-4 col-form-label">Select  Vehicel</label>
					                                <div class="col-sm-8">
					                                   <select class="form-control selectpicker" data-live-search="true" name="select_vehicel" >
					                                      <option>Select Vehicel </option><?php foreach ($vehicels as $veh) {?>
					                                          <option value="<?php echo $veh["id"] ?>"><?php echo $veh["registration_number"] ?></option>
					                                     <?php } ?></select>
					                                </div>

					                      </div>
					                      

					                      <div class="col-lg-4" >
					                        
					                         <label for="example-text-input" class="col-sm-4 col-form-label">Date Picker</label>
					                        
					                           <div class="col-sm-8">
					                            <input class="form-control" type="text" id="date_range_input" name="daterange" value="<?php echo  date("m/d/Y");?> - <?php echo  date("m/d/Y", strtotime(' +2 day'));?>" />
					                           </div>

					                      </div>

					                      <div class="form-group col-lg-2">
					                        
					                          <button type="submit" id="customer_report_by_dateID" class="btn btn-success w-md m-b-5 m-t-5">Search</button>

					                      </div>
					                                        </div>

					                  </div>
					                </form>


								<div class="panel-body">
									
									<div class="table-responsive">


										<table id="dataTableExample2" class="table table-bordered table-striped table-hover">
											<thead>
												<tr>
													<th>Date</th>
													<th>Driver Name</th>
													<th>Discription</th>
													<th>Expense Amount</th>
													<th>Debit</th>
													<th>Credit</th>
													<th>Balance</th>


													
													<th>Date Of Submission</th><?php 
														if ($permission["edit"] == "1" || $permission["deleted"] == "1"){
													?>
													<th>Action</th>
													<?php } ?>
												</tr>
											</thead>
										    <tbody>
										    	<tr>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
										    	
											</tbody>
											<tfoot>
												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td><strong>Total </strong></td>
													<td><strong><?php //echo number_format($total); ?></strong></td>
													<td></td>
													<td></td>
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