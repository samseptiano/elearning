    <style type="text/css">
      @media screen and (max-width: 767px) {
        .ccd{
          margin-top: -17px;
        }
      }
    </style>
    <header id="header">
      <!-- BEGIN MENU -->
      <div class="menu_area">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">  <div class="container">
            <div class="navbar-header">
              <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!-- LOGO -->
              <!-- TEXT BASED LOGO -->
              <a class="navbar-brand" href="welcome">
              <span><img  class="ccd" src="<?php echo base_url()?>/assets/landing/img/LogoG2_medium.png"></span>
              </a>              
              <!-- IMG BASED LOGO  -->
               <!-- <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="logo"></a>  -->            
                     
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                <li class="active"><a href="welcome">Beranda</a></li>
				<li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Program<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">SD</a></li>
                    <li><a href="#">SMP</a></li>
                    <li><a href="#">SMA</a></li>               
                  </ul>
                </li> 
				<li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Kenapa Galileo<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="advantage">Keunggulan</a></li>
                    <li><a href="testimony">Testimoni</a></li>               
                  </ul>
                </li>  
				<li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Elearning<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="students_login">Siswa</a></li>
                    <li><a href="teachers_login">Guru</a></li>               
                  </ul>
                </li>         
                <li><a href="about">Tentang kami</a></li>
              </ul>           
            </div><!--/.nav-collapse -->
          </div>     
        </nav>  
      </div>
      <!-- END MENU -->    
    </header>

       <script>
    //no right click 
    /*var message = "Function Disabled";
    function clickIE() {
        if (document.all) {
            alert(message);
            return false;
        }
    }
    function clickNS(e) {
        if (document.layers || (document.getElementById && !document.all)) {
            if (e.which == 2 || e.which == 3) {
                //alert(message);
                return false;
            }
        }
    }
    if (document.layers) {
        document.captureEvents(Event.MOUSEDOWN);
        document.onmousedown = clickNS;
    }
    else {
        document.onmouseup = clickNS;
        document.oncontextmenu = clickIE;
    }
    document.oncontextmenu = new Function("return false")*/
</script>


