<style type="text/css">
  .dropdown-menu.open {
    z-index: 999 !important;
}
</style>
<div id="page-wrapper" style="min-height: 543px;">
   <!-- main content -->
   <div class="content">
      <!-- Content Header (Page header) -->
      <div class="content-header">
         <div class="header-icon">
            <i class="pe-7s-box1"></i>
         </div>
         <div class="header-title">
            <h1>Vehicle Profit Reports <?php print_r($vehicel_id_sele); ?> | <?php echo $date_input; ?> </h1>
            <small> </small>
            <ol class="breadcrumb">
               <li><a href=""><i class="pe-7s-home"></i> Home</a></li>
               <li class="active">Vehicle Profit Reports</li>
            </ol>
         </div>
      </div>
      <!-- /. Content Header (Page header) -->
     <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-bd">
                <div class="panel-heading">
                  <div class="panel-title">
                    <h4>VIew Detail</h4>
                  </div>
                </div>
                <form method="post" action="<?php echo base_url() ?>admin/reports/vehicel_reports_profit" enctype="multipart/form-data">
                  <div class="panel-body">
                    <div class="form-group row" >
                      <div class="col-lg-6"">
              
                        <label for="example-text-input" class="col-sm-4 col-form-label">Select Vehicle</label>
                                <div class="col-sm-8">
                                   <select class="form-control selectpicker" data-live-search="true" name="select_vehicel" >
                                      <option value="">Select Vehicle </option><?php foreach ($vehicels as $veh) {?>
                                          <option value="<?php echo $veh["id"] ?>"><?php echo $veh["registration_number"] ?></option>
                                     <?php } ?></select>
                                </div>

                      </div>
                      

                      <div class="col-lg-4" >
                        
                         <label for="example-text-input" class="col-sm-4 col-form-label">Select Date</label>
                        
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
                <div class="panel-body">
                              
                              <div class="table-responsive">
                                  <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                      <thead>
                                          <tr>
                                              <th>S.No</th>
                                              <th>Customer Name</th>
                                              <th>Origin</th>
                                              <th>Destination</th>
                                              <th>Sale Amount</th>
                                              <th>Return Amount</th>
                                              <th>Expenses</th>
                                              <th>Profit</th>
                                          </tr>
                                      </thead>
                                    <tbody>
                                      <?php 
                                        
                                        $total_amout_count = 0; 
                                        $expense_amount_total = 0;
                                        $return_amount_total = 0;
                                        $serail_num = 0;
                                        $profit_amount = 0;

                                      ?>
                                      <?php foreach ($order_veh_details as $order_veh) : ?>
                                          <?php

                                               $get_expense_data = $this->db->query("SELECT * FROM `order_expense` where order_id='".$order_veh['id']."' ")->result_array();

                                                $second_stop  = $this->db->query("SELECT * FROM `order_second_stop` where second_stop_order_id='".$order_veh['id']."' ")->result_array();

                                                // echo '<pre>'; print_r($get_expense_data);
                                                $count_value = 0;
                                                foreach ($get_expense_data as $value) {

                                                 // echo '<pre>'; print_r($value);
                                                    $count_value += $value['expense_amount'];
                                                   
                                                }


                                                $second_stop_count = 0;
                                                foreach ($second_stop as $second) {

                                                 // echo '<pre>'; print_r($value);
                                                    $second_stop_count += $second['sec_stop_amount'];
                                                   
                                                }
                                          ?>
                                       <tr>
                                              <td><?php echo $serail_num++; ?></td>
                                              <td><?php echo $order_veh['full_name']; ?></td>
                                              <td><?php echo $order_veh['pickup_location']; ?></td>
                                              <td><?php echo $order_veh['drop_off_address']; ?></td>
                                              <td>
                                                <?php echo number_format($order_veh['order_total_amount']); ?>

                                                <?php $total_amout_count += $order_veh['order_total_amount']; ?>
                                                  
                                              </td>
                                              
                                              <td><?php echo number_format($second_stop_count); ?></td>
                                              
                                              <?php $return_amount_total += $second_stop_count ?>
                                              
                                              <td><?php echo number_format($count_value); ?></td>
                                              
                                              <?php $expense_amount_total += $count_value; ?>
                                              
                                              <td><?php 
                                                $sale_amount = $order_veh['order_total_amount'];
                                                $amout_second_stop_count = $second_stop_count;

                                                $round_amout = $sale_amount - $amout_second_stop_count;

                                                echo  number_format($round_amout);
                                                
                                               $profit_amount+=  $round_amout ;

                                              ?>
                                                

                                              </td>
                                          </tr>
                                      <?php endforeach; ?>
                                        
                                        
                                          
                                      </tbody>
                                      <tfoot>

                                         <tr style="background: #b5b9bf;">
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td>Total</td>
                                              <td><?php echo number_format($total_amout_count); ?> </td>
                                              <td><?php echo number_format($return_amount_total); ?></td>
                                              <td><?php echo number_format($expense_amount_total); ?></td>
                                              <td>
                                                <?php echo $profit_amount; ?>
                                              </td>
                                          </tr>
                                        
                                      </tfoot>
                                  </table>
                                  
                              </div>
                  </div>
              </div>
            </div>
          </div>
      <div style="height: 450px;"></div>
   </div>
   <!-- /.main content -->
</div>