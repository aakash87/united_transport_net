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
            <h1>Edit Orders</h1>
            <small></small>
            <ol class="breadcrumb">
               <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
               <li class="active">Edit Orders</li>
            </ol>
         </div>
      </div>
      <!-- /. Content Header (Page header) -->
      <form method="post" action="<?php echo base_url() ?>admin/orders/update" enctype="multipart/form-data">
         <input type="hidden" name="id" value="<?php echo $orders["id"] ?>">
         <div class="row">
            <div class="col-sm-12">
               <div class="panel panel-bd ">
                  <div class="panel-heading">
                     <div class="panel-title">
                        <h4>Edit Orders</h4>
                     </div>
                  </div>
                  <div class="panel-body">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Date</label>
                              <div class="col-sm-9"><input type="date" name="order_date" class="form-control" value="<?php echo $orders['order_date'] ?>" ></div>
                           </div>
                          
                            <div class="form-group row">

                              <input type="hidden" id="order_customer" name="order_customer" value="<?php echo $orders['customerId']; ?>">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Selectd Customer</label>
                              <div class="col-sm-9"><input class="form-control" name="" type="text" value="<?php echo $orders['full_name']; ?>" id="selectd_customer" placeholder="" readonly  ></div>
                         
                           </div>


                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label"> Select Order Type <span class="required">*</span></label>
                              <div class="col-sm-9">
                                 <select class="form-control" name="select_order_type"required="">
                                    <option>Select Order Type</option>
                                    <option value="30" <?php echo ($orders["order_type"] ==  30) ? 'selected': NULL;  ?> >Monthly Order </option>
                                    <option value="6" <?php echo ($orders["order_type"] ==  6) ? 'selected': NULL;  ?> >Weekly Order</option>
                                    <option value="1" <?php echo ($orders["order_type"] ==  1) ? 'selected': NULL;  ?> >Daily Order</option>
                                 </select>
                              </div>
                           </div>
                           

                           <div class="form-group row" class="sales_person_id_div">
                              <label for="example-text-input" class="col-sm-3 col-form-label"> Sales Person <span class="required">*</span></label>
                              <div class="col-sm-9">
                                 <select class="form-control" name="sales_person_id" id="sales_person_id" required="">
                                    <option>Select Sales Person</option>
                                    <?php foreach ($sales_person as $sal_person) :?>
                                    <option value="<?php echo $sal_person['id']; ?>" <?php echo ($orders["sales_person_id"] ==  $sal_person['id']) ? 'selected': NULL;  ?>><?php echo $sal_person['name']; ?></option>
                                    <?php endforeach; ?>
                                 </select>
                                 <div id="append_sales_person"></div>
                              </div>
                           </div>

                          
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Change Customer <span class="required">*</span></label>
                              <div class="col-sm-9">
                                 <select class="form-control" name="" id="customer_id" >
                                    <option>Select Customer</option>
                                    <?php foreach ($customers as $customer) : ?>
                                    <option value="<?php echo $customer['id']; ?>" <?php echo ($orders["order_customer"] ==  $customer['id']) ? 'selected': NULL;  ?> ><?php echo $customer['company_name']; ?></option>
                                  <?php endforeach; ?>
                                 </select> 
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Loading date</label>
                              <div class="col-sm-9"><input class="form-control" name="pickup_date_and_time" type="date" value="<?php echo $orders['pickup_date_and_time'] ?>" id="example-text-input" placeholder=""  ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label"> dropoff date</label>
                              <div class="col-sm-9"><input class="form-control" name="dropoff_date_and_time" type="date" value="<?php echo $orders['dropoff_date_and_time'] ?>" id="example-text-input" placeholder=""  ></div>
                           </div>
                       
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Pickup address</label>
                              <div class="col-sm-9"><textarea class="form-control" name="pickup_address" ><?php echo $orders['pickup_address'] ?></textarea></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Drop off address</label>
                              <div class="col-sm-9"><textarea class="form-control" name="drop_off_address" ><?php echo $orders['drop_off_address'] ?></textarea></div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Origin</label>
                              <div class="col-sm-9"><input type="text" class="form-control" name="pickup_location" value="<?php echo $orders['pickup_location'] ?>" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Destination</label>
                              <div class="col-sm-9"><input type="text" name="drop_off_location" class="form-control" value="<?php echo $orders['drop_off_location'] ?>" ></div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Remarks</label>
                              <div class="col-sm-9">
                                 <input type="text" name="remarks" class="form-control" value="<?php echo $orders['remarks'] ?>" >
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Rate</label>
                              <div class="col-sm-9"><input class="form-control" name="order_total_amount" type="text" value="<?php echo $orders['order_total_amount'] ?>" id="example-text-input" placeholder="" ></div>
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

   $('#').change


    $('#customer_id').on('change', function(){
   
        var customer_id = $(this).val();

        var selectedText = $(this).find('option:selected').text();

        $('#order_customer').val(customer_id);
        
        $('#selectd_customer').val(selectedText);
    
       
   
   
   
   
    });
   
</script>