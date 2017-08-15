<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Elearning Galileo | Jadwal Bimbel</title>
<link rel="shortcut icon" type="image/ico" href="<?php echo base_url()?>/assets/landing/img/favicon.ico"/>
    <?php include("include/css.php");?>
	
    <style type="text/css">
   .data{
      text-shadow: 0.1em 0.1em 0.2em rgb(199, 199, 199);
      color: black;
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

              <div class="row">
                  <div class="col-lg-12 main-chart">  
                     
						              			  <!--  PROFILE SECTION-->
    <div class="row" style="background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;padding-top: 5px;margin: 0px 2px 0 2px">
    <center><h1 class="data">Jadwal Bimbingan Belajar</h1></center><br><br> 
        <div class="col-md-12"  style="overflow: scroll;height: 420px">
            <table class="table data">
                <thead>
                    <tr>
                        <th>
                            Jadwal
                        </th>
                        <th>
                            Hari
                        </th>
                        <th>
                            Jam
                        </th>
                        <th>
                            Kelas
                        </th>
                        <th>
                            Tutor
                        </th>
                    </tr>
                </thead>
                <?php foreach ($jadwal as $u){ ?>
                <tbody>
                    <tr class="active">
                        <td>
                            <?php echo $u->jadwal ?>
                        </td>
                        <td>
                           <?php echo $u->hari ?>
                        </td>
                        <td>
                            <?php echo $u->jam ?>
                        </td>
                        <td>
                            <?php echo $u->kelas ?>
                        </td>
                        <td>
                            <?php echo $u->tutor ?>
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
