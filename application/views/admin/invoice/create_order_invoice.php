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
            <h1>View Invoice</h1>
            <small> </small>
            <ol class="breadcrumb">
               <li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i> Home</a></li>
               <li class="active">View Invoice</li>
            </ol>
         </div>
      </div>
      <!-- /. Content Header (Page header) -->
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-bd">
               <div class="panel-heading">
                  <div class="panel-title">
                     <h4>View Invoice</h4>
                  </div>
               </div>


               <form method="post" action="<?php echo base_url() ?>admin/invoice/create_selected_invoice_submit"
                enctype="multipart/form-data">
               
               <div class="panel-body">
                  <div class="table-responsive">
                     <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                        <thead>
                           <tr>
                              <th>Customer Name</th>
                              <th>Customer Salesperson</th>
                              <th>Order Date</th>
                              <th>Rate</th>
                              <th>Labour Charges</th>
                              <th>Second Stop</th>
                              <th>Detention</th>
                              <th>Local Transport</th>
                              <th>Total</th>
                           </tr>
                        </thead>
                        <tbody>

                           <?php
                              $all_total_amount = 0;
                              $total_amount = 0;
                              $all_count_value_second = 0;
                              $all_total_labor = 0;
                              $all_total_detention_customer = 0;
                              $all_total_order_amount = 0;
                              // $all_total_buying = 0;
                              foreach ($selected_data as $module) {

                                // echo '<pre>'; print_r($selected_data);

                                $get_expense_data = $this->db->query("SELECT * FROM `order_expense` where order_id='".$module['id']."' ")->result_array();

                                // echo '<pre>'; print_r($get_expense_data);
                                $count_value = 0;
                                foreach ($get_expense_data as $value) {

                                 // echo '<pre>'; print_r($value);
                                    $count_value += $value['expense_amount'];
                                   
                                }
                           
                           ?>

                           <?php
                              $second_stop_amount = 0;

                              foreach ($selected_data as $second_stop) {
                                  
                                  $second_stop_data = $this->db->query("SELECT * FROM `order_second_stop` where second_stop_order_id='".$module['id']."' ")->result_array();
                              }
                              
                              $count_value_second = 0;
                              $all_total = 0;
                              foreach ($second_stop_data as $second_stop_val) {

                                  $count_value_second += $second_stop_val['sec_stop_amount'];
                                 
                              }



                           ?>
                           
<tr>
   
  <td>
    <?php echo $module['customer_name']; ?>

    <input type="hidden" name="customer_nameID" value="<?php echo $module['cu_id']; ?>" >

    <input type="hidden" name="sales_person_id" value="<?php echo $module['sales_person']; ?>" >

    <input type="hidden" name="orderID[]" value="<?php echo $module['id']; ?>" >

    <input type="hidden" name="misc_expense[]" value="<?php print_r($count_value); ?>" >

    <input type="hidden" name="order_detention_customer[]" value="<?php echo $module['order_detention_customer']; ?>" class="order_detention_customer">

    <input type="hidden" name="order_vendor_id[]" value="<?php echo $module['order_vendor_id']?>">

    <input type="hidden" name="order_local_vendor_id[]" value="<?php echo $module['order_local_vendor_id']?>">

    <input type="hidden" name="local_transport[]" value="<?php echo $module['local_transport']?>">
   

    <input type="hidden" name="second_stop_amount[]" class="second_stop_amount" value="<?php echo $count_value_second ?>">
      <?php
       $total_labor = 0;
       $labour_data = $this->db->query("SELECT * FROM `order_labor_charges` where order_id='".$module['id']."' ")->result_array();
        foreach ($labour_data as $l_data) {
       
          $total_labor += $l_data['labor_charges_customer'];
      ?>
     <input type="hidden" name="labor_charges[]" class="labor_charges" value="<?php echo $total_labor; ?>">
    <input type="hidden" name="order_labor_vendor_id[]" value="<?php echo $l_data['order_vendor_id']?>">
     <?php } ?>
     <?php $total_other_charges =  $module['order_detention_customer'] + $count_value_second + $total_labor;?>
  </td>
  <td><?php echo $module['sp_name']; ?></td>
  <td><?php echo $newDate = date("d-m-Y", strtotime($module["order_date"])); ?></td>
  <td><?php echo number_format($module['order_total_amount']);?></td>
  <td><?php echo number_format($total_labor); ?></td>
  <td><?php echo number_format($count_value_second); ?></td>
  <td><?php echo number_format($module['order_detention_customer']); ?></td>
  <td><?php echo number_format($module['local_transport']); ?></td>
  <td>
    <!-- <?php $grand_total = round($tax_amount);  echo number_format($grand_total);?> -->
     <!-- <?php  
       $ssp_percantage = ($module['ssp_tax_val'] / 100) * $t_with_out_sst;
     ?> -->
    <!--  <input type="text" class="ssp_percantage" name="ssp_percantage[]" value="<?php echo round($ssp_percantage) ?>">  -->
    <?php $g_total_amount = $module['order_total_amount'] + $module['order_detention_customer']  + $module['local_transport'] + $total_labor + $count_value_second; echo number_format($g_total_amount);?>
  </td>
</tr>


                        <?php 
                          $all_total_amount += $g_total_amount;
                          $all_total_labor += $total_labor;
                          $all_total_order_amount += $module['order_total_amount'];
                          
                          $all_total_detention_customer += $module['order_detention_customer'];
                          $all_count_value_second += $count_value_second;
                          } 
                        ?>

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
                            <td><strong><?php echo number_format(round($all_total_amount)); ?></strong></td>
                          </tr>
                        </tfoot>
                     </table>
                  </div>
                  <input type="hidden" name="total_labour_chargers" value="<?php echo round($all_total_labor);?>" class="total_labour_chargers" readonly>
                 
                   <input type="hidden" name="order_detention_customer_total" value="<?php echo round($all_total_detention_customer);?>" class="order_detention_customer_total" readonly>

                   <!-- <input type="hidden" name="all_total_buying" value="<?php echo round($all_total_buying);?>" class="all_total_buying" readonly> -->
                   
                   <input type="hidden" name="second_stop_amount_total" value="<?php echo round($all_count_value_second
                   ); ?>" class="second_stop_amount_total" readonly>
                <div class="row panel-body">
                    <div class="form-group col-lg-3">
                      <label for="" class=""> Order Total Amount </label>
                      <input type="text" id="grand_total" class="form-control" name="grand_total" value="<?php echo round($all_total_amount);?>">
                      <input type="hidden" name="total_amount" value="<?php echo round($all_total_order_amount);?>" readonly>
                    </div>
                    <div class="form-group col-lg-2">
                      <label for="" class=""> Tax Add </label>
                        <select id="select" class="form-control cd-select" name="role" required="">
                          <option>Select</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                      
                    </div>
                    <div class="tax-form tax_addYes">
                      <div class="form-group col-lg-2">
                        <label for="" class=""> Tax % </label>
                        <input type="number" id="tax_per" name="tax_per" value="" class=" form-control tax_per">
                        
                      </div>
                      <div class="form-group col-lg-2">
                        <label for="" class=""> Tax Amount </label>
                        <input type="text" id="tax_amount" name="tax_amount" value="" class="form-control tax_amount">
                        
                      </div>
                    </div>
                    <div class="form-group col-lg-3">
                      <label for="" class=""> After Tax </label>
                      <input type="text" id="amount_with_tax" name="amount_with_tax" value="<?php echo round($all_total_amount);?>" class="form-control amount_with_tax">
                      
                    </div>
                </div>
                 
                   
                   
                 
                   
                   
                   
                   <button type="submit" class="btn btn-primary pull-right">Submit</button>
               </div>
        
            </form>
                            
            </div>
         </div>
      </div>
      <div style="height: 450px;"></div>
   </div>
   
