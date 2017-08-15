<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Elearning Galileo | Tes Online</title>
    <link rel="shortcut icon" type="image/ico" href="<?php echo base_url()?>/assets/landing/img/favicon.ico"/>

    <?php include("include/css.php");?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
		         <header class="header black-bg">
            <!--logo start-->
            <a href="<?php echo base_url()?>students" class="logo"><b>GALILEO GASING</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <!--  notification end -->
            </div>

            <div class="top-menu">
              <ul class="nav pull-right top-menu">
              </ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
		<?php //include("include/sidebar.php"); ?>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content" style="margin-left: 21px">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">    
						              			  <!--  PROFILE SECTION-->
    <div class="row">
    <form method="post" action="<?php echo base_url(); ?>students/calculate_test">
        <div class="col-md-12"  style="overflow: scroll;height:490px">
                    <?php $i=1;  foreach($soal as $u){ ?>
        <input type="hidden"  name="kategori" value="<?php echo $u->kategori ?>" class="form-control"  >  
        <input type="hidden"  name="jurusan" value="<?php echo $u->jurusan ?>" class="form-control"  > 
        <input type="hidden"  name="pelajaran" value="<?php echo $u->pelajaran ?>" class="form-control"  >     
        <input type="hidden"  name="id_soal" value="<?php echo $u->id_soal ?>" class="form-control"  >
        <div class="col-sm-12 form-group">
        <label style="font-size: 16px"><?php echo $i.". )" ?></label>
        <span style="font-size: 16px"> <b> <?php echo $u->soal ?> </b></span>
        <input type="hidden"  name="soal[<?php echo $i ;?>]" value="<?php echo $u->nomer_soal ?>" class="form-control"  readonly>
        </div>
        <div class="col-sm-3 form-group">
          <label>a. )</label>
          <span><?php echo $u->A ?></span>
        </div> 
        <div class="col-sm-3 form-group">
          <label>b. )</label>
          <span> <?php echo $u->B ?></span>
        </div>
        <div class="col-sm-3 form-group">
          <label>c. )</label>
          <span> <?php echo $u->C ?></span>
        </div>
        <div class="col-sm-3 form-group">
          <label>d.)</label>
          <span> <?php echo $u->D ?> </span>
        </div>
        <div class="col-sm-1 form-group">
          <label>Jawaban Anda:</label>
          <select name="answer[<?php echo $i ;?>]" class="form-control">
                        <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
        </div>
        <div class="col-sm-12 form-group">
        <hr>
        <br>
        </div>
          <?php 
          $i++; 
          $d = (strtotime($u->waktu_selesai)-strtotime(date('Y-m-d H:i:s', strtotime('+5 hour'))))/60; 
        } 
          ?>
        </div>
            <script type="text/javascript">
                function startTimer(duration, display) {
                  var start = Date.now(),
                      diff,
                      hours,
                      minutes,
                      seconds;
                  function timer() {
                      // get the number of seconds that have elapsed since 
                      // startTimer() was called
                      diff = duration - (((Date.now() - start) / 1000) | 0);
                      // does the same job as parseInt truncates the float
                      hours = (diff / 3600) | 0;
                      minutes = ((diff % 3600)/60) | 0;
                      seconds = (diff % 60) | 0;

                      hours = hours < 10 ? "0" + hours : hours;
                      minutes = minutes < 10 ? "0" + minutes : minutes;
                      seconds = seconds < 10 ? "0" + seconds : seconds;

                      display.textContent = hours+ ":" +minutes + ":" + seconds; 

                      if (diff <= 0) {
                        //window.location.href = '<?php echo base_url()?>students/calculate_test';
                          document.getElementById('btn2').click();

                          // add one second so that the count down starts at the full duration
                          // example 05:00 not 04:59
                          //start = Date.now() + 1000;
                      }
                  };
                  // we don't want to wait a full second before the timer starts
                  timer();
                  setInterval(timer, 1000);
              }

              window.onload = function () {
                  
                  var Minutes = 60 * <?php echo $d; ?>,
                      display = document.querySelector('#time');
                  startTimer(Minutes, display);


              };
            </script>  
          <div class="col-sm-3 form-group">
              <?php foreach($siswa as $u){ ?>
          <input type="hidden"  name="grade" value="<?php echo $u->kelas." ".$u->level ?>" class="form-control"  readonly>
          <?php } ?>
        </div>
        <div class="col-sm-4 form-group" style="float: right;">
        <h5 style="color: red"><b>Test closes in <span id="time"></span> min(s)!</b>&nbsp;&nbsp;&nbsp;<button type="submit" id="btn2" name="submit" class="btn btn-success "> Selesai </button></h5>
        </div>
        </form> 
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
	 
  
<script type="text/javascript">
   var _0xf6a4=["\x63\x75\x74\x20\x63\x6F\x70\x79\x20\x70\x61\x73\x74\x65","\x70\x72\x65\x76\x65\x6E\x74\x44\x65\x66\x61\x75\x6C\x74","\x62\x69\x6E\x64","\x62\x6F\x64\x79","\x63\x6F\x6E\x74\x65\x78\x74\x6D\x65\x6E\x75","\x6F\x6E","\x72\x65\x61\x64\x79"];$(document)[_0xf6a4[6]](function(){$(_0xf6a4[3])[_0xf6a4[2]](_0xf6a4[0],function(_0x257cx1){_0x257cx1[_0xf6a4[1]]()});$(_0xf6a4[3])[_0xf6a4[5]](_0xf6a4[4],function(_0x257cx1){return false})})
    </script>
  </body>
</html>
