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
            <h1>Edit Customer</h1>
            <small></small>
            <ol class="breadcrumb">
               <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
               <li class="active">Edit Customer</li>
            </ol>
         </div>
      </div>
      <!-- /. Content Header (Page header) -->
      <form method="post" action="<?php echo base_url() ?>admin/customer/update" enctype="multipart/form-data">
         <input type="hidden" name="id" value="<?php echo $customer["id"] ?>">
         <div class="row">
            <div class="col-sm-12">
               <div class="panel panel-bd ">
                  <div class="panel-heading">
                     <div class="panel-title">
                        <h4>Edit Customer</h4>
                     </div>
                  </div>
                  <div class="panel-body">
                     <div class="row">
                        <div class="col-md-6" >
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Customer Name</label>
                              <div class="col-sm-9"><input class="form-control" name="full_name" type="text" value="<?php echo $customer['full_name'] ?>" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Company Name</label>
                              <div class="col-sm-9"><input class="form-control" name="company_name" type="text" value="<?php echo $customer['company_name'] ?>" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Email</label>
                              <div class="col-sm-9"><input class="form-control" name="email_address" type="text" value="<?php echo $customer['email_address'] ?>" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Phone Number</label>
                              <div class="col-sm-9">
                                 <input class="form-control" name="Phone_Number" type="text" value="<?php echo $customer["Phone_Number"] ?>" id="example-text-input" placeholder="" >
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Address</label>
                              <div class="col-sm-9">
                                 <textarea class="form-control" name="Address" ><?php echo $customer["Address"] ?></textarea>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Sales Person <span class="required">*</span></label>
                              <div class="col-sm-9">
                                 <select class="form-control" name="sales_person" required="">
                                    <option>Select Sales Person </option>
                                    <?php 
                                       foreach ($sales_person as $sp) {
                                       
                                       ?>
                                    <option value="<?php echo $sp['id']; ?>" <?php echo  ($customer["sales_person"]  ==  $sp['id'] ) ? 'selected' : NULL; ?>><?php echo $sp['name']; ?></option>
                                    <?php } ?> 
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6" >
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Commission (%)</label>
                              <div class="col-sm-9">
                                 <input type="" class="form-control" name="sp_commission" value="<?php echo $customer['sp_commission']; ?>" >
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">NTN #</label>
                              <div class="col-sm-9">
                                 <input type="" class="form-control" name="ntn_no" value="<?php echo $customer['ntn_no']; ?>" >
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">STR #</label>
                              <div class="col-sm-9">
                                 <input type="" class="form-control" name="str_no" value="<?php echo $customer['str_no']; ?>" >
                              </div>
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


<script type="text/javascript">
      $('.SSP_tax').change(function(){

          var value = $(this).val();


              if (value ==  1) {
                $('.ssp_tax_val_div').show()
              }  

              if (value == 0) {
                
                $('.ssp_tax_val_div').hide()

                $('.ssp_tax_val').val('');
                     

              }



         });
</script>