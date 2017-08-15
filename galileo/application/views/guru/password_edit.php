<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Elearning Galileo | Password - Edit</title>
    <link rel="shortcut icon" type="image/ico" href="<?php echo base_url()?>/assets/landing/img/favicon.ico"/>
      <link href="<?php echo base_url(); ?>assets/elearning/css/passwordLenCheck.css" rel="stylesheet">
      <?php include("include/css.php");?>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
      
    <style type="text/css">
      .data{
      text-shadow: 0.1em 0.1em 0.2em rgb(199, 199, 199);
      color: black;
      }
    </style>
  </head>

  <body>
      
  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
		<?php include("include/header.php");?>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
		<?php include("include/sidebar.php"); ?>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <div class="row" style="background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;margin: 15px 2px 35px 2px"> 
						     <center><h2 class="page-header data">Ubah Kata Sandi Anda</h2></center><br><br><br> 
    <!-- left column -->
    <div id="infoMessage" style="color:red" ><?php echo $this->session->flashdata('msg');?></div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">

      <form class="form-horizontal" id="register" style="height:350px" method="post" action="<?php echo base_url()?>teachers/update_password">
        <div class="form-group">
          <label class="col-lg-3 control-label data">Password Lama:</label>
          <div class="col-lg-8">
            <input class="form-control data" id="old_password" name="old_password" type="password" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label data">Password Baru:</label>
          <div class="col-lg-8">
            <input type="password" name="password" pattern=".{6,}" title="6 karakter/lebih" id="password" placeholder="" class="form-control data " required>
            <span id="result"> </span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label data">Ketik Lagi Password Baru:</label>
          <div class="col-lg-8">
            <input class="form-control data" pattern=".{6,}" title="6 karakter/lebih" name="retype_new_password" type="password" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-success" value="Save Changes" type="submit" name="submit" value="submit">
            <span></span>
            <a href="<?php echo base_url(); ?>students/profile" class="btn btn-default">Batal</a>
          </div>
        </div>
      </form>
    </div>

                                  <!-- END PROFILE SECTION -->
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
      </section><br><br><br>

      <!--main content end-->
      <!--footer start-->
      <?php include("include/footer.php"); ?>
      <!--footer end-->
  </section>
  <script src="<?php echo base_url(); ?>assets/elearning/js/passwordscheck.js"></script>
	 <!--javascript start-->
		<?php include("include/js.php"); ?>
	 <!--javascript end-->
	 
  

  </body>
</html>
