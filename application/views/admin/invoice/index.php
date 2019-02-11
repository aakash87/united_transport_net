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
            <h1>View Invoice</h1>
            <small> </small>
            <ol class="breadcrumb">
               <li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i> Home</a></li>
               <li class="active">View Invoice</li>
            </ol>
         </div>
      </div>
      <!-- /. Content Header (Page header) -->
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-bd">
               <div class="panel-heading">
                  <div class="panel-title">
                     <h4>View Invoice</h4>
                     <?php 
                        if ($permission["created"] == "1") {
                        ?>
                    
                     <?php } ?>

                      <a href="<?php echo base_url("admin/invoice/summary_report_invoice") ?>"><button class="btn btn-info pull-right">Summary Reports</button></a>

                      <a href="<?php echo base_url("admin/invoice/add_invoice") ?>"><button class="btn btn-info pull-right">Add Invoices</button></a>

                  </div>
               </div>

               <div class="panel-body">
                  <div class="table-responsive">
                     <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                        <thead>
                           <tr>
                              <th>S#</th>
                              <th>Customer Name</th>
                              <th>Customer SalesPerson</th>
                              <th>Invoice Status</th>
                              <th>Paid Amount</th>
                              <th>invoice_total_amount</th>
                             


                              <?php 
                                 if ($permission["edit"] == "1" || $permission["deleted"] == "1"){
                                 ?>
                              <th>Action</th>
                              <?php } ?>
                           </tr>
                        </thead>
                        <tbody>

                           <?php
                              $s_number = 1;
                              foreach ($invoice as $module) {


                           
                           ?>
                           <?php //echo '<pre>';  print_r($module); ?>

                            <tr>
   
                                 <td>
                                    <?php echo  $s_number++; ?>
                                 </td>
                                 <td><?php echo $module['full_name']; ?></td>
                                 <td><?php echo $module['sp_name']; ?></td>
                                 <td>
                                    <?php if ( $module['invoice_status'] == 1) : ?>
                                       complete 
                                    <?php endif; ?>
                                     <?php if ( $module['invoice_status'] == 0) : ?>
                                       Pending 
                                    <?php endif; ?>
                                 </td>
                                 <td><?php echo $module['customer_paid_amount']; ?></td>
                                 <td><?php echo $module['invoice_total_amount']; ?></td>
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

                                    <a href="<?php echo base_url() ?>admin/invoice/pdf_view_of_invoice/<?php echo $module["invoiceID"] ?>" target="_blank">View Invoice PDF</a>
                                 <?php if ($module['invoice_status'] == 0) : ?>
                                    
                                    <a href="<?php echo base_url() ?>admin/invoice/paid_invoice/<?php echo $module["invoiceID"] ?>" target="_blank">Paid Invoice</a>
                                 <?php endif; ?>   

                                 </td>
                              </tr>
                        <?php } ?>
                          
                        </tbody>
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