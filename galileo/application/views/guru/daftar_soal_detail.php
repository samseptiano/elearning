<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Elearning Galileo | Daftar soal - Detail</title>
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

              <div class="row">
                  <div class="col-lg-12 main-chart">      
						              			  <!--  PROFILE SECTION-->
    <div class="row" style="background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;margin: 0 2px 35px 2px">
    <form method="post" action="<?php echo base_url(); ?>teachers/update_create_test_detail">
        <div class="col-md-12"  style="overflow: scroll;overflow-x: auto;height:480px">
           <?php $i=1;  foreach($soal as $u){ ?>
          <input type="hidden"  name="id_soal" value="<?php echo $u->id_soal ?>" class="form-control data"  >
        <input type="hidden"  name="nomor[<?php echo $i ;?>]" value="<?php echo $u->nomer_soal ?>" class="form-control data"  > 
        <div class="col-sm-12 form-group">
        <h4 class="data"><b>Soal <?php echo $i.".)" ?></b></h4>
        <div style="max-width: 600px;margin: 0 auto;">
        <textarea class="wysiwyg-editor<?php echo $i;?>" name="soal[<?php echo $i ;?>]" required><?php echo $u->soal ?></textarea>
        </div>
        </div>
        <div class="col-sm-3 form-group">
          <label class="data">Opsi A</label>
          <input type="text" name="A[<?php echo $i ;?>]" value="<?php echo $u->A ?>" class="form-control data"  >
        </div>
        <div class="col-sm-3 form-group">
          <label class="data">Opsi B</label>
          <input type="text" name="B[<?php echo $i ;?>]" value="<?php echo $u->B ?>" class="form-control data"  >
        </div>
        <div class="col-sm-3 form-group">
          <label class="data">Opsi C</label>
          <input type="text" name="C[<?php echo $i ;?>]" value="<?php echo $u->C ?>" class="form-control data"  >
        </div>
        <div class="col-sm-3 form-group">
          <label class="data">Opsi D</label>
          <input type="text" name="D[<?php echo $i ;?>]" value="<?php echo $u->D ?>" class="form-control data"  >
        </div>
        <div class="col-sm-1 form-group">
          <label class="data">Jawaban</label>
          <input type="text" name="answer[<?php echo $i ;?>]" value="<?php echo $u->jawaban ?>" class="form-control data"  >
        </div>
        <hr size="30px">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
        <script src="<?php echo base_url() ?>assets/elearning/wysiwyg/dist/js/jquery.wysiwygEditor.js"></script>
        <script type="text/javascript">
          $('.wysiwyg-editor'+<?php echo $i ?>).wysiwygEditor();
        </script>
        <?php $i++; } ?>
        </div>
        <div class="col-sm-4 form-group" style="float: right;margin-top: 10px">
          <button type="submit" id="btn2" name="submit" class="btn btn-success "> Update </button>
          <a type="submit" id="btn2" href="<?php echo base_url(); ?>teachers/show_create_test" class="btn btn-danger "> Kembali </a>
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
	 

    
  </body>
</html>
