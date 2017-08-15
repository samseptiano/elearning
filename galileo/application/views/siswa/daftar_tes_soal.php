<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Elearning Galileo | Daftar Tes Online</title>
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
        $("#tes").load('<?php echo base_url()?>students/test_list_fragment')
        }, 2000);
        });
      </script>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row" style="background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;margin: 10px 2px 35px 2px;padding-top: 10px">
                  <div class="col-lg-12 main-chart">
                  <div id="infoMessage" style="color:red" ><?php echo $this->session->flashdata('msg');?></div>  
                  <center><h2 class="data">Daftar Test/Tryout</h2></center><br><br>
                  <b style="color:red"><p>Perhatikan Durasi Tes Sebelum Memulai. Tes online di pantau langsung dari sistem. <b>Dilarang membuka tab baru/melakukan kecurangan dalam bentuk apapun </b>karena akan terdeteksi oleh server. Selamat Mengerjakan!</p></b>  
						              			  <!--  PROFILE SECTION-->
    <div class="row">
        <div class="col-md-12"  style="overflow: scroll;height:400px">
            <table class="table data" id="tes">
                <thead>
                    <tr>
                       <th>
                            Pelajaran
                        </th>
                        <th>
                            Mulai
                        </th>
                        <th>
                            Durasi(Menit)
                        </th>
                        <th>
                            Kategori
                        </th>
                        <th>
                      
                        </th>
                    </tr>
                </thead>
                <?php foreach ($soal as $u){ ?>
                <tbody id="tes">
                    <tr class="active">
                        <td>
                            <?php echo $u->pelajaran ?>
                        </td>
                        <td>
                            <?php echo $u->waktu_mulai ?>
                        </td>
                        <td>
                            <?php echo $u->durasi_menit ?>
                        </td>
                          <td>
                            <?php echo $u->kategori ?>
                        </td>
                        <td>
                          <a class="btn btn-theme" href="<?php echo base_url() ?>students/start_test/<?php echo $u->id_soal ?>"  type="button">Mulai Test</a> 
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
