<!DOCTYPE html>
<html>

<head>
    <title>UTN</title>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- <link rel="stylesheet" href="sass/main.css" media="screen" charset="utf-8"/> -->
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="content-type" content="text-html; charset=utf-8">
    <style type="text/css">
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed,
figure, figcaption, footer, header, hgroup,
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font: inherit;
  font-size: 100%;
  vertical-align: baseline;
}

html {
  line-height: 1;
}

ol, ul {
  list-style: none;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
}

caption, th, td {
  text-align: left;
  font-weight: normal;
  vertical-align: middle;
}

q, blockquote {
  quotes: none;
}
q:before, q:after, blockquote:before, blockquote:after {
  content: "";
  content: none;
}

a img {
  border: none;
}

article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
  display: block;
}

body {
  font-family: 'Source Sans Pro', sans-serif;
  font-weight: 300;
  font-size: 12px;
  margin: 0;
  padding: 0;
  color: #555555;
}
body a {
  text-decoration: none;
  color: inherit;
}
body a:hover {
  color: inherit;
  opacity: 0.7;
}
body .container {
  min-width: 460px;
  margin: 0 auto;
  padding: 0 20px;
}
body .clearfix:after {
  content: "";
  display: table;
  clear: both;
}
body .left {
  float: left;
}
body .right {
  float: right;
}
body .helper {
  display: inline-block;
  height: 100%;
  vertical-align: middle;
}
body .no-break {
  page-break-inside: avoid;
}

header {
  margin-top: 15px;
  margin-bottom: 45px;
}
header figure {
  float: left;
  margin-right: 10px;
  width: 65px;
  height: 70px;
  background-color: #66BDA9;
  text-align: center;
}
header figure img {
  margin-top: 10px;
}
header .company-info {
  float: right;
  color: #66BDA9;
  line-height: 14px;
}
header .company-info .address, header .company-info .phone, header .company-info .email {
  position: relative;
}
header .company-info .address img, header .company-info .phone img {
  margin-top: 2px;
}
header .company-info .email img {
  margin-top: 3px;
}
header .company-info .title {
  color: #66BDA9;
  font-weight: 400;
  font-size: 1.33333333333333em;
}
header .company-info .icon {
  position: absolute;
  left: -15px;
  top: 1px;
  width: 10px;
  height: 10px;
  background-color: #66BDA9;
  text-align: center;
  line-height: 0;
}

section .details {
  min-width: 440px;
  margin-bottom: 40px;
  padding: 5px 10px;
  /* background-color: #CC5A6A; */
  color: #353333;
  line-height: 20px;
}
section .details .client {
  width: 50%;
}
section .details .client .name {
  font-size: 1.16666666666667em;
  font-weight: 600;
}
section .details .data {
  width: 50%;
  font-weight: 600;
  text-align: right;
}
section .details .title {
  margin-bottom: 5px;
  font-size: 1.33333333333333em;
  text-transform: uppercase;
}
section table {
  width: 100%;
  margin-bottom: 20px;
  table-layout: fixed;
  border-collapse: collapse;
  border-spacing: 0;
  font-size: 15px;
}
section table .qty, section table .unit, section table .total {
  width: auto;
  font-size: 30px;
}
section table .desc {
  width: 55%;
}
section table thead {
  display: table-header-group;
  vertical-align: middle;
  border-color: inherit;
}
section table thead th {
  padding: 7px 10px;
  background: #1b449d;
  border-right: 5px solid #FFFFFF;
  color: white;
  text-align: center;
  font-weight: 400;
  text-transform: uppercase;
}
section table thead th:last-child {
  border-right: none;
}
section table tbody tr:first-child td {
  border-top: 10px solid #ffffff;
}
section table tbody td {
  padding: 10px 10px;
  text-align: center;
  border-right: 3px solid #368058;
}
section table tbody td:last-child {
  border-right: none;
}
section table tbody td.desc {
  text-align: left;
}
section table tbody td.total {
  color: #337552;
  font-weight: 600;
  text-align: right;
}
section table tbody h3 {
  margin-bottom: 5px;
  color: #3d845e;
  font-weight: 600;
}
section table.grand-total {
  margin-bottom: 50px;
}
section table.grand-total tbody tr td {
  padding: 0px 10px 12px;
  border: none;
  background-color: #B2DDD4;
  color: #555555;
  font-weight: 300;
  text-align: right;
}
section table.grand-total tbody tr:first-child td {
  padding-top: 12px;
}
section table.grand-total tbody tr:last-child td {
  background-color: transparent;
}
section table.grand-total tbody .grand-total {
  padding: 0;
}
section table.grand-total tbody .grand-total div {
  float: right;
  padding: 11px 10px;
  background-color: #66BDA9;
  color: #ffffff;
  font-weight: 600;
}
section table.grand-total tbody .grand-total div span {
  display: inline-block;
  margin-right: 20px;
  width: 80px;
}

