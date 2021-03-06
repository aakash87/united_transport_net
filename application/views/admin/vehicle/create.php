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
            <h1>Add Vehicle</h1>
            <small></small>
            <ol class="breadcrumb">
               <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
               <li class="active">Add Vehicle</li>
            </ol>
         </div>
      </div>
      <!-- /. Content Header (Page header) -->
      <form method="post" action="<?php echo base_url() ?>admin/vehicle/insert" enctype="multipart/form-data">
         <div class="row">
            <div class="col-sm-12">
               <div class="panel panel-bd ">
                  <div class="panel-heading">
                     <div class="panel-title">
                        <h4>Add Vehicle</h4>
                     </div>
                  </div>
                  <div class="panel-body">
                     <div class="row">
                        <div class="col-md-6" >
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle Maker</label>
                              <div class="col-sm-9"><input class="form-control" name="vehicle_maker" type="text" value="" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle Model</label>
                              <div class="col-sm-9"><input class="form-control" name="vehicle_model" type="text" value="" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle Type</label>
                              <div class="col-sm-9"><input class="form-control" name="vehicle_type" type="text" value="" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle Buying</label>
                              <div class="col-sm-9"><input class="form-control" name="vehicle_bying" type="text" value="" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Color</label>
                              <div class="col-sm-9"><input class="form-control" name="Color" type="text" value="" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle CC</label>
                              <div class="col-sm-9"><input class="form-control" name="vehicle_cc" type="text" value="" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle Year</label>
                              <div class="col-sm-9"><input class="form-control" name="vehicle_year" type="text" value="" id="example-text-input" placeholder="" ></div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle Number</label>
                              <div class="col-sm-9"><input class="form-control" name="registration_number" type="text" value="" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Engine Number</label>
                              <div class="col-sm-9"><input class="form-control" name="engine_number" type="text" value="" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Chassis Number</label>
                              <div class="col-sm-9"><input class="form-control" name="chassis_number" type="text" value="" id="example-text-input" placeholder="" ></div>
                           </div>
                           
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Vendor Name</label>
                              <div class="col-sm-9">
                                 <!-- <input class="form-control" name="ower_id" type="text" value="" d="example-text-input" placeholder="" > -->
                                 <select class="form-control" name="vendor_id"  value="" id="example-text-input" >
                                    <option value="">Select Vendor</option>
                                    <?php foreach ($vendor as $vend) : ?>
                                    <option value="<?php echo $vend['id'] ?>"><?php echo $vend['vendor_name'] ?></option>
                                    <?php endforeach; ?>    
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Driver</label>
                              <div class="col-sm-9">
                                 <!--     <input class="form-control" name="vehicle_driver" type="text" value="" id="example-text-input" placeholder="" > -->
                                 <select class="form-control" name="vehicle_driver"  value="" id="example-text-input" >
                                    <option value="">Select Driver</option>
                                    <?php foreach ($drivers as $driver) : ?>
                                    <option value="<?php echo $driver['id'] ?>"><?php echo $driver['First_Name'] ?></option>
                                    <?php endforeach; ?>    
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle Image</label>
                              <div class="col-sm-9"><input class="form-control" name="vehicle_image" type="file" value="" id="example-text-input" placeholder="" ></div>
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