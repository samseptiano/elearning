<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Galileo - Login</title>
	<link rel="shortcut icon" type="image/ico" href="<?php echo base_url()?>/assets/landing/img/favicon.ico"/>
    <link href="<?php echo base_url(); ?>assets/elearning/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/elearning/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/elearning/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/elearning/css/style-responsive.css" rel="stylesheet">
  </head>
  <body>
	  <div id="login-page">
	  	<div class="container">
		      <form class="form-login" method="post" action="<?php echo base_url('teachers_login/aksi_login'); ?>">
		        <h2 class="form-login-heading">Masuk Tutor</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" name="username" placeholder="Username" autofocus required="">
		            <br>
		            <input type="password" class="form-control" name="password" placeholder="Password" required>
		            <label class="checkbox">
		                <span class="pull-right">
		                <a data-toggle="modal" href="login.html#myModal"> Lupa Password??</a>
		                </span>
		            </label>
		            <button class="btn btn-theme btn-block"type="submit"><i class="fa fa-lock"></i> MASUK</button>
		            <br>
		            <div id="infoMessage" style="color:red" ><?php echo $this->session->flashdata('err_message');?></div>
		            <hr>
		            <center><p style="color:red">Pastikan Anda telah terdaftar pada Galileo Gasing untuk dapat mengakses E-learning ini</p></center>
		            <div class="registration">
		                Belum Punya Akun?<br/>
		                <a href="teachers_register">
		                    Buat Akun
		                </a> atau 
		                <a href="<?php echo base_url()?>">
		                     Ke Halaman Utama
		                </a>
		            </div>
		        </div>
		      </form>	
		<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
			<div class="modal-dialog">
			<div class="modal-content">
				<form method="post" action="<?php echo base_url('teachers_login/forgot_password'); ?>">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">LUPA PASSWORD ?</h4>
				</div>
				<div class="modal-body">
					<p>Masukkan alamat e-mail dibawah ini untuk reset password.</p>
					<input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
				</div>
				<div class="modal-footer">
					<button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
					<input class="btn btn-theme" type="submit" name="Submit">
				</div>
				</form>
			</div>
			</div>
		</div>  	 	
	  	</div>
	  </div>
    <script src="<?php echo base_url(); ?>assets/elearning/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/elearning/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/elearning/js/jquery.backstretch.min.js"></script>
    <script>
    $.backstretch("<?php echo base_url(); ?>assets/elearning/img/login-bg.jpg", {speed: 500});
    </script>
  </body>
</html>
