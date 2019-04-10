
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
                <h1>Edit Bank</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Edit Bank</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>admin/bank/update" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $bank["id"] ?>">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Edit Bank</h4>
                            </div>
                        </div>
                        <div class="panel-body"><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Bank name</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="bank_name" type="text" value="<?php echo $bank["bank_name"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Bank description</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="bank_description" type="text" value="<?php echo $bank["bank_description"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div>
                                    <!-- <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Amount</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="amount" type="text" value="<?php echo $bank["amount"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div> -->
                                    <div class="form-group row">

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
