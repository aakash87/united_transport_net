<div id="page-wrapper" style="min-height: 543px;">
    <!-- main content -->
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon">
                <i class="pe-7s-note2"></i>
            </div>
            <div class="header-title">
                <h1>Driver Ledger</h1>
                
                <small></small>
                <ol class="breadcrumb">
                     <li><a href="<?php echo base_url()?>"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Driver Ledger</li>
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
                        <form action="<?php echo base_url()?>admin/reports/search_by_driver" method="POST" enctype="multipart/form-data" >
                            <div class="form-group row">
                                <div class="form-group col-lg-12">
                                   <label for="">Driver</label>
                                    <select class="form-control" name="driver" required="">
                                    <option value="">Select Driver</option>
                                    <?php 
                                       foreach ($drivers as $dri) {
                                           echo '<option value="'.$dri['id'].'">'.$dri['First_Name'].'</option>';
                                       }
                                       ?>
                                 </select>
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
                                        <th>Full Name</th>
                                        <th>Order Total Amount</th>
                                        <th>Local Transport</th>
                                        <th>Labor Charges</th>
                                        <th>Net Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $s_number = 1;
                                        foreach ($driver_ledger as $module) {
                                    ?>
                                    <tr>
                                        <td><?php echo $s_number++; ?></td>
                                        <td><?php echo $module["driver_name"] ?></td>
                                        <td><?php echo $module["order_total_amount"] ?></td>
                                        <td><?php echo $module["local_transport"] ?></td>
                                        <td><?php echo $module["labor_charges"] ?></td>              
                                        <td><?php echo $module["net_amount"] ?></td>
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
