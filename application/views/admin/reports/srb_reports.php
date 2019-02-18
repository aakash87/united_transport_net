<div id="page-wrapper" style="min-height: 543px;">
    <!-- main content -->
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon">
                <i class="pe-7s-note2"></i>
            </div>
            <div class="header-title">
                <h1>SRB Reports</h1>
                
                <small></small>
                <ol class="breadcrumb">
                     <li><a href="<?php echo base_url()?>"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">SRB Reports</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->
      
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>View Report</h4>
                            
                        </div>
                    </div>
                  <!--   <div class="panel-body">
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
                    </div> -->
                    <div class="panel-body">
                        
                        <div class="table-responsive">
                            <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S#</th>
                                        <th>Name of Customer</th>
                                        <th>NTN No</th>
                                        <th>STR No</th>
                                        <th>Month</th>
                                        <th>Invoice No</th>
                                        <th>Invoice Amount</th>
                                        <th>SRB %</th>
                                        <th>Total Amount</th>
                                        <th>Issue Date</th>
                                        <th>Rcvd Date</th>
                                        <th>I.Tax 02%</th>
                                        <th>SRB H0LD BY CLIENT</th>
                                        <th>Rcvd Amount</th>
                                        <th>Remarks</th>
                                        <!-- <th>SRB DEPOSIT</th>
                                        <th>DEPOSIT DATE</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $s_number = 1;
                                        foreach ($srb_reports as $module) {
                                    ?>
                                        <tr>
                                            <td><?php echo $s_number++;?></td>
                                            <td><?php echo $module['full_name'];?></td>
                                            <td><?php echo $module['ntn_no'];?></td>
                                            <td><?php echo $module['str_no'];?></td>
                                            <td><?php echo $newDate = date("M", strtotime($module['created_at']));?></td>
                                            <td><?php echo $module['invoice_voucher_number'];?></td>
                                            <td><?php echo $module['t_with_out_sst'];?></td>
                                            <!-- <td><?php echo $module['srb_tax'];?>%</td> -->
                                             <td><?php echo  $tax = $module['t_with_out_sst'] * $module["ssp_tax_val"] / 100; echo round($tax);?> <small>(<?php echo $module["ssp_tax_val"]?>%)</small></td>
                                            <td><?php echo $module['invoice_total_amount'];?></td>
                                            <td><?php echo $module['invoice_create_date'];?></td>
                                            <td><?php echo $module['invoice_paid_date'];?></td>
                                            <td><?php echo  $i_tax = $module['invoice_total_amount'] * 2 / 100; echo round($i_tax);?></td>
                                            <td><?php echo  $tax = $module['invoice_total_amount'] * $module["with_holding_tax"] / 100; echo round($tax);?> <small>(<?php echo $module["with_holding_tax"]?>%)</small></td>
                                            <td><?php echo $module['customer_paid_amount'];?></td>
                                            <td><?php echo $module['remarks'];?></td>
                                        </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
        
</div>
