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
            <h1>View Vehicle</h1>
            <small> </small>
            <ol class="breadcrumb">
               <li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i> Home</a></li>
               <li class="active">View Vehicle</li>
            </ol>
         </div>
      </div>
      <!-- /. Content Header (Page header) -->
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-bd">
               <div class="panel-heading">
                  <div class="panel-title">
                     <h4>View Vehicle</h4>
                     <?php 
                        if ($permission["created"] == "1") {
                        ?>
                     <a href="<?php echo base_url("admin/vehicle/create") ?>"><button class="btn btn-info pull-right">Add Vehicle</button></a>
                     <?php } ?>
                  </div>
               </div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                        <thead>
                           <tr>
                              <th>S#</th>
                              <th>Vehicle maker</th>
                              <th>Vehicle Owner</th>
                              <th>Vehicle Vendor</th>
                              <th>Vehicle engine type</th>
                              <th>Vehicle model</th>
                              <th>Vehicle type</th>
                             
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
                              foreach ($vehicle as $module) {
                              ?>
                           <tr>
                              <td><?php echo $s_number++ ?></td>
                              <td><?php echo $module["vehicle_maker"] ?></td>
                              <td><?php echo $module["owner_full_name"] ?></td>
                              <td><?php echo $module["vendor_name"] ?></td>
                              <td><?php echo $module["engine_number"] ?></td>
                              <td><?php echo $module["vehicle_model"] ?></td>
                              <td><?php echo $module["vehicle_type"] ?></td>
                            
                              <?php 
                                 if ($permission["edit"] == "1" || $permission["deleted"] == "1"){
                                 ?>
                              <td>
                                 <?php 
                                    if ($permission["edit"] == "1") {
                                    ?>
                                 <a href="<?php echo base_url() ?>admin/vehicle/edit/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/record1.png" title="View Order" alt="View Order" width="35" height="35"></a>
                                 <?php } ?>
                                 <?php 
                                    if ($permission["deleted"] == "1") {
                                    ?>
                                 <a href="<?php echo base_url() ?>admin/vehicle/delete/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/d-icon.png" title="Delete" alt="Delete" width="35" height="35"></a>
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
      <div style="height: 450px;"></div>
   </div>
   <!-- /.main content -->
</div>
<!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<!-- START CORE PLUGINS -->