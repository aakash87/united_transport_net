<style type="text/css">
  .dropdown-menu.open {
    z-index: 999 !important;
}
</style>
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
                <h1>Edit Expense</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Edit Expense</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>admin/expense/update" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $expense["id"] ?>">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Edit Expense</h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Expense Title</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Expense_Title" type="text" value="<?php echo $expense["Expense_Title"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div>


                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Expense Category</label>
                                        <div class="col-sm-9">
                                           <select class="form-control selectpicker" data-live-search="true" name="exp_cat" >
                                              <option>Select Expense Category</option>
                                              <?php foreach ($expense_cat as $exp_cat) {?>
                                              <option value="<?php echo $exp_cat["id"] ?>" <?php echo ($exp_cat["id"] == $expense['exp_cat'] ) ? 'selected' : NULL ; ?> ><?php echo $exp_cat["expense_cate_title"] ?></option>
                                              <?php } ?>
                                           </select>
                                        </div>
                                     </div>



                                    <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Expense Description</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Expense_Description" type="textarea" value="<?php echo $expense["Expense_Description"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Expense Amount</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Expense_Amount" type="number" value="<?php echo $expense["Expense_Amount"] ?>" id="example-text-input" placeholder="" ></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Date Of Submission</label>
                                        <div class="col-sm-9">

                                        <input class="form-control" name="Date_Of_Submission" type="date" value="<?php echo $expense["Date_Of_Submission"] ?>" id="example-text-input" placeholder="" ></div>

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
