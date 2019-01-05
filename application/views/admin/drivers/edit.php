
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

                                <label for="example-text-input" class="col-sm-3 col-form-label">First Name</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="First_Name" type="text" value="<?php echo $drivers["First_Name"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Middle Name</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Middle_Name" type="textarea" value="<?php echo $drivers["Middle_Name"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Last Name</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Last_Name" type="text" value="<?php echo $drivers["Last_Name"] ?>" id="example-text-input" placeholder="" ></div>

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

                                <label for="example-text-input" class="col-sm-3 col-form-label">Employee ID</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Employee_ID" type="number" value="<?php echo $drivers["Employee_ID"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Contract Number</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Contract_Number" type="text" value="<?php echo $drivers["Contract_Number"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">License Number</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="License_Number" type="text" value="<?php echo $drivers["License_Number"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Issue Date</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Issue_Date" type="text" value="<?php echo $drivers["Issue_Date"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Expiration Date</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Expiration_Date" type="text" value="<?php echo $drivers["Expiration_Date"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Join Date</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Join_Date" type="text" value="<?php echo $drivers["Join_Date"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Leave Date</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Leave_Date" type="text" value="<?php echo $drivers["Leave_Date"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Password" type="text" value="<?php echo $drivers["Password"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Emergency Contact Details</label>
                                        <div class="col-sm-9">

                                        <textarea class="form-control" name="Emergency_Contact_Details" ><?php echo $drivers["Emergency_Contact_Details"] ?></textarea></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Gender</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Gender" type="text" value="<?php echo $drivers["Gender"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Driver image</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="driver_image" type="file" value="" id="example-text-input" placeholder=""></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Documents</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="documents" type="file" value="" id="example-text-input" placeholder=""></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">License image</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="license_image" type="file" value="" id="example-text-input" placeholder=""></div>

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
