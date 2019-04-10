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
							<h4><?php if ($this->input->server('REQUEST_METHOD') == 'POST') { $vendor_detatil = $this->db->query("SELECT * FROM `vendor` where id='".$this->input->post('vendor_id')."' ")->row_array(); print_r($vendor_detatil['vendor_name']); }	?> Payments </h4>
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
											<th>Loading Date</th>
											<th>Origin / Destination</th>
											<th>Desc</th>
											<th>Vehicle Buying</th>
											<th>Detention</th>
											<th>Local Transport</th>
											<th>Labour Charges</th>
											<th>Amount</th>
										</tr>
									</thead>
								    <tbody>

								    	<?php
									    	// echo "<pre>";
									    	// print_r($vendor_payments);
								    		$i=1;
								    		$total_amount=0;

								    		foreach ($vendor_payments as $module) {
								    	?>
								    	
										<tr>
											<td><input type="checkbox" class="add_check" name="id[]" value="<?php echo $module['id'] ?>"></td>
											<td><?php echo $i++;?></td>
											<td><?php echo $module["pickup_date_and_time"]; ?></td>
											<td><?php echo $module["drop_off_location"]; ?> To <?php echo $module["pickup_location"]; ?></td>
											<td><?php echo $module["vendor_type"]; ?></td>
											<td><?php echo number_format($module["vehicle_buying"]); ?></td>
											<td><?php echo number_format($module["detention"]); ?></td>
											<td><?php echo number_format($module["local_transport"]); ?></td>
											<td><?php echo number_format($module["labour_charges"]); ?></td>
											<td><?php echo number_format($module["total_cost"]); ?></td>
											
										</tr>
										<?php  $total_amount +=$module["total_cost"]; } ?>
										
									</tbody>
									<tfoot>
										<tr>
											<td><strong>Total</strong></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td><strong><?php echo number_format($total_amount);?></strong></td>
										</tr>
									</tfoot>
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
