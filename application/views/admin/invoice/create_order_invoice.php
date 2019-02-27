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
                              <th>Order Status</th>
                              <th>Order Amount</th>
                              <th>Labour Charges</th>
                              <th>Second Stop</th>
                              <th>Detention</th>
                              <th>Total With Out SST</th>
                              <th>SST %</th>
                              <th>Total With SST</th>
                             
                            
                           </tr>
                        </thead>
                        <tbody>

                           <?php
                              $total_amount = 0;
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
                                 
                                 <td><?php echo $module['customer_name']; ?>
                                  
                                  <input type="hidden" name="customer_nameID" value="<?php echo $module['cu_id']; ?>" >
                                  
                                   <input type="hidden" name="sales_person_id" value="<?php echo $module['sales_person']; ?>" >

                                   <input type="hidden" name="orderID[]" value="<?php echo $module['id']; ?>" >
                                   <input type="hidden" name="misc_expense[]" value="<?php print_r($count_value); ?>" >
                                   
                                   <input type="hidden" name="order_detention_customer[]" value="<?php echo $module['order_detention_customer']; ?>" class="order_detention_customer">
                                  
                                    <input type="hidden" name="order_vendor_id[]" value="<?php echo $module['order_vendor_id']?>">
                                    <input type="hidden" name="order_local_vendor_id[]" value="<?php echo $module['order_local_vendor_id']?>">
                                    <input type="hidden" name="local_transport[]" value="<?php echo $module['local_transport']?>">
                                   <input type="hidden" name="labor_charges[]" class="labor_charges" value="<?php echo $module['labor_charges']; ?>">

                                     <input type="hidden" name="second_stop_amount[]" class="second_stop_amount" value="<?php echo $count_value_second ?>">
                                     <?php
                                   $total_labor = 0;
                                   $labour_data = $this->db->query("SELECT * FROM `order_labor_charges` where order_id='".$module['id']."' ")->result_array();
                                   foreach ($labour_data as $l_data) {
                                   
                                     $total_labor += $l_data['labor_charges_customer'];
                                     ?>
                                    
                                     <input type="hidden" name="order_labor_vendor_id[]" value="<?php echo $l_data['order_vendor_id']?>">
                                     <?php
                                   }
                                  
                                   ?>
                                     <?php $total_other_charges =  $module['order_detention_customer'] + $count_value_second + $total_labor;?>
                                 </td>
                                  

                                 <td><?php echo $module['sp_name']; ?></td>
                                 <td><?php echo $newDate = date("d-m-Y", strtotime($module["order_date"])); ?></td>
                                 <td><?php echo $module['order_status']; ?></td>
                                 <td><?php echo number_format($module['order_total_amount']);?></td>
                                 <td><?php echo $total_labor; ?></td>
                                 <td><?php echo $count_value_second; ?></td>
                                 <td><?php echo $module['order_detention_customer']; ?></td>


                                  <td> <?php $t_with_out_sst = $module['order_total_amount'] + $total_other_charges ;  echo number_format($t_with_out_sst);?>
                                    <input type="hidden" name="t_with_out_sst" value="<?php echo $t_with_out_sst ?>">
                                  </td>
                                 <td><?php $tax_amount = $t_with_out_sst * $module['ssp_tax_val'] / 100;  echo round($tax_amount)?>  <small>(<?php echo $module['ssp_tax_val']?>%)</small></td>

                                 <td><?php $grand_total = round($tax_amount) + $t_with_out_sst;  echo number_format($grand_total);?>
                                     <?php  
                                       $ssp_percantage = ($module['ssp_tax_val'] / 100) * $t_with_out_sst;
                                     ?>
                                   <input type="hidden" class="ssp_percantage" name="ssp_percantage[]" value="<?php echo round($ssp_percantage) ?>"> 
                                   

                                 </td>



                                  
                              </tr>


                        <?php  $all_total+=$grand_total; $total_amount+=$grand_total; } ?>

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
                            <td></td>
                            <td><strong><?php echo number_format(round($total_amount)); ?></strong></td>
                          </tr>
                        </tfoot>
                     </table>
                  </div>
                  <input type="hidden" name="grand_total" value="<?php echo round($all_total);?>">
                   <input type="hidden" name="total_amount" value="<?php  echo round($total_amount) ?>" class="total_amount" readonly>
                   
                   <input type="hidden" name="total_labour_chargers" value="" class="total_labour_chargers" readonly>
                 
                   <input type="hidden" name="order_detention_customer_total" value="" class="order_detention_customer_total" readonly>
                   
                   <input type="hidden" name="second_stop_amount_total" value="" class="second_stop_amount_total" readonly>
                 
                   <input type="hidden" name="ssp_hidden_total" value="" class="ssp_hidden_total" readonly>
                   
                   
                   <button type="submit" class="btn btn-primary pull-right">Submit</button>
               </div>
        
            </form>
                            
            </div>
         </div>
      </div>
      <div style="height: 450px;"></div>
   </div>
   <!-- /.main content -->
</div>
<!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<!-- START CORE PLUGINS -->


<script type="hidden/javascript">
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

</script>