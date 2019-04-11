
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
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon">
                <i class="pe-7s-note2"></i>
            </div>
            <div class="header-title">
                <h1>Edit Vandor Payment</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Edit Vandor Payment</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>admin/payments/updtae_vendor_invoice" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Edit Vandor Payment</h4>
                            </div>
                        </div>
                        <div class="panel-body">
                                
                                <?php
                                    // echo "<pre>";
                                    // print_r($selected_data);
                                    $s_no = 1;
                                    foreach ($selected_data as $module) {
                                ?>
                                <div class="" style="position: relative; clear: both;">
                                    <div class="footer-ribbon" style="background: #999; position: absolute; margin: -20px 0 0 11px; z-index: 111; font-size: 9px; padding: 1px 9px 4px 10px;">                     
                                        <span style="color: #FFF; font-size: 1.6em;">Order <?php echo  $s_no++;?></span>
                                    </div>                                  
                                    <div style="border: 2px solid; border-color: #999999;"><br>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="form-group col-lg-2">
                                                    <label for="" class="">Buying Assigned</label>
                                                    <input class="form-control" name="" type="text" value="<?php echo $module['baying_assigned_rates_for_vendor']?>" id="" >
                                                </div>
                                                <div class="form-group col-lg-2">
                                                    <label for="" class="">Buying Assigned C</label>
                                                    <input class="form-control" name="" type="text" value="<?php echo $module['order_total_amount']?>" id="" readonly>
                                                </div>
                                                <div class="form-group col-lg-2">
                                                    <label for="" class="">Local Transport</label>
                                                    <input class="form-control" name="" type="text" value="<?php echo $module['local_transport']?>" id="" >
                                                </div>
                                                <div class="form-group col-lg-2">
                                                    <label for="" class="">Detention</label>
                                                    <input class="form-control" name="" type="text" value="<?php echo $module['order_tenstion']?>" id="" >
                                                </div>
                                                <div class="form-group col-lg-2">
                                                    <label for="" class="">Detention For C</label>
                                                    <input class="form-control" name="" type="text" value="<?php echo $module['order_detention_customer']?>" id="" readonly>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="" style="position: relative; clear: both;">
                                                <div class="footer-ribbon" style="background: #999; position: absolute; margin: -20px 0 0 11px; z-index: 111; font-size: 9px; padding: 1px 9px 4px 10px;">                     
                                                    <span style="color: #FFF; font-size: 1.6em;">Order <?php echo  $s_no++;?></span>
                                                </div> 
                                                <div class="panel-body" style="border: 2px solid; border-color: #999999;"><br>
                                                    <div class="row">
                                                        <div class="form-group col-lg-2">
                                                            <label for="" class="">Buying Assigned</label>
                                                            <input class="form-control" name="" type="text" value="<?php echo $module['baying_assigned_rates_for_vendor']?>" id="" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    
                                </div>
                                <?php } ?>
                                
                                    <div class="form-group row">

                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                                </div>
                            </div>

                        </div>
                    </div>
               
            </div>
        </form>
    </div>
    </div>
    </div>
    
