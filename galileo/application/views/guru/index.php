<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Elearning Galileo | Beranda</title>
<link rel="shortcut icon" type="image/ico" href="<?php echo base_url()?>/assets/landing/img/favicon.ico"/>
    <?php include("include/css.php");?>
  
    <style type="text/css">
   .data{
      text-shadow: 0.1em 0.1em 0.2em rgb(199, 199, 199);
      color: black;
      }
    .latar{
      height:200px;
      width:100%;
      z-index: -1;
      position: absolute;
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
                  <div class="col-lg-9 main-chart"> 
                  <div class="form-group" style="background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;">
                    <div class="col-lg-12"><br>    
                    <h2 class="data">Selamat Datang, <?php echo $this->session->userdata("nama"); ?></h2><br><br>
                    <h3 class="data">Cek Pengumuman Disini</h3> 
                    <button type="button"  class="btn btn-warning" data-toggle="modal" data-target="#myModal">Lihat Pengumuman</button><br><br>
                    </div>  
                  </div>
                      <!-- Modal -->
                      <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                        
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Pengumuman</h4>
                            </div>
                            <div class="modal-body">
                              <?php foreach ($info as $u){ ?>
                            <table>
                              <tr>
                                  <td><?php echo "<b><h4>".$u->judul."</h4></b>".$u->isi ;?></td>
                              </tr><br>

                            </table>
                                <?php } ?>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      
                  </div>

                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  <div class="col-lg-3 ds">
                    <!-- USERS ONLINE SECTION -->
            <!-- <h3>online Member</h3> -->
                      <!-- First Member -->
                          <!-- <div class="desc">
                            <div class="thumb">
                              <img class="img-circle" src="<?php echo base_url(); ?>assets/elearning/img/ui-divya.jpg" width="35px" height="35px" align="">
                            </div>
                            <div class="details">
                              <p><a href="#">DIVYA MANIAN</a><br/>
                                 <muted>Available</muted>
                              </p>
                            </div>
                          </div> -->
                      <!-- Second Member -->
                          <!-- <div class="desc">
                            <div class="thumb">
                              <img class="img-circle" src="<?php echo base_url(); ?>assets/elearning/img/ui-sherman.jpg" width="35px" height="35px" align="">
                            </div>
                            <div class="details">
                              <p><a href="#">DJ SHERMAN</a><br/>
                                 <muted>I am Busy</muted>
                              </p>
                            </div>
                          </div> -->
                      <!-- Third Member -->
                          <!-- <div class="desc">
                            <div class="thumb">
                              <img class="img-circle" src="<?php echo base_url(); ?>assets/elearning/img/ui-danro.jpg" width="35px" height="35px" align="">
                            </div>
                            <div class="details">
                              <p><a href="#">DAN ROGERS</a><br/>
                                 <muted>Available</muted>
                              </p>
                            </div>
                          </div> -->
                      <!-- Fourth Member -->
                          <!-- <div class="desc">
                            <div class="thumb">
                              <img class="img-circle" src="<?php echo base_url(); ?>assets/elearning/img/ui-zac.jpg" width="35px" height="35px" align="">
                            </div>
                            <div class="details">
                              <p><a href="#">Zac Sniders</a><br/>
                                 <muted>Available</muted>
                              </p>
                            </div>
                          </div> -->
                      <!-- Fifth Member -->
                          <!-- <div class="desc">
                            <div class="thumb">
                              <img class="img-circle" src="<?php echo base_url(); ?>assets/elearning/img/ui-sam.jpg" width="35px" height="35px" align="">
                            </div>
                            <div class="details">
                              <p><a href="#">Marcel Newman</a><br/>
                                 <muted>Available</muted>
                              </p>
                            </div>
                          </div> -->

                        <!-- CALENDAR-->
                        <div id="calendar" class="mb" style="background-color: #ffffff;box-shadow: 5px 5px 10px #888888;border-radius:5px">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><br><!-- / calendar -->
                      
                  </div><!-- /col-lg-3 -->
              </div><! --/row -->
          </section>
      </section><!-- <div style="margin-bottom: 140px"></div>
 -->
      <!--main content end-->
      <!--footer start-->
      <?php include("include/footer.php"); ?>
      <!--footer end-->
  </section>

	 <!--javascript start-->
		<?php include("include/js.php"); ?>
	 <!--javascript end-->
	
	<script type="text/javascript">
	var tt = document.getElementById('tgl').value;
	var date = new Date(tt);
	var dd = date.getDate();
    var mm = date.getMonth();
    var y = date.getFullYear();
    var someFormattedDate = mm + '/' + dd + '/' + y;

    var skrg = new Date();
    var tglskrg = skrg.getMonth()+'/'+skrg.getDate()+'/'+skrg.getFullYear();
	if(tglskrg == someFormattedDate){
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Selamat datang di Elearning Galileo!',
            // (string | mandatory) the text inside the notification
            text: 'Jika anda masuk pertama kali, silahkan lihat <a href="<?php echo base_url()?>assets/elearning/documentation/tutor_user_guide_205720928579257.pdf" target="" style="color:#67ce44">Panduan</a>.  Jika tidak, abaikan pesan ini.',
            // (string | optional) the image to display on the left
            image: '<?php echo base_url(); ?>assets/elearning/img/ui--sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });
        return false;
        });
    }
	</script>
	
	<script type="application/javascript">
        $(document).ready(function () {
        $("#my-calendar").zabuto_calendar({
            language: "en",
            today: true,
          show_previous: false,
          show_next: 2
        });
    });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  </body>
</html>
