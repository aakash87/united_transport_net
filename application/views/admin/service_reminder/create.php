<!-- /.Navbar  Static Side -->
<div class="control-sidebar-bg"></div>
<!-- Page Content -->
<div id="page-wrapper">
   <!-- main content -->
   <div class="content">
      <!-- Content Header (Page header) -->
      <div class="content-header">
         <div class="header-icon">
            <i class="pe-7s-note2"></i>
         </div>
         <div class="header-title">
            <h1>Add Service reminder</h1>
            <small></small>
            <ol class="breadcrumb">
               <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
               <li class="active">Add Service reminder</li>
            </ol>
         </div>
      </div>
      <!-- /. Content Header (Page header) -->
      <form method="post" action="<?php echo base_url() ?>admin/service_reminder/insert" enctype="multipart/form-data">
         <div class="row">
            <div class="col-sm-12">
               <div class="panel panel-bd ">
                  <div class="panel-heading">
                     <div class="panel-title">
                        <h4>Add Service reminder</h4>
                     </div>
                  </div>
                  <div class="panel-body">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Description</label>
                              <div class="col-sm-9"><textarea class="form-control" name="description" ></textarea></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Time interval</label>
                              <div class="col-sm-9"><input class="form-control" name="time_interval" type="text" value="" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Meter interval</label>
                              <div class="col-sm-9"><input class="form-control" name="meter_interval" type="text" value="" id="example-text-input" placeholder="" ></div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Show reminder</label>
                              <div class="col-sm-9"><input class="form-control" name="show_reminder" type="text" value="" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Show reminder meter</label>
                              <div class="col-sm-9"><input class="form-control" name="show_reminder_meter" type="text" value="" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-12">
                                 <button type="submit" class="btn btn-primary pull-right">Add</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>
</div>
<!-- /.main content -->
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- START CORE PLUGINS -->