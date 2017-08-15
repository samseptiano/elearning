<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Elearning Galileo | Jadwal Tutor</title>
<link rel="shortcut icon" type="image/ico" href="<?php echo base_url()?>/assets/landing/img/favicon.ico"/>
    <?php include("include/css.php");?>
	
    <style type="text/css">

    #myInput {
    background-image: url('/css/searchicon.png'); /* Add a search icon to input */
    background-position: 10px 12px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 90%; /* Full-width */
    font-size: 12px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom:  12px; /* Add some space below the input */
    margin-left:5%; 
  }
  
   .data{
      text-shadow: 0.1em 0.1em 0.2em rgb(199, 199, 199);
      color: black;
      }
    }
  </style>

   <script>
var _0x3999=["\x6D\x79\x49\x6E\x70\x75\x74","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x74\x6F\x55\x70\x70\x65\x72\x43\x61\x73\x65","\x76\x61\x6C\x75\x65","\x74\x75\x74\x6F\x72","\x74\x72","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x73\x42\x79\x54\x61\x67\x4E\x61\x6D\x65","\x6C\x65\x6E\x67\x74\x68","\x74\x64","\x69\x6E\x64\x65\x78\x4F\x66","\x69\x6E\x6E\x65\x72\x48\x54\x4D\x4C","\x64\x69\x73\x70\x6C\x61\x79","\x73\x74\x79\x6C\x65","","\x6E\x6F\x6E\x65"];function myFunction(){var _0x585cx2,_0x585cx3,_0x585cx4,_0x585cx5,_0x585cx6,_0x585cx7;_0x585cx2= document[_0x3999[1]](_0x3999[0]);_0x585cx3= _0x585cx2[_0x3999[3]][_0x3999[2]]();_0x585cx4= document[_0x3999[1]](_0x3999[4]);_0x585cx5= _0x585cx4[_0x3999[6]](_0x3999[5]);for(_0x585cx7= 0;_0x585cx7< _0x585cx5[_0x3999[7]];_0x585cx7++){_0x585cx6= _0x585cx5[_0x585cx7][_0x3999[6]](_0x3999[8])[1];if(_0x585cx6){if(_0x585cx6[_0x3999[10]][_0x3999[2]]()[_0x3999[9]](_0x585cx3)>  -1){_0x585cx5[_0x585cx7][_0x3999[12]][_0x3999[11]]= _0x3999[13]}else {_0x585cx5[_0x585cx7][_0x3999[12]][_0x3999[11]]= _0x3999[14]}}}}
</script>
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
                                  
          <div class="row" style="background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;padding-top: 5px;margin: 0px 2px 0 2px">
          <center><h2 class="data" style="margin-left: 5px" >Daftar Tutor</h2></center><br><br>
          <input type="text" id="myInput" class="data" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
        <div class="col-md-12" style="overflow: scroll;height:400px">
            <table class="table data" id="tutor"  >
                <thead>
                    <tr><th>
                            Foto
                        </th>
                        <th>
                            Nama
                        </th>
                        <th>
                            Bidang
                        </th>
                        <th>
                            Kelas
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Kontak
                        </th>
                    </tr>
                </thead>
                        <?php foreach ($jadwal as $u){ ?>
                <tbody>
                    <tr class="active">
                        <td>
                           <img style="width: 50px;height: 50px" src="<?php echo base_url().$u->foto ?>" class="img-circle">
                        </td>
                        <td>
                           <?php echo $u->nama_depan." ".$u->nama_belakang ?>
                        </td>
                        <td>
                            <?php echo $u->bidang ?>
                        </td>
                        <td>
                            <?php echo $u->level ?>
                        </td>
                        <td>
                            <?php echo $u->email ?>
                        </td>
                        <td>
                            <?php echo $u->telepon ?>
                        </td>
                    </tr>
                </tbody>
                            <?php } ?>
            </table>
        </div>
    </div><br>
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
