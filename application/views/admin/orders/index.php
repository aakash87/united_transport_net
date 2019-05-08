<style type="text/css">
   .ovel_css{
          margin-right: 11px;
    border-radius: 15px;
    background-color: green;
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
                    
                     <a href="<?php echo base_url("admin/orders/create") ?>"><button class="btn btn-info pull-right ovel_css">Create Orders</button></a>
                     <a href="<?php echo base_url("admin/orders/orders_reports") ?>"><button class="btn btn-info pull-right ovel_css">Order Report</button></a>
                     <?php } ?>
                     <h4 class="pull-right">Go To <i class="glyphicon glyphicon-arrow-right"></i></h4>
                  </div>
               </div>
               <div class="panel-body">
                  <div class="table-responsive"  style="height: 70vh !important;">
                     <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                        <thead>
                           <tr>
                              <th>S.no</th>
                              <th>Customer</th>
                              <th>Loading Date/Time</th>
                              <th>Dropoff Date/Time</th>
                              <th>Order Vehicle</th>
                              <th>Order Vendor</th>
                              <th>Origin</th>
                              <th>Destination</th>
                              <th>Builty #</th>
                              <th>Local Transport</th>
                              <th>Second Stop</th>
                              <th>Detention C</th>
                              <th>Order Amount</th>
                              <th>Net Amount</th>
                              <th>Status</th>
                              <?php 
                                 if ($permission["edit"] == "1" || $permission["deleted"] == "1"){
                                 ?>
                              <th>Action<span style="visibility: hidden;">dsdsa</span></th>
                              <?php } ?>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              $s_number = count($orders);
                              foreach ($orders as $module) {
                           ?>
                           <tr>
                              <td><?php echo $s_number--;  ?></td>
                              <td><?php echo $module['full_name']; ?></td>
                              <td><?php echo $newDate = date("d-m-Y", strtotime($module['pickup_date_and_time'])); ?></td>
                              <td><?php echo $newDate = date("d-m-Y", strtotime($module['dropoff_date_and_time'])); ?></td>
                              <td><?php $get_expense_data = $this->db->query("SELECT * FROM `vehicle` where id='".$module["vehicel_of_vendor"]."' ")->row_array(); echo  $get_expense_data['registration_number'];
                               ?></td>
                              <td><?php $get_vendor_data = $this->db->query("SELECT * FROM `vendor` where id='".$module["order_vendor_id"]."' ")->row_array(); echo  $get_vendor_data['vendor_name'];
                                ?></td>
                              <td><?php echo $module["pickup_location"] ?></td>
                              <td><?php echo $module["drop_off_location"] ?></td>
                              <td><?php echo $module["builty_num"] ?></td>
                              <td><?php echo $module["local_transport"] ?></td>
                              <td><?php $second_stop = $this->db->query("SELECT * FROM `order_second_stop` where second_stop_order_id='".$module['id']."' ")->result_array();
                              $total_amount_of_s_stop = 0;
                              foreach ($second_stop as $s_stop) {
                                $s_stop['sec_stop_amount'];
                               $total_amount_of_s_stop += $s_stop['sec_stop_amount'];
                               };
                              ?><span href="#" data-toggle="tooltip" title="<?php echo count($second_stop);?> Second Stop On This Order"> <?php echo $total_amount_of_s_stop; ?></span></td>
                              <td><?php echo number_format($module["order_detention_customer"]) ?></td>
                              <td><?php echo number_format($module["order_total_amount"]) ?></td>
                              <td><?php echo number_format($module["net_amount"]); ?></td>
                              <td><?php echo $module["order_status"] ?></td>
                              <?php 
                                 if ($permission["edit"] == "1" || $permission["deleted"] == "1"){
                                 ?>
                              <td>
                                 <?php 
                                    if ($permission["edit"] == "1") {
                                    ?>
                                 <a href="<?php echo base_url() ?>admin/orders/edit/<?php echo $module["id"] ?>"><img style="height: 20px; width: 20px;" src="<?php echo base_url() ?>assets/record1.png" title="Edit" alt="Edit" width="35" height="35"></a>
                                 <?php } ?>
                                 <?php 
                                    if ($permission["deleted"] == "1") {
                                    ?>
                                 <a href="<?php echo base_url() ?>admin/orders/add_expense_of_order/<?php echo $module["id"] ?>"><img style="height: 20px; width: 20px;" src="<?php echo base_url() ?>assets/img/add.png" title="Add Expense" alt="Add Expense" width="25" height="25"></a>
                                 <?php if ($user_type == 1) { ?>
                                 <a href="<?php echo base_url() ?>admin/orders/process_of_order_by_admin/<?php echo $module["id"] ?>"><img style="height: 20px; width: 20px;" src="<?php echo base_url() ?>assets/c-icon.png" title="process by admin" alt="process by admin" width="25" height="25"></a>
                                 <a href="<?php echo base_url() ?>admin/orders/view_order_detail/<?php echo $module["id"] ?>"><img style="height: 20px; width: 20px;" src="<?php echo base_url() ?>assets/record1.png" title="View Order Detail" alt="View Order Detail" width="25" height="25"></a>
                                 <?php } ?>
                                 <img src="<?php echo base_url() ?>assets/d-icon.png" title="Delete" alt="Delete" width="25" height="25" class="delete" id='del_<?php echo $module["id"] ?>' >
                                 
                                <!--  <a href="<?php echo base_url() ?>admin/orders/delete/<?php echo $module["id"] ?>"><img style="height: 20px; width: 20px;" src="<?php echo base_url() ?>assets/d-icon.png" title="Delete" alt="Delete" width="35" height="35"></a> -->
                               <!--  <a href="<?php echo base_url() ?>admin/orders/delet_all_data/<?php echo $module["id"] ?>">delet</a> -->
                                 <?php } ?>
                                 
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
   <!-- /.main content -->
</div>
<!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<!-- START CORE PLUGINS -->
<script type="text/javascript">
   $(document).ready(function(){

     // Delete 
     $('.delete').click(function(){
       var el = this;
       var id = this.id;
       var splitid = id.split("_");

       // Delete id
       var deleteid = splitid[1];
      // alert(deleteid);
       // Confirm box
       bootbox.confirm("Are you sure want to delete?", function(result) {
    
          if(result){

             $.ajax({
                type: 'POST',
                  data: { id:deleteid },
                url: '<?php echo base_url() ?>admin/orders/delete_order/',
                success: function(resp){
                   $(el).closest('tr').css('background','tomato');
                   $(el).closest('tr').fadeOut(800, function(){ 
                     $(this).remove();
                   });

                

                     
                   
                }
            });
          }
    
       });
    
     });
   });
   $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>