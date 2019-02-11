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
            <h1>View Service reminder</h1>
            <small> </small>
            <ol class="breadcrumb">
               <li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i> Home</a></li>
               <li class="active">View Service reminder</li>
            </ol>
         </div>
      </div>
      <!-- /. Content Header (Page header) -->
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-bd">
               <div class="panel-heading">
                  <div class="panel-title">
                     <h4>View Service reminder</h4>
                     <?php 
                        if ($permission["created"] == "1") {
                        ?>
                     <a href="<?php echo base_url("admin/service_reminder/create") ?>"><button class="btn btn-info pull-right">Add Service reminder</button></a>
                     <?php } ?>

                     <a href="<?php echo base_url("admin/service_reminder/view_service_reminder") ?>"><button class="btn btn-info pull-right">View Service Reminder</button></a>
                  </div>
               </div>
               <form method="post" action="<?php echo base_url() ?>admin/service_reminder/service_reminder_insert" enctype="multipart/form-data">
                  <div class="panel-body">
                     <div class="form-group row" >
                        <div class="col-lg-6"">
                           <label for="example-text-input" class="col-sm-4 col-form-label">Select  Vehicel</label>
                           <div class="col-sm-8">
                              <select class="form-control selectpicker" data-live-search="true" name="select_vehicel" >
                                 <option>Select Vehicel </option>
                                 <?php foreach ($vehicels as $veh) {?>
                                 <option value="<?php echo $veh["id"] ?>"><?php echo $veh["registration_number"] ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="form-group col-lg-2">
                           
                        </div>
                     </div>
                  </div>
             
               <div class="panel-body">
                  <div class="table-responsive">
                     <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                        <thead>
                           <tr>

                              <th></th>
                              <th>S#</th>
                              
                              <th>Description</th>
                              <th>Time interval</th>
                              <th>Meter interval</th>
                              <th>Show reminder</th>
                              <th>Show reminder meter</th>
                              <?php 
                                 if ($permission["edit"] == "1" || $permission["deleted"] == "1"){
                                 ?>
                              <th>Action</th>
                              <?php } ?>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              foreach ($service_reminder as $module) {
                              ?>
                           <tr>
                           	
                              <td>
                             	<input type="checkbox" class="add_check" name="id[]" value="<?php echo $module['id'] ?>"> 	
                              </td>
                              <td><?php echo $module["id"] ?></td>
                              <td><?php echo $module["description"] ?></td>
                              <td>     
                              
                                 <?php echo $module["time_interval"] ?>
                                 <input type="hidden" name="time_interval[]" value="<?php echo $module["time_interval"] ?>">
                                    
                              </td>
                              <td><?php echo $module["meter_interval"] ?></td>
                              <td><?php echo $module["show_reminder"] ?></td>
                              <td><?php echo $module["show_reminder_meter"] ?></td>
                              <?php 
                                 if ($permission["edit"] == "1" || $permission["deleted"] == "1"){
                                 ?>
                              <td>
                                 <?php 
                                    if ($permission["edit"] == "1") {
                                    ?>
                                 <a href="<?php echo base_url() ?>admin/service_reminder/edit/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/record1.png" title="View Order" alt="View Order" width="35" height="35"></a>
                                 <?php } ?>
                                 <?php 
                                    if ($permission["deleted"] == "1") {
                                    ?>
                                 <a href="<?php echo base_url() ?>admin/service_reminder/delete/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/d-icon.png" title="Delete" alt="Delete" width="35" height="35"></a>
                                 <?php } ?>
                              </td>
                              <?php } ?>
                           </tr>
                           <?php } ?>
                        </tbody>
                     </table>
                  </div>
               </div>

               <button type="submit" id="customer_report_by_dateID" class="btn btn-success w-md m-b-5 m-t-5">Submit</button>
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