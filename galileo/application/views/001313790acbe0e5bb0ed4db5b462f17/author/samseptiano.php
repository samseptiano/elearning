<html>
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <style>
  .fa {
    padding: 20px;
    font-size: 30px;
    width: 50px;
    text-align: center;
    text-decoration: none;
    margin: 5px 2px;
    margin-left:10px; 
    margin-right:10px; 
  }
  .fa:hover {
      opacity: 0.7;
  }
  .fa-facebook {
    background: #3B5998;
    color: white;
  }
  .fa-twitter {
    background: #55ACEE;
    color: white;
  }
  .fa-google {
    background: #dd4b39;
    color: white;
  }
  .fa-linkedin {
    background: #007bb5;
    color: white;
  }
  .fa-youtube {
    background: #bb0000;
    color: white;
  }
  .fa-instagram {
    background: #125688;
    color: white;
  }
  .fa-pinterest {
    background: #cb2027;
    color: white;
  }
  .fa-snapchat-ghost {
    background: #fffc00;
    color: white;
    text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
  }
  .fa-skype {
    background: #00aff0;
    color: white;
  }
  .fa-android {
    background: #a4c639;
    color: white;
  }
  .fa-dribbble {
    background: #ea4c89;
    color: white;
  }
  .fa-vimeo {
    background: #45bbff;
    color: white;
  }
  .fa-tumblr {
    background: #2c4762;
    color: white;
  }
  .fa-vine {
    background: #00b489;
    color: white;
  }
  .fa-foursquare {
    background: #45bbff;
    color: white;
  }
  .fa-stumbleupon {
    background: #eb4924;
    color: white;
  }
  .fa-flickr {
    background: #f40083;
    color: white;
  }
  .fa-yahoo {
    background: #430297;
    color: white;
  }
  .fa-soundcloud {
    background: #ff5500;
    color: white;
  }
  .fa-reddit {
    background: #ff5700;
    color: white;
  }
  .fa-rss {
    background: #ff6600;
    color: white;
  }
  .tooltip {
      position: relative;
      display: inline-block;
      border-bottom: 1px dotted black;
  }
  .tooltip .tooltiptext {
      visibility: hidden;
      width: 120px;
      background-color: black;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;
      width: 120px;
      top: 100%;
      left: 50%; 
      margin-left: -60px;
      position: absolute;
      z-index: 1;
  }
  .tooltip:hover .tooltiptext {
      visibility: visible;
  }
  </style>
  </head>
  
  <body>
  <?php $bday = strtotime('09/23/1996');
    $a = date('m-d',$bday);
    $age = date('Y')-date('Y',$bday);
    $b = date("Y", strtotime('-1 year'));
    $ageminone = $b - date('Y',$bday);
  ?>
    <div class="section" style="margin-top: 15px">
      <h1>You have found me :)</h1>
      <h4>Hello, I'm <span style="font-size:25px">Samuel Septiano</span>.  
      Today, i'm <span style="font-size:25px"><?php
        if(date('m-d')<$a){
          echo $ageminone; 
        }
        else{
          echo $age;
        }
       ?> years</span> old.  This Web <span style="font-size:25px">was written</span> by me.  I hope all of you enjoy it :)</h4>
      <h3>You can find me on:</h3>
      <div class="tooltip">
        <a href="https://www.instagram.com/samseptiano" class="fa fa-instagram"></a>
        <span class="tooltiptext">Instagram</span>
      </div>
      <div class="tooltip">
        <a href="https://www.twitter.com/samseptiano" class="fa fa-twitter"></a>
        <span class="tooltiptext">Twitter</span>
      </div>
      <div class="tooltip">
        <a href="https://www.facebook.com/samuelseptiano" class="fa fa-facebook"></a>
        <span class="tooltiptext">Facebook</span>
      </div>
      <div class="tooltip">
        <a href="https://www.github.com/samseptiano" class="fa fa-github"></a>
        <span class="tooltiptext">Github</span>
      </div>
      <div class="tooltip">
        <a href="https://www.linkedin.com/in/samseptiano/" class="fa fa-linkedin"></a>
        <span class="tooltiptext">Linkedin</span>
      </div>
      <div class="tooltip">
        <a href="https://www.id.pinterest.com/samseptiano/" class="fa fa-pinterest"></a>
        <span class="tooltiptext">Pinterest</span>
      </div>
    </div>
  </body>

</html>