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
            <h1>Add Expense</h1>
            <small></small>
            <ol class="breadcrumb">
               <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
               <li class="active">Add Expense</li>
            </ol>
         </div>
      </div>
      <!-- /. Content Header (Page header) -->
      <form method="post" action="<?php echo base_url() ?>admin/expense/insert" enctype="multipart/form-data">
         <div class="row">
            <div class="col-sm-12">
               <div class="panel panel-bd ">
                  <div class="panel-heading">
                     <div class="panel-title">
                        <h4>Add Expense</h4>
                     </div>
                  </div>
                  <div class="panel-body">
                     <div class="form-group row">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Expense Title</label>
                        <div class="col-sm-9"><input class="form-control" name="Expense_Title" type="text" value=""  placeholder="" ></div>
                     </div>
                     <div class="form-group row">

                        <label for="example-text-input" class="col-sm-3 col-form-label">Banks</label>
                        <div class="col-sm-9">
                           <select class="form-control bank_id" data-live-search="true" name="bank_id" >
                               <option>Select Bank</option>
                               <?php foreach ($banks as $bank) : ?>
                                   <option value="<?php echo $bank['id']; ?>"><?php echo $bank['bank_name']; ?></option>
                               <?php endforeach; ?>

                           </select>
                        </div>
                     </div>

                    <div class="form-group row">
                      <label for="example-text-input" class="col-sm-3 col-form-label"> Bank Amount</label>
                      <div class="col-sm-9">
                        <input class="form-control bank_amount" name="bank_amount" type="text" value="" id="example-text-input" placeholder="" readonly="">
                      </div>
                   </div>
                   <div class="form-group row">

                      <label for="example-text-input" class="col-sm-3 col-form-label">Select Vehicle</label>
                      <div class="col-sm-9">
                         <select class="form-control" name="vehicle_id" >
                             <option>Select Vehicle</option>
                             <?php foreach ($vehicle as $veh) : ?>
                                 <option value="<?php echo $veh['id']; ?>"><?php echo $veh['vehicle_maker']; ?></option>
                             <?php endforeach; ?>

                         </select>
                      </div>
                   </div>
                     <div class="form-group row">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Expense Category</label>
                        <div class="col-sm-9">
                           <select class="form-control selectpicker" data-live-search="true" name="exp_cat" >
                              <option>Select Expense Category</option>
                              <?php foreach ($expense_cat as $exp_cat) {?>
                              <option value="<?php echo $exp_cat["id"] ?>"><?php echo $exp_cat["expense_cate_title"] ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Expense Description</label>
                        <div class="col-sm-9"><input class="form-control" name="Expense_Description" type="textarea" value=""  placeholder="" ></div>
                     </div>
                     <div class="form-group row">
                        <label for="example-text-input" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                           <button class="btn btn-success" type="button" id="add_expense_detail" >Add Expense Detail</button>
                        </div>
                     </div>
                     <div id="detail_container_app">
                     </div>
                     <div class="form-group row">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Expense Total Amount</label>
                        <div class="col-sm-9"><input class="form-control expense_amount totalPrice" name="Expense_Amount" type="number" value=""  placeholder="" ></div>
                     </div>
                     <div class="form-group row">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Date Of Submission</label>
                        <div class="col-sm-9"><input class="form-control" name="Date_Of_Submission" type="date" value=""  placeholder="" required="" ></div>
                     </div>
                     <div class="form-group row">
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
<script type="text/javascript">
   $('#bank_name').change(function()
   
          {
   
              var bank_name = $('#bank_name').val();
   
               $.ajax({
   
   
   
                  url: '<?php echo base_url();?>/admin/expense/get_bank_amount',
   
                  data: { bank_name:bank_name },
   
                  type: 'POST',
   
   
   
                  success:function(resp)
   
                  {
   
                      $('.bank_amount').val(resp);
   
                      // $('.expense_amount').prop('max',resp);
   
   
   
                  }
   
   
   
   
   
              });
   
   
   
          })
   
   
   
   $(document).ready(function(){
   
   var x = 1; 
   
   var maxField = 20;
   
   var addButton = $('#add_expense_detail'); //Add button selector
   
   
   
   var wrapper = $('#detail_container_app'); //Input field wrapper
   
   
   
   var fieldHTML = ' <div class="row">'
   
                      +'<div class="col-md-3" >&nbsp;</div>'
   
                      +'<div class="col-md-9" >'
   
                          +'<div class="form-group row col-md-6">'
   
                              +'<label for="example-text-input" class="col-sm-4 col-form-label">Exp Title</label>'
   
                              +'<div class="col-sm-12"><input class="form-control expense_amount" name="detail_expense_title[]" type="text" value=""  placeholder="" ></div>'
   
                          +'</div>'
   
   
   
                          +'<div class="form-group row col-md-6">'
   
                              +'<label for="example-text-input" class="col-sm-4 col-form-label">Exp Amount</label>'
   
                              +'<div class="col-sm-12"><input class="form-control expense_amount price" name="detail_expense_amount[]" type="number" value=""  placeholder="" ></div>'
   
                          +'</div>'
   
                      +'</div>'
   
                  +'</div>';
   
   
   
   
   
   $(addButton).click(function(){ //Once add button is clicked
   
   
   
      if(x < maxField){ //Check maximum number of input fields
   
   
   
          x++; //Increment field counter
   
   
   
          $(wrapper).append(fieldHTML); // Add field html
   
   
   
      }
   
   
   
   });                
   
   
   
   
   
   });
   
</script>
<script>
   // we used jQuery 'keyup' to trigger the computation as the user type
   
   $('.form-control').click(function () {
   
   
   
       // initialize the sum (total price) to zero
   
       var sum = 0;
   
       
   
       // we use jQuery each() to loop through all the textbox with 'price' class
   
       // and compute the sum for each loop
   
       $('.price').each(function() {
   
           sum += Number($(this).val());
   
       });
   
       
   
       // set the computed value to 'totalPrice' textbox
   
       $('.totalPrice').val(sum);
   
       
   
   });
   
</script>
<script type="text/javascript">
    $('.bank_id').on('change' , function(){

       var bankId = $(this).val();

         $.ajax({
             url: '<?php echo base_url();?>/admin/expense/get_bank_amount',

             data: { bankId:bankId },

             type: 'POST',

             success:function(resp)
             {
                 $('.bank_amount').val(resp);

             }
         });
    });

</script>