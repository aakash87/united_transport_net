<style type="text/css">    .dropdown-menu.open {    z-index: 9999;}</style>
<style type="text/css">    .dropdown-menu1.open {    z-index: 9999;}</style>
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
            <h1>Add Orders</h1>
            <small></small>
            <ol class="breadcrumb">
               <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
               <li class="active">Add Orders</li>
            </ol>
         </div>
      </div>
      <!-- /. Content Header (Page header) -->
      <form method="post" action="<?php echo base_url() ?>admin/orders/insert" enctype="multipart/form-data">
         <!-- <input type="hidden" id="sales_personID" name="sales_person_id"> -->
         <div class="row">
            <div class="col-sm-12">
               <div class="panel panel-bd ">
                  <div class="panel-heading">
                     <div class="panel-title">
                        <h4>Sale Order Form</h4>
                     </div>
                  </div>
                  <div class="panel-body">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Date</label>
                              <div class="col-sm-9"><input type="date" name="order_date" class="form-control" ></div>
                           </div>
                           <div class="form-group row" class="sales_person_id_div">
                              <label for="example-text-input" class="col-sm-3 col-form-label"> Sales Person<span class="required">*</span></label>
                              <div class="col-sm-9">
                                 <select class="form-control" name="sales_person_id" id="sales_person_id" required="">
                                    <option value="">Select Sales Person</option>
                                    <?php foreach ($sales_person as $sal_person) :?>
                                    <option value="<?php echo $sal_person['id']; ?>"><?php echo $sal_person['name']; ?></option>
                                    <?php endforeach; ?>
                                 </select>
                                 <div id="append_sales_person"></div>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label"> Customer<span class="required">*</span></label>
                              <div class="col-sm-9">
                                 <select class="form-control" name="order_customer" id="customer_id" required="">
                                    <option>Select Customer</option>
                                 </select>
                              </div>
                           </div>

                            <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Order Type<span class="required">*</span></label>
                              <div class="col-sm-9">
                                 <select class="form-control" name="select_order_type"required="">
                                    <option value="">Select Order Type</option>
                                    <option value="30">Monthly Order </option>
                                    <option value="6" >Weekly Order</option>
                                    <option value="1" >Daily Order</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Pickup date</label>
                              <div class="col-sm-9"><input class="form-control" name="pickup_date_and_time" type="date" value="" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label"> Drop off date</label>
                              <div class="col-sm-9"><input class="form-control" name="dropoff_date_and_time" type="date" value="" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Weight</label>
                              <div class="col-sm-9"><input class="form-control" name="weight" type="text" value="" id="" placeholder="" ></div>
                           </div>
                           <!-- <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Order vehicle</label>
                                      <div class="col-sm-9"><input class="form-control" name="order_vehicle" type="text" value="" id="example-text-input" placeholder="" ></div>
                              
                                  </div> --><!-- <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Order driver</label>
                                      <div class="col-sm-9"><input class="form-control" name="order_driver" type="text" value="" id="example-text-input" placeholder="" ></div>
                              
                                  </div>-->
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Pickup address</label>
                              <div class="col-sm-9"><textarea class="form-control" name="pickup_address"  rows="1"></textarea></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Drop off address</label>
                              <div class="col-sm-9"><textarea class="form-control" name="drop_off_address" rows="1" ></textarea></div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Origin</label>
                              <div class="col-sm-9">
                                <select class="form-control selectpicker" data-live-search="true" name="pickup_location">
                                    <option>Select City</option>
                                    <?php 
                                    foreach ($city_list as $city) {
                                        echo '<option value="'.$city['CityName'].'">'.$city['CityName'].'</option>';
                                    }
                                ?>
                                </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Destination</label>
                              <div class="col-sm-9">

                                <select class="form-control selectpicker" data-live-search="true" name="drop_off_location">
                                    <option>Select City</option>
                                    <?php 
                                    foreach ($city_list as $city) {
                                        echo '<option value="'.$city['CityName'].'">'.$city['CityName'].'</option>';
                                    }
                                ?>
                                </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Remarks</label>
                              <div class="col-sm-9">
                                <textarea class="form-control" name="remarks" ></textarea>
                                 
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Rate</label>
                              <div class="col-sm-9"><input class="form-control" name="order_total_amount" type="text" value="" id="example-text-input" placeholder="" ></div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-12">
                                 <button type="submit" class="btn btn-primary pull-right">Submit</button>
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
   $('#sales_person_id').on('change' , function(){
   
       $("#customer_id option").remove();
   
       var sales_person_id = $(this).val();
       
       $.ajax({
           url: "<?php echo base_url(); ?>/admin/customer/get_customer_for_sales_id",
           type: "POST",
           data: {sales_person_id : sales_person_id},
   
           success: function(resp){
   
               var Json = JSON.parse(resp);
   
                  $('#customer_id').append($('<option/>', { 
                         value: '',
                         text : 'select customer'
                     })); 
                  $.each(Json, function(key, value) {
                   $('#customer_id').append($('<option/>', { 
                         value: value.id,
                         text : value.company_name 
                     }));
   
                 });
               
           }
       });
   
   });
   
   
   
    $('#order_vendor_id').on('change' , function(){
       
   
       $("#vehicel_of_vendor option").remove();
   
       var order_vendor_id = $(this).val();
       
       $.ajax({
           url: "<?php echo base_url(); ?>/admin/orders/get_vendor_customer",
           type: "POST",
           data: {order_vendor_id : order_vendor_id},
   
           success: function(resp){
   
               var Json_vendor = JSON.parse(resp);
   
                  $('#vehicel_of_vendor').append($('<option/>', { 
                         value: '',
                         text : 'select vehicel of vendor'
                     })); 
                      
                  $.each(Json_vendor, function(key, value) {
                   $('#vehicel_of_vendor').append($('<option/>', { 
                         value: value.id,
                         text : value.registration_number 
                     }));
   
                 });
               
           }
       })
   
   });
   
    $('#vehicel_of_vendor').on('change', function(){
   
        var vehicel_of_vendorID = $(this).val();
   
       $.ajax({
           url: "<?php echo base_url(); ?>/admin/orders/get_vendor_vehicel_details",
           type: "POST",
           data: {vehicel_of_vendorID : vehicel_of_vendorID},
   
           success: function(resp){
               var Json_vendor_vehicel = JSON.parse(resp);
   
               // console.log(Json_vendor_vehicel.vehicle_type);
   
               $('#vehicle_type').val(Json_vendor_vehicel.vehicle_type);
               $('#builty ').val(Json_vendor_vehicel.builty);
   
               
           }
       })
   
   
   
   
   
    });
   
   
   
