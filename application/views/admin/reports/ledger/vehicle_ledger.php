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
                <h1>Vehicle Ledger</h1>
                
                <small></small>
                <ol class="breadcrumb">
                     <li><a href="<?php echo base_url()?>"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Vehicle Ledger</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->
      
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php if ($this->input->server('REQUEST_METHOD') == 'POST') {
                                $get_expense_data = $this->db->query("SELECT * FROM `vehicle` where id='".$_POST['select_vehicel']."' ")->row_array(); echo  $get_expense_data['registration_number']; echo " Vehicle ";}
                                ?>  Ledger <?php if ($this->input->server('REQUEST_METHOD') == 'POST') { echo $newDate = date("d-m-Y", strtotime($str_current_day_show)); echo " To "; echo $newDate2 = date("d-m-Y", strtotime($str_last_date_show)); }
                                ?></h4>
                            
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="<?php echo base_url()?>admin/reports/vehicle_ledger" method="POST" enctype="multipart/form-data" >
                            <div class="panel-body">
                              <div class="form-group row" >
                                <div class="col-lg-6"">
                            
                                  <label for="example-text-input" class="col-sm-4 col-form-label">Vehicle</label>
                                          <div class="col-sm-8">
                                             <select class="form-control selectpicker" data-live-search="true" name="select_vehicel" >
                                                <option value="">Select Vehicle </option><?php foreach ($vehicles as $veh) {?>
                                                    <option value="<?php echo $veh["id"] ?>"><?php echo $veh["registration_number"] ?></option>
                                               <?php } ?></select>
                                          </div>

                                </div>
                                

                                <div class="col-lg-4" >
                                  
                                   <label for="example-text-input" class="col-sm-4 col-form-label">Select Date</label>
                                  
                                     <div class="col-sm-8">
                                      <input class="form-control" type="text" id="date_range_input" name="daterange" value="<?php echo  date("m/d/Y");?> - <?php echo  date("m/d/Y", strtotime(' +2 day'));?>" />
                                     </div>

                                </div>

                                <div class="form-group col-lg-2">
                                  
                                    <button type="submit" id="customer_report_by_dateID" class="btn btn-success w-md m-b-5 m-t-5">Search</button>

                                </div>
                                                  </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary pull-right" name="" value="search">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-body">
                        
                        <div class="table-responsive">
                            <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S#</th>
                                        <th>Order ID</th>
                                        <th>Vehicle #</th>
                                        <th>Desc</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $s_number = 1;
                                        foreach ($vehicle_ledger as $module) {
                                    ?>
                                    <tr>
                                        <td><?php echo $s_number++; ?></td>
                                         <td><?php echo $module["order_id"] ?></td>
                                        <td><?php echo $module["registration_number"] ?></td>
                                        <td><?php if ($module["expense_cate_title"] == "") {
                                           echo $module["description"];
                                        }else{
                                            echo 'Exp '.$module["expense_cate_title"];
                                        } ?></td>
                                        <td><?php  
                                            if ($module["reference"] == 'Debit') {
                                             $dabit_amount = $module["amount"];
                                                 echo number_format($dabit_amount);
                                            }
                                             ?></td>
                                             <td><?php  
                                                $credit_amount = 0;
                                                if ($module["reference"] == 'Credit') {
                                                    $credit_amount = $module["amount"];
                                                     echo number_format($credit_amount);
                                                
                                                } 
                                                
                                                 ?></td>
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
                                       <td><strong><?php if(isset( $total_amount)){
                                          echo number_format($module["balance"]);}
                                          else{ echo "0";}?></strong></td>
                                       
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
