<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Elearning Galileo | Konsultasi Offline</title>
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
      
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>

      <script type="text/javascript">
      $(document).ready(function(){
        setInterval(function(){
        $("#konsul").load('<?php echo base_url()?>teachers/offline_consultation_fragment')
        }, 2000);
        });
      </script>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">      
          <div class="row" style="background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;margin: 0px 2px 0 2px">
          <center><h3 class="data">Pesan Masuk Konsultasi Offline</h3></center><br><br>
        <div class="col-md-12"  style="overflow: scroll;height:400px">
            <table class="table data" id="konsul">
                <thead>
                    <tr>
                        <th>
                            Kelas
                        </th>
                        <th>
                            Pelajaran
                        </th>
                        <th>
                            Waktu
                        </th>
                        <th>
                            Materi
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Operasi
                        </th>
                    </tr>
                </thead>
                        <?php foreach ($konsul as $u){ ?>
                <tbody >
                    <tr class="active">
                        <td>
                           <?php echo $u->kelas." ".$u->level ?>
                        </td>
                        <td>
                           <?php echo $u->pelajaran ?>
                        </td>
                        <td>
                            <?php echo $u->tanggal." ".$u->jam ?>
                        </td>
                        <td>
                            <?php echo $u->materi ?>
                        </td>
                        <td>
                            <?php echo $u->status_konsultasi ?>
                        </td>
                        <td>
                            <a class="btn btn-success" href="<?php echo base_url()?>teachers/offline_consultation_acc/<?php echo $u->id_konsul ?>/"  type="button">Terima</a><a class="btn btn-danger" href="<?php echo base_url()?>teachers/offline_consultation_reject/<?php echo $u->id_konsul ?>/"  type="button">Tolak</a>
                        </td>
                    </tr>
                </tbody>
                            <?php } ?>
            </table>
        </div>
    </div><br>
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
