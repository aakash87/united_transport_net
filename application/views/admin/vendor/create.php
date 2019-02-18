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
            <h1>Add Vendor</h1>
            <small></small>
            <ol class="breadcrumb">
               <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
               <li class="active">Add Vendor</li>
            </ol>
         </div>
      </div>
      <!-- /. Content Header (Page header) -->
      <form method="post" action="<?php echo base_url() ?>admin/vendor/insert" enctype="multipart/form-data">
         <div class="row">
            <div class="col-sm-12">
               <div class="panel panel-bd ">
                  <div class="panel-heading">
                     <div class="panel-title">
                        <h4>Add Vendor</h4>
                     </div>
                  </div>
                  <div class="panel-body">
                     <div class="row" >
                        <div class="col-md-6" >
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Vendor Name</label>
                              <div class="col-sm-9"><input class="form-control" name="vendor_name" type="text" value="" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Company Name</label>
                              <div class="col-sm-9"><input class="form-control" name="company_name" type="text" value="" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Vendor Address</label>
                              <div class="col-sm-9"><input class="form-control" name="vendor_address" type="text" value="" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Vendor Contact</label>
                              <div class="col-sm-9"><input class="form-control" name="vendor_contact" type="text" value="" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Vendor Creation Date</label>
                              <div class="col-sm-9"><input class="form-control" name="vendor_create_date" type="date" value="" id="example-text-input" placeholder="" ></div>
                           </div>
                        </div>
                        <div class="col-md-6" >
                           <div class="form-group row">
                              <label for="" class="col-sm-3 col-form-label">Special Person</label>
                              
                               
                              <div class="col-sm-9">
                                <div style="margin-top: 15px;">
                                   <div class="radio radio-info radio-inline">
                                       <input type="radio" name="special_person" class="special_person" id="special_person_yes" value="1">
                                    <label for="special_person_yes">Yes</label>
                                   </div>
                                   <div class="radio radio-info radio-inline">
                                       <input type="radio" name="special_person" id="special_person_no" class="special_person" value="0" checked="">
                                    <label for="special_person_no">No</label>
                                   </div>
                               </div> 
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="" class="col-sm-3 col-form-label">Type</label>
                              

                              <div class="col-sm-9">
                                <div style="">
                                   <div class="radio radio-info radio-inline">
                                       <input type="radio" name="vender_type" class="" id="vender_type_local" value="Local">
                                    <label for="vender_type_local">Local</label>
                                   </div>
                                   <div class="radio radio-info radio-inline">
                                       <input type="radio" name="vender_type" id="vender_type_domastic" class="" value="Domastic" >
                                    <label for="vender_type_domastic">Domastic</label>
                                   </div>
                               </div> 
                              </div>
                           </div>
                           <!-- <div class="form-group row">
                              <label for="" class="col-sm-3 col-form-label">Fuel Vendor</label>
                              

                              <div class="col-sm-9">
                                <div style="">
                                   <div class="radio radio-info radio-inline">
                                       <input type="radio" name="vender_type" class="" id="fuel_vendor_yes" value="Yes">
                                    <label for="fuel_vendor_yes">Yes</label>
                                   </div>
                                   <div class="radio radio-info radio-inline">
                                       <input type="radio" name="vender_type" id="fuel_vendor_no" class="" value="No" checked="">
                                    <label for="fuel_vendor_no">No</label>
                                   </div>
                               </div> 
                              </div>
                           </div> -->
                           <!-- <div class="form-group row">
                              <div class="col-sm-12">
                                 <button type="button"  class="btn btn-success pull-right add_button">Add Vehicle</button>                                          
                               
                              </div>
                           </div> -->
                           <div class="field_wrapper_expense"></div>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-sm-12">
                           <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>
                     </div>
                  </div>
               </div>
           
         </div>
      </form>
   </div>

<!-- /.main content -->
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- START CORE PLUGINS -->
<script type="text/javascript">
   $(document).ready(function(){
       var maxField = 10; //Input fields increment limitation
       var addButton = $('.add_button'); //Add button selector
       var wrapper = $('.field_wrapper_expense'); //Input field wrapper
       var fieldHTML = '<div>'
                            + '<hr><div class="form-group row">'
                                +'<label for="" class="col-sm-3 col-form-label"> vehicle_maker </label>'
                                 +'<div class="col-sm-9">'
                                  +' <input class="form-control" name="vehicle_maker[]" type="text" value="" id="" placeholder=""  ></div>'
   
                               +'</div>'   
                               
                                + '<div class="form-group row">'
   
                                     +'<label for="" class="col-sm-3 col-form-label"> vehicle_model </label>'
   
                                             +'<div class="col-sm-9">'
                                              +' <input class="form-control" name="vehicle_model[]" type="text" value="" id="" placeholder=""  ></div>'
                                             +'</div>'
                              
   
                                + '<div class="form-group row">'
   
                                     +'<label for="" class="col-sm-3 col-form-label">  vehicle_type</label>'
   
                                             +'<div class="col-sm-9">'
                                              +' <input class="form-control" name="vehicle_type[]" type="text" value="" id="" placeholder=""  ></div>'
                                             +'</div>'
   
   
   
   
   
                                   + '<div class="form-group row">'
   
                                     +'<label for="" class="col-sm-3 col-form-label"> vehicle_year </label>'
   
                                             +'<div class="col-sm-9">'
                                              +' <input class="form-control" name="vehicle_year[]" type="text" value="" id="" placeholder=""  ></div>'
                                             +'</div>'
   
   
   
                                 + '<div class="form-group row">'
   
                                     +'<label for="" class="col-sm-3 col-form-label"> registration_number </label>'
   
                                             +'<div class="col-sm-9">'
                                              +' <input class="form-control" name="registration_number[]" type="text" value="" id="" placeholder=""  ></div>'
                                             +'</div>'
   
   
   
   
   
                                + '<div class="form-group row">'
   
                                     +'<label for="" class="col-sm-3 col-form-label"> vehicle_cc </label>'
   
                                             +'<div class="col-sm-9">'
                                              +' <input class="form-control" name="vehicle_cc[]" type="text" value="" id="" placeholder=""  ></div>'
                                             +'</div>'
   
                                  + '<div class=" row">'
                                  + '<div class="col-lg-12">'
                                          +'<label for="" class="" style="visibility: hidden;">  expense Description</label>'
                                          +' <br>'
                                          +' <a href="javascript:void(0);" class="remove_button"><button style="margin-bottom: 11px !important;"  type="button" class="btn btn-success pull-right">Delete</button></a>'
                                  +'</div>'
                                  +'</div><hr>'
                               
                             
   
   
   
   
   
       +'</div>'; //New input field html  
       var x = 1; //Initial field counter is 1
       
       //Once add button is clicked
       $(addButton).click(function(){
           //Check maximum number of input fields
           if(x < maxField){ 
               x++; //Increment field counter
               $(wrapper).append(fieldHTML); //Add field html
           }
       });
       
       //Once remove button is clicked
       $(wrapper).on('click', '.remove_button', function(e){
           e.preventDefault();
           $(this).parent('div').remove(); //Remove field html
           x--; //Decrement field counter
       });
   
   
   });
   
   
</script>