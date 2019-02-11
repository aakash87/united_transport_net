<style type="text/css">
  .dropdown-menu.open {
    z-index: 999 !important;
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
            <i class="pe-7s-box1"></i>
         </div>
         <div class="header-title">
            <h1>Add Invoice</h1>
            <small> </small>
            <ol class="breadcrumb">
               <li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i> Home</a></li>
               <li class="active">Add Invoice</li>
            </ol>
         </div>
      </div>
      <!-- /. Content Header (Page header) -->
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-bd">
               <div class="panel-heading">
                  <div class="panel-title">
                     <h4>Add Invoice</h4>
                     <?php 
                        if ($permission["created"] == "1") {
                        ?>
                    
                     <?php } ?>
                  </div>
               </div>


             
               
               <div class="panel-body">
                   <form method="post" action="<?php echo base_url() ?>admin/invoice/add_invoice" enctype="multipart/form-data">
                  <div class="form-group row" >
                     <div class="col-lg-6"">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Select  Customer</label>
                        <div class="col-sm-8">
                           <select class="form-control selectpicker" data-live-search="true" name="select_customer" >
                              <option>Select Customer </option>
                              <?php foreach ($customers as $cust) {?>
                              <option value="<?php echo $cust["id"] ?>" <?php echo ($customer == $cust["id"]  ) ? 'selected' : NULL ; ?>><?php echo $cust["company_name"] ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group col-lg-2">
                        <button type="submit" id="customer_report_by_dateID" class="btn btn-success w-md m-b-5 m-t-5">Search</button>
                     </div>
                  </div>
               </form>
               
                <form method="post" action="<?php echo base_url() ?>admin/invoice/create_selected_inboice"
                enctype="multipart/form-data">
                  <div class="table-responsive">
                     <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                        <thead>
                           <tr>
                              <th><input type="checkbox" class="check_all"></th>
                              <th>Customer Name</th>
                              <th>Customer SalesPerson</th>
                              <th>Order Date</th>
                              <th>Order Status</th>
                             


                              <?php 
                                 if ($permission["edit"] == "1" || $permission["deleted"] == "1"){
                                 ?>
                              <th>Action</th>
                              <?php } ?>
                           </tr>
                        </thead>
                        <tbody>

                           <?php

                              foreach ($invoice as $module) {
                           
                           ?>
                           <tr>
                              
                              <td>
                                 <input type="checkbox" class="add_check" name="id[]" value="<?php echo $module['id'] ?>">
                              </td>
                              <td><?php echo $module['customer_name']; ?></td>
                              <td><?php echo $module['sp_name']; ?></td>
                              <td><?php echo $module['order_date']; ?></td>
                              <td><?php echo $module['order_status']; ?></td>
                              <td>
                                 <?php 
                                    if ($permission["edit"] == "1") {
                                    ?>
                                 <a href="<?php echo base_url() ?>admin/invoice/edit/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/record1.png" title="View Order" alt="View Order" width="35" height="35"></a>
                                 <?php } ?>
                                 <?php 
                                    if ($permission["deleted"] == "1") {
                                    ?>
                                 <a href="<?php echo base_url() ?>admin/invoice/delete/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/d-icon.png" title="Delete" alt="Delete" width="35" height="35"></a>
                                 <?php } ?>
                              </td>
                           </tr>
                        <?php } ?>
                          
                        </tbody>
                     </table>
                  </div>
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
               </div>

            </form>
            </div>
         </div>
      </div>
      <div style="height: 450px;"></div>
   </div>
   <!-- /.main content -->
</div>
<!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<!-- START CORE PLUGINS -->


<script type="text/javascript">
$('.check_all').change(function() {
if($(this).is(':checked')){
$('.add_check').removeAttr('checked');
$('.add_check').click();
//$('.add_check').attr('checked', true);
}
else{
$('.add_check').removeAttr('checked');
}
//$('.add_check').click();
})
</script>