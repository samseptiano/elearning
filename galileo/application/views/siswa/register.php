
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Elearning Galileo | Registrasi</title>
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
    <Center><h2 class="well form-login-heading" style="background-color: #e02a2a;border: 1px solid #e02a2a; color: white;margin-bottom: -5px;" >Registrasi Akun Siswa</h2></Center>
	<div class="col-lg-12 well">
	<div class="row">
				<form  method="post" id="register" action="<?php echo base_url('students_register/register'); ?>" >
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
								<select name="gender" class="form-control" required="required">
					            	<option value="">-Jenis Kelamin-</option>
								    <option value="Female">Perempuan</option>
								    <option value="Male">Laki-Laki</option>
								</select>
							</div>	
							<div class="col-sm-4 form-group">
								<label>Nomor Telepon</label>
						<input type="tel" name="phone" id="txtPhone" placeholder="e.g.: +6281245645645" pattern="[+]{1}[0-9]{7,15}" class="form-control" required>
						<span id="spnPhoneStatus"></span>
							</div>		
						</div>
						<div class="row">
							<div class="col-sm-3 form-group">
								<label>Kelas</label>
								<select name="grade" id="gradesel" class="form-control" required="required">
					            	<option value="">-Kelas-</option>
								</select>
							</div>
							<div class="col-sm-3 form-group">
								<label>Jurusan</label>
								<select name="major" id="majorsel" class="form-control" required="required">
					            	<option value="">-Jurusan-</option>
								</select>
							</div>				
							<div class="col-sm-6 form-group">
								<label>Asal Sekolah</label>
								<input type="text"  name="school" placeholder="Masukkan Asal Sekolah Anda.." class="form-control" required>
							</div>	
						</div>								
					<div class="row">
					<div class="col-sm-6 form-group">
						<label>Email</label>
								<input type="text" name="email"  id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Masukkan Email Anda.." onBlur="checkAvailabilityEmail()"  class="form-control" required>
								<span id="email-availability-status"></span>
								<p><img src="<?php echo base_url(); ?>assets/elearning/img/LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>
					</div>
					<div class="col-sm-6 form-group">
						<label>Password</label>
						<input type="password" name="password" pattern=".{6,}" title="6 karakter/lebih" id="password" placeholder="Masukkan Password Anda.." class="form-control" required><span id="result"></span>
					</div>
					</div>	
					<div id="infoMessage" style="color:red" ><?php echo $this->session->flashdata('msg');?></div>
					<div id="infoMessage" style="color:red" ><?php echo $this->session->flashdata('verify_msg'); ?></div>
					<button type="submit" name="submit" class="btn btn-theme">Daftar</button>
		                &nbsp Sudah Memiliki Akun?
		                <a class="" href="students_login">
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
		url: "<?php echo base_url('students_register/check_availability_username'); ?>",
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
		url: "<?php echo base_url('students_register/check_availability_email'); ?>",
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

