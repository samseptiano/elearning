<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Elearning Galileo | Absensi Guru</title>
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
                  <div class="col-lg-12 main-chart" >
                  <div id="infoMessage" style="color:red" ><?php echo $this->session->flashdata('msg');?></div>      
						              			  <!--  PROFILE SECTION-->
                      <form  method="post" id="register" action="<?php echo base_url('teachers/request_absence'); ?>" >
                    <div class="row" style="background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;padding-top: 15px;margin:-3px 2px 0 2px">
                        <h3 class="col-sm-12 form-group data" >Absensi Kehadiran Guru</h3><br>
                        <div class="col-sm-2 form-group">
                          <label class="data">Tanggal</label>
                          <input type="text" value="<?php echo date('Y/m/d'); ?>" class="form-control data" readonly>
                        </div>
                        <div class="col-sm-2 form-group">
                          <label class="data">Kelas</label>
                              <select name="grade" class="form-control data" value="<?php echo $u->kelas ?>" >
                                      <option value="">-Kelas-</option>
                                  <option value="1 SD">1 SD</option>
                                  <option value="2 SD">2 SD</option>
                                  <option value="3 SD">3 SD</option>
                                  <option value="4 SD">4 SD</option>
                                  <option value="5 SD">5 SD</option>
                                  <option value="6 SD">6 SD</option>
                                  <option value="1 SMP">1 SMP</option>
                                  <option value="2 SMP">2 SMP</option>
                                <option value="3 SMP">3 SMP</option>
                                  <option value="1 SMA">1 SMA IPA</option>
                                  <option value="1 SMA">1 SMA IPS</option>
                                <option value="1 SMK">1 SMK</option>
                                  <option value="2 SMA">2 SMA IPA</option>
                                  <option value="2 SMA">2 SMA IPS</option>
                                  <option value="2 SMK">2 SMK</option>
                                  <option value="3 SMA">3 SMA IPA</option>
                                  <option value="3 SMA">3 SMA IPS</option>
                                  <option value="3 SMK">3 SMK</option>
                              </select>
                        </div>
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
                          <label class="data">Jam Masuk</label>
                          <input type="time" name="time_in" placeholder="Jam Masuk..." class="form-control data" required>
                        </div>
                        <div class="col-sm-2 form-group">
                          <label class="data">Jam Keluar</label>
                          <input type="time" name="time_out" placeholder="Jam Keluar.." class="form-control data" required>
                        </div>
                        <div class="col-sm-7 form-group">
                          <label class="data">Materi Yang Di Ajarkan</label>
                          <input type="text" name="topic" placeholder="Misalkan 'Materi Perkalian Pecahan' " class="form-control data" required>
                        </div>
                        <div class="col-sm-2 form-group">
                          <label class="data">Status</label>
                          <select name="status" class="form-control data" >
                                  <option value="TIDAK HADIR">Tidak Hadir</option>
                                  <option value="HADIR">Hadir</option>
                              </select>
                        </div>
                        <div class="col-sm-3 form-group">
                          <button type="submit" name="submit" style="margin-top: 22px" class="btn btn-success "> Kirim Absen</button>
                        </div>
                    </div></form>
                    <br>
                    <div class="row" style="background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;padding-top: 15px;margin:0 2px 35px 2px">
                       <div class="col-md-12" style="overflow: scroll;height:250px;">
            <table class="table data">
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
                            Status
                        </th>
                    </tr>
                </thead>
                 <?php foreach($absen as $u){ ?>
                <tbody id="absen">
                    <tr class="active">
                        <td>
                           <?php echo $u->kelas." ".$u->level ?>
                        </td>
                        <td>
                           <?php echo $u->pelajaran ?>
                        </td>
                        <td>
                            <?php echo $u->tanggal." ".$u->jam_masuk." s/d ".$u->jam_keluar ?>
                        </td>
                        <td>
                            <?php echo $u->status_hadir ?>
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
