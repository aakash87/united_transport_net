
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

        <form method="post" action="<?php echo base_url() ?>admin/payments/submit_vendor_invoice" enctype="multipart/form-data">
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
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Payment Amount<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="payments" type="text" value="<?php echo $vendor_payments_detail['total_amount'] ?>" id="example-text-input" placeholder="" readonly="">
                                        <input class="form-control" name="balance" type="text" value="<?php echo $vendor_payments_detail['balance'] ?>" id="example-text-input" placeholder="" readonly="">
                                        <input class="form-control" name="total_amount" type="text" value="<?php echo $vendor_payments_detail['total_amount'] ?>" id="example-text-input" placeholder="" readonly="">
                                        <input class="form-control" name="old_amount" type="text" value="<?php echo $vendor_payments_detail['amount'] ?>" id="example-text-input" placeholder="" readonly="">
                                        <input style=""  class="form-control" name="o_id" type="text" value="<?php echo $vendor_payments_detail["order_id"] ?>" id="example-text-input" placeholder="" readonly="">
                                        <input style=""  class="form-control" name="id" type="text" value="<?php echo $vendor_payments_detail["id"] ?>" id="example-text-input" placeholder="" readonly="">
                                        <input style="" class="form-control" name="invoice_no" type="text" value="<?php echo $vendor_payments_detail["invoice_no"] ?>" id="example-text-input" placeholder="" readonly="">
                                        <input style="" class="form-control" name="vendor_id" type="text" value="<?php echo $vendor_payments_detail["vendor_id"] ?>" id="example-text-input" placeholder="" readonly="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Bank<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control bank_id" data-live-search="true" name="bank_id" >
                                           <option>Select Bank</option>
                                           <?php foreach ($banks as $bank) : ?>
                                               <option value="<?php echo $bank['id']; ?>"><?php echo $bank['bank_name']; ?></option>
                                           <?php endforeach; ?>

                                       </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Bank Amount<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control bank_amount" name="bank_amount" type="text" value="" id="example-text-input" placeholder="" readonly="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Paid Amount<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="pay_amount" type="text" value="" id="" placeholder="" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Date<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="pay_date" type="date" value="" id="example-text-input" placeholder="" required="">
                                    </div>
                                </div>
                                
                                    <div class="form-group row">

                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary pull-right">Create</button>
                                </div>
                            </div>

                        </div>
                    </div>
               
            </div>
        </form>
    </div>
    </div>
    </div>
    

<script type="text/javascript">
    $('.bank_id').on('change' , function(){

       var bankId = $(this).val();

         $.ajax({
             url: '<?php echo base_url();?>/admin/expense/get_bank_amount',

             data: { bankId:bankId },

             type: 'POST',

             success:function(resp)
             {
                 $('.bank_amount').val(resp);

             }
         });
    });

</script>