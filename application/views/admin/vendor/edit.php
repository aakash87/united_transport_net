

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
            <h1>Edit Vendor</h1>
            <small></small>
            <ol class="breadcrumb">
               <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
               <li class="active">Edit Vendor</li>
            </ol>
         </div>
      </div>
      <!-- /. Content Header (Page header) -->
      <form method="post" action="<?php echo base_url() ?>admin/vendor/update" enctype="multipart/form-data">
         <input type="hidden" name="id" value="<?php echo $vendor["id"] ?>">
         <div class="row">
            <div class="col-sm-12">
               <div class="panel panel-bd ">
                  <div class="panel-heading">
                     <div class="panel-title">
                        <h4>Edit Vendor</h4>
                     </div>
                  </div>
                  <div class="panel-body">
                     <div class="row" >
                        <div class="col-md-6">
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Vendor Name</label>
                              <div class="col-sm-9">
                                 <input class="form-control" name="vendor_name" type="text" value="<?php echo $vendor["vendor_name"] ?>" id="example-text-input" placeholder="" >
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Company Name</label>
                              <div class="col-sm-9">
                                 <input class="form-control" name="company_name" type="text" value="<?php echo $vendor["company_name"] ?>" id="example-text-input" placeholder="" >
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Vendor Address</label>
                              <div class="col-sm-9">
                                 <input class="form-control" name="vendor_address" type="text" value="<?php echo $vendor["vendor_address"] ?>" id="example-text-input" placeholder="" >
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Vendor Contact</label>
                              <div class="col-sm-9">
                                 <input class="form-control" name="vendor_contact" type="text" value="<?php echo $vendor["vendor_contact"] ?>" id="example-text-input" placeholder="" >
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Vendor Create Date</label>
                              <div class="col-sm-9">
                                 <input class="form-control" name="vendor_create_date" type="text" value="<?php echo $vendor["vendor_create_date"] ?>" id="example-text-input" placeholder="" >
                              </div>
                           </div>
                           <div class="form-group row">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="col-sm-12">
                              <div class="form-group row">
                                 <label for="" class="col-sm-3 col-form-label">Special Person</label>
                                 <div class="col-sm-9">
                                    <div class="radio radio-danger">
                                       <input type="radio" name="special_person" class="special_person" id="special_person_yes" value="1" <?php echo ($vendor["special_person"] == 1) ? 'checked': NULL;  ?> >
                                       <label for="special_person_yes">Yes</label>
                                    </div>
                                    <div class="radio radio-danger">
                                       
                                       <input type="radio" name="special_person" id="special_person_no" class="special_person" value="0"  <?php echo ($vendor["special_person"] ==  0) ? 'checked': NULL;  ?>>
                                     
                                       <label for="special_person_no">No</label>
                                    </div>
                                 </div>
                              </div>
                              <button type="submit" class="btn btn-primary pull-right">Update</button>
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