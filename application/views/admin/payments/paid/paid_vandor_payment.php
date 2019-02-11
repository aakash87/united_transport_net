
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
                <h1>Paid Payment</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Paid Payment</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>admin/payments/submit_vendor_payment" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $vendor_payments_detail["id"] ?>">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Paid Payment</h4>
                            </div>
                        </div>
                        <div class="panel-body">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Payment<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="payments" type="text" value="<?php echo $vendor_payments_detail["amount"] ?>" id="example-text-input" placeholder="" readonly="">
                                        <input style="display: none;" class="form-control" name="voucher_no" type="text" value="<?php echo $vendor_payments_detail["voucher_no"] ?>" id="example-text-input" placeholder="" readonly="">
                                        <input style="display: none;"  class="form-control" name="customer_id" type="text" value="<?php echo $vendor_payments_detail["customer_id"] ?>" id="example-text-input" placeholder="" readonly="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Date<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="pay_date" type="date" value="" id="example-text-input" placeholder="" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Pay Amount<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="pay_amount" type="text" value="" id="example-text-input" placeholder="" required="">
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
            </div>
        </form>
    </div>
</div>

</div>
<!-- /.main content -->
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- START CORE PLUGINS -->
