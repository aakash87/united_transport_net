<style type="text/css">
  #myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 70px;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 100%;
  max-width: 316px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}

.footer-ribbon:before {
    border-right: 10px solid #646464;
    border-top: 16px solid transparent;
    content: "";
    display: block;
    height: 0;
    right: 100%;
    position: absolute;
    top: 0;
    width: 7px;
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
            <i class="pe-7s-note2"></i>
         </div>
         <div class="header-title">
            <h1>Process Order</h1>
            <small></small>
            <ol class="breadcrumb">
               <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
               <li class="active">Process Order</li>
            </ol>
         </div>
      </div>
      <!-- /. Content Header (Page header) -->
      <form method="post" action="<?php echo base_url() ?>admin/orders/submit_process_by_admin" enctype="multipart/form-data">
         <input type="hidden" name="id" value="<?php echo $orders["id"] ?>">
         <input type="hidden" name="sales_person_id" value="<?php echo $orders["sales_person"] ?>">
         <div class="row">
            <div class="col-sm-12">
               <div class="panel panel-bd ">
                  <div class="panel-heading">
                     <div class="panel-title">
                        <h4>Process Order</h4>
                     </div>
                  </div>
                  <div class="panel-body">
                    <div class="row" >
                        <div class="col-sm-6" style="">

                             <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Customer</label>
                                <div class="col-sm-9">
                                   <input class="form-control" name="customer_id" type="text" value="<?php echo $orders["full_name"] ?>" id="" placeholder="" readonly >
                                </div>
                             </div>

                            <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label"> Order Type<span class="required">*</span></label>
                              <div class="col-sm-9">
                                 <select class="form-control" name="select_order_type"required="" id="select_order_type">
                                    <option value="">Select Order Type</option>
                                    <option value="30" <?php echo ($orders["order_type"] ==  30) ? 'selected': NULL;  ?> >Monthly Order </option>
                                    <option value="6" <?php echo ($orders["order_type"] ==  6) ? 'selected': NULL;  ?> >Weekly Order</option>
                                    <option value="1" <?php echo ($orders["order_type"] ==  1) ? 'selected': NULL;  ?> >Daily Order</option>
                                 </select>
                              </div>
                           </div>

                             <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Pickup Date/Time</label>
                                <div class="col-sm-9">
                                   <input class="form-control" name="pickup_date_and_time" type="text" value=" <?php 


                                    $originalDate = $orders["pickup_date_and_time"];
                                    $pickup_date_and_time = date("d-m-Y", strtotime($originalDate)); echo $pickup_date_and_time ;?> " id="" placeholder="" readonly >
                                </div>
                             </div>
                             <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Dropoff Date/Time</label>
                                <div class="col-sm-9">
                                   <input class="form-control" name="dropoff_date_and_time" type="text" value=" <?php 


                                    $originalDate2 = $orders["dropoff_date_and_time"];
                                    $dropoff_date_and_time = date("d-m-Y", strtotime($originalDate2)); echo $dropoff_date_and_time ;?> " id="" placeholder="" readonly >
                                </div>
                             </div>
                             <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Pickup Address</label>
                                <div class="col-sm-9">
                                   <textarea class="form-control" name="pickup_address" readonly ><?php echo $orders["pickup_address"]  ?></textarea>
                                </div>
                             </div>
                             <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Dropoff Address</label>
                                <div class="col-sm-9">
                                   <textarea class="form-control" name="drop_off_address" readonly ><?php echo $orders["drop_off_address"]   ?></textarea>
                                </div>
                             </div>
                             <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Pickup Location</label>
                                <div class="col-sm-9">
                                   <textarea class="form-control" name="pickup_location" readonly ><?php echo $orders["pickup_location"] ?></textarea>
                                </div>
                             </div>


                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Dropoff Location</label>
                        <div class="col-sm-9">
                           <textarea class="form-control" name="drop_off_location" readonly ><?php echo $orders["drop_off_location"] ?></textarea>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Sales Person</label>
                        <div class="col-sm-9">
                           <input  class="form-control" name="commission" id="commission" readonly value="<?php echo $orders["sp_name"] ?>">
                        </div>
                     </div>


                     <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                           <select class="form-control" name="order_status" id="order_status">
                              <option value="Pending" <?php echo ($orders["order_status"] == 'pending' ) ? 'selected' : NULL ; ?> >Pending</option>
                              <option value="Complete" <?php echo ($orders["order_status"] == 'Complete' ) ? 'selected' : NULL ; ?> >Complete</option>
                              <option value="Process" <?php echo ($orders["order_status"] == 'Process' ) ? 'selected' : NULL ; ?> >Process</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Total Amount </label>
                        <div class="col-sm-9">
                           <input  class="form-control" name="order_total_amount" id="order_total_amount"  value="<?php echo $orders["order_total_amount"] ?>">
                        </div>
                     </div>
                     <?php if ($orders["order_vehicle"] > 0) : ?>
                     <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Vehicle </label>
                        <div class="col-sm-9">
                           <select class="form-control" name="order_vehicle">
                              <option>Select Vehicle</option>
                              <?php foreach ($vehicle_data as $veh_data) :?>
                              <option value="<?php echo $veh_data['id']; ?>" <?php echo ($orders["order_vehicle"] == $veh_data['id'] ) ? 'selected' : NULL ; ?> ><?php echo $veh_data['license_plate']; ?></option>
                              <?php endforeach; ?>                            
                           </select>
                        </div>
                     </div>
                     <?php endif; ?> 

                        </div>
                       

                        <div class="col-sm-6" style="">
                            
                     <div class="field_wrapper">
                        <div class="form-group row">
                           <label for="example-text-input" class="col-sm-3 col-form-label">Vendor Name</label>
                           <div class="col-sm-9">
                              <!-- <input class="form-control" name="ower_id" type="text" value="" d="example-text-input" placeholder="" > -->
                              <select class="form-control" name="order_vendor_id"  value="" id="order_vendor_id" >
                                 <option value="">Select Vendor</option>
                                 <?php foreach ($vendor as $vend) : ?>
                                 <option value="<?php echo $vend['id'] ?>" <?php echo ($orders["order_vendor_id"] == $vend['id']  ) ? 'selected' : NULL ; ?> ><?php echo $vend['vendor_name'] ?></option>
                                 <?php endforeach; ?>    
                              </select>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="example-text-input" class="col-sm-3 col-form-label">Assigned Vehicle</label>
                           <div class="col-sm-9">
                              <input class="form-control" name="vehicel_of_vendorID" type="hidden" value="<?php echo $orders['vehicel_of_vendor'] ?>" id="vehicel_of_vendorID" placeholder=""  >
                              <select class="form-control" name="vehicel_of_vendor" id="vehicel_of_vendor" value="">
                                 <option value="">Select Vehicle Vendor</option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle Type</label>
                           <div class="col-sm-9"><input class="form-control" name="vehicle_type" type="text" value="" id="vehicle_type" placeholder="" readonly="" ></div>
                        </div>
                        <div class="form-group row">
                           <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle Buying</label>
                           <div class="col-sm-9">
                              <input class="form-control" name="builty_rates" type="text" value="" id="vehicle_bying" placeholder="" readonly="" >
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
                              <select class="form-control" name="order_vendor_id"  value="" id="order_vendor_id" >
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
                              <input class="form-control" name="local_transport" type="text" value="<?php echo ($orders["local_transport"]) ? $orders["local_transport"] : NULL ; ?>" id=" local_transport" placeholder="" >
                           </div>
                        </div>

                        <div class="form-group row">
                           <label for="example-text-input" class="col-sm-3 col-form-label"> Labour Charges </label>
                           <div class="col-sm-9">
                              <input class="form-control" name="labor_charges" type="text" value="<?php echo ($orders["labor_charges"]) ? $orders["labor_charges"] : NULL ; ?>" id="labor_charges" placeholder="" >
                           
                           </div>
                        </div>


                        <div class="form-group row">
                           <label for="example-text-input" class="col-sm-3 col-form-label"> Detention </label>
                           <div class="col-sm-9">
                              <input class="form-control" name="order_tenstion" type="text" value="<?php echo ($orders["order_tenstion"]) ? $orders["order_tenstion"] : NULL ; ?>" id="" placeholder="" >
                           </div>
                        </div>

                        
                     </div>   
                        

                        
                        </div>

                    </div>
                    <hr>

                      <div class="col-md-12"  >
                          <?php $expense_count = 0; ?>
                     <?php foreach ($order_expense as $expense) : $expense_count++ ?>
                      <div class="row panel-body" style="position: relative; clear: both;">
                             <div class="footer-ribbon" style="background: #999; position: absolute; margin: -20px 0 0 11px; z-index: 111; font-size: 9px; padding: 1px 9px 4px 10px;">                     
                                 <span style="color: #FFF; font-size: 1.6em;">Expense <?php echo $expense_count ?> </span>
                             </div>                                  
                             <div class="col-lg-12" style="border: 2px solid; border-color: #999999;"><br>
                                <div class="row">
                                  <div class="form-group col-lg-4">
                                    <label for="" class=""> Expense Title</label>
                                    <input class="form-control" name="expense_title_update[]" type="text" value="<?php echo $expense['expense_title'] ?>" id="" placeholder=""  >
                                  </div>
                                  <div class="form-group col-lg-4">
                                    <label for="" > Expense Date </label>
                                    <input class="form-control" name="expense_date_update[]" type="date" value="<?php echo $expense['expense_date'] ?>" id="" placeholder="" >
                                  </div>

                                  <div class="form-group col-lg-4">
                                  <label for="" class=""> Expense Amount </label>

                                  <input class="form-control" name="expense_amount_update[]" type="text" value="<?php echo $expense['expense_amount'] ?>" id="" placeholder=""  >
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form-group col-lg-12">
                                    <label for="" class=""> Expense Description</label>
                                    <textarea class="form-control" name="expense_description_update[]" rows="1"><?php echo $expense['expense_description'] ?></textarea>
                                  </div>
                                  
                                </div>
                            </div>
                      </div>
                     <?php endforeach; ?>
                         <?php $order_second_stop_count = 0; ?>
                     <?php foreach ($order_second_stop as $order_second) : $order_second_stop_count++ ?>
                      <div class="row panel-body" style="position: relative; clear: both;">
                             <div class="footer-ribbon" style="background: #999; position: absolute; margin: -20px 0 0 11px; z-index: 111; font-size: 9px; padding: 1px 9px 4px 10px;">                     
                                 <span style="color: #FFF; font-size: 1.6em;">2<sup>nd</sup>  Stop Detail <?php echo $order_second_stop_count ?> </span>
                             </div>                                  
                             <div class="col-lg-12" style="border: 2px solid; border-color: #999999;"><br>
                       <div class="row">
                          <div class="form-group col-lg-4">
                          <input type="hidden" value="<?php echo $order_second['id'] ?>" name="second_stop_id[]">
                          <label for="" > Origin </label>
                             <input class="form-control" name="sec_stop_origin_update[]" type="text" value="<?php echo $order_second['sec_stop_origin'] ?>" id="" placeholder=""  >
                        </div>
                       <div class="form-group col-lg-4">
                        <label for="" > Destination </label>
                        
                           <input class="form-control" name="sec_stop_destination_update[]" type="text" value="<?php echo $order_second['sec_stop_destination'] ?>" id="" placeholder=""  >
                     </div>
                     <div class="form-group col-lg-4">
                        <label for="" > Stop Amount </label>
                      
                           <input class="form-control" name="sec_stop_amount_update[]" type="text" value="<?php echo $order_second['sec_stop_amount'] ?>" id="" placeholder=""  >
                     </div>
                   
                      </div>
                    </div>
                  </div>
                     <?php endforeach; ?>



                   
                     <!-- working -->
                     <div class="row panel-body" style="position: relative; clear: both;">
                            <div class="footer-ribbon" style="background: #999; position: absolute; margin: -20px 0 0 11px; z-index: 111; font-size: 9px; padding: 1px 9px 4px 10px;">                     
                                <span style="color: #FFF; font-size: 1.6em;">Expense</span>
                            </div>                                  
                            <div class="col-lg-12" style="border: 2px solid; border-color: #999999;"><br>
                              <div class="form-group row">
                                 <div class="col-sm-12">
                                    <button type="button"  class="btn btn-success pull-right add_button">Add Expanse</button>
                                 </div>
                                 
                              </div>
                             
                     <div class="field_wrapper_expense" ></div>
                   </div>
                 </div>
                     <div class="row panel-body" style="position: relative; clear: both;">
                            <div class="footer-ribbon" style="background: #999; position: absolute; margin: -20px 0 0 11px; z-index: 111; font-size: 9px; padding: 1px 9px 4px 10px;">                     
                                <span style="color: #FFF; font-size: 1.6em;">Second Step</span>
                            </div>                                  
                            <div class="col-lg-12" style="border: 2px solid; border-color: #999999;"><br>
                              <div class="form-group row">
                                 <div class="col-sm-12">
                                    <button type="button"  class="btn btn-success pull-right add_second_step">Add Second Step</button>
                                 </div>
                                 
                              </div>
                     <div class="field_wrapper_add_second_step" ></div>
                   </div>
                     


                     
                  </div>
                  <div class="form-group row">
                    
                     <br>
                     <br>
                     <br>
                     <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
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
   $(document).ready(function(){
       var maxField = 10; //Input fields increment limitation
       var addButton = $('.add_button'); //Add button selector
       var wrapper = $('.field_wrapper_expense'); //Input field wrapper
       var fieldHTML = '<div>'
                       + '<div>'
                               
                            + '<div class="form-group row">'
                               +'<div class="col-lg-4">'
                                  +'<label for="" > Expense Title </label>'
                                  +' <input class="form-control" name="expense_title[]" type="text" value="" id="" placeholder=""  >'
                                +'</div>'
   
                               +'<div class="col-lg-4">'
                                  +'<label for="" > Expense Date </label>'
                                  +' <input class="form-control" name="expense_date[]" type="date" value="" id="" placeholder="" >'
                                +'</div>'
                               
                                + '<div class="col-lg-4">'
                                     +'<label for="" class=""> Expense Amount </label>'
                                        +' <input class="form-control" name="expense_amount[]" type="text" value="" id="" placeholder=""  >'
                                +'</div>'  
   
                                 +'</div>' 
                                + '<div class=" row">'
                                + '<div class="col-lg-12">'
                                     +'<label for="" class="">  Expense Description </label>'

                                        +' <textarea class="form-control" name="expense_description[]" rows="1"></textarea>'
                                +'</div>'  
                                +'</div>'  


                                   
                                + '<div class=" row">'
                                + '<div class="col-lg-12">'
                                        +'<label for="" class="" style="visibility: hidden;">  expense Description</label>'
                                        +' <br>'
                                        +' <a href="javascript:void(0);" class="remove_button"><button style="margin-bottom: 11px !important;"  type="button" class="btn btn-success pull-right">Delete</button></a>'
                                +'</div>'
                                +'</div><hr>'
                              
                             
   
   
   
                               +'</div>'   
   
   
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
   
   
   
   $(document).ready(function(){
         var maxField = 10; //Input fields increment limitation
         var add_second_step = $('.add_second_step'); //Add button selector
         var wrapper_add_second_step = $('.field_wrapper_add_second_step'); //Input field wrapper
         var fieldHTML_add_second_step = '<div>'
                         + '<div>'
                                 
                             + '<div class="form-group row">'
                               +'<div class="col-lg-4">'
                                  +'<label for="" class=""> origin </label>'
                                 
                                    +' <input class="form-control" name="sec_stop_origin[]" type="text" value="" id="" placeholder=""  ></div>'
   
                                
                                 
                                   +'<div class="col-lg-4">'
   
                                       +'<label for="" class=""> Destination </label>'
   
                                               
                                                +' <input class="form-control" name="sec_stop_destination[]" type="text" value="" id="" placeholder=""  ></div>'
                                               
                                
   
                                  +'<div class="col-lg-4">'
   
                                       +'<label for="" class=""> Rate </label>'
   
                                             
                                                +' <input class="form-control" name="sec_stop_amount[]" type="text" value="" id="" placeholder=""  ></div>'
                                               +'</div>'
   
                                 +'</div>'  
   
   
   
                                      + '<div class=" row">'
                                      + '<div class="col-lg-12">'
                                              +'<label for="" class="" style="visibility: hidden;">  expense Description</label>'
                                              +' <br>'
                                              +'<a href="javascript:void(0);" class="remove_button_second_step"><button style="margin-bottom: 11px !important;"  type="button" class="btn btn-success pull-right">Delete</button></a>'
                                      +'</div>'
                                      +'</div><hr>'
                                     
                                     
                                     
                                     
                                     
                                     +'</div>'
   
   
         +'</div>'; //New input field html 
         var x = 1; //Initial field counter is 1
   
   
         //Once add button is clicked
         $(add_second_step).click(function(){
             //Check maximum number of input fields
             if(x < maxField){ 
                 x++; //Increment field counter
                 $(wrapper_add_second_step).append(fieldHTML_add_second_step); //Add field html
             }
         });
         
         //Once remove button is clicked
         $(wrapper_add_second_step).on('click', '.remove_button_second_step', function(e){
             e.preventDefault();
             $(this).parent('div').remove(); //Remove field html
             x--; //Decrement field counter
         });



   
     });

    
   
</script>