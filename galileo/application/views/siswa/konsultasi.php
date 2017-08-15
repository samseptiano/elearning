<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Elearning Galileo | Konsultasi Online</title>
    <link rel="shortcut icon" type="image/ico" href="<?php echo base_url()?>/assets/landing/img/favicon.ico"/>

    <?php include("include/css.php");?>

    <style>
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
 function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("konsultasi");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
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
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>

      <script type="text/javascript">
      $(document).ready(function(){
        setInterval(function(){
        $("#konsultasi").load('<?php echo base_url()?>students/consultation_fragment')
        }, 2000);
        });
      </script>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart" >      
						 
             <div class="row" style="background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;margin: 0px 2px 0 2px">
            <center><h2 class="data">Konsultasi Guru Online</h2></center><br><br>
            <input type="text" id="myInput" class="data" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
            </div><br>
          <div class="row" style="background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;margin: 0px 2px 0 2px">
        <div class="col-md-12"  style="overflow: scroll;height:350px">
            <table class="table data"  id="konsultasi">
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
                            Online
                        </th>
                        <th>
                            <center>Aksi</center>
                        </th>
                    </tr>
                </thead>
                        <?php foreach ($tutor as $u){ ?>
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
                           <?php
                            if($u->online == 'NO'){
                                echo "<p style='color:red'>".$u->online."</p>";
                            }
                            else{
                                echo "<p style='color:green'>".$u->online."</p>";
                            } 
                             ?>
                        </td>
                        <td>
                            <center><a class="btn btn-success" href="<?php echo base_url()?>students/konsul/<?php echo $u->id_tutor  ?>"  type="button">Konsultasi</a></center>
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
