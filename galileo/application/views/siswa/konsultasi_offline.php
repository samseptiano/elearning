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
        $("#konsul").load('<?php echo base_url()?>students/offline_consultation_fragment')
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
                  <div id="infoMessage" style="color:red" ><?php echo $this->session->flashdata('msg');?></div>      
						              			  <!--  PROFILE SECTION-->
                                  
                      <div class="row" style="background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;margin: -10px 2px 0 2px">
                      <center><h3 class="data">Daftar Permintaan konsultasi Offline</h3></center><br>
                       <div class="col-md-12" style="overflow: scroll;height:220px">
            <table class="table data" id="konsul">
                <thead>
                    <tr>
                        <th>
                            Pelajaran
                        </th>

                        <th>
                            Waktu
                        </th>
                        <th>
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody >
                <?php foreach ($konsul as $u) { ?>
                    <tr class="active">
                        <td>
                           <?php echo $u->pelajaran ?>
                        </td>
                        <td>
                          <?php echo $u->tanggal." ".$u->jam ?>
                        </td>
                        <td>
                           <?php echo $u->status_konsultasi ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
                      </div>
                      <form  method="post" id="register" action="<?php echo base_url('students/request_offline_consultation'); ?>" ><br>
                    <div class="row" style="background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;margin: 0px 2px 35px 2px">
                        <center><h3 class="data">Ajukan konsultasi Offline</h3></center><br>
                        <div class="col-sm-3 form-group">
                          <label class="data">Pelajaran</label>
                          <select name="subject" class="form-control data" >
                                  <option value="">-Pelajaran-</option>
                                  <option value="MATEMATIKA">MATEMATIKA</option>
                                  <option value="FISIKA">FISIKA</option>
                                  <option value="KIMIA">KIMIA</option>
                                  <option value="BIOLOGI">BIOLOGI</option>
                                  <option value="EKONOMI">EKONOMI</option>
                                  <option value="SOSIOLOGI">SOSIOLOGI</option>
                                  <option value="GEOGRAFI">GEOGRAFI</option>
                                  <option value="IPA">IPA</option>
                                  <option value="IPS">IPS</option>
                                  <option value="INDONESIA">INDONESIA</option>
                                  <option value="INGGRIS">INGGRIS</option>
                                  <option value="AKUNTANSI">AKUNTANSI</option>
                                  <option value="SEJARAH">SEJARAH</option>
                                  <option value="SENI">SENI</option>
                                  <option value="TIK">TIK</option>
                              </select>
                        </div>
                        <div class="col-sm-2 form-group">
                          <label class="data">Tanggal</label>
                          <input type="date" name="date" placeholder="Tanggal Konsultasi" class="form-control data" required>
                        </div>
                        <div class="col-sm-2 form-group">
                          <label class="data">Jam</label>
                          <input type="time" name="time" placeholder="Jam Konsultasi" class="form-control data" required>
                        </div>
                        <div class="col-sm-5 form-group">
                          <label class="data">Materi Yang Di Tanyakan</label>
                          <input type="text" name="topic" placeholder="Misalkan 'Materi Perkalian Pecahan' " class="form-control data" required>
                        </div>
                        <div class="col-sm-3 form-group">
                          <button type="submit" name="submit" style="margin-top: 22px" class="btn btn-theme "> Kirim Permintaan</button>
                        </div>
                    </div></form>
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
