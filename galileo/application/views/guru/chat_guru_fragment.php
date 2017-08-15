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
  <input id="sender" type="hidden" name="sender"  value="<?php echo $this->session->userdata("nama"); ?>" class="form-control">
          <?php foreach ($siswa as $u) { ?>
          <input name="receiver" id="receiver" class="form-control" value="<?php echo $u->username ?>" type="hidden">
          <?php } ?>

</div>
  </div>
<div class="col-sm-12 form-group" style="height: 350px;overflow: scroll;background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;overflow-x: auto;padding-top:10px">
      <div id="received" class="data">
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