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
     <title>Galileo Gasing : Tentang Kami</title>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/ico" href="<?php base_url()?>/assets/landing/img/favicon.ico"/>


    <!-- CSS -->
    <?php include("include/css.php"); ?>

  
  </head>
  <body>

    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"></a>
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
		<?php include("include/header.php"); ?>
    <!--=========== END HEADER SECTION ================--> 

    <!--=========== BEGIN COURSE BANNER SECTION ================-->
    <section id="imgBanner">
      <h2>Tentang Kami</h2>
    </section>
    <!--=========== END COURSE BANNER SECTION ================-->
    
    <!--=========== BEGIN CONTACT SECTION ================-->
    <section id="contact">
      <div class="container">
       <div class="row">
          <div class="col-lg-12 col-md-12"> 
              <span></span> 
          </div>
       </div>
       <div class="row">
         <div class="col-lg-8 col-md-8 col-sm-8">
           <div class="contact_form wow fadeInLeft">
              <center><h3>VISI</h3></center>
              <center><p>Membangun generasi unggul untuk menjawab tantangan global</p></center>
              <center><h3>MISI</h3></center>
              <center><p>Menjadi Partner siswa dalam memecah masalah belajar, membantu pemahaman materi pelajaran meningkatkan kemampuan akademik peserta didik untuk menghasilkan siswa yang berprestasi. Membina pengembangan didik siswa menjadi pribadi yang mandiri, kreatif, inovatif, jujur dan berakhlak. Menjadikan G2 sebagai wadah bagi siswa, sehingga dapat belajar dengan gampang, asik dan menyenangkan.</p></center>
           </div>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-4">
           <div class="contact_address wow fadeInRight">
             <h3>Alamat</h3>
             <div class="address_group">
               <p><a href="https://www.google.co.id/maps/place/Galileo+Gasing/@-6.2869672,107.0339921,19.75z/data=!4m12!1m6!3m5!1s0x2e698e23d7062979:0xbd75c300e9973228!2sGalileo+Gasing!8m2!3d-6.2868445!4d107.0338736!3m4!1s0x2e698e23d7062979:0xbd75c300e9973228!8m2!3d-6.2868445!4d107.0338736">Ruko Pasadena, Jl. Mutiara Gading Timur, Mustika Jaya, Bekasi Timur, Bekasi, Jawa Barat 17158</a></p>
               <span>Telepon: </span><a href="tel:+622129250780">(021)-29250780</a>
               <!-- <p>Email:contact@wpfdegree.com</p> -->
             </div>
           </div>
         </div>
       </div>
      </div>
    </section>
    <!--=========== END CONTACT SECTION ================-->

    <!--=========== BEGIN GOOGLE MAP SECTION ================-->
    <!-- <section id="googleMap">
      <iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Galileo+GasingA&amp;aq=&amp;sll=30.977609,-95.712891&amp;sspn=42.157377,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=200+Lincoln+Ave,+Salinas,+California+93901-2639&amp;t=m&amp;z=14&amp;ll=36.674837,-121.657691&amp;output=embed"></iframe>
    </section> -->
    <!--=========== END GOOGLE MAP SECTION ================-->
    
    <!--=========== BEGIN FOOTER SECTION ================-->
      <?php include("include/footer.php"); ?>
    <!--=========== END FOOTER SECTION ================--> 

    <!-- Javascript Files
    ================================================== -->

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