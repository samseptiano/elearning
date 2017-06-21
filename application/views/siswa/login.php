<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Galileo - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/elearning/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url(); ?>assets/elearning/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/elearning/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/elearning/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" method="post" action="<?php echo base_url('students_login/aksi_login'); ?>">
		        <h2 class="form-login-heading">Masuk Sekarang</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" name="username" placeholder="Username" autofocus required="">
		            <br>
		            <input type="password" class="form-control" name="password" placeholder="Password" required>
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Lupa Password??</a>
		
		                </span>
		            </label>
		            <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> MASUK</button>
		            <br>
		            <div id="infoMessage" style="color:red" ><?php echo $this->session->flashdata('err_message');?></div>
		            <hr>
		            <center><p style="color:red">Pastikan Anda telah terdaftar pada Galileo Gasing untuk dapat mengakses E-learning ini</p></center>
		            <div class="registration">
		                Belum Punya Akun?<br/>
		                <a href="students_register">
		                    BUAT AKUN
		                </a>
		            </div>
		
		        </div>
				      </form>	
		          <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                  <form method="post" action="<?php echo base_url('students_login/forgot_password'); ?>">
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
		          <!-- modal -->
		
  	
	  			
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>assets/elearning/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/elearning/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/elearning/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("<?php echo base_url(); ?>assets/elearning/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
