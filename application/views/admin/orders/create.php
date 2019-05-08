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
                              <input type="hidden" class="add3_input" name="add3_input">
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
                              <label for="example-text-input" class="col-sm-3 col-form-label">Loading date</label>
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
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Origin</label>
                              <div class="col-sm-9">
                                <input class="form-control" name="pickup_location" type="text" value="" id="" placeholder="" >
                                <!-- <select class="form-control selectpicker" data-live-search="true" name="">
                                    <option value="">Select Origin City</option>
                                    <?php 
                                    foreach ($city_list as $city) {
                                        echo '<option value="'.$city['CityName'].'">'.$city['CityName'].'</option>';
                                    }
                                ?>
                                </select> -->
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Destination</label>
                              <div class="col-sm-9">
                                 <input class="form-control" name="drop_off_location" type="text" value="" id="" placeholder="" >
                                <!-- <select class="form-control selectpicker" data-live-search="true" name="">
                                    <option value="">Select Destination City</option>
                                    <?php 
                                    foreach ($city_list as $city) {
                                        echo '<option value="'.$city['CityName'].'">'.$city['CityName'].'</option>';
                                    }
                                ?>
                                </select> -->
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
                        </div>
                        <div class="col-md-6">
                           <div class="field_wrapper">
                              <div class="form-group row">
                                 <label for="example-text-input" class="col-sm-3 col-form-label">Vendor Name</label>
                                 <div class="col-sm-9">
                                    <!-- <input class="form-control" name="ower_id" type="text" value="" d="example-text-input" placeholder="" > -->
                                    <select class="form-control" name="order_vendor_id"  id="order_vendor_id" >
                                       <option value="">Select Vendor</option>
                                       <?php foreach ($vendor as $vend) : ?>
                                       <option value="<?php echo $vend['id'] ?>" ><?php echo $vend['vendor_name'] ?></option>
                                       <?php endforeach; ?>    
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="example-text-input" class="col-sm-3 col-form-label">Assigned Vehicle</label>
                                 <div class="col-sm-9">
                                    <input class="form-control" name="vehicel_of_vendorID" type="hidden" value="" id="vehicel_of_vendorID" placeholder=""  >
                                    <select class="form-control" name="vehicel_of_vendor" id="vehicel_of_vendor" value="">
                                       <option value="">Select Vehicle Vendor</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle Type</label>
                                 <div class="col-sm-9"><input class="form-control" name="vehicle_type" type="text" value="" id="vehicle_type" placeholder=""  ></div>
                              </div>
                              <div class="form-group row">
                                 <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle Buying</label>
                                 <div class="col-sm-9">
                                    <input class="form-control" name="" type="text" value="" id="vehicle_bying" placeholder="" readonly="" >
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="example-text-input" class="col-sm-3 col-form-label">Buying Assigned</label>
                                 <div class="col-sm-9">
                                    <input class="form-control" name="baying_assigned_rates_for_vendor" type="text" value="" id="vehicle_bying" placeholder="">
                                 </div>
                              </div>

                              <div class="form-group row">
                                 <label for="example-text-input" class="col-sm-3 col-form-label">Driver Name</label>
                                 <div class="col-sm-9">
                                    <input class="form-control" name="" type="text" value="" id="driver_name" placeholder="" >
                                    <input class="form-control" name="order_driver" type="hidden" value="" id="driver_id" placeholder="" >
                                 </div>
                              </div>

                              <div class="form-group row">
                                 <label for="example-text-input" class="col-sm-3 col-form-label">Local Vendor Name</label>
                                 <div class="col-sm-9">
                                    <!-- <input class="form-control" name="ower_id" type="text" value="" d="example-text-input" placeholder="" > -->
                                    <select class="form-control" name="order_local_vendor_id"  value="" id="order_local_vendor_id" >
                                       <option value="">Select Local Vendor</option>
                                       <?php foreach ($local_vendor as $localvend) : ?>
                                       <option value="<?php echo $localvend['id'] ?>" ><?php echo $localvend['vendor_name'] ?></option>
                                       <?php endforeach; ?>    
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="example-text-input" class="col-sm-3 col-form-label"> Local Transport </label>
                                 <div class="col-sm-9">
                                    <input class="form-control" name="local_transport" type="text" value="" id=" local_transport" placeholder="" >
                                 </div>
                              </div>

                              


                              <div class="form-group row">
                                 <label for="example-text-input" class="col-sm-3 col-form-label"> Detention For Vendor </label>
                                 <div class="col-sm-9">
                                    <input class="form-control" name="order_tenstion" type="text" value="" id="" placeholder="" >
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="example-text-input" class="col-sm-3 col-form-label"> Detention For Customer </label>
                                 <div class="col-sm-9">
                                    <input class="form-control" name="order_detention_customer" type="text" value="" id="" placeholder="" >
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="example-text-input" class="col-sm-3 col-form-label"> Builty </label>
                                 <div class="col-sm-9">
                                    <input class="form-control" name="builty_num" type="text" value="" id="" placeholder="" >
                                 </div>
                              </div>
                              <!-- <div class="after-add-labour">
                                  <div class="form-group row">
                                     <label for="example-text-input" class="col-sm-3 col-form-label">Labour Vendor</label>
                                     <div class="col-sm-9">
                                        <select class="form-control" name="order_labour_vendor_id[]"  value="" id="" >
                                           <option value="">Select Labour Vendor</option>
                                           <?php foreach ($labour_vendor as $labourvend) : ?>
                                           <option value="<?php echo $labourvend['id'] ?>" ><?php echo $labourvend['vendor_name'] ?></option>
                                           <?php endforeach; ?>    
                                        </select>
                                     </div>
                                  </div>
                                  <div class="form-group row">
                                       <label for="example-text-input" class="col-sm-3 col-form-label"> Labour Charges For Vendor </label>
                                       <div class="col-sm-9">
                                          <input class="form-control" name="labor_charges[]" type="text" value="" id="labor_charges" placeholder="" >
                                       
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="example-text-input" class="col-sm-3 col-form-label"> Labour Charges For Customer</label>
                                       <div class="col-sm-9">
                                          <input class="form-control" name="labor_charges_customer[]" type="text" value="" id="labor_charges" placeholder="" >
                                       
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="example-text-input" class="col-sm-3 col-form-label"> Description</label>
                                       <div class="col-sm-9">
                                          <textarea class="form-control" name="labor_charges_description[]" rows="1"></textarea>
                                          
                                       
                                       </div>
                                    </div>
                                

                              </div> -->
                              
                           </div> 
                        </div>





                            
                                <div class="optionBox3">
                                     <div class="block3">
                                       <a class="btn btn-success pull-right add3 ovel_css">+ Add Labour Charges</a>
                                         
                                     </div>
                                 </div>
                            










                           <div class="form-group row">
                              <div class="col-sm-12">
                                 <br>
                                 <button type="submit" class="btn btn-primary pull-right">Submit</button>
                              </div>
                           </div>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </form>
   <script type="text/javascript">
     $('.add3').click(function() {
         $('.block3:last').before(' <div class=""><div class="block3"><div class=" panel-body after-add-k refrence_data-append" style="position: relative; clear: both;"> <div class="footer-ribbon" style="background: #999; position: absolute; margin: -20px 0 0 11px; z-index: 111; font-size: 9px; padding: 1px 9px 4px 10px;"> <span style="color: #FFF; font-size: 1.6em;">Labour Charges </div><div class="col-lg-12" style="border: 2px solid; border-color: #999999;"> <br><div class="form-group row"> <div class="form-group col-lg-3"> <label for="" class=""> Labour Vendor</label> <select class="form-control" name="order_labour_vendor_id[]" value="" id="" > <option value="">Select Labour Vendor </option> <?php foreach ($labour_vendor as $labourvend) : ?> <option value="<?php echo $labourvend['id'] ?>" ><?php echo $labourvend['vendor_name'] ?></option> <?php endforeach; ?> </select> </div><div class="col-lg-2"> <label for="" class="">Charges For <small>Vendor</small> </label> <input class="form-control" name="labor_charges[]" type="text" value="" id="labor_charges" placeholder=""> </div><div class="form-group row"><div class="col-lg-2"> <label for="" class="">Charges For <small>Cus</small> </label> <input class="form-control" name="labor_charges_customer[]" type="text" value="" id="labor_charges" placeholder=""> </div><div class="form-group row"><div class="col-lg-4"> <label for="" class=""> Description </label> <textarea class="form-control" name="labor_charges_description[]" rows="1" id="labor_charges"></textarea></div></div></div></div></div></div><a class="btn btn-danger pull-right ovel_css_danger remove3"><i class="fa fa-trash-o" aria-hidden="true"></i> Remove Labour Charges</a></div>');
     });
     $('.optionBox3').on('click','.remove3',function() {
        $(this).parent().remove();
     });

   </script>
