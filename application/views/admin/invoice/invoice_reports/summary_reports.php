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
              
                        <label for="example-text-input" class="col-sm-4 col-form-label">Select Sales Person</label>
                                <div class="col-sm-8">
                                    <select class="form-control selectpicker" data-live-search="true" name="select_sales_person" >
                                                  <option>Select Sales Person</option><?php foreach ($sales_person as $person) {?>
                                                      <option value="<?php echo $person["id"] ?>"><?php echo $person["name"] ?></option>
                                                 <?php } ?></select>
                                </div>

                      </div>
                      

                      <div class="col-lg-4" >
                        
                         <label for="example-text-input" class="col-sm-4 col-form-label">Date Picker</label>
                        
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
                              <th>Labor Charges </th>
                              <th>MISC EXP</th>
                              <th>Vehicle Bying</th>
                              <th>Tax</th>
                              <th>SBR Tax</th>
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
                            
                             $serial_number = 0;
                             foreach ($summary_data as $value) { 

                                $get_expense_data = $this->db->query("SELECT * FROM `order_expense` where order_id='".$value['id']."' ")->result_array();

                                //echo '<pre>'; print_r($value);

                                $misc_expense_amount = 0;
                                foreach ($get_expense_data as $data) {

                                  // echo '<pre>'; print_r($value);
                                    $misc_expense_amount += $data['expense_amount'];
                                   
                                }


                           ?>

                           <tr>
                              <?php
                                // echo '<pre>'; print_r($misc_expense_amount);
                              ?>
                              
                           
                              <td><?php echo $serial_number++; ?></td>
                              <td><?php echo $value['customer_name'];  ?></td>
                              <td><?php echo $value['order_date'];  ?></td>
                              <td><?php echo $value['registration_number'];  ?></td>
                              <td><?php echo $value['vehicle_type'];  ?></td>
                              <td>Builty</td>
                              <td><?php echo $value['vendor_name'];  ?></td>
                              <td><?php echo $value['pickup_location'];  ?></td>
                              <td><?php echo $value['drop_off_location'];  ?></td>
                              <td>Invoice </td>
                              <td><?php echo $value['order_total_amount'];  ?> </td>
                              <td><?php echo $value['local_transport'];  ?></td>
                              <td><?php echo $value['labor_charges'];  ?> </td>
                              <td><?php echo $misc_expense_amount;  ?></td>
                              <td><?php echo $value['vehicle_bying'];  ?></td>
                              <td>
                                 <?php
                                    $tax_divide_value = $value['tax'] / 100; 
                                    $tax = $value['order_total_amount'] * $tax_divide_value; 
                                  ?>
                                 <?php echo $tax;  ?>
                                    
                              </td>
                              <td>
                                
                               

                                 <?php 
                                    $srb_divide_value = $value['srb_tax'] / 100; 
                                    echo $srb_val = $value['order_total_amount'] * $srb_divide_value; 


                                  ?>
                                    
                              </td>

                              <?php $gp_total = $value['order_total_amount'] -  $value['labor_charges'] - $value['vehicle_bying'] - $tax -  $srb_val;   ?>


                              <td><?php echo $total_of_gp =  $gp_total;  ?></td>
                              <?php
                                $multipul_amount = 25 / 100;
                                
                                $admin_charges = $total_of_gp * $multipul_amount;
                              ?>
                              <td><?php echo $admin_charges; ?></td>
                              <td><?php echo $total_of_gp - $admin_charges;  ?></td>
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
                                          echo $value['invoice_paid_date'];
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
</div>
<!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<!-- START CORE PLUGINS -->