</div>
<!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<!-- START CORE PLUGINS -->
<script type="text/javascript">
    $(function () {
  $('.tax-form').hide();
  // $('.d2').show();
    
  $('#select').on("change",function () {
    $('.tax-form').hide();
    $('.tax_add'+$(this).val()).show();
  })
});
</script>
<script type="text/javascript">
  $("#tax_per").keyup(function () {
      var ans = $('#grand_total').val(); 
      var d_ans = ans / 100;
      var tax = d_ans * $('#tax_per').val();
      var tax_round = Math.round(tax);
      var grand_amount = parseInt($('#grand_total').val());
      var after_with_tax = grand_amount+tax_round;
      $('#tax_amount').val(tax_round);
      $('#amount_with_tax').val(after_with_tax);
  });
</script>

<!-- <script type="text/javascript">
  $('.check_all').change(function() {
  if($(this).is(':checked')){
  $('.add_check').removeAttr('checked');
  $('.add_check').click();
  }
  else{
  $('.add_check').removeAttr('checked');
  }
  })
  var labor_charges = 0;
  $('.labor_charges').each(function(){
      labor_charges += parseFloat($(this).val());

  });
  var order_detention_customer = 0;
  $('.order_detention_customer').each(function(){
      order_detention_customer += parseFloat($(this).val());

  });
  var second_stop_amount = 0;
  $('.second_stop_amount').each(function(){
      second_stop_amount += parseFloat($(this).val());

  });
  var ssp_percantage = 0;
  $('.ssp_percantage').each(function(){
      ssp_percantage += parseFloat($(this).val());

  });
  $('.ssp_hidden_total').val(ssp_percantage);    
  $('.order_detention_customer_total').val(order_detention_customer);    
  $('.total_labour_chargers').val(labor_charges);    
  $('.second_stop_amount_total').val(second_stop_amount);    
</script> -->