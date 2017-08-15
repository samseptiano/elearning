<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Elearning Galileo | Nilai Siswa</title>
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
                  <div id="infoMessage" style="color:red" ><?php echo $this->session->flashdata('msg');?></div>      
						              			  <!--  PROFILE SECTION-->

                    <div class="row" style="background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;margin: 10px 2px 35px 2px;padding-top: 10px">
                       <div class="col-md-12" style="overflow: scroll;height:470px">
            <table class="table data">
                <thead>
                    <tr>
                        <th>
                            ID Soal
                        </th>
                        <th>
                            Kategori
                        </th>
                        <th>
                            Kelas
                        </th>
                        <th>
                            Pelajaran
                        </th>
                        <th>
                            Waktu Tes
                        </th>
                        <th>
                            Nilai
                        </th>
                    </tr>
                </thead>
                 <?php foreach($nilai as $u){ ?>
                <tbody id="absen">
                    <tr class="active">
                        <td>
                           <?php echo $u->id_soal ?>
                        </td>
                        <td>
                           <?php echo $u->kategori ?>
                        </td>
                        <td>
                            <?php echo $u->kelas." ".$u->level ?>
                        </td>
                        <td>
                           <?php echo $u->pelajaran ?>
                        </td>
                         <td>
                            <?php $expl = explode(" ",$u->waktu); echo $expl[0];  ?>
                        </td>
                        <td>
                            <?php
                             if($u->nilai >= 70){
                              echo "<p style='color:green'>".$u->nilai."</p>";
                             }
                             else {
                              echo "<p style='color:red'>".$u->nilai."</p>";
                             } 
                             ?>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
        </div>
        <?php 
              echo "<center><h4>".$this->pagination->create_links()."</h4></center>";
          ?>
                      </div>
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
