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
            <h1>Deposit Reports</h1>
            <small> </small>
            <ol class="breadcrumb">
               <li><a href=""><i class="pe-7s-home"></i> Home</a></li>
               <li class="active">Deposit Reports</li>
            </ol>
         </div>
      </div>
      <!-- /. Content Header (Page header) -->
     <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-bd">
                <div class="panel-heading">
                  <div class="panel-title">
                    <h4>Deposit Reports</h4>
                  </div>
                </div>
                <form method="post" action="<?php echo base_url() ?>admin/bank/deposit_reports" enctype="multipart/form-data">
                  <div class="panel-body">
                    <div class="col-lg-4" >
                             <label for="example-text-input" class="col-sm-4 col-form-label">Banks</label>
                            
                               <div class="col-sm-8">
                                 <select class="form-control" name="banks_id" id="banks_id" required="">
                                      <option>Select Bank Account</option>
                                      <?php foreach ($banks as $ban) :?>
                                      <option value="<?php echo $ban['id']; ?>" <?php echo ($ban['id'] == $bank_id)? 'selected' : NULL  ?> ><?php echo $ban['bank_name']; ?></option>
                                      <?php endforeach; ?>
                                   </select>
                               </div>

                          </div>

                          <div class="col-lg-4" >
                             <label for="example-text-input" class="col-sm-4 col-form-label">Date</label>
                            
                               <div class="col-sm-8">
                                <input class="form-control" type="text" id="date_range_input" name="daterange" value="<?php echo  ($date_range != '')? $date_range :  date("m/d/Y") .'-'. date("m/d/Y", strtotime(' +2 day')) ?>" />
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
                                              <th>S#</th>
                                              <th>Date</th>
                                              <th>Desc</th>
                                              <th>Type</th>
                                              <th>Ref #</th>
                                              <th>Amount</th>
                                              <th>Debit</th>
                                              <th>Credit</th>
                                              <th>balance</th>
                                          </tr>
                                      </thead>
                                     <tbody>
                                        <?php 
                                          
                                          $serial = 1;
                                          $total_bank = 0;
                                          // echo "<pre>";
                                          // print_r($deposits);
                                          foreach ($deposits as $dep) : 
                                        ?>
                                      <tr>
                                        <td><?php  echo $serial++; ?></td>
                                        <td><?php  echo $dep['date']; ?></td>
                                        <td><?php  echo $dep['description']; ?></td>
                                        <td><?php  echo $dep['reference']; ?></td>
                                        <td><?php  echo $dep['ref_no']; ?></td>
                                        <td><?php  $dabit_amount = $dep["bank_d_amount"];
                                                 echo number_format($dabit_amount); ?></td>
                                        <td>
                                           <?php if ($dep["reference"] == 'Deposit' || $dep["reference"] == 'Invoice') {
                                             $dabit_amount = $dep["bank_d_amount"];
                                                 echo number_format($dabit_amount);
                                            } ?>
                                        </td>
                                        <td>
                                          <?php if ($dep["reference"] == 'Transfer' || $dep["reference"] == 'Expance') {
                                             $dabit_amount = $dep["bank_d_amount"];
                                                 echo number_format($dabit_amount);
                                            } ?>
                                               
                                             </td>
                                        <td><?php  echo number_format($dep["bank_total_amount"])?></td>
                                       
                                      </td>
                                       
                                        
                                      </tr>
                                       <?php
                                     $total_amount = $dep["bank_total_amount"];
                                        if (isset($Balance_amount)) {
                                           $total+=$total_amount;
                                        }
                                         
                                     ?>
                                      <?php endforeach; ?>
                                    </tbody>
                                      <tfoot>
                                        
                                        <tr>
                                              <td></td>
                                              <td></td>
                                              <td><strong>Total</strong></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td>
                                                <strong><?php if(isset( $total_amount)){
                                                  echo number_format($dep["bank_total_amount"]);}
                                                  else{ echo "0";}?></strong>
                                                    
                                              </td>
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