<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Elearning Galileo | Daftar Soal</title>
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
    <center><h3 class="data">Daftar Soal Yang Dibuat atau <a href="<?php echo base_url()?>teachers/create_test">Buat Soal</a></h3></center><br><br> 
        <div class="col-md-12" style="overflow: scroll;height:420px">
            <table class="table data">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Pelajaran
                        </th>
                        <th>
                            Kelas
                        </th>
                        <th>
                            Tanggal Buat
                        </th>
                        <th>
                            Buat Tes
                        </th>
                        <th>
                            Operasi
                        </th>
                    </tr>
                </thead>
                <?php foreach ($soal as $u){ ?>
                <tbody>
                    <tr class="active">
                        <td>
                            <a href="<?php echo base_url()?>teachers/show_create_test_detail/<?php echo $u->id_soal ?>"><?php echo $u->id_soal ?>
                        </td>
                        <td>
                           <?php echo $u->pelajaran ?>
                        </td>
                        <td>
                            <?php echo $u->kelas." ".$u->level ?>
                        </td>
                        <td>
                            <?php echo $u->tanggal_buat ?>
                        </td>
                        <td>
                            <?php echo $u->buat_tes ?>
                        </td>
                        <td>
                            <?php if($u->buat_tes == 'TIDAK'){ ?>
                            <a class="btn btn-success" href="<?php echo base_url()?>teachers/make_test/<?php echo $u->id_soal ?>"  type="button">Buat Tes</a>
                            <a class="btn btn-danger" href="<?php echo base_url()?>teachers/delete_create_test/<?php echo $u->id_soal ?>"  type="button">Hapus</a>
                            <?php }else{?>
                             <a class="btn btn-danger" href="<?php echo base_url()?>teachers/cancel_test/<?php echo $u->id_soal ?>"  type="button">Batal Tes</a>
                             <a class="btn btn-warning" href="<?php echo base_url()?>teachers/finish_test/<?php echo $u->id_soal ?>"  type="button">Selesai Tes</a>
                            <?php } ?>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
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
