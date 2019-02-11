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
                              <label for="example-text-input" class="col-sm-3 col-form-label"> Select Order Type <span class="required">*</span></label>
                              <div class="col-sm-9">
                                 <select class="form-control" name="select_order_type"required="" id="select_order_type">
                                    <option>Select Order Type</option>
                                    <option value="30" <?php echo ($orders["order_type"] ==  30) ? 'selected': NULL;  ?> >Monthly Order </option>
                                    <option value="6" <?php echo ($orders["order_type"] ==  6) ? 'selected': NULL;  ?> >Weekly Order</option>
                                    <option value="1" <?php echo ($orders["order_type"] ==  1) ? 'selected': NULL;  ?> >Daily Order</option>
                                 </select>
                              </div>
                           </div>
                           

                             <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Pickup date and time</label>
                                <div class="col-sm-9">
                                   <input class="form-control" name="pickup_date_and_time" type="text" value="<?php echo $orders["pickup_date_and_time"] ?>" id="" placeholder="" readonly >
                                </div>
                             </div>
                             <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label"> dropoff date and time</label>
                                <div class="col-sm-9">
                                   <input class="form-control" name="dropoff_date_and_time" type="text" value="<?php echo $orders["dropoff_date_and_time"] ?>" id="" placeholder="" readonly >
                                </div>
                             </div>
                             <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Pickup address</label>
                                <div class="col-sm-9">
                                   <textarea class="form-control" name="pickup_address" readonly ><?php echo $orders["pickup_address"]  ?></textarea>
                                </div>
                             </div>
                             <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Drop off address</label>
                                <div class="col-sm-9">
                                   <textarea class="form-control" name="drop_off_address" readonly ><?php echo $orders["drop_off_address"]   ?></textarea>
                                </div>
                             </div>
                             <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Pickup location</label>
                                <div class="col-sm-9">
                                   <textarea class="form-control" name="pickup_location" readonly ><?php echo $orders["pickup_location"] ?></textarea>
                                </div>
                             </div>


                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Drop off location</label>
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
                           <label for="example-text-input" class="col-sm-3 col-form-label">Vehicel of Vendor</label>
                           <div class="col-sm-9">
                              <input class="form-control" name="vehicel_of_vendorID" type="hidden" value="<?php echo $orders['vehicel_of_vendor'] ?>" id="vehicel_of_vendorID" placeholder=""  >
                              <select class="form-control" name="vehicel_of_vendor" id="vehicel_of_vendor" value="">
                                 <option value="">Select Vehicel Vendor</option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="example-text-input" class="col-sm-3 col-form-label">Vehicel Type</label>
                           <div class="col-sm-9"><input class="form-control" name="vehicle_type" type="text" value="" id="vehicle_type" placeholder="" readonly="" ></div>
                        </div>
                        <div class="form-group row">
                           <label for="example-text-input" class="col-sm-3 col-form-label">Vehicel Bying</label>
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
                           <label for="example-text-input" class="col-sm-3 col-form-label"> Tention </label>
                           <div class="col-sm-9">
                              <input class="form-control" name="order_tenstion" type="text" value="<?php echo ($orders["order_tenstion"]) ? $orders["order_tenstion"] : NULL ; ?>" id="" placeholder="" >
                           </div>
                        </div>

                        
                     </div>   
                        

                        
                        </div>

                    </div>
                    <hr>

                      <div class="col-md-6"  >
                          <?php $expense_count = 0; ?>
                     <?php foreach ($order_expense as $expense) : $expense_count++ ?>
                     <div class="form-group row">
                        <h4>Expense <?php echo $expense_count ?> </h4>
                        <input type="hidden" value="<?php echo $expense['id'] ?>" name="expense_update_id[]">
                        <label for="" class="col-sm-3 col-form-label"> expense Title </label>
                        <div class="col-sm-9">
                           <input class="form-control" name="expense_title_update[]" type="text" value="<?php echo $expense['expense_title'] ?>" id="" placeholder=""  >
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> expense date </label>
                        <div class="col-sm-9">
                           <input class="form-control" name="expense_date_update[]" type="text" value="<?php echo $expense['expense_date'] ?>" id="" placeholder=""  >
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> expense amount </label>
                        <div class="col-sm-9">
                           <input class="form-control" name="expense_amount_update[]" type="text" value="<?php echo $expense['expense_amount'] ?>" id="" placeholder=""  >
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> expense description </label>
                        <div class="col-sm-9">
                           <input class="form-control" name="expense_description_update[]" type="text" value="<?php echo $expense['expense_description'] ?>" id="" placeholder=""  >
                        </div>
                     </div>
                     <?php endforeach; ?>
                    
                      </div>
                      <div class="col-md-6"  >
                         <?php $order_second_stop_count = 0; ?>
                     <?php foreach ($order_second_stop as $order_second) : $order_second_stop_count++ ?>
                     <div class="form-group row">
                        <h4>2<sup>nd</sup>  Stop Detail <?php echo $order_second_stop_count ?> </h4>
                        <input type="hidden" value="<?php echo $order_second['id'] ?>" name="second_stop_id[]">
                        <label for="" class="col-sm-3 col-form-label"> Origin </label>
                        <div class="col-sm-9">
                           <input class="form-control" name="sec_stop_origin_update[]" type="text" value="<?php echo $order_second['sec_stop_origin'] ?>" id="" placeholder=""  >
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Destination </label>
                        <div class="col-sm-9">
                           <input class="form-control" name="sec_stop_destination_update[]" type="text" value="<?php echo $order_second['sec_stop_destination'] ?>" id="" placeholder=""  >
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Stop Amount </label>
                        <div class="col-sm-9">
                           <input class="form-control" name="sec_stop_amount_update[]" type="text" value="<?php echo $order_second['sec_stop_amount'] ?>" id="" placeholder=""  >
                        </div>
                     </div>
                     <?php endforeach; ?>

                      </div>


                   
                     <!-- working -->
                     <div class="field_wrapper_expense"></div>
                     <div class="field_wrapper_add_second_step"></div>
                     


                     <div class="form-group row">
                        <div class="col-sm-12">
                           <button type="button"  class="btn btn-success pull-right add_button">Add Expanse</button>
                           <button type="button"  class="btn btn-success pull-right add_second_step">Add Second Step</button>
                        </div>
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
                                +'<label for="" class="col-sm-3 col-form-label"> expense Title </label>'
                                 +'<div class="col-sm-9">'
                                  +' <input class="form-control" name="expense_title[]" type="text" value="" id="" placeholder=""  ></div>'
   
                               +'</div>'   
                               
                                + '<div class="form-group row">'
   
                                     +'<label for="" class="col-sm-3 col-form-label"> Expense Date </label>'
   
                                             +'<div class="col-sm-9">'
                                              +' <input class="form-control" name="expense_date[]" type="date" value="" id="" placeholder=""  ></div>'
                                             +'</div>'
                              
   
                                + '<div class="form-group row">'
   
                                     +'<label for="" class="col-sm-3 col-form-label"> expense expense_amount </label>'
   
                                             +'<div class="col-sm-9">'
                                              +' <input class="form-control" name="expense_amount[]" type="text" value="" id="" placeholder=""  ></div>'
                                             +'</div>'
   
   
   
                               +'</div>'  
   
   
                                + '<div class="form-group row">'
   
                                     +'<label for="" class="col-sm-3 col-form-label"> expense Description </label>'
   
                                             +'<div class="col-sm-9">'
                                              +' <input class="form-control" name="expense_description[]" type="text" value="" id="" placeholder=""  ></div>'
                                             +'</div>'
   
   
                               +'<a href="javascript:void(0);" class="remove_button"><img src="remove-icon.png"/></a>'
                             
   
   
   
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
                         + '<div><hr>'
                                 
                              + '<div class="form-group row">'
                                  +'<label for="" class="col-sm-3 col-form-label"> origin </label>'
                                   +'<div class="col-sm-9">'
                                    +' <input class="form-control" name="sec_stop_origin[]" type="text" value="" id="" placeholder=""  ></div>'
   
                                 +'</div>'   
                                 
                                  + '<div class="form-group row">'
   
                                       +'<label for="" class="col-sm-3 col-form-label"> Destination </label>'
   
                                               +'<div class="col-sm-9">'
                                                +' <input class="form-control" name="sec_stop_destination[]" type="text" value="" id="" placeholder=""  ></div>'
                                               +'</div>'
                                
   
                                  + '<div class="form-group row">'
   
                                       +'<label for="" class="col-sm-3 col-form-label"> Rate </label>'
   
                                               +'<div class="col-sm-9">'
                                                +' <input class="form-control" name="sec_stop_amount[]" type="text" value="" id="" placeholder=""  ></div>'
                                               +'</div>'
   
                                 +'</div>'  
   
   
                                 +'<a href="javascript:void(0);" class="remove_button_second_step"><img src="remove-icon.png"/></a>'
   
   
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