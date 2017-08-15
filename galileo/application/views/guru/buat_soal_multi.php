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
	
    <link rel="stylesheet" href="<?php echo base_url()?>assets/elearning/wysiwyg/dist/css/jquery.wysiwygEditor.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,800" rel="stylesheet" type="text/css">

  <style>
    iframe {
      border: none;
      outline: none;
      position: relative;
      //width: 100%;
      background: #fff;
      //padding: 15px;
    }
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
                      <div id="infoMessage" style="color:red" ><?php echo $this->session->flashdata('msg');?></div>

                      <form  method="post" id="create_question" action="" >
                    <div class="row" style="background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;margin: -10px 2px 0 2px">
                    <center><h3 class="data">Buat Soal Selanjutnya</h3><br></center>
                        <div class="col-sm-4 form-group">
                          <label class="data">ID Soal</label>
                          <input type="text" name="id_soal" value="<?PHP echo $id_soal; ?>" class="form-control data"  readonly>
                        </div>
                        <div class="col-sm-4 form-group">
                          <label class="data">Pelajaran</label>
                          <input type="text" name="subject" value="<?PHP echo $pelajaran; ?>" class="form-control data"  readonly>
                        </div>
                        
                        <div class="col-sm-2 form-group">
                          <label class="data">kelas</label>
                        <input type="text" name="grade" value="<?PHP echo $kelas; ?>" class="form-control data"  readonly>
                        </div>
                        <div class="col-sm-1 form-group">
                          <label class="data">Soal</label>
                        <input type="text" name="increment" value="<?PHP echo $i ; ?>" class="form-control data"  readonly>
                        </div>
                        <div class="col-sm-8 form-group">
                          <label class="data">Soal</label>
                          <div style="max-width: 600px; margin: 0 auto;">
                            <!-- <textarea class="form-control" name="soal" id="txtEditor" required></textarea>  -->
                            <textarea class="wysiwyg-editor" name="soal"></textarea>
                          </div>
                        </div>
                        <div class="col-sm-4 form-group" style="padding-top: 10px">
                          <label class="data">Opsi A</label>
                          <input type="text" name="A" placeholder=" " class="form-control data" required>
                        </div>
                        <div class="col-sm-4 form-group">
                          <label class="data">Opsi B</label>
                          <input type="text" name="B" placeholder=" " class="form-control data" required>
                        </div>
                        <div class="col-sm-4 form-group">
                          <label class="data">Opsi C</label>
                          <input type="text" name="C" placeholder=" " class="form-control data" required>
                        </div>
                        <div class="col-sm-4 form-group">
                          <label class="data">Opsi D</label>
                          <input type="text" name="D" placeholder=" " class="form-control data" required>
                        </div>
                        <div class="col-sm-1 form-group">
                          <label class="data">Jawaban</label>
                          <select name="answer" class="form-control data" required="">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                        </div>
                    </div>
                    <div class="row" style="width:70%;background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;margin: 10px 8px 35px 2px;padding-top:10px">
                      <div class="col-sm-2 form-group" style="margin-left: 10%">
                           <button type="submit" id="btn1" name="submit" class="btn btn-warning "> Buat Lagi </button>
                          <!-- <button type="submit" name="submit" class="btn btn-warning "> Buat Soal Lagi </button> -->
                        </div>
                        <div class="col-sm-2 form-group" style="margin-left: 10%">
                          <button type="submit" id="btn2" name="submit" class="btn btn-success "> Selesai </button>
                        </div>
                    </div>
                    </form>
                                  <!-- END PROFILE SECTION -->
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
                        <script type="text/javascript">
                            $('#btn1').click(function(){
                            $('#create_question').attr('action','<?php echo base_url()?>teachers/create_test_multiple');
                            $('#create_question').submit();
                          });

                          $('#btn2').click(function(){
                            $('#create_question').attr('action', '<?php echo base_url()?>teachers/finish_create_test_multiple');
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
	 
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
  <script src="<?php echo base_url() ?>assets/elearning/wysiwyg/dist/js/jquery.wysiwygEditor.js"></script>
  <script type="text/javascript">
    $('.wysiwyg-editor').wysiwygEditor();
  </script>
  </body>
</html>
