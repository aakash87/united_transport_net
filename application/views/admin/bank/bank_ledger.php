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
                <i class="pe-7s-note2"></i>
            </div>
            <div class="header-title">
                <h1>Bank Ledger</h1>
                
                <small></small>
                <ol class="breadcrumb">
                     <li><a href="<?php echo base_url()?>"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Bank Ledger</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->
      
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>View Ledger</h4>
                            
                        </div>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="<?php echo base_url() ?>admin/bank/bank_ledger" enctype="multipart/form-data">
                          
                            
                                     <div class="form-group col-lg-6">
                                     <label for="">Banks</label>
                                        <select class="form-control" name="banks_id" id="banks_id" required="">
                                              <option>Select Bank Account</option>
                                              <?php foreach ($banks as $ban) :?>
                                              <option value="<?php echo $ban['id']; ?>" <?php echo ($ban['id'] == $bank_id)? 'selected' : NULL  ?> ><?php echo $ban['bank_name']; ?></option>
                                              <?php endforeach; ?>
                                           </select>
                                  </div>
                                   <div class="form-group col-lg-6">
                                   <label for="">Date</label>
                                     <input class="form-control" type="text" id="date_range_input" name="daterange" value="<?php echo  date("m/d/Y");?> - <?php echo  date("m/d/Y", strtotime(' +2 day'));?>" />
                                </div>

                              <div class="form-group col-lg-12">
                                
                                  <button type="submit" id="customer_report_by_dateID" class="btn btn-success w-md m-b-5 m-t-5 pull-right">Search</button>

                              </div>

                         
                        </form>
                    </div>
                    <div class="panel-body">
                        
                        <div class="table-responsive">
                            <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S#</th>
                                        <th>Bank Name</th>
                                        <th>Ref No</th>
                                        <th>Desc</th>
                                        <th>Amount</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $s_number = 1;
                                        foreach ($bank_ledger as $module) {
                                    ?>
                                    <tr>
                                        <td><?php echo $s_number++; ?></td>
                                         <td><?php echo $module["bank_name"] ?></td>
                                         <td><?php echo $module["ref_no"] ?></td>
                                        <td><?php echo $module["description"]; if ($module["transfer_bank_id"] == TRUE) {
                                         ?><strong> <?php echo $module["bank_name"]." To ".$module["transfer_bank_name"];?></strong><?php
                                        } ?></td>
                                        <td><?php echo $module["amount"] ?></td>
                                        
                                        <td>
                                          <?php  
                                            if ($module["reference"] == 'Debit') {
                                             $dabit_amount = $module["amount"];
                                                 echo number_format($dabit_amount);
                                            }
                                             ?>
                                               
                                         </td>
                                         <td>
                                          <?php  
                                            $credit_amount = 0;
                                            if ($module["reference"] == 'Credit') {
                                                $credit_amount = $module["amount"];
                                                 echo number_format($credit_amount);
                                            
                                            } 
                                            
                                             ?>
                                               
                                          </td>
                                         <td><?php echo number_format($module["balance"]) ?></td>
                                    </tr>
                                    <?php
                                         $total_amount = $module["balance"];
                                            if (isset($Balance_amount)) {
                                               $total+=$total_amount;
                                            }
                                             
                                         ?>
                                      <?php } ?>

                                    <tr>
                                       
                                       <td><strong>Total </strong></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td><strong><?php if(isset( $total_amount)){
                                          echo number_format($module["balance"]);}
                                          else{ echo " ";}?></strong></td>
                                       
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
        
</div>