footer {
  margin-bottom: 15px;
  padding: 0 5px;
}
footer .thanks {
  margin-bottom: 40px;
  color: #66BDA9;
  font-size: 1.16666666666667em;
  font-weight: 600;
}
footer .notice {
  margin-bottom: 15px;
}
footer .end {
  padding-top: 5px;
  border-top: 2px solid #3e845e;
  text-align: center;
}

    </style>
</head>
<?php
  if ( !class_exists('NumbersToWords') ){
    class NumbersToWords{
      
      public static $hyphen      = '-';
      public static $conjunction = ' and ';
      public static $separator   = ', ';
      public static $negative    = 'negative ';
      public static $decimal     = ' point ';
      public static $dictionary  = array(
        0                   => 'Zero',
        1                   => 'One',
        2                   => 'Two',
        3                   => 'Three',
        4                   => 'Four',
        5                   => 'Five',
        6                   => 'Six',
        7                   => 'Seven',
        8                   => 'Eight',
        9                   => 'Nine',
        10                  => 'Ten',
        11                  => 'Eleven',
        12                  => 'Twelve',
        13                  => 'Thirteen',
        14                  => 'Fourteen',
        15                  => 'Fifteen',
        16                  => 'Sixteen',
        17                  => 'Seventeen',
        18                  => 'Eighteen',
        19                  => 'Nineteen',
        20                  => 'Twenty',
        30                  => 'Thirty',
        40                  => 'Fourty',
        50                  => 'Fifty',
        60                  => 'Sixty',
        70                  => 'Seventy',
        80                  => 'Eighty',
        90                  => 'Ninety',
        100                 => 'Hundred',
        1000                => 'Thousand',
        1000000             => 'Million',
        1000000000          => 'Billion',
        1000000000000       => 'Trillion',
        1000000000000000    => 'Quadrillion',
        1000000000000000000 => 'Quintillion'
      );
      public static function convert($number){
        if (!is_numeric($number) ) return false;
        $string = '';
        switch (true) {
          case $number < 21:
              $string = self::$dictionary[$number];
              break;
          case $number < 100:
              $tens   = ((int) ($number / 10)) * 10;
              $units  = $number % 10;
              $string = self::$dictionary[$tens];
              if ($units) {
                  $string .= self::$hyphen . self::$dictionary[$units];
              }
              break;
          case $number < 1000:
              $hundreds  = $number / 100;
              $remainder = $number % 100;
              $string = self::$dictionary[$hundreds] . ' ' . self::$dictionary[100];
              if ($remainder) {
                  $string .= self::$conjunction . self::convert($remainder);
              }
              break;
          default:
              $baseUnit = pow(1000, floor(log($number, 1000)));
              $numBaseUnits = (int) ($number / $baseUnit);
              $remainder = $number % $baseUnit;
              $string = self::convert($numBaseUnits) . ' ' . self::$dictionary[$baseUnit];
              if ($remainder) {
                  $string .= $remainder < 100 ? self::$conjunction : self::$separator;
                  $string .= self::convert($remainder);
              }
              break;
        }
        return $string;
      }
    }
  }
