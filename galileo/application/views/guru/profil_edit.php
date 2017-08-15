<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Elearning Galileo | Profil - Edit</title>
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
              <div class="row" style="background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;margin: 10px 2px 35px 2px;padding-top: 10px">  
						              			  <!--  PROFILE SECTION-->
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
              <?php foreach($tutor as $u){ ?>
        <img src="<?php echo base_url().$u->foto ?>" style="width:250px;height:250px" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6 class="data">Maksimal: 800x800, 500KB. Format .jpg, .png, .gif</h6>
        <?php echo form_open_multipart(base_url().'teachers/update_photo'); ?>
        <input type="file" name="userfile" size="20" class="text-center center-block well well-sm data">
        <input class="data" type="submit" value="upload" /><br><br>
        <?php foreach($tutor as $u){ ?>
        <?php if($u->foto != '/assets/elearning/img/ui-sam.jpg'){ ?>
        <a href="<?php echo base_url()?>teachers/delete_photo" style="color:red" class="data">Hapus Foto</a>
        <?php }} ?>
        </form>
      </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <form class="form-horizontal" method="post" action="<?php echo base_url()?>teachers/update_profile">
      <input name="id_tutor" value="<?php echo $u->id_tutor ?>" type="hidden">
      <div class="form-group">
          <label class="col-lg-3 control-label data">Username:</label>
          <div class="col-lg-8">
            <input type="text" name="username"  value="<?php echo $u->username ?>" id="username" onBlur="checkAvailabilityUsername()"  class="form-control data" required>
                <span id="user-availability-status"></span>
                <p><img src="<?php echo base_url(); ?>assets/elearning/img/LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label data">Nama Depan:</label>
          <div class="col-lg-8">
            <input class="form-control data" name="fname" value="<?php echo $u->nama_depan ?>" type="text" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label data">Nama Belakang:</label>
          <div class="col-lg-8">
            <input class="form-control data" name="lname" value="<?php echo $u->nama_belakang ?>" type="text" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label data">Tempat Lahir:</label>
          <div class="col-lg-8">
            <input class="form-control data" name="place_birth" value="<?php echo $u->tempat_lahir ?>" type="text" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label data">Tanggal Lahir:</label>
          <div class="col-lg-8">
            <input class="form-control data" name="date_birth" value="<?php echo $u->tanggal_lahir ?>" type="date" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label data">Jenis Kelamin:</label>
          <div class="col-lg-8">
            <select name="gender" id="gender" class="form-control data" required="required">
                    <option value="Female">Perempuan</option>
                    <option value="Male">Laki-Laki</option>
                </select>
                <input type="hidden" id="myIdGender" value="<?php echo $u->jenis_kelamin ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label data">Alamat:</label>
          <div class="col-lg-8">
            <textarea name="address" rows="3" class="form-control data" required><?php echo $u->alamat ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label data">Kelas:</label>
          <div class="col-lg-8">
            <div class="col-sm-6 form-group">
                <select name="grade" id="grade" class="form-control data" required="required">
                    <option value="https://drive.google.com/open?id=0B7qZDPlNcq_BTkF0U3RWRERHQWM SD">SD</option>
                    <option value="https://drive.google.com/open?id=0B7qZDPlNcq_BTkF0U3RWRERHQWM SMP">SMP</option>
                    <option value="https://drive.google.com/open?id=0B7qZDPlNcq_BTkF0U3RWRERHQWM SMA">SMA</option>
                    <option value="https://drive.google.com/open?id=0B7qZDPlNcq_BTkF0U3RWRERHQWM SMK">SMK</option>
                </select>
                <input type="hidden" id="myIdGrade" value="<?php echo $u->link_modul." ".$u->level ?>">
              </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label data">Bidang:</label>
          <div class="col-lg-5">
					<select name="skill" id="skill" class="form-control data" required="required">
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
                    <input type="hidden" id="myIdSkill" value="<?php echo $u->bidang ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label data">Telepon:</label>
          <div class="col-lg-8">
            <input class="form-control data" name="phone" maxlength="15" pattern="[+]{1}[0-9]{7,15}" placeholder="e.g.: +6281245645645" value="<?php echo $u->telepon ?>" type="text" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label data"></label>
          <div class="col-md-8">
            <input class="btn btn-success" value="Simpan" type="submit" name="submit" value="submit">
            <span></span>
            <a href="<?php echo base_url(); ?>teachers/profile" class="btn btn-default">Batal</a>
          </div>
          </div>
          <?php } ?>
        </div>
      </form>
      <a style="color: red;font-size:12px;float: right;margin-right:15px;margin-bottom:15px" class="btn data" data-toggle="modal" data-target="#delModal"><b><span class="fa fa-gear"></span>Hapus Akun</b></a>
    </div>
                      <!-- Modal -->
                      <div class="modal fade" id="delModal" role="dialog">
                        <div class="modal-dialog">
                        
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Konfirmasi</h4>
                            </div>
                            <div class="modal-body">
                                <h3 class="data">Apakah anda yakin ini menutup akun ini secara permanen?</h3>
                            </div>
                            <div class="modal-footer">
                  <a  href="<?php echo base_url(); ?>teachers/delete_account" class="btn btn-default">Ya</a>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                  </div>
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
         $('#gender').val($('#myIdGender').val());
         $('#grade').val($('#myIdGrade').val());
         $('#skill').val($('#myIdSkill').val());

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
</script>
  </body>
</html>
