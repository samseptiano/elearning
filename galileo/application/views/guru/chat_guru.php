<!DOCTYPE html>
<html lang="en" id="html">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Elearning Galileo | Chat Guru</title>
<link rel="shortcut icon" type="image/ico" href="<?php echo base_url()?>/assets/landing/img/favicon.ico"/>
    <?php include("include/css.php");?>
	
    <style type="text/css">
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
                  <div class="col-lg-12 main-chart" id="fragments">      
					<div class="row" style="background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;margin: 0px 15px 0 15px">
          <center><h2 class="data">Chat Online</h2></center>
          </div>
          <div class="row" style="margin:0 15px 0 15px" >
        <div class="col-md-12"> 
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <script> 
    var time = 0;
  
    var updateTime = function (cb) {
      $.getJSON("<?php echo base_url(); ?>/Teachers/time", function (data) {
          cb(~~data);
      });
    };
    
    var sendChat = function (message,sender,receiver, cb) {
      $.getJSON("<?php echo base_url(); ?>/Teachers/insert_chat?message=" + message+"&sender=" + sender+"&receiver=" + receiver, function (data){
        cb();
      });
    }
    
    var addDataToReceived = function (arrayOfData) {
      arrayOfData.forEach(function (data) {
       var sender = $("#sender").val();
        var receiver = $("#receiver").val();

        var theDate = new Date(data[2] * 1000);
        dateString = theDate.toString("Y-m-d h:s:a");

        if(data[0]== sender){
                  $("#received").html($("#received").html() + "<br><h5 style='color:red' >" + "Saya" +" : "+ data[1]+"</h5> <p style='font-size=10px'>("+ dateString +")</p>");
        }
        else if(data[0]== receiver){
                $("#received").html($("#received").html() + "<br><h5 style='color:black' >" + data[0] +" : "+ data[1]+"</h5> <p style='font-size=10px'>("+ dateString +")</p>");
        }
      });
    }
    
    var getNewChats = function (sender,receiver) {
      $.getJSON("<?php echo base_url(); ?>Teachers/get_chats?time=" + time+"&sender=" + sender +"&receiver=" + receiver, function (data){
        addDataToReceived(data);
        // reset scroll height
        setTimeout(function(){
           $('#received').scrollTop($('#received')[0].scrollHeight);
        }, 0);
        time = data[data.length-1][2];
      });      
    }
  
    // using JQUERY's ready method to know when all dom elements are rendered
    $( document ).ready ( function () {
      // set an on click on the button
      $("form").submit(function (evt) {
        evt.preventDefault();
        var data = $("#text").val();
        var sender = $("#sender").val();
        var receiver = $("#receiver").val();
        $("#text").val('');
        // get the time if clicked via a ajax get queury
        sendChat(data,sender,receiver, function (){
          alert("Success!");
        });
      });
      setInterval(function (){
        var sender = $("#sender").val();
         var receiver = $("#receiver").val();
        getNewChats(sender,receiver);
      },1500);
    });
    
  </script>
<div class="col-sm-6 form-group">
  <input id="sender" type="hidden" name="sender"  value="<?php echo $this->session->userdata("id"); ?>" class="form-control">
          <?php foreach ($siswa as $u) { ?>
          <input name="receiver" id="receiver" class="form-control" value="<?php echo $u->id_siswa ?>" type="hidden">
          <?php } ?>

</div>
  </div>
<div class="col-sm-12 form-group" style="background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;overflow-x: auto;padding-top:10px">
      <div id="received" style="height: 350px;overflow: auto;" class="data">
      </div>
  </div>
  <div class="col-sm-12 form-group" style="background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;padding-top: 15px;">
  <form>
    <div class="col-sm-8 form-group">
      <input id="text" type="text" name="user" class="form-control data" required>
    </div>
    <div class="col-sm-4 form-group">
    <input type="submit" value="Send" class="btn btn-success col-sm-6">
    </div>
  </form>
  </div>
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
	 
  
    <script type="text/javascript">
                //   window.onbeforeunload = function () {
                //     //return "Do you really want to close?";
                //     console.log('page ditutup');
                // };

                setInterval(function()
                  { 
                    var a = document.getElementById("receiver").value;
                      $.ajax({
                        url:"<?php echo base_url(); ?>"+"teachers/keep_read",
                        async: false,
                        type:"post",
                        dataType: "json",
                        data: {sender: a},
                        cache: false,
                        success:function(res)
                        {
                            if(res){
                              console.log(a+ "sukses");
                            }
                            else{
                              console.log(a+ 'gagal');
                            }
                        }
                      });
                      e.preventDefault();
                  }, 2000);//time in milliseconds 
    </script>

  </body>
</html>