<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Elearning Galileo | Jadikan Tes</title>
<link rel="shortcut icon" type="image/ico" href="<?php echo base_url()?>/assets/landing/img/favicon.ico"/>
    <?php include("include/css.php");?>
	
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

              <div class="row">
                  <div class="col-lg-12 main-chart">  
    <div class="row" style="background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;margin: 0 2px 35px 2px">
          <center><h2 class="data">Jadikan Tes Online</h2></center><br><br>
        <div class="col-md-12" style="height:450px">
                <?php foreach ($soal as $u) { ?>
          <form class="form-horizontal" style="height:350px" method="post" action="<?php echo base_url()?>teachers/start_test">
        <div class="form-group">
          <label class="col-lg-3 control-label data">Id Soal</label>
          <div class="col-lg-5">
            <input class="form-control data" value="<?php echo  $u->id_soal ?>" name="id_soal" type="text" readonly>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label data">kelas</label>
          <div class="col-lg-3">
            <input type="text" name="kelas" value="<?php echo $u->kelas." ".$u->level." ".$u->pelajaran ?>" class="form-control data" readonly>
          </div>
          <div class="col-lg-3">
            <select name="major" class="form-control data" >
            <?php if($u->level == 'SD' || $u->level == 'SMP'){ ?>
                    <option value="GENERAL">General</option>
            <?php } ?>
          <?php if($u->level == 'SMA'){ ?>
                    <option value="GENERAL">General</option>
                    <option value="IPA">IPA</option>
                    <option value="IPS">IPS</option>
            <?php } ?>
            <?php if($u->level == 'SMK'){ ?>
                    <option value="AKUNTANSI">AKUNTANSI</option>
                    <option value="TEKNIK MESIN">TEKNIK MESIN</option>
                    <option value="PERHOTELAN">PERHOTELAN</option>
                    <option value="TEKNIK KOMPUTER JARINGAN">TEKNIK KOMPUTER JARINGAN</option>
            <?php } ?>
              </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label data">Waktu Mulai</label>
          <div class="col-lg-3">
            <input type="date" name="tanggal_mulai" class="form-control data" required="required">
          </div>
          <div class="col-lg-3">
            <input type="time" name="jam_mulai" class="form-control data">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label data">Durasi (Menit)</label>
          <div class="col-lg-2">
            <input type="text" name="durasi" class="form-control data" required="required">
          </div>
          <label class="col-lg-1 control-label data">Kategori</label>
          <div class="col-lg-3">
            <select name="category" class="form-control data" >
                    <option value="HARIAN">Ujian Harian</option>
                    <option value="UTS">Ujian Tengah Semester(UTS)</option>
                    <option value="UAS">Ujian Akhir Semester(UAS)</option>
                    <option value="UKK">Ujian Kenaikan Kelas(UKK)</option>
                    <option value="TRYOUT UN">Tryout Ujian Nasional</option>
                    <option value="TRYOUT SBMPTN">Tryout SBMPTN</option>
                </select>
            <span id="result"> </span>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-success" value="Submit" type="submit" name="submit" value="submit">
            <span></span>
            <a href="<?php echo base_url(); ?>teachers/show_create_test" class="btn btn-default">Batal</a>
          </div>
        </div>
      </form>
      <?php } ?>
        </div>
    </div>
                                  <!-- END PROFILE SECTION -->
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                 
              </div><! --/row -->
          </section>
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
