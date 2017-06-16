<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Elearning Galileo | Profil</title>

    <?php include("include/css.php");?>
	
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                      <div id="infoMessage" style="color:red" ><?php echo $this->session->flashdata('msg');?></div>
                      <h1 class="page-header">Profil Siswa</h1>
              <div class="row">     
						              			  <!--  PROFILE SECTION-->
                    <!-- left column -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="text-center">
                        <img src="http://lorempixel.com/200/200/people/9/" class="avatar img-circle img-thumbnail" alt="avatar">
                      </div>
                    </div>
                    <?php foreach($siswa as $u){ ?>
                    <!-- edit form column -->
                          <div class="col-lg-5">
                            <span><p>Registrasi Pada: <?php echo $u->tanggal_daftar ?></p></span>
                          </div>
                    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
                      <h2>Personal info</h2>
                      <form class="form-horizontal" method="post" action="<?php echo base_url()?>students/update_profile">
                      <input name="id_siswa" value="<?php echo $u->id_siswa ?>" type="hidden">
                      <div class="form-group">
                          <h4 class="col-lg-3 control-label">Username:</h4>
                          <div class="col-lg-8">
                            <h4 class="col-lg-8 control-label"><?php echo $u->username ?></h4>
                          </div>
                        </div>
                        <div class="form-group">
                          <h4 class="col-lg-3 control-label">Nama:</h4>
                          <div class="col-lg-8">
                            <h4 class="col-lg-8 control-label"><?php echo $u->nama_depan." ".$u->nama_belakang ?></h4>
                          </div>
                        </div>
                        <div class="form-group">
                          <h4 class="col-lg-3 control-label">Jenis Kelamin:</h4>
                          <div class="col-lg-8">
                            <h4 class="col-lg-5 control-label"><?php echo $u->jenis_kelamin ?></h4>
                          </div>
                        </div>
                        <div class="form-group">
                          <h5 class="col-lg-3 control-label">Tempat-Tanggal Lahir:</h5>
                          <div class="col-lg-8">
                            <h4 class="col-lg-8 control-label"><?php echo $u->tempat_lahir.", ".$u->tanggal_lahir ?></h4>
                          </div>
                        </div>
                        <div class="form-group">
                          <h4 class="col-lg-3 control-label">Kelas:</h4>
                          <div class="col-lg-8">
                            <h4 class="col-lg-8 control-label"><?php echo $u->kelas." ".$u->level." "?>
                            <?php if($u->jurusan != "TIDAK ADA")
                              { 
                                  echo $u->jurusan ;  
                              } 
                              ?>
                              </h4>
                          </div>
                        </div>
                        <div class="form-group">
                          <h4 class="col-lg-3 control-label">Asal Sekolah:</h4>
                          <div class="col-lg-8">
                            <h4 class="col-lg-8 control-label"><?php echo $u->sekolah ?></h4>
                          </div>
                        </div>
                        <div class="form-group">
                          <h4 class="col-lg-3 control-label">Alamat:</h4>
                          <div class="col-lg-8">
                            <h5 class="col-lg-8 control-label"><?php echo $u->alamat ?></h5>
                          </div>
                        </div>
                        <div class="form-group">
                          <h4 class="col-lg-3 control-label">Telepon:</h4>
                          <div class="col-lg-8">
                           <h4 class="col-lg-8 control-label"><?php echo $u->telepon ?></h4>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-3 control-label"></label>
                          <?php } ?>
                        </div>
                      </form>
                    </div>
                                  <!-- END PROFILE SECTION -->
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  </section>
      <!--main content end-->
      <!--footer start-->
      <?php include("include/footer.php"); ?>
      <!--footer end-->
  </section>

	 <!--javascript start-->
		<?php include("include/js.php"); ?>
	 <!--javascript end-->
	 
  

  </body>
</html>
