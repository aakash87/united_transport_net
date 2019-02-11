
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
                <h1>Paid Invoice</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Paid Invoice</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>admin/invoice/paid_invoice_submit" enctype="multipart/form-data">
            <input type="hidden"  name="invoice_tb_id" value="<?php echo $invoice_tb_id; ?>">
            <div class="row">
                <?php  // echo '<pre>'; print_r(); ?>
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Paid Invoice</h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                     <div class="col-sm-6" style="">

                                        <div class="form-group row ">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Date</label>
                                              <div class="col-sm-9">
                                                    <input class="form-control" name="invoice_paid_date" type="date" value="" id="example-text-input" placeholder=""  >
                                              </div>
                                        </div>

                                        <div class="form-group row ">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">customer_name</label>
                                              <div class="col-sm-9">
                                                    <input class="form-control" name="customer_name" type="text" value="<?php echo $customer['full_name']; ?>" id="example-text-input" placeholder="" readonly >
                                                    <input style="display: none;" class="form-control" name="customer_id" type="text" value="<?php echo $invoice['customer_id']; ?>" id="" placeholder="" readonly >
                                                    <input style="display: none;" class="form-control" name="sales_person_id" type="text" value="<?php echo $invoice['sales_person_id']; ?>" id="" placeholder="" readonly >
                                                    <input style="display: none;" class="form-control" name="invoice_voucher_number" type="text" value="<?php echo $invoice['invoice_voucher_number']; ?>" id="" placeholder="" readonly >
                                              </div>
                                        </div>

                                           <div class="form-group row  ">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Paid Amout</label>
                                              <div class="col-sm-9">
                                                    <input class="form-control" max="<?php echo $invoice['invoice_total_amount']; ?>" name="paid_amount_cu" type="number" value="" id="example-text-input" placeholder=""  >
                                              </div>
                                        </div>

                                       

                                     </div>

                                     <div class="col-sm-6" >
                                        <div class="form-group row ">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">total_amount</label>
                                              <div class="col-sm-9">
                                                    <input class="form-control" name="invoice_total_amount" type="text" value="<?php echo $invoice['invoice_total_amount']; ?>" id="example-text-input" placeholder="" readonly >
                                              </div>
                                        </div>
                                        


  <div class="form-group row">

                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary pull-right">Add</button>
                                </div>
                            </div>


                                      
                                        

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
