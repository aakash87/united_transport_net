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
                              <label for="example-text-input" class="col-sm-3 col-form-label">Full Name</label>
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
                              <label for="example-text-input" class="col-sm-3 col-form-label">Sales Person <?php echo $customer["sales_person"];?><span class="required">*</span></label>
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
                              <label for="example-text-input" class="col-sm-3 col-form-label">Tax (%)</label>
                              <div class="col-sm-9">
                                 <input type="" class="form-control" name="tax" value="<?php echo $customer['tax']; ?>" >
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">srb tax (%) </label>
                              <div class="col-sm-9">
                                 <input type="" class="form-control" name="srb_tax" value="<?php echo $customer['srb_tax']; ?>" >
                              </div>
                           </div>
                           

                            <div class="form-group row">
                              <label for="" class="col-sm-3 col-form-label">SSP</label>
                              <div class="col-sm-9">
                                 <div class="radio radio-danger">
                                    <input type="radio" name="SSP_tax" class="SSP_tax" id="ssp_yes" value="1" <?php echo ($customer["SSP_tax"] ==  1) ? 'checked': NULL;  ?>>
                                    <label for="ssp_yes">Yes</label>
                                 </div>
                                 <div class="radio radio-danger">
                                    <input type="radio" name="SSP_tax" id="ssp_no" class="SSP_tax" value="0"  <?php echo ($customer["SSP_tax"] ==  0) ? 'checked': NULL;  ?>>
                                    <label for="ssp_no">No</label>
                                 </div>
                              </div>
                           </div> 
                          
                           
                           <div class="form-group row ssp_tax_val_div "  <?php echo ($customer["SSP_tax"] ==  0) ? 'style="display: none;"': NULL;  ?> >
                              <label for="" class="col-sm-3 col-form-label">SSP Amoun (%)</label>
                              <div class="col-sm-9">
                                 <input type="" class="form-control ssp_tax_val" name="ssp_tax_val" value="<?php echo $customer["ssp_tax_val"] ?>" >
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