
<!-- /.Navbar  Static Side -->
<div class="control-sidebar-bg"></div>
<!-- Page Content -->
<div id="page-wrapper">
    <!-- main content -->
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon">
                <i class="pe-7s-note2"></i>
            </div>
            <div class="header-title">
                <h1>Add Vehicel fuel</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Add Vehicel fuel</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>admin/Vehicel_fuel/insert" enctype="multipart/form-data">

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Add Vehicel fuel</h4>
                            </div>
                        </div>
                        <div class="panel-body">

                            
                                 <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Date</label>
                                        <div class="col-sm-9"><input class="form-control" name="fuel_create_date" type="date" value="" id="example-text-input" placeholder="" ></div>
                                    </div>   

                            <div class="form-group row">
                          
                            
                                <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle id</label>
                                        <div class="col-sm-9">
                                            <!-- <input class="form-control" name="vehicle_id" type="text" value="" id="example-text-input" placeholder="" > -->
                                                
                                                <select  class="form-control" name="vehicle_id" type="text" value="" id="example-text-input">
                                                    
                                                    <option>Select Vehicle</option>
                                                     <?php foreach ($vehicle_data as $veh_data) { ?>
                                                       <option value="<?php echo $veh_data['id']; ?>"><?php echo $veh_data['registration_number']; ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Fuel tank</label>
                                        <div class="col-sm-9"><input class="form-control" name="fuel_tank" type="text" value="" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Start meter</label>
                                        <div class="col-sm-9"><input class="form-control" name="start_meter" type="number" value="" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Province</label>
                                        <div class="col-sm-9"><input class="form-control" name="province" type="text" value="" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Note</label>
                                        <div class="col-sm-9"><textarea class="form-control" name="note" ></textarea></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Qty (Gal/liter)</label>
                                        <div class="col-sm-9"><input class="form-control" name="qty" type="text" value="" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Cost/Unit</label>
                                        <div class="col-sm-9"><input class="form-control" name="cost_per_unit" type="text" value="" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Complete</label>
                                        <div class="col-sm-9"><input class="form-control" name="complete" type="text" value="" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary pull-right">Add</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

</div>
<!-- /.main content -->
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- START CORE PLUGINS -->
