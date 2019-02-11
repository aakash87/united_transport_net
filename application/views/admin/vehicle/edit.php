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
            <h1>Edit Vehicle</h1>
            <small></small>
            <ol class="breadcrumb">
               <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
               <li class="active">Edit Vehicle</li>
            </ol>
         </div>
      </div>
      <!-- /. Content Header (Page header) -->
      <form method="post" action="<?php echo base_url() ?>admin/vehicle/update" enctype="multipart/form-data">
         <input type="hidden" name="id" value="<?php echo $vehicle["id"] ?>">
         <div class="row">
            <div class="col-sm-12">
               <div class="panel panel-bd ">
                  <div class="panel-heading">
                     <div class="panel-title">
                        <h4>Edit Vehicle</h4>
                     </div>
                  </div>
                  <div class="panel-body">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle maker</label>
                              <div class="col-sm-9"><input class="form-control" name="vehicle_maker" type="text" value="<?php echo $vehicle["vehicle_maker"] ?>" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle model</label>
                              <div class="col-sm-9"><input class="form-control" name="vehicle_model" type="text" value="<?php echo $vehicle["vehicle_model"] ?>" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle type</label>
                              <div class="col-sm-9"><input class="form-control" name="vehicle_type" type="text" value="<?php echo $vehicle["vehicle_type"] ?>" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle Buying</label>
                              <div class="col-sm-9"><input class="form-control" name="vehicle_bying" type="text" value="<?php echo $vehicle["vehicle_bying"] ?>" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Color</label>
                              <div class="col-sm-9"><input class="form-control" name="Color" type="text" value="<?php echo $vehicle["Color"] ?>" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle CC</label>
                              <div class="col-sm-9"><input class="form-control" name="vehicle_cc" type="text" value="<?php echo $vehicle["vehicle_cc"] ?>" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle year</label>
                              <div class="col-sm-9"><input class="form-control" name="vehicle_year" type="text" value="<?php echo $vehicle["vehicle_year"] ?>" id="example-text-input" placeholder="" ></div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Reg Number</label>
                              <div class="col-sm-9"><input class="form-control" name="registration_number" type="text" value="<?php echo $vehicle["registration_number"] ?>" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Engine Number</label>
                              <div class="col-sm-9"><input class="form-control" name="engine_number" type="text" value="<?php echo $vehicle["engine_number"] ?>" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Chassis Number</label>
                              <div class="col-sm-9"><input class="form-control" name="chassis_number" type="text" value="<?php echo $vehicle["chassis_number"] ?>" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Owner Name</label>
                              <div class="col-sm-9">
                                 <!-- <input class="form-control" name="ower_id" type="text" value="" d="example-text-input" placeholder="" > -->
                                 <select class="form-control" name="ower_id"  value="" id="example-text-input" >
                                    <option value="">Select Driver</option>
                                    <?php foreach ($vehicel_owner as $owner) : ?>
                                    <option value="<?php echo $owner['id'] ?>"  <?php echo  ($owner['id'] == $vehicle['ower_id']) ? 'selected' : NULL ;  ?>><?php echo $owner['owner_full_name'] ?></option>
                                    <?php endforeach; ?>    
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Vendor Name</label>
                              <div class="col-sm-9">
                                 <!-- <input class="form-control" name="ower_id" type="text" value="" d="example-text-input" placeholder="" > -->
                                 <select class="form-control" name="vendor_id"  value="" id="example-text-input" >
                                    <option value="">Select Vendor</option>
                                    <?php foreach ($vendor as $vend) : ?>
                                    <option value="<?php echo $vend['id'] ?>" <?php echo  ($vend['id'] == $vehicle['vendor_id']) ? 'selected' : NULL ;  ?>><?php echo $vend['vendor_name'] ?></option>
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
                                    <option value="<?php echo $driver['id'] ?>" <?php echo  ($driver['id'] == $vehicle['vehicle_driver']) ? 'selected' : NULL ;  ?>><?php echo $driver['First_Name'] ?></option>
                                    <?php endforeach; ?>    
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle image</label>
                              <div class="col-sm-9"><input class="form-control" name="vehicle_image" type="text" value="<?php echo $vehicle["vehicle_image"] ?>" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-12">
                                 <button type="submit" class="btn btn-primary pull-right">Update</button>
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