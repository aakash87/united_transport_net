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
                
             
               <div class="panel-body">
                  <div class="table-responsive">
                     <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                        <thead>
                           <tr>
                              <th>S#</th>
                              <th>registration_number</th>
                              <th>Description</th>
                              <th>Date of Reminder</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              $s_number = 1;
                              foreach ($get_service_reminder as $module) {
                              ?>
                           <tr>
                              
                             
                              <td><?php echo  $s_number++; ?></td>
                              <td><?php echo $module["registration_number"] ?></td>
                              <td><?php echo $module["description"] ?></td>
                              <td><?php echo $module["date_of_sr"] ?></td>
                            
                             
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