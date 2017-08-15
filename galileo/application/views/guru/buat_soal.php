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
      text-shadow: 0.1em 0.1em 0.2em rgb(99, 99, 99);
      color: black;
      }
    .latar{
      height:200px;
      width:100%;
      z-index: -1;
      position: absolute;
       }
    @media screen and (max-width: 767px) {
      .latar{
        height: 480px;
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
          <div class="form-group" style="background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;padding-bottom:5px;padding: 5px 10px 10px 15px;margin-top: 10px">
                      <center><h3 class="data">Buat Soal Tes atau <a href="<?php echo base_url()?>teachers/show_create_test">Lihat Soal</a> </h3></center><br>
                      <div id="infoMessage" style="color:red" ><?php echo $this->session->flashdata('msg');?></div>
                      <form  method="post" id="create_question" action="" >
                    <div class="row">
                              <?php foreach($tutor as $u ){ ?>
                        <div class="col-sm-4 form-group">
                          <label class="data">ID Soal</label>
                          <?php
                           $rand = uniqid(rand(),true);
                           $pelajaran = $u->bidang;
                           $i=1;
                          ?>
                          <input type="text" name="id_soal" value="Q-<?PHP echo $u->bidang."-".$rand; ?>" class="form-control data"  readonly>
                        </div>
                        <div class="col-sm-4 form-group">
                          <label class="data">Pelajaran</label>
                          <?php if($u->bidang == "UMUM"){ ?>
                              <select name="subject" class="form-control data" required="required">
                                  <option value="UMUM">UMUM</option>
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
                          <?php } 
                              else{   ?>
                          <input type="text" name="subject" value="<?PHP echo $u->bidang ?>" class="form-control data"  readonly>
                          <?php } ?>
                        </div>
                        <div class="col-sm-2 form-group">
                          <label class="data">kelas</label>
                          <select name="grade" class="form-control data" >
                            <option value="1 SD">1 SD </option>
                            <option value="2 SD">2 SD </option>
                            <option value="3 SD">3 SD </option>
                            <option value="4 SD">4 SD </option>
                            <option value="5 SD">5 SD </option>
                            <option value="6 SD">6 SD </option>
                            <option value="1 SMP">1 SMP </option>
                            <option value="2 SMP">2 SMP </option>
                          <option value="3 SMP">3 SMP </option>
                            <option value="1 SMA">1 SMA</option>
                          <option value="1 SMK">1 SMK </option>
                            <option value="2 SMA">2 SMA</option>
                            <option value="2 SMK">2 SMK </option>
                            <option value="3 SMA">3 SMA</option>
                            <option value="3 SMK">3 SMK</option>
                        </select>
                        </div>
                        <div class="col-sm-1 form-group">
                          <label class="data">Soal</label>
                        <input type="text" name="increment" value="<?PHP echo $i ; ?>" class="form-control"  readonly>
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
                                                 <?php } ?>
                     
                    </div>
                    <div class="row">
                      <div class="col-sm-2 form-group">
                           <button type="submit" id="btn1" name="submit" class="btn btn-warning "> Buat Lagi </button>
                          <!-- <button type="submit" name="submit" class="btn btn-warning "> Buat Soal Lagi </button> -->
                        </div>
                        <div class="col-sm-2 form-group">
                          <button type="submit" id="btn2" name="submit" class="btn btn-success "> Selesai </button>
                        </div>
                           <div class="col-sm-2 form-group">
                          <a href="<?php echo base_url(); ?>teachers" class="btn btn-danger "> Batal </a>
                        </div>
                    </div>
                    </form>
                    </div>
                        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
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
          </section>
      </section><br><br><br>

      <!--main content end-->
      <!--footer start-->
      <?php include("include/footer.php"); ?>
      <!--footer end-->
  </section>

   <!--javascript start-->
    <?php include("include/js.php"); ?>
   <!--javascript end-->
   
   <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-2.1.4.js"></script> -->
  <script src="<?php echo base_url() ?>assets/elearning/wysiwyg/dist/js/jquery.wysiwygEditor.js"></script>
  <script type="text/javascript">
    $('.wysiwyg-editor').wysiwygEditor();
  </script>
  </body>
</html>
