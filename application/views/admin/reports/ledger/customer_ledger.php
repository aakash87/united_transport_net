<div id="page-wrapper" style="min-height: 543px;">
    <!-- main content -->
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon">
                <i class="pe-7s-note2"></i>
            </div>
            <div class="header-title">
                <h1>Customer Ledger</h1>
                
                <small></small>
                <ol class="breadcrumb">
                     <li><a href="<?php echo base_url()?>"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Customer Ledger</li>
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
                                $get_expense_data = $this->db->query("SELECT * FROM `customer` where id='".$_POST['customer']."' ")->row_array(); echo  $get_expense_data['full_name']; }
                                ?>  Ledger <?php if ($this->input->server('REQUEST_METHOD') == 'POST') { echo $newDate = date("d-m-Y", strtotime($str_current_day_show)); echo " To "; echo $newDate2 = date("d-m-Y", strtotime($str_last_date_show)); }
                                ?> 
                            </h4>
                            
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="<?php echo base_url()?>admin/reports/search_by_customer" method="POST" enctype="multipart/form-data" >
                            <div class="form-group row">
                                <div class="form-group col-lg-6">
                                   <label for="">Customer Title</label>
                                    <select class="form-control" name="customer" required="">
                                    <option value="">Select Customer</option>
                                    <?php 
                                       foreach ($customer as $cus) {
                                           echo '<option value="'.$cus['id'].'">'.$cus['full_name'].'</option>';
                                       }
                                       ?>
                                 </select>
                                </div>
                                <div class="form-group col-lg-6">
                                   <label for="">Date</label>
                                     <input class="form-control" type="text" id="date_range_input" name="daterange" value="<?php echo  date("m/d/Y");?> - <?php echo  date("m/d/Y", strtotime(' +2 day'));?>" />
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
                                        <th>Date</th>
                                        <th>Inv #</th>
                                        <th>Desc</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $s_number = 1;
                                        foreach ($customer_ledger as $module) {
                                    ?>
                                    <tr>
                                        <td><?php echo $s_number++; ?></td>
                                        <td><?php echo $newDate = date("d-m-Y", strtotime($module["date"])); ?></td>
                                        <td><a target="_blank" href="<?php echo base_url()?>admin/orders/view_order_detail_by_ids?ids=<?php echo $module["order_ids"]; ?>"><?php echo $module["voucher_no"] ?></a></td>
                                        <td><?php echo $module["description"] ?>
                                            <?php if ($module["description"] == "Tax Amount") {
                                                echo $module["with_holding_tax"].'%';
                                            } else{
                                                echo " ";
                                            } ?></td>
                                        <td><?php  
                                            if ($module["reference"] == 'debit') {
                                             $dabit_amount = $module["amount"];
                                                 echo number_format($dabit_amount);
                                            }
                                             ?></td>
                                         <td><?php  
                                            $credit_amount = 0;
                                            if ($module["reference"] == 'credit') {
                                                $credit_amount = $module["amount"];
                                                 echo number_format($credit_amount);
                                            
                                            } 
                                            $invoice_amount = 0;
                                            if ($module["reference"] == 'invoice' && isset($credit_amount)) {
                                                $invoice_amount = $module["amount"];
                                                 echo number_format($invoice_amount);
                                                    
                                                 $cr_in_total = $credit_amount + $invoice_amount;
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