<script type="text/javascript">
	var _0xbcc5=["\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x4D\x56\x42\x44\x5A\x48\x70\x71\x4E\x56\x4E\x51\x52\x6B\x30\x20\x31\x20\x53\x44\x20\x31","\x31\x20\x53\x44","\x54\x49\x44\x41\x4B\x20\x41\x44\x41","\x54\x49\x44\x41\x4B\x20\x41\x44\x41\x20\x4A\x55\x52\x55\x53\x41\x4E","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x64\x6C\x56\x46\x63\x44\x6C\x4D\x58\x30\x77\x7A\x54\x30\x45\x20\x32\x20\x53\x44\x20\x32","\x32\x20\x53\x44","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x56\x6B\x68\x44\x4E\x33\x70\x6F\x4F\x55\x46\x43\x5A\x44\x51\x20\x33\x20\x53\x44\x20\x33","\x33\x20\x53\x44","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x51\x6C\x4E\x4B\x4E\x6A\x68\x4F\x5A\x7A\x4A\x49\x62\x30\x6B\x20\x34\x20\x53\x44\x20\x34","\x34\x20\x53\x44","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x4F\x55\x39\x42\x63\x7A\x56\x51\x4E\x48\x52\x68\x54\x30\x30\x20\x35\x20\x53\x44\x20\x35","\x35\x20\x53\x44","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x57\x46\x52\x35\x4D\x6B\x4A\x44\x53\x58\x6C\x6C\x4D\x30\x6B\x20\x36\x20\x53\x44\x20\x36","\x36\x20\x53\x44","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x52\x48\x56\x59\x65\x57\x56\x77\x62\x7A\x5A\x54\x59\x57\x73\x20\x31\x20\x53\x4D\x50\x20\x37","\x31\x20\x53\x4D\x50","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x59\x30\x70\x54\x56\x6B\x35\x4F\x65\x45\x5A\x54\x63\x55\x30\x20\x32\x20\x53\x4D\x50\x20\x38","\x32\x20\x53\x4D\x50","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x61\x56\x49\x35\x4F\x44\x49\x33\x56\x48\x70\x43\x61\x30\x45\x20\x33\x20\x53\x4D\x50\x20\x39","\x33\x20\x53\x4D\x50","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x56\x6D\x46\x5A\x64\x6A\x4A\x33\x5A\x6D\x39\x42\x61\x48\x63\x20\x31\x20\x53\x4D\x41\x20\x31\x30","\x31\x20\x53\x4D\x41","\x49\x50\x41","\x49\x50\x53","\x42\x41\x48\x41\x53\x41","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x54\x6D\x6C\x52\x53\x44\x5A\x59\x62\x6D\x5A\x4B\x57\x6B\x55\x20\x32\x20\x53\x4D\x41\x20\x31\x31","\x32\x20\x53\x4D\x41","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x61\x6E\x4E\x6A\x56\x47\x67\x77\x55\x6E\x6B\x78\x5A\x55\x30\x20\x33\x20\x53\x4D\x41\x20\x31\x32","\x33\x20\x53\x4D\x41","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x65\x55\x51\x7A\x52\x6A\x42\x5A\x61\x6B\x74\x54\x62\x32\x38\x20\x31\x20\x53\x4D\x4B\x20\x31\x33","\x31\x20\x53\x4D\x4B","\x41\x4B\x55\x4E\x54\x41\x4E\x53\x49","\x41\x44\x4D\x2E\x20\x50\x45\x52\x4B\x41\x4E\x54\x4F\x52\x41\x4E","\x50\x45\x52\x48\x4F\x54\x45\x4C\x41\x4E","\x54\x45\x4B\x4E\x49\x4B\x20\x4D\x45\x53\x49\x4E","\x54\x45\x4B\x4E\x49\x4B\x20\x4B\x4F\x4D\x50\x55\x54\x45\x52\x20\x4A\x41\x52\x49\x4E\x47\x41\x4E","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x51\x6C\x56\x42\x4D\x6B\x52\x4B\x51\x56\x68\x57\x61\x30\x55\x20\x32\x20\x53\x4D\x4B\x20\x31\x34","\x32\x20\x53\x4D\x4B","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x5A\x6B\x52\x73\x58\x32\x6F\x74\x53\x6D\x64\x52\x51\x31\x55\x20\x33\x20\x53\x4D\x4B\x20\x31\x35","\x33\x20\x53\x4D\x4B","\x3C\x6F\x70\x74\x69\x6F\x6E\x20\x76\x61\x6C\x75\x65\x3D\x22","\x76\x61\x6C","\x20","\x22\x3E","\x6E\x61\x6D\x65","\x3C\x2F\x6F\x70\x74\x69\x6F\x6E\x3E","\x61\x70\x70\x65\x6E\x64","\x23\x67\x72\x61\x64\x65\x73\x65\x6C","\x65\x61\x63\x68","\x63\x68\x61\x6E\x67\x65","\x73\x70\x6C\x69\x74","\x76\x61\x6C\x75\x65","\x23\x6D\x61\x6A\x6F\x72\x73\x65\x6C","\x63\x6F\x6E\x73\x6F\x6C\x65","\x6C\x6F\x67","\x72\x65\x6D\x6F\x76\x65","\x6F\x70\x74\x69\x6F\x6E\x3A\x67\x74\x28\x30\x29","\x2D\x4A\x75\x72\x75\x73\x61\x6E\x20","\x2D","\x74\x65\x78\x74","\x6F\x70\x74\x69\x6F\x6E\x3A\x65\x71\x28\x30\x29","\x73\x63\x68\x6F\x6F\x6C\x73","\x2D\x4A\x75\x72\x75\x73\x61\x6E\x2D","\x6F\x6E"];var boroughs={1:{val:_0xbcc5[0],name:_0xbcc5[1],schools:[{val:_0xbcc5[2],name:_0xbcc5[3]}]},2:{val:_0xbcc5[4],name:_0xbcc5[5],schools:[{val:_0xbcc5[2],name:_0xbcc5[3]}]},3:{val:_0xbcc5[6],name:_0xbcc5[7],schools:[{val:_0xbcc5[2],name:_0xbcc5[3]}]},4:{val:_0xbcc5[8],name:_0xbcc5[9],schools:[{val:_0xbcc5[2],name:_0xbcc5[3]}]},5:{val:_0xbcc5[10],name:_0xbcc5[11],schools:[{val:_0xbcc5[2],name:_0xbcc5[3]}]},6:{val:_0xbcc5[12],name:_0xbcc5[13],schools:[{val:_0xbcc5[2],name:_0xbcc5[3]}]},7:{val:_0xbcc5[14],name:_0xbcc5[15],schools:[{val:_0xbcc5[2],name:_0xbcc5[3]}]},8:{val:_0xbcc5[16],name:_0xbcc5[17],schools:[{val:_0xbcc5[2],name:_0xbcc5[3]}]},9:{val:_0xbcc5[18],name:_0xbcc5[19],schools:[{val:_0xbcc5[2],name:_0xbcc5[3]}]},10:{val:_0xbcc5[20],name:_0xbcc5[21],schools:[{val:_0xbcc5[2],name:_0xbcc5[3]},{val:_0xbcc5[22],name:_0xbcc5[22]},{val:_0xbcc5[23],name:_0xbcc5[23]},{val:_0xbcc5[24],name:_0xbcc5[24]}]},11:{val:_0xbcc5[25],name:_0xbcc5[26],schools:[{val:_0xbcc5[22],name:_0xbcc5[22]},{val:_0xbcc5[23],name:_0xbcc5[23]},{val:_0xbcc5[24],name:_0xbcc5[24]}]},12:{val:_0xbcc5[27],name:_0xbcc5[28],schools:[{val:_0xbcc5[22],name:_0xbcc5[22]},{val:_0xbcc5[23],name:_0xbcc5[23]},{val:_0xbcc5[24],name:_0xbcc5[24]}]},13:{val:_0xbcc5[29],name:_0xbcc5[30],schools:[{val:_0xbcc5[31],name:_0xbcc5[31]},{val:_0xbcc5[32],name:_0xbcc5[32]},{val:_0xbcc5[33],name:_0xbcc5[33]},{val:_0xbcc5[34],name:_0xbcc5[34]},{val:_0xbcc5[35],name:_0xbcc5[35]}]},14:{val:_0xbcc5[36],name:_0xbcc5[37],schools:[{val:_0xbcc5[31],name:_0xbcc5[31]},{val:_0xbcc5[32],name:_0xbcc5[32]},{val:_0xbcc5[33],name:_0xbcc5[33]},{val:_0xbcc5[34],name:_0xbcc5[34]},{val:_0xbcc5[35],name:_0xbcc5[35]}]},15:{val:_0xbcc5[38],name:_0xbcc5[39],schools:[{val:_0xbcc5[31],name:_0xbcc5[31]},{val:_0xbcc5[32],name:_0xbcc5[32]},{val:_0xbcc5[33],name:_0xbcc5[33]},{val:_0xbcc5[34],name:_0xbcc5[34]},{val:_0xbcc5[35],name:_0xbcc5[35]}]}};$(function(){$[_0xbcc5[48]](boroughs,function(_0x5946x2,_0x5946x3){$(_0xbcc5[47])[_0xbcc5[46]](_0xbcc5[40]+ _0x5946x3[_0xbcc5[41]]+ _0xbcc5[42]+ _0x5946x2+ _0xbcc5[43]+ _0x5946x3[_0xbcc5[44]]+ _0xbcc5[45])});$(_0xbcc5[47])[_0xbcc5[63]](_0xbcc5[49],function(){var _0x5946x4=this[_0xbcc5[51]][_0xbcc5[50]](_0xbcc5[42])[3],_0x5946x5=$(_0xbcc5[52]);window[_0xbcc5[53]]&& console[_0xbcc5[54]]();$(_0xbcc5[56],_0x5946x5)[_0xbcc5[55]]();if(_0x5946x4){$(_0xbcc5[60],_0x5946x5)[_0xbcc5[59]](_0xbcc5[57]+ boroughs[_0x5946x4][_0xbcc5[44]]+ _0xbcc5[58]);var _0x5946x6=boroughs[_0x5946x4][_0xbcc5[61]];$[_0xbcc5[48]](_0x5946x6,function(_0x5946x7,_0x5946x8){_0x5946x5[_0xbcc5[46]](_0xbcc5[40]+ _0x5946x8[_0xbcc5[41]]+ _0xbcc5[43]+ _0x5946x8[_0xbcc5[44]]+ _0xbcc5[45])})}else {$(_0xbcc5[60],_0x5946x5)[_0xbcc5[59]](_0xbcc5[62])}})})
</script>

  </body>
</html>
