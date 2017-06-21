<!DOCTYPE html>
<html lang="en">
  <head>
    <!--=============================================== 
    Template Design By WpFreeware Team.
    Author URI : http://www.wpfreeware.com/
    ====================================================-->

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Galileo Gasing: Beranda</title>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/ico" href="<?php base_url()?>/assets/landing/img/favicon.ico"/>


	<!-- css -->
		<?php include("include/css.php"); ?>

  </head>
  <body>    

    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"></a>
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
		<?php include("include/header.php"); ?>
    <!--=========== END HEADER SECTION ================--> 

    <!--=========== BEGIN SLIDER SECTION ================-->
    <section id="slider">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="slider_area">
            <!-- Start super slider -->
            <div id="slides">
              <ul class="slides-container">                          
                <li>
                  <img src="<?php echo base_url(); ?>assets/landing/img/slider/2.jpg" alt="img">
                   <div class="slider_caption">
                    <h2>Live as if you were to die tomorrow. Learn as if you were to live forever.</h2>
                    <p>Mahatma Gandhi</p>
                    <a class="slider_btn" href="<?php echo base_url()?>Advantage">Keunggulan</a>
                  </div>
                  </li>
                <!-- Start single slider-->
                <li>
                  <img src="<?php echo base_url(); ?>assets/landing/img/slider/3.jpg" alt="img">
                   <div class="slider_caption slider_right_caption">
                    <h2>Intelligence plus character-that is the goal of true education.</h2>
                    <p>Martin Luther King Jr.</p>
                    <a class="slider_btn" href="<?php echo base_url()?>Advantage">Cari Tahu</a>
                  </div>
                </li>
                <!-- Start single slider-->
                <li>
                  <img src="<?php echo base_url(); ?>assets/landing/img/slider/4.jpg" alt="img">
                   <div class="slider_caption">
                    <h2>Children must be taught how to think, not what to think.</h2>
                    <p>Margareth Mead</p>
                    <a class="slider_btn" href="<?php echo base_url()?>Advantage">Cari Tahu</a>
                  </div>
                </li>
              </ul>
              <nav class="slides-navigation">
                <a href="#" class="next"></a>
                <a href="#" class="prev"></a>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=========== END SLIDER SECTION ================-->
	
    <!--=========== BEGIN FOOTER SECTION ================-->
		<?php include("include/footer.php"); ?>
    <!--=========== END FOOTER SECTION ================--> 

  

    <!--javascript-->
		<?php include("include/js.php"); ?>
	
    <!--=============================================== 
    Template Design By WpFreeware Team.
    Author URI : http://www.wpfreeware.com/
    ====================================================-->


    <script type="text/javascript">
    //no right click and copas
    $(document).ready(function () {
        //Disable cut copy paste
        $('body').bind('cut copy paste', function (e) {
            e.preventDefault();
        });
       
        //Disable mouse right click
        $("body").on("contextmenu",function(e){
            return false;
        });
    });
    </script>
    
  </body>
</html>