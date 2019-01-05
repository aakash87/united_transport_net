
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
                <h1>Edit Vehicle</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Edit Vehicle</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>admin/vehicle/update" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $vehicle["id"] ?>">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Edit Vehicle</h4>
                            </div>
                        </div>
                        <div class="panel-body"><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle maker</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="vehicle_maker" type="text" value="<?php echo $vehicle["vehicle_maker"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle engine type</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="vehicle_engine_type" type="text" value="<?php echo $vehicle["vehicle_engine_type"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle model</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="vehicle_model" type="text" value="<?php echo $vehicle["vehicle_model"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle type</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="vehicle_type" type="text" value="<?php echo $vehicle["vehicle_type"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Color</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Color" type="text" value="<?php echo $vehicle["Color"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle year</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="vehicle_year" type="text" value="<?php echo $vehicle["vehicle_year"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Vin</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="vin" type="text" value="<?php echo $vehicle["vin"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Initial mileage</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="initial_mileage" type="text" value="<?php echo $vehicle["initial_mileage"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">License plate</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="license_plate" type="text" value="<?php echo $vehicle["license_plate"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle image</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="vehicle_image" type="text" value="<?php echo $vehicle["vehicle_image"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Licence expiry date</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="licence_expiry_date" type="text" value="<?php echo $vehicle["licence_expiry_date"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Registration expiry date</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="registration_expiry_date" type="text" value="<?php echo $vehicle["registration_expiry_date"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle group id</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="vehicle_group_id" type="number" value="<?php echo $vehicle["vehicle_group_id"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Vehicle status</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="vehicle_status" type="number" value="<?php echo $vehicle["vehicle_status"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary pull-right">Update</button>
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
