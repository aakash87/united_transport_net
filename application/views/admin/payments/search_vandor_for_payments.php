<style type="text/css">
	.selected {
	    background-color: #15479f8f !important;
	    color: #fff;
	}
	.btn-info {
	    border-radius: 17px !important;
	}
	.btn-primary {
	    border-radius: 17px !important;
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
							 <!-- <a href="<?php echo base_url() ?>admin/payments/view_paid_vendor_payments"><button type="submit" class="btn btn-primary pull-right">View Paid Payments</button></a> -->
						</div>
					</div>
					<div class="panel-body">
					    <form action="<?php echo base_url()?>admin/payments/search_vandor_for_payments" method="POST" enctype="multipart/form-data" >
					        <div class="form-group row">
					            <div class="form-group col-lg-12">
					               <label for="">Vendor</label>
					                <select class="form-control" name="vendor_id" required="">
					                <option value="">Select Vendor</option>
					                <?php 
					                   foreach ($vendor as $ven) {
					                       echo '<option value="'.$ven['id'].'">'.$ven['vendor_name'].'</option>';
					                   }
					                   ?>
					             </select>
					            </div>
					           
					        </div>
					        <div class="form-group row">
					            <div class="col-lg-12">
					                <button type="submit" class="btn btn-primary pull-right" name="" value="search">Search</button>
					            </div>
					        </div>
					    </form>
					</div>
					<form method="post" action="<?php echo base_url(); ?>admin/payments/create_selected_vandor_payments" id="import_forms" enctype="multipart/form-data">
						<div class="panel-body">
							
							<div class="table-responsive">
								<table id="dataTableExample2" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th><input type="checkbox" class="check_all"> </th>
											<th>Sr.no</th>
											<th>Order Ref #</th>
											<th>Vendor Name</th>
											<th>Vehicle Type</th>
											<th>Vehicle Of Vendor</th>
											<th>Order Total Amount</th>
											<th>Date Of Complete</th>
											<th>Amount</th>
											<th>Action</th>
										</tr>
									</thead>
								    <tbody>
								    	<?php
									    	// echo "<pre>";
									    	// print_r($vendor_payments);
								    		$i=1;
								    		foreach ($vendor_payments as $module) {
								    	?>
										<tr>
											<td><input type="checkbox" class="add_check" name="id[]" value="<?php echo $module['id'] ?>"></td>
											<td><?php echo $i++;?></td>
											<td><?php echo $module["id"]; ?></td>
											<td><?php echo $module["vendor_name"]; ?></td>
											<td><?php echo $module["vehicle_type"]; ?></td>
											<td><?php echo $module["vehicel_of_vendor"]; ?></td>
											<td><?php echo number_format($module["order_total_amount"]); ?></td>
											<td><?php echo $newDate = date("d-m-Y", strtotime($module["created_at"]));?></td>
											<td><?php echo number_format($module["vendor_payment"]); ?></td>
											<td>
												<!-- <a href="<?php echo base_url() ?>admin/payments/paid_vandor_payment/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/record1.png" title="Submit" alt="Submit" width="35" height="35"></a> -->
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								
							</div>
							<button type="submit" class="btn btn-primary pull-right" >Create Invoice</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div style="height: 450px;"></div>
	</div> <!-- /.main content -->
</div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->

<script type="text/javascript">
	$('.check_all').change(function() {
		if($(this).is(':checked')){
		$('.add_check').removeAttr('checked');
		$('.add_check').click();
		//$('.add_check').attr('checked', true);
	}
	else{
	$('.add_check').removeAttr('checked');
	}
	//$('.add_check').click();
})
</script>