?>
<body>
    <header class="clearfix">
        <div class="">
                <img class="logo" src="<?php echo base_url()?>admin_assets/images/header.JPG" alt="" style="height:auto">
    </div>
  </header>

  <section>
    <div class="container">
      <div class="details clearfix">
        <div class="client left">
            
          
        </div>
        <div class="data right">
            <div class="date">Invoice #: <span style="text-decoration: underline;"><?php echo $vendor_payments_detail['invoice_no']?></span></div>
            <div class="date">Date of Invoice: <span style="text-decoration: underline;"><?php echo $newDate22 = date("d-m-Y", strtotime($vendor_payments_detail['invoice_date']));?></span><br></div>
        </div>
    </div>
    <div class="details clearfix">
        <div class="client left">
            <h4>Vendor Detail</h4>
            <p style="color: #000; font-weight:500;"><?php echo $vendor_payments_detail['vendor_name']?></p>
            <p style="color: #000; font-weight:500;"><?php echo $vendor_payments_detail['vendor_address']?></p>
          
        </div>
    </div>
      
         
    <table border="0" cellspacing="0" cellpadding="0" >
        <thead>
            <tr>
                <th class="qty">S#</th>
                <th class="total">Date </th>
                <th class="total">Loading Date</th>
                <th class="total">Drop of Date</th>
                <th class="total">Origin</th>
                <th class="total">Destination</th>
                <th class="total">Vehicle # </th>
                <th class="total">Vehicle Type </th>
                <th class="total">Order Type</th>
                <th class="total">Buying </th>
                <th class="total">Detention </th>
                <th class="total">Local Transport </th>
                <th class="total">Labor </th>
                <th class="total">Total </th>
            </tr>
        </thead>
        <tbody>
            <?php
              $i= 1;
              foreach ($vendor_order_detail_for_payment as $module) {
            ?>
            <tr>
                <td class="qty"><?php echo $i++;?></td>
                
                <td class="qty"><?php echo $newDate23 = date("d-m-Y", strtotime($module['order_date']));?></td>
                <td class="qty"><?php echo $newDate24 = date("d-m-Y", strtotime($module['pickup_date_and_time']));?></td>
                <td class="qty"><?php echo $newDate25 = date("d-m-Y", strtotime($module['dropoff_date_and_time']));?></td>
                <td class="qty"><?php echo $module['pickup_location'];?></td>
                <td class="qty"><?php echo $module['drop_off_location'];?></td>
                <td class="qty"><?php $get_order_vehicle_name = $this->db->query("SELECT * FROM `vehicle` where id='".$module["vehicel_of_vendor"]."' ")->row_array(); echo  $get_order_vehicle_name['registration_number'];?>
                          <?php echo $module['vehicel_of_vendor'];?></td>
                <td class="qty"><?php echo $module['vehicle_type'];?></td>
                <td class="qty"><?php echo $module['vendor_type'];?></td>
                <td class="qty"><?php echo number_format($module['vehicle_buying']);?></td>
                <td class="qty"><?php echo number_format($module['detention']);?></td>
                <td class="qty"><?php echo number_format($module['local_transport']);?></td>
                <td class="qty"><?php echo number_format($module['labour_charges']);?></td>
                <td class="qty"><?php echo number_format($module['total_cost']);?></td>
                
            </tr>
            <?php $total_amount_invoice += $module['total_cost'];  } ?>
            
              <tr style="background-color: #e1e4e6; border-color: #e1e4e6;">
                  
                <td class="qty" colspan="13"><strong>Grand Total</strong></td>
                <td class="qty" colspan="" ><span style="float: right !important;"><strong><?php echo  number_format($total_amount_invoice)?>/=</strong></span></td>
              </tr>
              <tr style="background-color: #e1e4e6; border-color: #c6c9cc;">
                
                <td class="qty" colspan="13"><strong><?php echo NumbersToWords::convert($total_amount_invoice);?> Only </strong></td>
                <td class="qty" colspan=""><span style="float: right;"></span></td>
              </tr>
             
            
           
        </tbody>
    </table>
    
    </div>
</section>

    <footer style="position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   text-align: center">
        <div class="  " style="font-size: 13px;">
              <br>
                  <span>Prepared by : ________________</span> &nbsp;  &nbsp;   &nbsp;   &nbsp;  &nbsp;  &nbsp;   &nbsp;   &nbsp;  &nbsp; 
                  <span>Received by : ________________</span> &nbsp;  &nbsp;   &nbsp;   &nbsp;  &nbsp;  &nbsp;   &nbsp;   &nbsp;  &nbsp; 
                  <span>Checked By : ________________</span>
            </div>
    </footer>

</body>



</html>