</script>
<script type="text/javascript">
   $(function() {
   
   
        $.ajax({
         url: "<?php echo base_url();?>/admin/orders/get_alert_footer",
         type: "GET",
         
             success : function(resp) {
                   // console.log(resp);
   
                   var JsonData = JSON.parse(resp);
                   var sales_person_id = JsonData.id;
                   // console.log();
                   var   fieldHTML ='<input class="form-control append_input_sales_value" name=""  type="text" value="" readonly>'
                   +'<input class="form-control sales_value_hide" name="sales_person_id"  type="hidden" value="" readonly>'; 
   
                   if (JsonData.role ==  15 ) {
                       // alert('working');
   
                       $('#sales_person_id').remove();
                       
                       $('#append_sales_person').append(fieldHTML); //Add field html
   
                       $('.append_input_sales_value').val(JsonData.name);
                      
                       $('.sales_value_hide').val(JsonData.id);
   
   
           $("#customer_id option").remove();
                       
                        $.ajax({
                           url: "<?php echo base_url(); ?>/admin/customer/get_customer_for_sales_id",
                           type: "POST",
                           data: {sales_person_id : sales_person_id},
   
                           success: function(resp){
   
                               var Json = JSON.parse(resp);
   
                                  $('#customer_id').append($('<option/>', { 
                                         value: '',
                                         text : 'select customer'
                                     })); 
                                  $.each(Json, function(key, value) {
                                   $('#customer_id').append($('<option/>', { 
                                         value: value.id,
                                         text : value.company_name 
                                     }));
   
                                 });
                               
                           }
                       });
   
   
                   }
   
             }
        });
   });
   
</script>