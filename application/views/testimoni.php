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
     <title>Galileo Gasing: Testimoni</title>

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

	<section id="imgBanner">
      <h2>Testimoni</h2>
    </section>
    <!--=========== BEGIN STUDENTS TESTIMONIAL SECTION ================-->
    <section id="studentsTestimonial"><br><br>
      <div class="container">
       <!-- Our courses titile -->
        <div class="row">
          <div class="col-lg-12 col-md-12"> 
            <div class="title_area">
              <h2 class="title_two">Apa yang Siswa Kami Katakan?</h2>
              <span></span> 
            </div>
          </div>
        </div>
        <!-- End Our courses titile -->

        <!-- Start Our courses content -->
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="studentsTestimonial_content">              
              <div class="row">
                <!-- start single student testimonial -->
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class="single_stsTestimonial wow fadeInUp">
                    <div class="stsTestimonial_msgbox">
                      <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                    </div>
                    <img class="stsTesti_img" src="<?php echo base_url(); ?>assets/landing/img/author.jpg" alt="img">
                    <div class="stsTestimonial_content">
                      <h3>Johnathan Doe</h3>                      
                      <span>Ex. Student</span>
                      <p>Software Department</p>
                    </div>
                  </div>
                </div>
                <!-- End single student testimonial -->
                <!-- start single student testimonial -->
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class="single_stsTestimonial wow fadeInUp">
                    <div class="stsTestimonial_msgbox">
                      <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book.scrambled it to make a type specimen book</p>
                    </div>
                    <img class="stsTesti_img" src="<?php echo base_url(); ?>assets/landing/img/author.jpg" alt="img">
                    <div class="stsTestimonial_content">
                      <h3>Johnathan Doe</h3>                      
                      <span>Ex. Student</span>
                      <p>Software Department</p>
                    </div>
                  </div>
                </div>
                <!-- End single student testimonial -->
                <!-- start single student testimonial -->
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class="single_stsTestimonial wow fadeInUp">
                    <div class="stsTestimonial_msgbox">
                      <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                    </div>
                    <img class="stsTesti_img" src="<?php echo base_url(); ?>assets/landing/img/author.jpg" alt="img">
                    <div class="stsTestimonial_content">
                      <h3>Johnathan Doe</h3>                      
                      <span>Ex. Student</span>
                      <p>Software Department</p>
                    </div>
                  </div>
                </div>
                <!-- End single student testimonial -->
              </div>
            </div>
          </div>
        </div>
        <!-- End Our courses content -->
      </div>
    </section>
    <!--=========== END STUDENTS TESTIMONIAL SECTION ================-->    
    
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