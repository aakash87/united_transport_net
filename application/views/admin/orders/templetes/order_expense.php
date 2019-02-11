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
            <h1>Order Expense</h1>
            <small></small>
            <ol class="breadcrumb">
               <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
               <li class="active">Order Expense</li>
            </ol>
         </div>
      </div>
      <!-- /. Content Header (Page header) -->
      <form method="post" action="<?php echo base_url() ?>admin/orders/add_expense_of_order_insert" enctype="multipart/form-data">
        <input type="hidden" name="ordersId" value="<?php echo $orderId;?>">
         <div class="row">
            <div class="col-sm-12">
               <div class="panel panel-bd ">
                  <div class="panel-heading">
                     <div class="panel-title">
                        <h4>Order Expense</h4>
                     </div>
                  </div>
                  <div class="panel-body">
                     <div class="row">
                        <div class="col-md-6">
                           
                           <div class="form-group row"><label for="" class="col-sm-4 col-form-label"> Expense Date </label><div class="col-sm-8"> <input class="form-control" name="expense_date" type="date" value="" id="" placeholder=""></div></div>

                            <div class="form-group row"><label for="" class="col-sm-4 col-form-label"> Expense Title </label><div class="col-sm-8"> <input class="form-control" name="expense_title" type="text" value="" id="" placeholder=""></div></div>

                           <div class="form-group row"><label for="" class="col-sm-4 col-form-label"> expense expense_amount </label><div class="col-sm-8"> <input class="form-control" name="expense_amount" type="text" value="" id="" placeholder=""></div></div>
                          
                          <div class="form-group row"><label for="" class="col-sm-4 col-form-label"> expense Description </label><div class="col-sm-8"> <input class="form-control" name="expense_description" type="text" value="" id="" placeholder=""></div></div>

                           <div class="form-group row">
                              <div class="col-sm-12">
                                 <button type="submit" class="btn btn-primary pull-right">Submit</button>
                              </div>
                           </div>
                          
                         
                          
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
