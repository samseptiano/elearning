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
            <script language="javascript">
                  function onBCl()
                  {

                  var iframeEl = document.getElementById('ifrm');
                  if ( iframeEl.contentDocument ) { // DOM
                  iframeEl.contentDocument.getElementsByName("q")[0].value='you got it';
                  } else if ( iframeEl.contentWindow ) { // IE win
                  iframeEl.contentWindow.document.getElementsByName("q")[0].value='you got it';
                  }

                  }
            </script>
          
    </div><br><br>
       <div onload = "onBCl()">
        <iframe style="margin-left:0px;overflow:scroll;overflow-x: auto;margin-bottom:40px" src = "http://www.kalenderpendidikan.com/jawabarat-2017/" id="ifrm" height=500px width=100%></iframe>          
                  
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
