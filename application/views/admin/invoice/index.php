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
                              <th>INV #</th>
                              <th>Customer Name</th>
                              <th>Customer SalesPerson</th>
                              <th>Invoice Status</th>
                              <th>Paid Amount</th>
                              <th>invoice_total_amount</th>
                             


                              <?php 
                                 if ($permission["edit"] == "1" || $permission["deleted"] == "1"){
                                 ?>
                              <th>Action<span style="visibility: hidden;">dsdsaas</span></th>
                              <?php } ?>
                           </tr>
                        </thead>
                        <tbody>

                           <?php
                              $s_number = count($invoice);
                              foreach ($invoice as $module) {


                           
                           ?>
                           <?php //echo '<pre>';  print_r($module); ?>

                            <tr>
   
                                 <td>
                                    <?php echo  $s_number--; ?>
                                 </td>
                                 <td><?php echo $module['invoice_voucher_number']; ?></td>
                                 <td><?php echo $module['full_name']; ?></td>
                                 <td><?php echo $module['sp_name']; ?></td>
                                 <td><?php echo $module['status']; ?></td>
                                 <!-- <td>
                                    <?php if ( $module['invoice_status'] == 1) : ?>
                                       complete 
                                    <?php endif; ?>
                                     <?php if ( $module['invoice_status'] == 0) : ?>
                                       Pending 
                                    <?php endif; ?>
                                 </td> -->
                                 <td><?php echo number_format($module['customer_paid_amount']); ?></td>
                                 <td><?php echo number_format($module['invoice_total_amount']); ?></td>
                                 <td>
                                    <?php 
                                       if ($permission["edit"] == "1") {
                                       ?>
                                    <a href="<?php echo base_url() ?>admin/invoice/edit/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/record1.png" title="View Order" alt="View Order" width="25" height="25"></a>
                                    <?php } ?>
                                    <?php 
                                       if ($permission["deleted"] == "1") {
                                       ?>
                                    <img src="<?php echo base_url() ?>assets/d-icon.png" title="Delete" alt="Delete" width="25" height="25" class="delete" id='del_<?php echo $module["id"] ?>' >
                                    <!-- <a href="<?php echo base_url() ?>admin/invoice/delete/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/d-icon.png" title="Delete" alt="Delete" width="25" height="25"></a> -->
                                    <?php } ?>
                                    <?php if ($module['tax_amount'] == 0) {
                                       ?>
                                        <a href="<?php echo base_url() ?>admin/invoice/inv_with_out_sst/<?php echo $module["id"] ?>" target="_blank"><img src="<?php echo base_url() ?>assets/img/view_report.png" title="View Invoice PDF" alt="View Invoice PDF" width="25" height="25"></a>
                                       <?php
                                    }else{?>
                                      <a href="<?php echo base_url() ?>admin/invoice/inv_with_sst/<?php echo $module["id"] ?>" target="_blank"><img src="<?php echo base_url() ?>assets/img/view_report.png" title="View Invoice PDF" alt="View Invoice PDF" width="25" height="25"></a>
                                       
                                    <?php } ?>
                                   
                                 <?php if ($module['invoice_status'] == 0) : ?>
                                    
                                    <a href="<?php echo base_url() ?>admin/invoice/submit_invoice/<?php echo $module["id"] ?>" target="_blank"><img src="<?php echo base_url() ?>assets/img/payment_issue.png" title="Submit Invoice" alt="Submit Invoice" width="25" height="25" style="<?php if ($module['balance'] == 0) {
                                      echo "display:none";}?>">
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
<script type="text/javascript">
   $(document).ready(function(){

     // Delete 
     $('.delete').click(function(){
       var el = this;
       var id = this.id;
       var splitid = id.split("_");

       // Delete id
       var deleteid = splitid[1];
      // alert(deleteid);
       // Confirm box
       bootbox.confirm("Are you sure want to delete?", function(result) {
    
          if(result){

             $.ajax({
                type: 'POST',
                  data: { id:deleteid },
                url: '<?php echo base_url() ?>admin/invoice/delete_invoice/',
                success: function(resp){
                   $(el).closest('tr').css('background','tomato');
                   $(el).closest('tr').fadeOut(800, function(){ 
                     $(this).remove();
                   });

                

                     
                   
                }
            });
          }
    
       });
    
     });
   });
</script>