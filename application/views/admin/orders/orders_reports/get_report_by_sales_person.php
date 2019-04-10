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
            <h1>View Sales Person Orders</h1>
            <small> </small>
            <ol class="breadcrumb">
               <li><a href="http://localhost/ubws_system/"><i class="pe-7s-home"></i> Home</a></li>
               <li class="active">View Sales Person Orders</li>
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
                                ?>  Report <?php if ($this->input->server('REQUEST_METHOD') == 'POST') { echo $newDate = date("d-m-Y", strtotime($str_current_day_show)); echo " To "; echo $newDate2 = date("d-m-Y", strtotime($str_last_date_show)); }
                                ?>
                              </h4>
                  </div>
                </div>
                <form method="post" action="<?php echo base_url() ?>admin/orders/get_report_by_sales_person" enctype="multipart/form-data">
                  <div class="panel-body">
                    <div class="col-lg-6" >
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
                </form>
                <div class="panel-body">
                              
                              <div class="table-responsive">
                                  <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                      <thead>
                                          <tr>
                                              <th>S.No</th>
                                              <th>Customer Name</th>
                                              <th>Sales Person</th>
                                              <th>order Total Amount</th>
                                             <!--  <th>Grand Total</th>
                                              <th>Paid</th>
                                              <th>Balance</th>
                                              <th>Payment Status</th>
                                              <th>action</th> -->
                                            
                                              
                                          </tr>
                                      </thead>
                                    <tbody>
                                     <?php
                                         $serial = 1;
                                         $total_amount = 0;
                                         foreach ($order_of_sales as $data ) {
                                      ?>
                                      <tr>
                                        <td><?php echo $serial++; ?></td>
                                        <td><?php echo $data['full_name'] ?></td>
                                        <td><?php echo $data['name'] ?></td>
                                        <td><?php echo $data['order_total_amount'] ?></td>
                                      </tr>
                                    <?php $total_amount += $data['order_total_amount'] ; } ?>
                                    <tfoot>
                                      <tr>
                                        <td><strong>Total</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td><strong><?php echo $total_amount; ?></strong></td>
                                      </tr>
                                    </tfoot>
                                        
                                        
                                          
                                      </tbody>
                                      <tfoot>
                                        
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