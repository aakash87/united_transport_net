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
							<h1>Vendor Payment</h1>
							<small> </small>
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i> Home</a></li>

								<li class="active">Vendor Payment</li>
							</ol>
						</div>
					</div> <!-- /. Content Header (Page header) -->

					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-bd">
								<div class="panel-heading">
									<div class="panel-title">
										<h4>Vendor Payment</h4>
										 <a href="<?php echo base_url() ?>admin/payments/view_paid_vendor_payments"><button type="submit" class="btn btn-primary pull-right">View Paid Payments</button></a>
									</div>
								</div>
								<div class="panel-body">
									
									<div class="table-responsive">
										<table id="dataTableExample2" class="table table-bordered table-striped table-hover">
											<thead>
												<tr>
													<th>Id</th>
													<th>Amount</th>
													<th>Date</th>
													<th>Action</th>

												</tr>
											</thead>
										    <tbody>
										    	<?php
										    		foreach ($vendor_payments as $module) {
										    	?>
												<tr>
													<td><?php ?></td>
													<td><?php echo number_format($module["amount"]) ?></td>
													<td><?php echo $module["date"] ?></td>
													<td>
														<a href="<?php echo base_url() ?>admin/payments/paid_vandor_payment/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/record1.png" title="Submit" alt="Submit" width="35" height="35"></a>
													</td>
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





