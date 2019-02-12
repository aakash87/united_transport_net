<link href="<?php echo base_url() ?>assets/assets/dist/css/base.css" rel="stylesheet" type="text/css" />

<!DOCTYPE html>
<html>
<head>
    <title>UTN</title>

    
    <style type="text/css">

        body{



    color: #61686d;

    font: 14px "Helvetica Neue", Helvetica, Arial, Verdana, sans-serif;

    font-weight: lighter;

   /* padding-bottom: 60px;*/

}





.page-shadow {

    width: 992px;

    height: 60px;

    margin: 0 auto;

    margin-top: -1px;

    z-index: 1;

    position: relative;

}



h1 {

    color: #4d5357;

    font-weight: lighter;

    font-size: 40px;

    margin: 10px 0 0 0;

}



.terms {

    float: left;

    width: 400px;

    margin: 0 0 30px 0;

    font-size: 12px;

    color: black;

    line-height: 180%;

}



.terms strong {

    font-size: 16px;

}



.recipient-address {

    /*padding-top: 60px;*/

    width: 200px;

}





.recipient-address2 {

    /*padding-top: 60px;*/

    width: 400px;

}



.company-logo {

    width: 202px;

    height: 81px;

    position: absolute;

    right: 40px;

    top: 40px;

}



.company-address {

    width: 200px;

    color: black;

    position: absolute;

    right: 40px;

    top: 130px;

    text-align: right;

}



.status {

    position: absolute;

    top: -5px;

    left: -5px;

    text-indent: -5000px;

    width: 128px;

    height: 128px;

}



.draft {

    background-image: url(images/status-draft.png);

}



.sent {

    background-image: url(images/status-sent.png);

}



.paid {

    background-image: url(images/status-paid.png);

}



.overdue {

    background-image: url(images/status-overdue.png);

}



hr {

    clear: both;

    border: none;

    background: none;

    border-bottom: 1px solid #d6dde2;

}



.pay-buttons {

    text-align: center;

    width: 400px;

    margin: 0 auto;

    margin-top: 20px;

}

.pay-paypal {

    display: block;

    width: 200px;

    height: 45px;

    background:  url('images/pay-buttons.png') no-repeat;

    text-indent: -5000px;

    background-position: 0 0;

    float: left;

}



.pay-paypal:hover {

    background-position: 0 -45px;

}



.pay-paypal:active {

    background-position: 0 -90px;

}



.pay-card {

    display: block;

    float: left;

    width: 165px;

    height: 45px;

    background:  url('images/pay-buttons.png') no-repeat;

    text-indent: -5000px;

    background-position: -200px 0;

}



.pay-card:hover {

    background-position: -200px -45px;

}



.pay-card:active {

    background-position: -200px -90px;

}



.total-due {

    float: right;

    width: 200px;

    /*border: 1px solid #d6dde2;*/

    margin: 0 0 5px 0;

    padding: 0;

    border-radius: 3px; -moz-border-radius: 3px; -webkit-border-radius: 3px;

    text-align: right;

}



.total-heading {

    background: #e7ebee;

    height: 24px;

    color: #63676b;

    text-shadow: 0 1px 1px #ffffff;

    padding: 5px 20px 0 0;

    -moz-box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);

    -webkit-box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);

    box-shadow: inset 0px 0px 0px 1px rgba(255,255,255,0.5), 0 2px 2px rgba(0, 0, 0, 0.08);

    /*border-bottom: 1px solid #d6dde2;*/

    font-weight: bold;

}



.total-heading p, .total-amount p {

    margin: 0; padding: 0;

}



.total-amount {

    padding: 10px 20px 15px 0;

    color: #4d5357;

    font-size: 32px;

}




table.tablesorter {

    width: 100%;

    text-align: left;

    border-radius: 3px; -moz-border-radius: 3px; -webkit-border-radius: 3px;

    margin: 50px 0;

    color: black;

}
table.tablesorter2 {

    width: 100%;

    text-align: left;

    border-radius: 3px; -moz-border-radius: 3px; -webkit-border-radius: 3px;

    margin: 18px 0;

    color: black;

}
table.tablesorter3 {

    width: 100%;

    text-align: left;

    border-radius: 3px; -moz-border-radius: 3px; -webkit-border-radius: 3px;

    margin: 15px 0;

    color: black;

}

table.tablesorter thead tr th, table.tablesorter tfoot tr th {

    margin: 0;



}
table.tablesorter thead tr .header {

    background: #e7ebee url(images/arrows-both.png) no-repeat center right;

    cursor: pointer;

    height: 60px;

    color: #63676b;

    text-shadow: 0 1px 1px #ffffff;

    padding-left: 20px;

    -moz-box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);

    -webkit-box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);

    box-shadow: inset 0px 0px 0px 1px rgba(255,255,255,0.5), 0 2px 2px rgba(0, 0, 0, 0.08);

    border-bottom: 1px solid #d6dde2;

}

table.tablesorter tbody td {

    padding: 10px;

    text-align: center;

    vertical-align: top;

}