<script type="text/javascript">
   $(".add3").click(function (event) {
      // alert();
    event.preventDefault();
    $(".add3_input").val("Yes");
 });
</script>
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
                  // remover kera q ky repeat horha tha
                 //  $('#vehicel_of_vendor').append($('<option/>', { 
                 //         value: '',
                 //         text : 'select vehicel of vendor'
                 //     })); 
                      
                 //  $.each(Json_vendor, function(key, value) {
                 //   $('#vehicel_of_vendor').append($('<option/>', { 
                 //         value: value.id,
                 //         text : value.registration_number 
                 //     }));
   
                 // });
                // remover kera q ky repeat horha tha end
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
<script type="text/javascript">
   $(document).ready(function(){
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
   
     $('#order_total_amount').keyup(function(){
           
   
           var amount = $(this).val();
           var commission = $('#commission').val();
   
           var multipart_amount = amount * commission;
   
           var divide = multipart_amount / 100;
            
           var net_profit = amount - divide;
   
           $('#net_amount_jquery').val(net_profit);
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
           });
           // $("#vehicel_of_vendor option").remove();
   
       });
   
        $('#vehicel_of_vendor').on('change', function(){
   
            var vehicel_of_vendorID = $(this).val();
   
           $.ajax({
               url: "<?php echo base_url(); ?>/admin/orders/get_vendor_vehicel_details",
               type: "POST",
               data: {vehicel_of_vendorID : vehicel_of_vendorID},
   
               success: function(resp){
                   var Json_vendor_vehicel = JSON.parse(resp);
   
                   console.log(Json_vendor_vehicel);
   
                   $('#vehicle_type').val(Json_vendor_vehicel.vehicle_type);
                   $('#vehicle_bying ').val(Json_vendor_vehicel.vehicle_bying );
                   $('#driver_name').val(Json_vendor_vehicel.driver_name);
                   $('#driver_id').val(Json_vendor_vehicel.driversID);
   
                   console.log(Json_vendor_vehicel);
   
   
   
   
                   
               }
           });
   
   
   
   
   
        });
   
   
        $(document).ready(function(){
            var order_vendor_id = $('#order_vendor_id').val();
   
                var order_vendorID = $('#vehicel_of_vendorID').val();
   
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
   
                       var option = '<option value="' +  value.id + '"' + 
                            ( value.id == order_vendorID ? 'selected="selected"' : '') +
                             '>' + value.registration_number + '</option>';
                       $('#vehicel_of_vendor').append(option);
   
                     });
                   
               }
           });
   
   
   
          var vehicel_of_vendorID = $('#vehicel_of_vendorID').val();
   
            $.ajax({
               url: "<?php echo base_url(); ?>/admin/orders/get_vendor_vehicel_details",
               type: "POST",
               data: {vehicel_of_vendorID : vehicel_of_vendorID},
   
               success: function(resp){
                   var Json_vendor_vehicel = JSON.parse(resp);
   
                   // console.log(Json_vendor_vehicel.vehicle_type);
   
                   $('#vehicle_type').val(Json_vendor_vehicel.vehicle_type);
                   $('#vehicle_bying ').val(Json_vendor_vehicel.vehicle_bying);
                    $('#driver_name ').val(Json_vendor_vehicel.driver_name);
                   $('#driver_id').val(Json_vendor_vehicel.driversID);
   
   
   
                      console.log(Json_vendor_vehicel);
   
   
   
                   
               }
           });   
   
        });
   
   
  
    
   
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("body").on("click", ".add-labour-chargers", function() {
            var html = $(".after-add-labour").first().clone();
            //  $(html).find(".change").prepend("<label for=''>&nbsp;</label><br/><a class='btn btn-danger remove'>- Remove</a>");
            $(html).find('input').val('')
            $(html).find('select').val('')
            $(html).find('textarea').val('')
            $(html).find(".dele").html("<a class='btn btn-danger remove'><i class='fa fa-trash-o' aria-hidden='true'></i> </a> " + ' <a class="btn btn-success add-labour-chargers"><strong> + </strong> </a>');
            $(".after-add-labour").last().after(html);
        });
        $("body").on("click", ".remove", function() {
            $(this).parents(".after-add-labour").remove();
        });
    });
    
</script>