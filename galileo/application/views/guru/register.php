
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Galileo - Registrasi</title>
<link rel="shortcut icon" type="image/ico" href="<?php echo base_url()?>/assets/landing/img/favicon.ico"/>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/elearning/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url(); ?>assets/elearning/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/elearning/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/elearning/css/style-responsive.css" rel="stylesheet">
    <!-- password strength -->
    <link href="<?php echo base_url(); ?>assets/elearning/css/passwordLenCheck.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
<div class="container">
    <Center><h2 class="well form-login-heading" style="background-color: #e02a2a;border: 1px solid #e02a2a; color: white;margin-bottom: -5px;" >Registrasi Akun Tutor</h2></Center>
	<div class="col-lg-12 well">
	<div class="row">
				<form  method="post" id="register" action="<?php echo base_url('teachers_register/register')?>" >
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Nama Depan</label>
								<input type="text" name="first_name" placeholder="Masukkan Nama Depan Anda.." class="form-control" required>
							</div>
							<div class="col-sm-6 form-group">
								<label>Nama Belakang</label>
								<input type="text" name="last_name" placeholder="Masukkan Nama Belakang Anda.." class="form-control" required>
							</div>
						</div>
						<div class="row">
						<div class="col-sm-6 form-group">
							<label>Tempat Lahir</label>
							<input type="text" name="place_birth" placeholder="Masukkan Tempat Lahir Anda.." class="form-control" required>
						</div>
						<div class="col-sm-6 form-group">
							<label>Tanggal lahir</label>
							<input type="date" name="date_birth" placeholder="Masukkan Tanggal Lahir Anda.." class="form-control" required>
						</div>
						</div>					
						<div class="form-group">
							<label>Alamat Rumah</label>
							<textarea placeholder="Masukkan Alamat Rumah Anda.." name="address" rows="3" class="form-control" required></textarea>
						</div>	
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>Username</label>
								<input type="text" name="username"  id="username" placeholder="Masukkan Username anda.." onBlur="checkAvailabilityUsername()"  class="form-control" required>
								<span id="user-availability-status"></span>
								<p><img src="<?php echo base_url(); ?>assets/elearning/img/LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>
							</div>	
							<div class="col-sm-4 form-group">
								<label>Jenis Kelamin</label>
								<select name="gender" class="form-control" required="required" >
					            	<option value="">-Jenis Kelamin-</option>
								    <option value="Female">Perempuan</option>
								    <option value="Male">Laki-Laki</option>
								</select>
							</div>	
							<div class="col-sm-4 form-group">
								<label>Nomor Telepon</label>
						<input type="tel" name="phone" id="txtPhone" maxlength="15" pattern="[+]{1}[0-9]{7,15}" placeholder="e.g.: +6281245645645" class="form-control" required>
						<span id="spnPhoneStatus"></span>
							</div>		
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Kelas</label>
								<select name="grade" class="form-control" required="required" >
					            	<option value="">-Kelas-</option>
								    <option value="https://drive.google.com/open?id=0B7qZDPlNcq_BTkF0U3RWRERHQWM SD">SD</option>
								    <option value="https://drive.google.com/open?id=0B7qZDPlNcq_BTkF0U3RWRERHQWM SMP">SMP</option>
								    <option value="https://drive.google.com/open?id=0B7qZDPlNcq_BTkF0U3RWRERHQWM SMA">SMA</option>
								    <option value="https://drive.google.com/open?id=0B7qZDPlNcq_BTkF0U3RWRERHQWM SMK">SMK</option>
								</select>
							</div>		
							<div class="col-sm-6 form-group">
								<label>Bidang</label>
								<select name="subject" class="form-control" required="required">
                                  <option value="">-Bidang-</option>
                                  <option value="UMUM">UMUM(SD)</option>
                                  <option value="MATEMATIKA">MATEMATIKA</option>
                                  <option value="FISIKA">FISIKA</option>
                                  <option value="KIMIA">KIMIA</option>
                                  <option value="BIOLOGI">BIOLOGI</option>
                                  <option value="EKONOMI">EKONOMI</option>
                                  <option value="SOSIOLOGI">SOSIOLOGI</option>
                                  <option value="GEOGRAFI">GEOGRAFI</option>
                                  <option value="IPA">IPA</option>
                                  <option value="IPS">IPS</option>
                                  <option value="INDONESIA">INDONESIA</option>
                                  <option value="INGGRIS">INGGRIS</option>
                                  <option value="AKUNTANSI">AKUNTANSI</option>
                                  <option value="SEJARAH">SEJARAH</option>
                                  <option value="SENI">SENI</option>
                                  <option value="TIK">TIK</option>
                              </select>
							</div>	
						</div>								
					<div class="row">
					<div class="col-sm-6 form-group">
						<label>Email</label>
								<input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="email" placeholder="Masukkan Email Anda.." onBlur="checkAvailabilityEmail()"  class="form-control" required>
								<span id="email-availability-status"></span>
								<p><img src="<?php echo base_url(); ?>assets/elearning/img/LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>
					</div>
					<div class="col-sm-6 form-group">
						<label>Password</label>
						<input type="password" name="password" pattern=".{6,}" title="6 karakter/lebih"  id="password" placeholder="Masukkan Password Anda.." class="form-control" required><span id="result"></span>
					</div>
					</div>	
					<div id="infoMessage" style="color:red" ><?php echo $this->session->flashdata('msg');?></div>
					<div id="infoMessage" style="color:red" ><?php echo $this->session->flashdata('verify_msg'); ?></div>
					<button type="submit" id="submit" name="submit" class="btn btn-theme">Daftar</button>
		                &nbsp Sudah Memiliki Akun?
		                <a class="" href="teachers_login">
		                    LOGIN
		                </a>				
					</div>
				</form> 
				</div>
	</div>
	</div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>assets/elearning/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/elearning/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

    <!-- password strength -->
    <script src="<?php echo base_url(); ?>assets/elearning/js/passwordscheck.js"></script>
    
    <!-- auto check available username and email-->
    <script>
	function checkAvailabilityUsername() {
		$("#loaderIcon").show();
		jQuery.ajax({
		url: "<?php echo base_url('teachers_register/check_availability_username'); ?>",
		data:'username='+$("#username").val(),
		type: "POST",
		success:function(data){
			$("#user-availability-status").html(data);
			$("#loaderIcon").hide();
		},
		error:function (){}
		});
	}

	function checkAvailabilityEmail() {
		$("#loaderIcon").show();
		jQuery.ajax({
		url: "<?php echo base_url('teachers_register/check_availability_email'); ?>",
		data:'email='+$("#email").val(),
		type: "POST",
		success:function(data){
			$("#email-availability-status").html(data);
			$("#loaderIcon").hide();
		},
		error:function (){}
		});
	}

	</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#txtPhone').blur(function(e) {
        if (validatePhone('txtPhone')) {
            $('#spnPhoneStatus').html('Valid');
            $('#spnPhoneStatus').css('color', 'green');
        }
        else {
            $('#spnPhoneStatus').html('Invalid');
            $('#spnPhoneStatus').css('color', 'red');
        }
    });
});

function validatePhone(txtPhone) {
    var a = document.getElementById(txtPhone).value;
    var filter = /^[+]*([0-9]*[\.\s\-\(\)]|[0-9]+){3,24}$/;
    if (filter.test(a)) {
        return true;
    }
    else {
        return false;
    }
}
</script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/elearning/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("<?php echo base_url(); ?>assets/elearning/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
