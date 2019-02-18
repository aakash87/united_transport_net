
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
                <h1>Bank Deposit</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Bank Deposit</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>admin/bank/bank_deposit" enctype="multipart/form-data">

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Bank Deposit</h4>
                            </div>
                        </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-6">


                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Date</label>
                                        <div class="col-sm-9">
                                           <input class="form-control" name="create_date" type="date" value="" id="example-text-input" placeholder="" >
                                        </div>

                                    </div>    
                                <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Select Bank</label>
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

                                <label for="example-text-input" class="col-sm-3 col-form-label"> Bank Amount</label>
                                        <div class="col-sm-9"><input class="form-control bank_amount" name="bank_amount" type="text" value="" id="example-text-input" placeholder="" readonly=""></div>

                                    </div>
                                    




                                    <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label"> description</label>
                                        <div class="col-sm-9"><input class="form-control" name="bank_description" type="text" value="" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Amount</label>
                                        <div class="col-sm-9"><input class="form-control" name="amount" type="text" value="" id="example-text-input" placeholder="" ></div>

                                    </div>
                                    
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group row">
                                     <p>Transfer</p>
                                    
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="transfer_yes" value="1" name="transfer_check" class="transfer_check" >
                                        <label for="transfer_yes"> Yes </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <input type="radio" id="transfer_no" value="0" name="transfer_check" checked="" class="transfer_check">
                                        <label for="transfer_no"> No </label>
                                    </div>
                                </div>
                                <div class="bank_id_transfer_div" style="display: none;">
                                    <div class="form-group row " >
                                         <label for="example-text-input" class="col-sm-3 col-form-label">Bank form</label>
                                        <div class="col-sm-9">

                                            <select class="form-control bank_transfer" data-live-search="true" name="bank_transfer" >
                                                <option value="0">Select Bank</option>
                                                <?php foreach ($banks as $bank) : ?>
                                                    <option value="<?php echo $bank['id']; ?>"><?php echo $bank['bank_name']; ?></option>
                                                <?php endforeach; ?>
                             
                                            </select>

                                         <!-- <small>Amount Reduce Form This Bank</small>            -->
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                         <label for="example-text-input" class="col-sm-3 col-form-label">Bank Amount</label>
                                        <div class="col-sm-9"><input class="form-control bank_amount_trans" name="bank_transfer_amount" type="text" value="" id="example-text-input" placeholder="" readonly="" ></div>

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



   $('.bank_transfer').on('change' , function(){

      var bankId = $(this).val();

        $.ajax({
            url: '<?php echo base_url();?>/admin/expense/get_bank_amount',

            data: { bankId:bankId },

            type: 'POST',

            success:function(resp)
            {
                $('.bank_amount_trans').val(resp);
                // alert(resp);

            }
        });
   });


   

   $('.transfer_check').on('change', function(){
        var transfer_checkId = $(this).val();

        if (transfer_checkId == 1) {
            // alert(transfer_checkId);
            $('.bank_id_transfer_div').show();
        }
        else
        {
            $('.bank_id_transfer_div').hide();

        }
   });
</script>