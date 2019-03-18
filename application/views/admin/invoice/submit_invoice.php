
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

        <form method="post" action="<?php echo base_url() ?>admin/invoice/submit_order_invoice" enctype="multipart/form-data">
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
                                            <label for="" class="col-sm-3 col-form-label">Date</label>
                                              <div class="col-sm-9">
                                                    <input class="form-control" name="invoice_paid_date" type="date" value="" id="" placeholder=""  >
                                              </div>
                                        </div>

                                        <div class="form-group row ">
                                            <label for="" class="col-sm-3 col-form-label">Customer Name</label>
                                              <div class="col-sm-9">
                                                    <input class="form-control" name="customer_name" type="text" value="<?php echo $customer['full_name']; ?>" id="" placeholder="" readonly >
                                                    <input style="display:none;" class="form-control" name="customer_id" type="text" value="<?php echo $invoice['customer_id']; ?>" id="" placeholder="" readonly >
                                                    <input style="display:none;" class="form-control" name="sales_person_id" type="text" value="<?php echo $invoice['sales_person_id']; ?>" id="" placeholder="" readonly >
                                                    <input style="display:none;" class="form-control" name="invoice_voucher_number" type="text" value="<?php echo $invoice['invoice_voucher_number']; ?>" id="" placeholder="" readonly >
                                              </div>
                                        </div>


                                           <div class="form-group row  " style="">
                                            <label for="" class="col-sm-3 col-form-label">With holding Tax (%)</label>
                                              <div class="col-sm-9">
                                                    <input class="form-control" id="with_holding_tax" name="with_holding_tax" type="number" value="<?php echo $invoice['with_holding_tax']; ?>" id="" placeholder="" <?php if ( $invoice['balance'] !== $invoice['invoice_total_amount']) { echo "readonly";}?> >
                                              </div>
                                        </div> 
                                           <div class="form-group row  " >
                                            <label for="" <?php if ( $invoice['balance'] !== $invoice['invoice_total_amount']) { echo "style='display:none;'";}?> class="col-sm-3 col-form-label">With holding</label>
                                              <div class="col-sm-9">
                                                    <input class="form-control" id="with_holding"  name="with_holding_amount" type="<?php if ( $invoice['balance'] !== $invoice['invoice_total_amount']) { echo "hidden";}else{ echo "text";}?>" value="" id="" placeholder="" readonly="" >
                                              </div>
                                        </div>
                                        <div class="form-group row  " <?php if ( $invoice['balance'] !== $invoice['invoice_total_amount']) { echo "style='display:none;'";}?>>
                                            <label for="" class="col-sm-3 col-form-label">After w h Amount</label>
                                              <div class="col-sm-9">
                                                    <input class="form-control after_w_h_amount" max="" name="after_w_h_amount" type="number" value="" placeholder="" readonly="" >
                                              </div>
                                        </div>
                                        <div class="form-group row  ">
                                            <label for="" class="col-sm-3 col-form-label">Paid Amount</label>
                                              <div class="col-sm-9">
                                                    <input class="form-control after_w_h_amount" max="<?php echo $invoice['invoice_total_amount']; ?>" name="paid_amount_cu" type="number" value="" id="" placeholder=""  >
                                              </div>
                                        </div>
                                        <div class="form-group row  ">
                                            <label for="" class="col-sm-3 col-form-label">Remarks</label>
                                              <div class="col-sm-9">
                                                  <textarea class="form-control" name="remarks" rows="1"></textarea>
                                              </div>
                                        </div>
                                       

                                     </div>

                                     <div class="col-sm-6" >
                                        <div class="form-group row ">
                                            <label for="" class="col-sm-3 col-form-label">Total Amount</label>
                                              <div class="col-sm-9">
                                                    <input class="form-control" name="invoice_total_amount" type="text" value="<?php echo $invoice['invoice_total_amount']; ?>" id="total_amount" placeholder="" readonly >
                                                   
                                                    <input style="display:none;" class="form-control" name="amount" type="text" value="<?php echo $invoice['customer_paid_amount']; ?>" id="" placeholder="" readonly >
                                                    <input style="display:none;" class="form-control" name="old_amount" type="text" value="<?php echo $invoice['balance']; ?>" id="" placeholder="" readonly >
                                              </div>
                                        </div>
                                        <div class="form-group row">

                                        <label for="" class="col-sm-3 col-form-label">Balance Amount</label>
                                                <div class="col-sm-9">
                                                     <input class="form-control" id="balance_amount" name="balance" type="text" value="<?php echo $invoice['balance']; ?>" id="" placeholder="" readonly >
                                                </div>

                                            </div>
                                        <div class="form-group row">

                                        <label for="" class="col-sm-3 col-form-label">Select Bank</label>
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

                                <label for="" class="col-sm-3 col-form-label"> Bank Amount</label>
                                        <div class="col-sm-9"><input class="form-control bank_amount" name="bank_amount" type="text" value="" id="" placeholder="" readonly=""></div>

                                    </div>

  <div class="form-group row">

                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary pull-right">Add</button>
                                    <button style="display: none;" type="button" class="my_but btn btn-primary pull-right">ddd</button>
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

<?php if ( $invoice['balance'] !== $invoice['invoice_total_amount']) { ?>

<?php }else{?>
<script type="text/javascript">
  $("#with_holding_tax").keyup(function () {
      var ans = $('#balance_amount').val(); 
      var d_ans = ans * $('#with_holding_tax').val();
      var with_holding = d_ans / 100;
      var after_with_holding = $('#balance_amount').val() - with_holding;
      $('#with_holding').val(d_ans / 100);
      $('.after_w_h_amount').val(Math.round(after_with_holding));

  });
</script>
<?php } ?>