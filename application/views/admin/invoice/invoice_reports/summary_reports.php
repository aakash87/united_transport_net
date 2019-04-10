<style type="text/css">
  .dropdown-menu.open {
    z-index: 999 !important;
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
            <h1>Summary Reports</h1>
            <small> </small>
            <ol class="breadcrumb">
               <li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i> Home</a></li>
               <li class="active">Summary Reports</li>
            </ol>
         </div>
      </div>
      <!-- /. Content Header (Page header) -->
      <div class="row">

         <div class="col-sm-12">
            <div class="panel panel-bd">
               <div class="panel-heading">
                  <div class="panel-title">
                     <h4><?php if ($this->input->server('REQUEST_METHOD') == 'POST') {
                                $get_expense_data = $this->db->query("SELECT * FROM `users` where id='".$_POST['select_sales_person']."' ")->row_array(); echo  $get_expense_data['name']; }
                                ?> Summary Reports <?php if ($this->input->server('REQUEST_METHOD') == 'POST') { echo $newDate = date("d-m-Y", strtotime($str_current_day_show)); echo " To "; echo $newDate2 = date("d-m-Y", strtotime($str_last_date_show)); }
                                ?></h4>
                  </div>
               </div>


               <form method="post" action="<?php echo base_url() ?>/admin/invoice/summary_report_invoice" enctype="multipart/form-data">
                 <div class="panel-body">
                    <div class="form-group row" >
                      <div class="col-lg-6"">
              
                        <label for="example-text-input" class="col-sm-4 col-form-label">Sales Person</label>
                                <div class="col-sm-8">
                                    <select class="form-control selectpicker" data-live-search="true" name="select_sales_person" required="">
                                                  <option value="">Select Sales Person</option>
                                                  <option value="All">All</option>
                                                  <?php foreach ($sales_person as $person) {?>
                                                      <option value="<?php echo $person["id"] ?>"><?php echo $person["name"] ?></option>
                                                 <?php } ?></select>
                                </div>

                      </div>
                      

                      <div class="col-lg-4" >
                        
                         <label for="example-text-input" class="col-sm-4 col-form-label">Date</label>
                        
                           <div class="col-sm-8">
                            <input class="form-control" type="text" id="date_range_input" name="daterange" value="<?php echo  date("m/d/Y");?> - <?php echo  date("m/d/Y", strtotime(' +2 day'));?>" />
                           </div>

                      </div>

                      <div class="form-group col-lg-2">
                        
                          <button type="submit" id="customer_report_by_dateID" class="btn btn-success w-md m-b-5 m-t-5">Search</button>

                      </div>
                                        </div>

                  </div>
                </form>


               <form method="post" action="<?php echo base_url() ?>admin/invoice/create_selected_inboice"
                enctype="multipart/form-data">
               
               <div class="panel-body">
                  <div class="table-responsive">
                     <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                        <thead>
                           <tr>
                              <th>S#</th>
                              <th>Custommer's</th>
                              <th>Loading Date</th>
                              <th>Vehicle #</th>
                              <th>Vehicle Type</th>
                              <th>Builty</th>
                              <th>Vendor</th>
                              <th>ORIGIN</th>
                              <th>DEST</th>
                              <th>Invoice #</th>
                              <th>Rate </th>
                              <th>Local Transport</th>
                              <th>Labor Charges V</th>
                              <th>Detention</th>
                              <th>MISC EXP</th>
                              <th>Vehicle Bying</th>
                              <th>Tax</th>
                              <th>SRB Tax</th>
                              <th>GP</th>
                              <th>25% Admin Charges</th>
                              <th>NET PROFIT</th>
                              <th>Received</th>
                              <th>Recovery Date</th>
                              <th>Invoice </th>

                           </tr>
                        </thead>
                        <tbody>
                          <?php 
                             $serial_number = 1;
                             $rate = 0;
                             $rate_total = 0;
                             $local_total = 0;
                             $vend_total = 0;
                             $detention_total = 0;
                             $MISC_total = 0;
                             $bying_total = 0;
                             $tax_total = 0;
                             $srb_tax_total = 0;
                             $GP_total = 0;
                             $admin_c_total = 0;
                             $net_profit_total = 0;
                             foreach ($summary_data as $value) { 
                              $get_expense_data = $this->db->query("SELECT * FROM `order_expense` where order_id='".$value['id']."' ")->result_array();
                              $misc_expense_amount = 0;
                              foreach ($get_expense_data as $data) {
                                  $misc_expense_amount += $data['expense_amount'];
                              }
                          ?>

                          <tr>
                            <?php
                              $total_labor_c = 0;
                              
                              $labour_data = $this->db->query("SELECT * FROM `order_labor_charges` where order_id='".$value['id']."' ")->result_array();
                              foreach ($labour_data as $l_data) {
                                $total_labor_c += $l_data['labor_charges_customer'];
                              }
                              
                              ?>
                            <td><?php echo $serial_number++; ?></td>
                            <td><?php echo $value['customer_name'];  ?></td>
                            <td><?php echo $newDate = date("d-m-Y", strtotime($value['order_date']));  ?></td>
                            <td><?php echo $value['registration_number'];  ?></td>
                            <td><?php echo $value['vehicle_type'];  ?></td>
                            <td><?php echo $value['builty_num'];  ?></td>
                            <td><?php echo $value['vendor_name'];  ?></td>
                            <td><?php echo $value['pickup_location'];  ?></td>
                            <td><?php echo $value['drop_off_location'];  ?></td>
                            <td>
                              <?php if ($value['inv_tax_amount'] == 0) {
                                 ?>
                                  <a href="<?php echo base_url() ?>admin/invoice/inv_with_out_sst/<?php echo $value["inv_id"] ?>" target="_blank"><?php echo $value['invoice_voucher_number'];  ?></a>
                                 <?php
                                }else{?>
                                <a href="<?php echo base_url() ?>admin/invoice/inv_with_sst/<?php echo $value["inv_id"] ?>" target="_blank"><?php echo $value['invoice_voucher_number'];  ?></a>
                              <?php } ?>
                            </td>
                            <td><?php $rate = $value['order_total_amount'] + $value['local_transport'] + $total_labor_c + $value['order_detention_customer'] + $misc_expense_amount + $value['inv_tax_amount'] ;
                              ?> 
                              <span href="#" data-toggle="tooltip" title="Rate <?php echo $value['order_total_amount'];?> + L.Transport <?php echo $value['local_transport'];?> + L.Charges <?php echo $total_labor_c;?> + Detention <?php echo $value['order_detention_customer'];?> + M.Expense <?php echo $misc_expense_amount;?>"><?php echo number_format($rate);  ?></span>
                            </td>
                            <td><?php echo number_format($value['local_transport']);  ?></td>
                            <!-- <td><?php echo number_format($total_labor_c);?></td> -->
                             <td> 
                              <?php
                              $total_labor_v = 0;
                              $labour_data = $this->db->query("SELECT * FROM `order_labor_charges` where order_id='".$value['id']."' ")->result_array();
                              foreach ($labour_data as $l_data) {
                              
                                $total_labor_v += $l_data['labor_charges'];
                                
                              }
                              
                              ?>
                                <?php echo number_format($total_labor_v);?>
                            </td> 
                            <td><?php echo number_format($value['order_tenstion']);  ?></td>
                            <td><?php echo number_format($misc_expense_amount);  ?></td>
                            <td>
                             
                              <?php echo number_format($value['baying_assigned_rates_for_vendor']);  ?>
                            </td>
                            <td>
                               <?php
                                  $tax_divide_value = $value['with_holding_tax'] / 100; 
                                  $tax = $rate * $tax_divide_value; 
                                ?>
                               <?php echo number_format($tax);  ?> 
                               <small style="font-size: 64%;">(<?php echo $value['with_holding_tax']?>%)</small>
                                  
                            </td>
                            <td>
                               <?php 
                                  $srb_divide_value = $value['tax_per'] / 100; 
                                   $srb_val = $value['total_amount'] * $srb_divide_value;  
                                   echo number_format($srb_val);
                                ?>
                                <small style="font-size: 64%;"> (<?php echo $value['tax_per'] ?>%)</small>
                            </td>
                              <?php $gp = $rate - $value['local_transport'] - $total_labor_v - $value['order_tenstion'] - $misc_expense_amount - $value['baying_assigned_rates_for_vendor'] - $tax - $srb_val; ?>


                              <td><?php echo number_format($gp);  ?></td>
                              <?php
                                $multipul_a_charges = 25 / 100;
                                
                                $admin_charges = $gp * $multipul_a_charges;
                                 $round_admin_charges = round($admin_charges);
                              ?>
                              <td><?php echo number_format($round_admin_charges); ?></td>
                              <?php $net_proft = $gp - $round_admin_charges; ?>
                              <td><?php echo number_format($net_proft);  ?></td>
                              <td>
                                <?php
                                      if ($value['invoice_status'] == 1) {
                                          echo "Received";
                                      }
                                      else if($value['invoice_status'] == 2){
                                        echo "Partial";
                                      }
                                      else{
                                        echo 'Not Received';
                                      }
                                   ?>
                              </td>
                              <td>

                                <?php
                                      if ($value['invoice_status'] == 1) {
                                          echo $newDate = date("M", strtotime($value['invoice_paid_date']));
                                      }
                                      else if($value['invoice_status'] == 2){
                                        echo $newDate = date("M", strtotime($value['invoice_paid_date']));
                                      }
                                      else{
                                        echo 'Nill';
                                      }


                                      
                                   ?>
                                    
                              </td>

                                  
                              </td>
                              
                              <td>
                                <?php

                                if ($value['invoice_status'] == 1) {
                                    echo "Received";
                                }
                                else if($value['invoice_status'] == 2){
                                  echo "Partial";
                                }
                                else{
                                  echo 'Not Created';
                                }
                                ?>
                                  
                              </td>

                           </tr>
                           <?php 
                            $rate_total += $rate;
                            $local_total += $value['local_transport'];
                            $vend_total += $total_labor_c;
                            $detention_total += $value['order_detention_customer'];
                            $MISC_total += $misc_expense_amount;
                            $bying_total += $value['baying_assigned_rates_for_vendor'];
                            $tax_total += $tax;
                            $srb_tax_total += $srb_val;
                            $GP_total += $gp;
                            $admin_c_total += $round_admin_charges;
                            $net_profit_total += $net_proft;
                            } 
                             ?>

                        </tbody>
                           <tfoot>
                             <tr>
                               <td></td>
                                <td></td> 
                                <td></td> 
                                <td></td> 
                                <td></td> 
                                <td></td> 
                                <td></td> 
                                <td></td> 
                               <td><strong>Total</strong></td>
                                <td></td> 
                               <td><strong><?php echo number_format($rate_total);?></strong></td>
                               <td><strong><?php echo number_format($local_total);?></strong></td>
                               <td><strong><?php echo number_format($vend_total);?></strong></td>
                               <td><strong><?php echo number_format($detention_total);?></strong></td>
                               <td><strong><?php echo number_format($MISC_total);?></strong></td>
                               <td><strong><?php echo number_format($bying_total);?></strong></td>
                               <td><strong><?php echo number_format($tax_total);?></strong></td>
                               <td><strong><?php echo number_format($srb_tax_total);?></strong></td>
                               <td><strong><?php echo number_format($GP_total);?></strong></td>
                               <td><strong><?php echo number_format($admin_c_total);?></strong></td>
                               <td><strong><?php echo number_format($net_profit_total);?></strong></td>
                               <td></td>
                               <td></td>
                               <td></td>
                             </tr>
                           </tfoot>
                     </table>
                  </div>
               </div>

            </form>
            </div>
         </div>
      </div>
      <div style="height: 450px;"></div>
   </div>
   <!-- /.main content -->

<!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<!-- START CORE PLUGINS -->


<script type="text/javascript">
  $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
  });
</script>