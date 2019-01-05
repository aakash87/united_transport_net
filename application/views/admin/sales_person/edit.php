
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
                <h1>Edit sales person</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Edit sales person</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>admin//sales_person/update" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $/sales_person["id"] ?>">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Edit sales person</h4>
                            </div>
                        </div>
                        <div class="panel-body"><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Sp name</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="sp_name" type="text" value="<?php echo $/sales_person["sp_name"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Sp email </label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="sp_email_" type="text" value="<?php echo $/sales_person["sp_email_"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Sp address</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="sp_address" type="text" value="<?php echo $/sales_person["sp_address"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Sp contact num</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="sp_contact_num" type="text" value="<?php echo $/sales_person["sp_contact_num"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Sp create date</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="sp_create_date" type="text" value="<?php echo $/sales_person["sp_create_date"] ?>" id="example-text-input" placeholder="" ></div>

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