table.tablesorter tbody tr.even td {

    background: #f6f8f9;

}

table.tablesorter thead tr .headerSortUp {

    background-image: url(images/arrow-up.png);

}

table.tablesorter thead tr .headerSortDown {

    background-image: url(images/arrow-down.png);



}

table.tablesorter thead tr .headerSortDown, table.tablesorter thead tr .headerSortUp {



}


.table_reading 
{
    border: 1px solid #dddddd;

}

.table_reading td
{
    border: 1px solid #dddddd;

}
.td, th {

    /*border: 1px solid #dddddd;*/

    text-align: left;

    padding: 5px;

}

.invoice_div
{   /*
   padding-top: 20% !important; 
   bottom-top: 15% !important; 
   width: 140mm !important;
    height: 297mm !important;
   margin: 0px auto;*/
}

@page {
   /* size: 210mm 297mm;
    margin: 15% 45mm 30mm 15%;*/
     /* change the margins as you want them to be. */
}

.invoice_div
{   /*
   padding-top: 20% !important; 
   bottom-top: 15% !important; 
   width: 140mm !important;
    height: 297mm !important;
   margin: 0px auto;*/
}

.invoice_div {
    size: 210mm 297mm;
    padding: 70px;
    margin-top: -70px;
     /* change the margins as you want them to be. */
}


</style>
</head>
<body>
    <br><br><br><br><br><br><br><br><br><br>
    <div class="invoice_div">



  
    <!-- <img  style=" float: right;" src="<?php //echo base_url() ?>admin_assets/images/logo.png" alt="yourlogo" class="company-logo"> -->
    <div class="row margin_top_custom" style="">
        <p class="pull-left" ><strong>Invoice # : </strong><?php echo $invoice['invoice_voucher_number']?></p>
      
        <h2><?php echo $customer['full_name']; ?></h2>
       
        <p><strong>inv_amount : </strong><?php echo number_format($invoice['invoice_total_amount'])?></p>
        

    </div>
   


<div class="main_div_container">
    <!-- <h6>Meter Count</h6> -->
    <div class="row" >
        <table style="" class="table_reading">
            <tr>
                
                <td class="td">order_date</td>
                <td class="td" >Origin</td>
                <td class="td">Destination</td>
                <td class="td">Vehicle #</td>
                <td class="td">Vehicle Rate</td>
                <td class="td">Labor</td>
                <td class="td">2nd Stop</td>
                <td class="td">Detention</td>
                <td class="td">SSP Tax (%)</td>
                <td class="td">Total</td>

            </tr>
           
            <?php
              $i = 1;
              $total_amount = 0;
              foreach ($selected_data as $module) {
            ?>
              <tr>
                <td class="td"><?php echo $newDate = date("d-m-Y", strtotime($module['order_date'])); ?></td>
                <td class="td"><?php echo $module['pickup_location']; ?></td>
                <td class="td"><?php echo $module['drop_off_location']; ?></td>
                <td class="td"><?php echo $module['registration_number']; ?></td>
                <td class="td"><?php echo number_format($module['order_total_amount']); ?></td>
                <td class="td"><?php echo number_format($module['labor_charges']); ?></td>
                <td class="td"><?php echo number_format($module['second_stop_amount']); ?></td>
                <td class="td"><?php echo number_format($module['order_tenstion']); ?></td>
                <td class="td"><?php echo $module['ssp_percantage']; ?></td>
                <td class="td">
                    <?php
                        echo  number_format($module['order_total_amount'] + $module['labor_charges'] +  $module['second_stop_amount'] + $module['order_tenstion'] + $module['ssp_percantage']);
                    ?>
                    <?php $total_amount += $module['order_total_amount'] + $module['labor_charges'] +  $module['second_stop_amount'] + $module['order_tenstion'] + $module['ssp_percantage'];   ?>
                </td>
            </tr>

            <?php $i++; } ?>
         
            <tr>
                <td class="td"></td>
                <td class="td"></td>
                <td class="td"></td>
                <td class="td"></td>
                <td class="td"></td>
                <td class="td"></td>
                <td class="td"></td>
                <td class="td"></td>
                <td class="td">Total</td>
                <td class="td"><?php echo number_format($total_amount); ?></td>
            </tr>
        </table>
    </div>
  
        


<br>
<br>
<br>
<br>
<br>
<div class="row">
    

    <div class="total-due">

        <div class="total-heading"><p>Invoice Amount</p></div>
    
        <div class="total-amount"><p>Rs:  <?php echo number_format($invoice['invoice_total_amount'])?></p></div>
        <br>

        <?php echo date("01/m/Y");?>
    </div>

     </div>
   <div class="row" style="width: 1050px;">
    <br>
    <br>
    <br>
    <br>
    <p class="pull-right" style="margin-top: -20px; margin-left: 70px; z-index: 9999"> 


</div>


<script type="text/javascript">
      $("#table").tablesorter({

        widgets: ['zebra']

    });

</script>


</body>

</html>