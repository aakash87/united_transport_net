
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
                <h1>Edit Drivers</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Edit Drivers</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>admin/drivers/update" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $drivers["id"] ?>">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Edit Drivers</h4>
                            </div>
                        </div>
                        <div class="panel-body"><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Full Name</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="First_Name" type="text" value="<?php echo $drivers["First_Name"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">

                                        <textarea class="form-control" name="Address" ><?php echo $drivers["Address"] ?></textarea></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Email Address</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Email_Address" type="text" value="<?php echo $drivers["Email_Address"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Phone Number</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Phone_Number" type="text" value="<?php echo $drivers["Phone_Number"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Contract Number</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Contract_Number" type="text" value="<?php echo $drivers["Contract_Number"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">License Number</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="License_Number" type="text" value="<?php echo $drivers["License_Number"] ?>" id="example-text-input" placeholder="" ></div>

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
