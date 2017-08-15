<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Elearning Galileo | Buat Soal</title>
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
                      <h2>Buat Soal Selanjutnya</h2><br>
                      <div id="infoMessage" style="color:red" ><?php echo $this->session->flashdata('msg');?></div>

                      <form  method="post" id="create_question" action="" >
                    <div class="row">
                        <div class="col-sm-4 form-group">
                          <label>ID Soal</label>
                          <input type="text" name="id_soal" value="<?PHP echo $id_soal; ?>" class="form-control"  readonly>
                        </div>
                        <div class="col-sm-4 form-group">
                          <label>Pelajaran</label>
                          <input type="text" name="subject" value="<?PHP echo $pelajaran; ?>" class="form-control"  readonly>
                        </div>
                        
                        <div class="col-sm-2 form-group">
                          <label>kelas</label>
                        <input type="text" name="grade" value="<?PHP echo $kelas; ?>" class="form-control"  readonly>
                        </div>
                        <div class="col-sm-1 form-group">
                          <label>Soal</label>
                        <input type="text" name="increment" value="<?PHP echo $i ; ?>" class="form-control"  readonly>
                        </div>
                        <div class="col-sm-6 form-group">
                          <label>Soal</label>
                          <textarea style="height: 250px" name="soal" placeholder="" class="form-control" required></textarea> 
                        </div>
                        <div class="col-sm-4 form-group">
                          <label>Opsi A</label>
                          <input type="text" name="A" placeholder=" " class="form-control" required>
                        </div>
                        <div class="col-sm-4 form-group">
                          <label>Opsi B</label>
                          <input type="text" name="B" placeholder=" " class="form-control" required>
                        </div>
                        <div class="col-sm-4 form-group">
                          <label>Opsi C</label>
                          <input type="text" name="C" placeholder=" " class="form-control" required>
                        </div>
                        <div class="col-sm-4 form-group">
                          <label>Opsi D</label>
                          <input type="text" name="D" placeholder=" " class="form-control" required>
                        </div>
                        <div class="col-sm-1 form-group">
                          <label>Jawaban</label>
                          <input type="text" name="answer" placeholder="" class="form-control" required>
                        </div>
                           <div class="col-sm-2 form-group">
                          <button type="submit" name="submit" id="btn1" class="btn btn-warning "> Buat Soal Lagi </button>
                        </div>
                        <div class="col-sm-2 form-group">
                          <button type="submit" name="submit" id="btn2" class="btn btn-success "> Selesai </button>
                        </div>
                           <div class="col-sm-2 form-group">
                          <a href="<?php echo base_url(); ?>teachers" class="btn btn-danger "> Batal </a>
                        </div>
                         
                     
                    </div></form>
                                  <!-- END PROFILE SECTION -->
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
                        <script type="text/javascript">
                            $('#btn1').click(function(){
                            $('#create_question').attr('action','<?php echo base_url()?>teachers/create_test_multiple');
                            $('#create_question').submit();
                          });

                          $('#btn2').click(function(){
                            $('#create_question').attr('action', '<?php echo base_url()?>teachers/finish_create_test');
                            $('#create_question').submit();
                          });
                        </script>
                  
                  
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
