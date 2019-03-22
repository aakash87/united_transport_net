
<!-- large image css -->
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
   <div class="content">        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon">
                <i class="pe-7s-note2"></i>
            </div>
            <div class="header-title">
                <h1>View Order Detail</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">View Order Detail</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->
        <div class="row">
            <div class="col-sm-12">
               
                <div class="panel panel-bd ">

                    <div class="panel-heading">
                            <div class="panel-title">
                                <h4>View Order Detail</h4>
                            </div>
                        </div>
                
                    
                <form method="post" action="" enctype="multipart/form-data">
                    
                    <div class="panel-body">
                        <div class="row panel-body" style="position: relative; clear: both;">
                            <div class="footer-ribbon" style="background: #999; position: absolute; margin: -20px 0 0 11px; z-index: 111; font-size: 9px; padding: 1px 9px 4px 10px;">                     
                                <span style="color: #FFF; font-size: 1.6em;">Order Detail</span>
                            </div>                                  
                            <div class="col-lg-12" style="border: 2px solid; border-color: #999999;"><br>
                                <div class="row">
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                          <strong style="font-weight: 600;">Customer Name </strong> :
                                          <e class="full_name_value"><?php echo $orders["full_name"] ?></e><br>
                                      </address>
                                    </div>
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                               <strong style="font-weight: 600;">Order Type </strong> :
                                        <e class="father_name_value">
                                          <?php if ($orders["order_type"] ==  30) { echo "Monthly Order"; }  ?>
                                          <?php if ($orders["order_type"] ==  6) { echo "Weekly Order"; }  ?>
                                          <?php if ($orders["order_type"] ==  1) { echo "Daily Order"; }  ?>
                                        </e><br>
                                      </address>
                                    </div>
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                               <strong style="font-weight: 600;">Loading Date/Time </strong> :
                                         <e class=""><?php 


                                    $originalDate = $orders["pickup_date_and_time"];
                                    $pickup_date_and_time = date("d-m-Y", strtotime($originalDate)); echo $pickup_date_and_time ;?> </e><br>
                                      </address>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                          <strong style="font-weight: 600;">Pickup Location </strong> :
                                          <e class="full_name_value"><?php echo $orders["pickup_location"];?></e><br>
                                      </address>
                                    </div>
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                               <strong style="font-weight: 600;">Dropoff Location </strong> :
                                         <e class="father_name_value"><?php echo $orders["drop_off_location"];?></e><br>
                                      </address>
                                    </div>
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                               <strong style="font-weight: 600;">Sales Person </strong> :
                                         <e class=""><?php echo $orders["sp_name"];?></e><br>
                                      </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                          <strong style="font-weight: 600;">Vendor Name </strong> :
                                          <e class="full_name_value"><?php 
                                            if ($orders["order_vendor_id"] == TRUE) {
                                            $get_order_v_name = $this->db->query("SELECT * FROM `vendor` where id='".$orders["order_vendor_id"]."' ")->row_array(); echo  $get_order_v_name['vendor_name']; }?>
                                            </e><br>
                                      </address>
                                    </div>
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                               <strong style="font-weight: 600;">Assigned Vehicle </strong> :
                                         <e class="father_name_value"><?php echo $orders["vehicel_of_vendor"];?></e><br>
                                      </address>
                                    </div>
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                               <strong style="font-weight: 600;">Vehicle Type </strong> :
                                         <e class=""><?php echo $orders["vehicle_type"];?></e><br>
                                      </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                          <strong style="font-weight: 600;">Vehicle Buying </strong> :
                                          <e class="full_name_value"><?php echo $orders["baying_assigned_rates"];?></e><br>
                                      </address>
                                    </div>
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                               <strong style="font-weight: 600;">Buying Assigned </strong> :
                                         <e class="father_name_value"><?php echo $orders["order_type"];?></e><br>
                                      </address>
                                    </div>
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                               <strong style="font-weight: 600;">Driver Name </strong> :
                                         <e class=""><?php 
                                            if ($orders["order_driver"] == TRUE) {
                                            $get_order_d_name = $this->db->query("SELECT * FROM `drivers` where id='".$orders["order_driver"]."' ")->row_array(); echo  $get_order_d_name['First_Name']; }?>
                                            </e><br>
                                      </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                          <strong style="font-weight: 600;">Local Vendor Name </strong> :
                                          <e class="full_name_value"><?php 
                                            if ($orders["order_local_vendor_id"] == TRUE) {
                                            $get_order_l_v_name = $this->db->query("SELECT * FROM `vendor` where id='".$orders["order_local_vendor_id"]."' ")->row_array(); echo  $get_order_l_v_name['vendor_name']; }?> </e><br>
                                      </address>
                                    </div>
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                               <strong style="font-weight: 600;">Local Transport </strong> :
                                         <e class="father_name_value"><?php if($orders["local_transport"] == FALSE){echo "0";}else{
                                            echo $orders["local_transport"];
                                          } ?></e><br>
                                      </address>
                                    </div>
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                               <strong style="font-weight: 600;">Detention For Vendor </strong> :
                                         <e class=""><?php if($orders["order_tenstion"] == FALSE){echo "0";}else{
                                            echo $orders["order_tenstion"];
                                          } ?></e><br>
                                      </address>
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-lg-4" style="margin-top:-14px;">
                                            <address>
                                              <strong style="font-weight: 600;">Detention For Customer </strong> :
                                              <e class="full_name_value"><?php if($orders["order_detention_customer"] == FALSE){echo "0";}else{
                                                  echo $orders["order_detention_customer"];
                                                } ?><br>
                                          </address>
                                        </div>
                                        <div class="col-lg-4" style="margin-top:-14px;">
                                            <address>
                                                   <strong style="font-weight: 600;">Builty # </strong> :
                                             <e class="father_name_value"><?php echo ($orders["builty_num"]) ? $orders["builty_num"] : NULL ; ?></e><br>
                                          </address>
                                        </div>
                                        <div class="col-lg-4" style="margin-top:-14px;">
                                            <address>
                                                   <strong style="font-weight: 600;">Detention For Vendor </strong> :
                                             <e class=""><?php echo $orders["order_type"];?></e><br>
                                          </address>
                                        </div>
                                    </div>
                                <div class="row">
                                    
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                               <strong style="font-weight: 600;">Pickup Address </strong> :
                                         <e class="father_name_value"><?php echo $orders["pickup_address"];?></e><br>
                                      </address>
                                    </div>
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                               <strong style="font-weight: 600;">Dropoff Address </strong> :
                                         <e class=""><?php echo $orders["drop_off_address"];?></e><br>
                                      </address>
                                    </div>
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                          <strong style="font-weight: 600;">Dropoff Date/Time </strong> :
                                          <e class="full_name_value"><?php 


                                    $originalDate2 = $orders["dropoff_date_and_time"];
                                    $dropoff_date_and_time = date("d-m-Y", strtotime($originalDate2)); echo $dropoff_date_and_time ;?></e><br>
                                      </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                          <strong style="font-weight: 600;">Order Amount </strong> :
                                          <e class="full_name_value"><?php echo $orders["order_total_amount"] ?></e><br>
                                      </address>
                                    </div>
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                               <strong style="font-weight: 600;">Order Status </strong> :
                                         <e class="father_name_value">
                                          <?php if ($orders["order_status"] == 'pending' )  { echo "Pending"; }?>
                                          <?php if ($orders["order_status"] == 'Complete' ) { echo "Complete"; }?>
                                          <?php if ($orders["order_status"] == 'Process' )  { echo "Process"; }?>
                                         </e><br>
                                      </address>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                     
                        <?php $labor_charges_count = 0; foreach ($order_labor_charges as $labor_charges) : $labor_charges_count++ ?>
                        <div class="row panel-body" style="position: relative; clear: both;">
                            <div class="footer-ribbon" style="background: #999; position: absolute; margin: -20px 0 0 11px; z-index: 111; font-size: 9px; padding: 1px 9px 4px 10px;">                     
                                <span style="color: #FFF; font-size: 1.6em;">Labour Charges <?php echo $labor_charges_count ?></span>
                            </div>                                  
                            <div class="col-lg-12" style="border: 2px solid; border-color: #999999;"><br>
                                <div class="row">
                                    <div class="col-lg-3" style="margin-top:-14px;">
                                        <address>
                                          <strong style="font-weight: 600;">Labour Vendor </strong> :
                                          <e class="full_name_value"><?php 
                                            if ($labor_charges['order_vendor_id'] == TRUE) {
                                            $get_order_vendor = $this->db->query("SELECT * FROM `vendor` where id='".$labor_charges['order_vendor_id']."' ")->row_array(); echo  $get_order_vendor['vendor_name']; }?></e><br>
                                      </address>
                                    </div>
                                    <div class="col-lg-3" style="margin-top:-14px;">
                                        <address>
                                               <strong style="font-weight: 600;">Charges For Vendor </strong> :
                                         <e class="father_name_value"><?php echo $labor_charges["labor_charges"]; ?></e><br>
                                      </address>
                                    </div>
                                    <div class="col-lg-3" style="margin-top:-14px;">
                                        <address>
                                               <strong style="font-weight: 600;">Charges For Cus </strong> :
                                         <e class=""><?php echo $labor_charges["labor_charges_customer"]; ?></e><br>
                                      </address>
                                    </div>
                                    <div class="col-lg-3" style="margin-top:-14px;">
                                        <address>
                                          <strong style="font-weight: 600;">Description </strong> :
                                          <e class="full_name_value"><?php echo $labor_charges["labor_charges_description"]; ?></e><br>
                                      </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php $expense_count = 0 ;  foreach ($order_expense as $expense) { $expense_count++;  ?>
                        <div class="row panel-body" style="position: relative; clear: both;">
                            <div class="footer-ribbon" style="background: #999; position: absolute; margin: -20px 0 0 11px; z-index: 111; font-size: 9px; padding: 1px 9px 4px 10px;">                     
                                <span style="color: #FFF; font-size: 1.6em;">Expense <?php echo $expense_count ?></span>
                            </div>                                  
                            <div class="col-lg-12" style="border: 2px solid; border-color: #999999;"><br>
                                <div class="row">
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                          <strong style="font-weight: 600;">Expense Title </strong> :
                                          <e class="full_name_value"><?php echo $expense['expense_title'] ?></e><br>
                                      </address>
                                    </div>
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                               <strong style="font-weight: 600;">Expense Date </strong> :
                                         <e class="father_name_value"><?php echo $expense['expense_date'] ?></e><br>
                                      </address>
                                    </div>
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                               <strong style="font-weight: 600;">Expense Amount </strong> :
                                         <e class=""><?php echo $expense['expense_amount'] ?></e><br>
                                      </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                          <strong style="font-weight: 600;">Expense Category </strong> :
                                          <e class="full_name_value"><?php

                                          if ($expense['expense_category'] == TRUE) {
                                            $get_order_expanse_cat = $this->db->query("SELECT * FROM `expense_category` where id='".$expense['expense_category']."' ")->row_array(); echo  $get_order_expanse_cat['expense_cate_title']; } ?></e><br>
                                      </address>
                                    </div>
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                               <strong style="font-weight: 600;">Expense Description </strong> :
                                         <e class="father_name_value"><?php echo $expense['expense_description'] ?></e><br>
                                      </address>
                                    </div>
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                               <strong style="font-weight: 600;">Paid By </strong> :
                                         <e class=""><?php echo $expense['paid_by'] ?></e><br>
                                      </address>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                      <?php } ?>
                      <?php $order_second_stop_count = 0; ?>
                     <?php foreach ($order_second_stop as $order_second) { $order_second_stop_count++ ?>
                        <div class="row panel-body" style="position: relative; clear: both;">
                            <div class="footer-ribbon" style="background: #999; position: absolute; margin: -20px 0 0 11px; z-index: 111; font-size: 9px; padding: 1px 9px 4px 10px;">                     
                                <span style="color: #FFF; font-size: 1.6em;">2<sup>nd</sup>  Stop Detail <?php echo $order_second_stop_count ?> </span>
                            </div>                                  
                            <div class="col-lg-12" style="border: 2px solid; border-color: #999999;"><br>
                                <div class="row">
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                          <strong style="font-weight: 600;">Origin </strong> :
                                          <e class="full_name_value"><?php echo $order_second['sec_stop_origin'] ?></e><br>
                                      </address>
                                    </div>
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                               <strong style="font-weight: 600;">Destination </strong> :
                                         <e class="father_name_value"><?php echo $order_second['sec_stop_destination'] ?></e><br>
                                      </address>
                                    </div>
                                    <div class="col-lg-4" style="margin-top:-14px;">
                                        <address>
                                               <strong style="font-weight: 600;">Stop Amount </strong> :
                                         <e class=""><?php echo $order_second['sec_stop_amount'] ?></e><br>
                                      </address>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                      <?php } ?>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
                 