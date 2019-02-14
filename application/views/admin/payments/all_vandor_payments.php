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
                             <a href="<?php echo base_url() ?>admin/payments/search_vandor_for_payments"><button type="submit" class="btn btn-primary pull-right">Create Payments</button></a>
                        </div>
                    </div>
                    <form method="post" action="<?php echo base_url(); ?>admin/payments/submit_selected_vandor_payments" id="import_forms" enctype="multipart/form-data">
                        <div class="panel-body">
                            
                            <div class="table-responsive">
                                <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
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
                                            <td><?php echo $i++;?></td>
                                            <td><?php echo $module["id"]; ?></td>
                                            <td><?php echo $module["vendor_name"]; ?></td>
                                            <td><?php echo $module["vehicle_type"]; ?></td>
                                            <td><?php echo $module["vehicel_of_vendor"]; ?></td>
                                            <td><?php echo number_format($module["order_total_amount"]); ?></td>
                                            <td><?php echo $newDate = date("d-m-Y", strtotime($module["created_at"]));?></td>
                                            <td><?php echo number_format($module["vendor_payment"]); ?></td>
                                            <td>
                                                <a href="<?php echo base_url() ?>admin/payments/paid_vandor_payment/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/record1.png" title="Submit" alt="Submit" width="35" height="35"></a>
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

