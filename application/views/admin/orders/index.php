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
            <h1>View Orders</h1>
            <small> </small>
            <ol class="breadcrumb">
               <li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i> Home</a></li>
               <li class="active">View Orders</li>
            </ol>
         </div>
      </div>
      <!-- /. Content Header (Page header) -->
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-bd">
               <div class="panel-heading">
                  <div class="panel-title">
                     <h4>View Orders</h4>
                     <?php 
                        if ($permission["created"] == "1") {
                        ?>
                     <a href="<?php echo base_url("admin/orders/create") ?>"><button class="btn btn-info pull-right">Create Orders</button></a>
                     <a href="<?php echo base_url("admin/orders/orders_reports") ?>"><button class="btn btn-info pull-right">Report Orders Of Sales Person</button></a>
                     <?php } ?>
                  </div>
               </div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                        <thead>
                           <tr>
                              <th>S#</th>
                              <th>Customer</th>
                              <th>Pickup date and time</th>
                              <th> dropoff date and time</th>
                              <th>Order vehicle</th>
                              <th>Order driver</th>
                              <th>Pickup location</th>
                              <th>Drop off location</th>
                              <th>Order total amount</th>
                              <th>Net Amount</th>
                              <th>Status</th>
                              <?php 
                                 if ($permission["edit"] == "1" || $permission["deleted"] == "1"){
                                 ?>
                              <th>Action</th>
                              <?php } ?>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              $s_number = 1;
                              foreach ($orders as $module) {
                           ?>
                           <tr>
                              <td><?php echo $s_number++;  ?></td>
                              <td><?php echo $module['full_name']; ?></td>
                              <td><?php echo $module['pickup_date_and_time']; ?></td>
                              <td><?php echo $module['dropoff_date_and_time']; ?></td>
                              <td><?php echo $module["registration_number"] ?></td>
                              <td><?php echo $module["driver_name"] ?></td>
                              <td><?php echo $module["pickup_location"] ?></td>
                              <td><?php echo $module["drop_off_location"] ?></td>
                              <td><?php echo $module["order_total_amount"] ?></td>
                              <td><?php echo $module["net_amount"] ?></td>
                              <td><?php echo $module["order_status"] ?></td>
                              <?php 
                                 if ($permission["edit"] == "1" || $permission["deleted"] == "1"){
                                 ?>
                              <td>
                                 <?php 
                                    if ($permission["edit"] == "1") {
                                    ?>
                                 <a href="<?php echo base_url() ?>admin/orders/edit/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/record1.png" title="View Order" alt="View Order" width="35" height="35"></a>
                                 <?php } ?>
                                 <?php 
                                    if ($permission["deleted"] == "1") {
                                    ?>
                                 <a href="<?php echo base_url() ?>admin/orders/delete/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/d-icon.png" title="Delete" alt="Delete" width="35" height="35"></a>
                                 <?php } ?>
                                 <?php if ($user_type == 1) { ?>
                                 <a href="<?php echo base_url() ?>admin/orders/process_of_order_by_admin/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/c-icon.png" title="process by admin" alt="process by admin" width="35" height="35"></a>
                                 <?php } ?>

                                 <a href="<?php echo base_url() ?>admin/orders/add_expense_of_order/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/c-icon.png" title="Add Expense" alt="Add Expense" width="35" height="35"></a>


                              </td>
                              <?php } ?>
                           </tr>
                           <?php } ?>
                        </tbody>
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
<!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<!-- START CORE PLUGINS -->