
<!-- /.Navbar  Static Side -->
<div class="control-sidebar-bg"></div>
<!-- Page Content -->
<div id="page-wrapper">
    <!-- main content -->
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon">
                <i class="pe-7s-note2"></i>
            </div>
            <div class="header-title">
                <h1>Submit Vandor Payment</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Submit Vandor Payment</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>admin/payments/submit_vendor_payment" enctype="multipart/form-data">
            <!-- <input type="hidden" name="id" value="<?php echo $vendor_payments_detail["id"] ?>"> -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Submit Vandor Payment</h4>
                            </div>
                        </div>
                            <div class="panel-body">
                                
                                <div class="table-responsive">
                                    <table id="" class="table table-bordered table-striped table-hover">
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                // echo "<pre>";
                                                // print_r($selected_data);
                                                $vandor_total_amount = 0;
                                                $i=1;
                                                foreach ($selected_data as $module) {
                                            ?>
                                            <input type="" name="vendor_id" value="<?php echo $module["order_vendor_id"];?>">
                                            <input type="" name="id[]" value="<?php echo $module["id"];?>">
                                            <tr>
                                               
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $module["id"]; ?></td>
                                                <td><?php echo $module["vendor_name"]; ?></td>
                                                <td><?php echo $module["vehicle_type"]; ?></td>
                                                <td><?php echo $module["vehicel_of_vendor"]; ?></td>
                                                <td><?php echo number_format($module["order_total_amount"]); ?></td>
                                                <td><?php echo $newDate = date("d-m-Y", strtotime($module["created_at"]));?></td>
                                                <td><?php echo number_format($module["vendor_payment"]); ?></td>
                                                
                                            </tr>
                                            <?php $vandor_total_amount+= $module["vendor_payment"]; } ?>
                                            <tfoot>
                                               <tr>
                                                   <td></td>
                                                   <td><strong>Total</strong></td>
                                                   <td><strong></strong></td>
                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                                   <td><strong><?php echo  number_format($vandor_total_amount);?></strong></td>
                                               </tr>
                                            </tfoot>
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                       
                        <div class="panel-body">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Payment<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="payments" type="text" value="<?php echo $vandor_total_amount ?>" id="example-text-input" placeholder="" readonly="">
                                        <!-- <input style="display: none;" class="form-control" name="voucher_no" type="text" value="<?php echo $vendor_payments_detail["voucher_no"] ?>" id="example-text-input" placeholder="" readonly="">
                                        <input style="display: none;"  class="form-control" name="customer_id" type="text" value="<?php echo $vendor_payments_detail["customer_id"] ?>" id="example-text-input" placeholder="" readonly=""> -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Date<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="invoice_date" type="date" value="" id="example-text-input" placeholder="" required="">
                                    </div>
                                </div>
                                
                                    <div class="form-group row">

                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </div>

                        </div>
                    </div>
               
            </div>
        </form>
    </div>

<!-- /.main content -->
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- START CORE PLUGINS -->