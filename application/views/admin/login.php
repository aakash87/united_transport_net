<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>United Transport Network | Login</title>
    <link rel="shortcut icon" href="<?php echo base_url() ?>admin_assets/images/fav_icon.png" type="image/x-icon">
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
<style>
    .footerp p {font-family: Roboto, 'Helvetica Neue', Helvetica, Arial, sans-serif; }


.footer-bottom {
    background-color: #3e454c;
    min-height: 30px;
    width: 100%;
}
.copyright {
    color: #fff;
    line-height: 30px;
    min-height: 30px;
    padding: 7px 0;
    font-size: 12px;
}
.design {
    color: #fff;
    line-height: 30px;
    min-height: 30px;
    padding: 7px 0;
    text-align: right;
}
.design a {
    color: #fff;
}

</style>
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <!-- <h1 class="logo-name"><img src="<?php echo base_url() ?>assets/logo.png"></h1> -->
                <h1 class="logo-name">
                	<img src="<?php echo base_url() ?>admin_assets/images/logo.png" alt="logo" /></h1>

            </div>
            <h3>Welcome to United Transport Network</h3>
            <form class="m-t" role="form" method="post" action="<?php echo base_url() ?>admin/login/check_login">
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                <!-- <a href="<?php //echo base_url()?>admin/register">Signup Account</a> -->

<?php if ($this->session->flashdata('error')): ?>
                <a class="btn btn-danger block full-width m-b"><?php echo $this->session->flashdata('error'); ?></a>

<?php endif ?>

            </form>
        </div>
    </div>
    <div class="footer-bottom" style=" background-size: cover; position:fixed; left:0px; bottom:0px; width:100%;" >

		<div class="container">

			<div class="row">

				<center><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

					<div class="copyright">

					<strong>Copyright © <?php $var = date("Y")- 1; echo $var;?> - <?php echo date("Y");?> 
        | All rights reserved  <a href="<?php echo base_url() ?>" style="color: red; font-weight: 400">United Transport Network Pakistan</a></strong> | Powered By<a href="http://magmacc.com/" target="_blank" style="color: red; font-weight: 400"> <strong>Magma Digital</strong></a>


					</div>

				</div></center>
			</div>

		</div>

	</div>
    <!-- Mainly scripts -->
    <script src="<?php echo base_url() ?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

</body>

</html>
