<style type="text/css">
  .dropdown-menu.open {
    z-index: 999 !important;
}
</style>
<div id="page-wrapper" style="min-height: 543px;">
   <!-- main content -->
   <div class="content">
      <!-- Content Header (Page header) -->
      <div class="content-header">
         <div class="header-icon">
            <i class="pe-7s-box1"></i>
         </div>
         <div class="header-title">
            <h1>View Sales Person Orders</h1>
            <small> </small>
            <ol class="breadcrumb">
               <li><a href="http://localhost/ubws_system/"><i class="pe-7s-home"></i> Home</a></li>
               <li class="active">View Vehicle Fuel Reports</li>
            </ol>
         </div>
      </div>
      <!-- /. Content Header (Page header) -->
     <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-bd">
                <div class="panel-heading">
                  <div class="panel-title">
                    <h4>View Vehicle Fuel Report</h4>
                  </div>
                </div>
                <form method="post" action="<?php echo base_url() ?>admin/orders/get_report_by_sales_person" enctype="multipart/form-data">
                  <div class="panel-body">
                    <div class="form-group row" >

                      <label for="example-text-input" class="col-sm-2 col-form-label">Select vehicle</label>
                        <div class="col-sm-4">
                           <select class="form-control selectpicker" data-live-search="true" name="select_sales_person" >
                              <option>Select vehicle</option><?php foreach ($vehicle as $vehi) {?>
                                  <option value="<?php echo $vehi["id"] ?>"><?php echo $vehi["registration_number"] ?></option>
                             <?php } ?></select>
                        </div>

                         <label for="example-text-input" class="col-sm-2 col-form-label">Select vehicle</label>

                        <div class="col-sm-4">

                             <input class="form-control" type="text" id="date_range_input" name="daterange" value="<?php echo  date("m/d/Y");?> - <?php echo  date("m/d/Y", strtotime(' +2 day'));?>" />
                         
                        </div>



                      <div class="form-group col-lg-2">
                        
                          <button type="submit" id="customer_report_by_dateID" class="btn btn-success w-md m-b-5 m-t-5">Search</button>

                      </div>
                    </div>

                                

                  </div>
                </form>
                <div class="panel-body">
                              
                              <div class="table-responsive">
                                  <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                      <thead>
                                          <tr>
                                              <th>S.No</th>
                                              <th>Customer Name</th>
                                              <th>Sales Person</th>
                                              <th>order Total Amount</th>
                                             <!--  <th>Grand Total</th>
                                              <th>Paid</th>
                                              <th>Balance</th>
                                              <th>Payment Status</th>
                                              <th>action</th> -->
                                            
                                              
                                          </tr>
                                      </thead>
                                    <tbody>
                                    
                                        
                                        
                                          
                                      </tbody>
                                      <tfoot>
                                        
                                      </tfoot>
                                  </table>
                                  
                              </div>
                  </div>
              </div>
            </div>
          </div>
      <div style="height: 450px;"></div>
   </div>
   <!-- /.main content -->
</div>