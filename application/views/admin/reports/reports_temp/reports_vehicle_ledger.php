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
            <h1>View Reports Vehicle Ledger</h1>
            <small> </small>
            <ol class="breadcrumb">
               <li><a href=""><i class="pe-7s-home"></i> Home</a></li>
               <li class="active">View Reports Vehicle Ledger</li>
            </ol>
         </div>
      </div>
      <!-- /. Content Header (Page header) -->
     <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-bd">
                <div class="panel-heading">
                  <div class="panel-title">
                    <h4>View Reports Vehicle Ledger</h4>
                  </div>
                </div>
                <form method="post" action="<?php echo base_url() ?>admin/reports/reports_vehicle_ledger" enctype="multipart/form-data">
                  <div class="panel-body">
                    <div class="col-lg-6" >
                        <label for="example-text-input" class="col-sm-4 col-form-label">Select vehicels</label>
                                <div class="col-sm-8">
                                   <select class="form-control selectpicker" data-live-search="true" name="select_vehicel" >
                                      <option>Select Vehicel</option>

                                      <?php foreach ($vehicles as $veh) {?>
                                          <option value="<?php echo $veh["id"] ?>"><?php echo $veh["registration_number"] ?></option>
                                     <?php } ?></select>
                                </div>

                          </div>
                          <div class="col-lg-4" >
                             <label for="example-text-input" class="col-sm-4 col-form-label">Date</label>
                            
                               <div class="col-sm-8">
                                <input class="form-control" type="text" id="date_range_input" name="daterange" value="<?php echo  date("m/d/Y");?> - <?php echo  date("m/d/Y", strtotime(' +2 day'));?>" />
                               </div>

                          </div>

                      <div class="form-group col-lg-2">
                        
                          <button type="submit" id="customer_report_by_dateID" class="btn btn-success w-md m-b-5 m-t-5">Search</button>

                      </div>

                  </div>
                </form>
                <div class="panel-body">
                              
                              <div class="table-responsive">
                                  <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                      <thead>
                                          <tr>
                                              <th>Date</th>
                                              <th>Discription</th>
                                              <th>Debit</th>
                                              <th>Credit</th>
                                              <th>Balance</th>
                                          </tr>
                                      </thead>
                                    <tbody>
                                        <?php 
                                          $exp_total = 0;
                                          foreach ($exp_rep as $exp) : ?>
                                        <tr>
                                              <td><?php echo $exp['expense_title'] ?></td>
                                              <td><?php echo $exp['expense_description'] ?></td>
                                              <td></td>
                                              <td>
                                                  <?php echo $exp['expense_amount'] ?>
                                                  <?php $exp_total += $exp['expense_amount']  ?>
                                              </td>
                                              <td></td>
                                          </tr>
                                        <?php endforeach; ?>
                                    
                                        
                                        
                                          
                                      </tbody>
                                      <tfoot>

                                        <tr>
                                              <td></td>
                                              <td></td>
                                              <td>Total</td>
                                              <td><?php echo $exp_total; ?></td>
                                              <td></td>
                                          </tr>
                                        
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