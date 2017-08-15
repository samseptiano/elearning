<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Galileo : 404 Error</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/ico" href="<?php echo base_url()?>/assets/landing/img/favicon.ico"/>
    <?php $this->load->view('include/css.php');?>
  </head>
  <body style="border-color: black"> 
    <a class="scrollToTop" href="#"></a>
    <section id="errorpage">
      <div class="container">
        <div class="error_page_content">
             <h1>404</h1>
             <h2 style="color:red">Maaf :(</h2>
             <h3>Halaman Tidak Tersedia.</h3>
             <p class="wow fadeInLeftBig animated" style="visibility: visible; animation-name: fadeInLeftBig;">Please, Silahkan Kembali ke <a href="<?php echo base_url()?>">Home page</a></p>
           </div>
      </div>
    </section>
    <?php $this->load->view('include/js.php');?>
  </body>
</html>