<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Elearning Galileo | Profil</title>
    <link rel="shortcut icon" type="image/ico" href="<?php echo base_url()?>/assets/landing/img/favicon.ico"/>

    <?php include("include/css.php");?>
	
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
 	 .data{
 	 		text-shadow: 0.1em 0.1em 0.2em rgb(99, 99, 99);
 	 		color: black;
  		}
  	.latar{
  		height:200px;
  		width:100%;
  		z-index: -1;
  		position: absolute;
  		 }
  	@media screen and (max-width: 767px) {
  		.latar{
  			height: 480px;
  		}
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
                      <div id="infoMessage" style="color:red" ><?php echo $this->session->flashdata('msg');?></div>
                      <!-- <h1 class="page-header">Profil Guru</h1> -->
              <div class="row">  
              <div class="col-md-12" style="padding-left:0px">
               <img src="https://static.pexels.com/photos/17679/pexels-photo.jpg" class="img-responsive latar">
               </div>   
                                  <!--  PROFILE SECTION-->
                    <!-- left column --><br><br><br>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="text-center">
                      <?php foreach($siswa as $u){ ?>
                        <img src="<?php echo base_url().$u->foto ?>" style="width:250px;height:250px" class="avatar img-circle img-thumbnail" alt="avatar">
                      </div>
                    </div>
                    
                    <!-- edit form column -->
                          <div class="col-lg-5 data">
                            <p >Registrasi Pada: <?php echo $u->tanggal_daftar ?></p>
                          </div>
                    <div class="col-md-8 col-sm-6">
                      <form class="form-horizontal" method="post" action="<?php echo base_url()?>students/update_profile">
                      <input name="id_siswa" value="<?php echo $u->id_siswa ?>" type="hidden">
                      <div class="form-group">
                          <!-- <h4 class="col-lg-3 control-label">Username:</h4> -->
                          <div class="col-lg-8">
                            <h1 class="col-lg-8 control-label data"><?php echo $u->username ?>
                            <?php
	                            if($u->jenis_kelamin == "Female"){
	                            	echo"<span class='fa fa-venus' style='margin-left:15px'></span>";
	                            }
	                            else{
	                            	echo "<span class='fa fa-mars' style='margin-left:15px'></span>";
	                            }
	                            ?>	
	                           </h1>
                            <h5 class="col-lg-8 control-label data"><?php echo $u->email ?></h5>
                            <br><br>
                          </div>
                        </div><br>
                        <div class="form-group" style="height:100%;background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;padding-bottom:10px ">
                    	<div class="col-lg-12">
                            <h5 class="col-lg-12 control-label data"><span class="fa fa-map-marker" style="margin-right: 10px"></span><?php echo $u->alamat ?></h5>
                            <br><br>
                         </div></div>
                         <div class="form-group" style="background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;padding-bottom:10px ">
                    		<div class="col-lg-12" >
	                            <h4 class="col-lg-12 control-label data"><?php echo $u->nama_depan." ".$u->nama_belakang ?></h4>
	                     		<h4 class="col-lg-12 control-label data"><?php echo $u->tempat_lahir.", ".$u->tanggal_lahir ?></h4>
	                            <h4 class="col-lg-12 control-label data">
	                            	<?php
	                            		if($u->jurusan == "TIDAK ADA"){echo $u->kelas." ".$u->level;} 
	                            		else{echo $u->kelas." ".$u->level." - ".$u->jurusan;} 
	                            	?>	
	                           	</h4>
	                           	<h4 class="col-lg-12 control-label data"><?php echo $u->sekolah ?></h4>
	                           	<h4 class="col-lg-12 control-label data"><?php echo $u->telepon ?></h4>
                         	</div>
                         </div>
                          <?php } ?>
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
