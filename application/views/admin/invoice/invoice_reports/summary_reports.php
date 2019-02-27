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
                     <h4>Summary Reports</h4>
                  </div>
               </div>


               <form method="post" action="<?php echo base_url() ?>/admin/invoice/summary_report_invoice" enctype="multipart/form-data">
                 <div class="panel-body">
                    <div class="form-group row" >
                      <div class="col-lg-6"">
              
                        <label for="example-text-input" class="col-sm-4 col-form-label">Sales Person</label>
                                <div class="col-sm-8">
                                    <select class="form-control selectpicker" data-live-search="true" name="select_sales_person" >
                                                  <option value="">Select Sales Person</option><?php foreach ($sales_person as $person) {?>
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
                              <th>Invoice </th>
                              <th>Rate </th>
                              <th>Local Transport</th>
                              <th>Labor Charges C</th>
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
                             foreach ($summary_data as $value) { 
                              $get_expense_data = $this->db->query("SELECT * FROM `order_expense` where order_id='".$value['id']."' ")->result_array();
                              $misc_expense_amount = 0;
                              foreach ($get_expense_data as $data) {
                                  $misc_expense_amount += $data['expense_amount'];
                              }
                          ?>

                          <tr>
                            <?php  // echo '<pre>'; print_r($misc_expense_amount); ?>
                            <td><?php echo $serial_number++; ?></td>
                            <td><?php echo $value['customer_name'];  ?></td>
                            <td><?php echo $newDate = date("d-m-Y", strtotime($value['order_date']));  ?></td>
                            <td><?php echo $value['registration_number'];  ?></td>
                            <td><?php echo $value['vehicle_type'];  ?></td>
                            <td><?php echo $value['builty_num'];  ?></td>
                            <td><?php echo $value['vendor_name'];  ?></td>
                            <td><?php echo $value['pickup_location'];  ?></td>
                            <td><?php echo $value['drop_off_location'];  ?></td>
                            <td><?php echo $value['invoice_voucher_number'];  ?></td>
                            <td><?php echo number_format($value['order_total_amount']);  ?> </td>
                            <td><?php echo number_format($value['local_transport']);  ?></td>
                            <td> 
                              <?php
                              $total_labor_c = 0;
                              $labour_data = $this->db->query("SELECT * FROM `order_labor_charges` where order_id='".$value['id']."' ")->result_array();
                              foreach ($labour_data as $l_data) {
                                $total_labor_c += $l_data['labor_charges_customer'];
                              }
                              
                              ?>
                                <?php echo number_format($total_labor_c);?>
                            </td>
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
                            <td><?php echo $value['order_detention_customer']  ?></td>
                            <td><?php echo number_format($misc_expense_amount);  ?></td>
                            <td><span <span href="#" data-toggle="tooltip" title="Detention <?php echo $value['order_tenstion'];?> + Buying <?php echo $value['baying_assigned_rates'];?>"><?php $total_baying = $value['order_tenstion'] + $value['baying_assigned_rates']; echo number_format($total_baying);  ?></span></td>
                            <td>
                               <?php
                                  $tax_divide_value = $value['tax'] / 100; 
                                  $tax = $value['order_total_amount'] * $tax_divide_value; 
                                ?>
                               <?php echo number_format($tax);  ?> <small>(<?php echo $value['tax']?>%)</small>
                                  
                            </td>
                            <td>
                               <?php 
                                  $srb_divide_value = $value['srb_tax'] / 100; 
                                  echo $srb_val = $value['order_total_amount'] * $srb_divide_value; 
                                ?>
                            </td>
                              <?php $total_incom = $value['order_total_amount'] + $total_labor_c + $value['order_detention_customer'];

                              $total_cost = $total_labor_v + $value['local_transport'] + $total_baying + $misc_expense_amount + $tax +  $srb_val;

                               $gp_total = $total_incom - $total_cost;   ?>


                              <td><?php echo $total_of_gp = number_format($gp_total);  ?></td>
                              <?php
                                $multipul_amount = 25 / 100;
                                
                                $admin_charges = $total_of_gp * $multipul_amount;
                              ?>
                              <td><?php echo number_format($admin_charges); ?></td>
                              <td><?php echo number_format($total_of_gp - $admin_charges);  ?></td>
                              <td>
                                <?php
                                      if ($value['invoice_status'] == 1) {
                                          echo "Received";
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
                                      else{
                                        echo 'Nill';
                                      }
                                   ?>
                                    
                              </td>

                                  
                              </td>
                              
                              <td>
                                <?php if ($value['inv_created'] == 1) {
                                  echo 'Created';
                                }elseif ($value['inv_created'] == 0) {
                                  echo 'Not Created';
                                }  ?>
                                  
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