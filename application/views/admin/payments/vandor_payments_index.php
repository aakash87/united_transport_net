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
                             <a href="<?php echo base_url() ?>admin/payments/search_vandor_for_payments"><button type="submit" class="btn btn-primary pull-right ovel_css">Create Payments</button></a>
                             <a href="<?php echo base_url() ?>admin/payments/view_paid_vendor_payments"><button type="submit" class="btn btn-primary pull-right ovel_css">View Paid Invoice</button></a>
                        </div>
                    </div>
                    <form method="post" action="<?php echo base_url(); ?>admin/payments/submit_selected_vandor_payments" id="import_forms" enctype="multipart/form-data">
                        <div class="panel-body">
                            
                            <div class="table-responsive">
                                <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sr.no</th>
                                            <th>Inv No</th>
                                            <th>Vendor Name</th>
                                            <th>InV Create Date</th>
                                            <th>Vendor Address</th>
                                            <th>Vendor Type</th>
                                            <th>Status</th>
                                            <th>Total Amount</th>
                                            <th>Amount</th>
                                            <th>Balance</th>
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
                                            <td><?php echo $i++;?></td>
                                            <td><?php echo $module["invoice_no"]; ?></td>
                                            <td><?php echo $module["vendor_name"]; ?></td>
                                            <td><?php echo $newDate = date("d-m-Y", strtotime($module["invoice_date"]));?></td>
                                            <td><?php echo $module["vendor_address"]; ?></td>
                                            <td><?php echo $module["vendor_type"]; ?></td>
                                            <td><?php echo $module["status"]; ?></td>
                                            <td><?php echo number_format($module["total_amount"]); ?></td>
                                            <td><?php echo number_format($module["amount"]); ?></td>
                                            <td><?php echo number_format($module["balance"]); ?></td>
                                            <td>
                                                <a href="<?php echo base_url() ?>admin/payments/submit_vandor_payment/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/record1.png" title="Submit" alt="Submit" width="35" height="35"></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      
    </div> <!-- /.main content -->
</div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->

