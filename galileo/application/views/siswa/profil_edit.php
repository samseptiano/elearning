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
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
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
              <div class="row"  style="background-color: #ffffff;opacity: 0.8;box-shadow: 5px 5px 10px #888888;border-radius:5px;margin: 10px 2px 35px 2px;padding-top: 10px">  
						              			  <!--  PROFILE SECTION-->
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <?php foreach($siswa as $u){ ?>
        <img src="<?php echo base_url().$u->foto ?>" style="width:250px;height:250px" class="avatar img-circle img-thumbnail" alt="avatar">
        <?php } ?>
        <h6 class="data">Maksimal: 800x800, 500KB. Format .jpg, .png, .gif</h6>
        <?php echo form_open_multipart(base_url().'students/update_photo'); ?>
        <input type="file" name="userfile" size="20" class="text-center center-block well well-sm data">
        <input class="data" type="submit" value="upload" /><br><br>
        <?php foreach($siswa as $u){ ?>
        <?php if($u->foto != '/assets/elearning/img/ui-sam.jpg'){ ?>
        <a href="<?php echo base_url()?>students/delete_photo" style="color:red" class="data">Hapus Foto</a>
        <?php }} ?>
        </form>
      </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <?php foreach($siswa as $u){ ?>
      <form class="form-horizontal" method="post" action="<?php echo base_url()?>students/update_profile">
      <input name="id_siswa" value="<?php echo $u->id_siswa ?>" type="hidden">
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
            <textarea name="address" rows="3" class="form-control data" required="required"><?php echo $u->alamat ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label data">Kelas:</label>
          <div class="col-lg-8">
            <div class="col-sm-3 form-group">
                <select name="grade" id="grade" class="form-control data" required="required">
                <!-- <option value="">-Kelas-</option> -->
                </select>
                <input type="hidden" id="myIdGrade" value="<?php echo $u->link_modul." ".$u->kelas." ".$u->level ?>">
              </div>
              <div class="col-sm-7 form-group">
                <select name="major" id="major" class="form-control data" required="required">
                    <option value="">-Jurusan-</option>
                </select>
                <input type="hidden" id="myIdMajor" value="<?php echo $u->jurusan ?>">
              </div>
        </div></div>
        <div class="form-group">
          <label class="col-lg-3 control-label data">Sekolah:</label>
          <div class="col-lg-8">
            <input class="form-control data" name="school" value="<?php echo $u->sekolah ?>" type="text" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label data">Telepon:</label>
          <div class="col-lg-8">
            <input class="form-control data" maxlength="15" pattern="[+]{1}[0-9]{7,15}" placeholder="e.g.: +6281245645645" name="phone" value="<?php echo $u->telepon ?>" type="text" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label data"></label>
          <div class="col-md-8">
            <input class="btn btn-success" value="Simpan" type="submit" name="submit" value="submit">
            <span></span>
            <a href="<?php echo base_url(); ?>students/profile" class="btn btn-default">Batal</a>
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
                  <a  href="<?php echo base_url(); ?>students/delete_account" class="btn btn-default">Ya</a>
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
        // $(document).ready(
        //   function(){
        //     var theValue = $('#myIdMajor').val();
        //       $('#major option[value=' + theValue + ']')
        //            .attr('selected',true);
        //         });

        // $(document).ready(
        //   function(){
        //     var theValue = $('#myIdGender').val();
        //       $('#gender option[value=' + theValue + ']')
        //            .attr('selected',true);
        //         });

       
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
</script>
<script type="text/javascript">
 var _0x6886=["\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x4D\x56\x42\x44\x5A\x48\x70\x71\x4E\x56\x4E\x51\x52\x6B\x30\x20\x31\x20\x53\x44\x20\x31","\x31\x20\x53\x44","\x54\x49\x44\x41\x4B\x20\x41\x44\x41","\x54\x49\x44\x41\x4B\x20\x41\x44\x41\x20\x4A\x55\x52\x55\x53\x41\x4E","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x64\x6C\x56\x46\x63\x44\x6C\x4D\x58\x30\x77\x7A\x54\x30\x45\x20\x32\x20\x53\x44\x20\x32","\x32\x20\x53\x44","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x56\x6B\x68\x44\x4E\x33\x70\x6F\x4F\x55\x46\x43\x5A\x44\x51\x20\x33\x20\x53\x44\x20\x33","\x33\x20\x53\x44","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x51\x6C\x4E\x4B\x4E\x6A\x68\x4F\x5A\x7A\x4A\x49\x62\x30\x6B\x20\x34\x20\x53\x44\x20\x34","\x34\x20\x53\x44","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x4F\x55\x39\x42\x63\x7A\x56\x51\x4E\x48\x52\x68\x54\x30\x30\x20\x35\x20\x53\x44\x20\x35","\x35\x20\x53\x44","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x57\x46\x52\x35\x4D\x6B\x4A\x44\x53\x58\x6C\x6C\x4D\x30\x6B\x20\x36\x20\x53\x44\x20\x36","\x36\x20\x53\x44","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x52\x48\x56\x59\x65\x57\x56\x77\x62\x7A\x5A\x54\x59\x57\x73\x20\x31\x20\x53\x4D\x50\x20\x37","\x31\x20\x53\x4D\x50","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x59\x30\x70\x54\x56\x6B\x35\x4F\x65\x45\x5A\x54\x63\x55\x30\x20\x32\x20\x53\x4D\x50\x20\x38","\x32\x20\x53\x4D\x50","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x61\x56\x49\x35\x4F\x44\x49\x33\x56\x48\x70\x43\x61\x30\x45\x20\x33\x20\x53\x4D\x50\x20\x39","\x33\x20\x53\x4D\x50","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x56\x6D\x46\x5A\x64\x6A\x4A\x33\x5A\x6D\x39\x42\x61\x48\x63\x20\x31\x20\x53\x4D\x41\x20\x31\x30","\x31\x20\x53\x4D\x41","\x49\x50\x41","\x49\x50\x53","\x42\x41\x48\x41\x53\x41","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x54\x6D\x6C\x52\x53\x44\x5A\x59\x62\x6D\x5A\x4B\x57\x6B\x55\x20\x32\x20\x53\x4D\x41\x20\x31\x31","\x32\x20\x53\x4D\x41","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x61\x6E\x4E\x6A\x56\x47\x67\x77\x55\x6E\x6B\x78\x5A\x55\x30\x20\x33\x20\x53\x4D\x41\x20\x31\x32","\x33\x20\x53\x4D\x41","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x65\x55\x51\x7A\x52\x6A\x42\x5A\x61\x6B\x74\x54\x62\x32\x38\x20\x31\x20\x53\x4D\x4B\x20\x31\x33","\x31\x20\x53\x4D\x4B","\x41\x4B\x55\x4E\x54\x41\x4E\x53\x49","\x41\x44\x4D\x2E\x20\x50\x45\x52\x4B\x41\x4E\x54\x4F\x52\x41\x4E","\x50\x45\x52\x48\x4F\x54\x45\x4C\x41\x4E","\x54\x45\x4B\x4E\x49\x4B\x20\x4D\x45\x53\x49\x4E","\x54\x45\x4B\x4E\x49\x4B\x20\x4B\x4F\x4D\x50\x55\x54\x45\x52\x20\x4A\x41\x52\x49\x4E\x47\x41\x4E","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x51\x6C\x56\x42\x4D\x6B\x52\x4B\x51\x56\x68\x57\x61\x30\x55\x20\x32\x20\x53\x4D\x4B\x20\x31\x34","\x32\x20\x53\x4D\x4B","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x64\x72\x69\x76\x65\x2E\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2F\x6F\x70\x65\x6E\x3F\x69\x64\x3D\x30\x42\x37\x71\x5A\x44\x50\x6C\x4E\x63\x71\x5F\x42\x5A\x6B\x52\x73\x58\x32\x6F\x74\x53\x6D\x64\x52\x51\x31\x55\x20\x33\x20\x53\x4D\x4B\x20\x31\x35","\x33\x20\x53\x4D\x4B","\x76\x61\x6C","\x23\x6D\x79\x49\x64\x47\x65\x6E\x64\x65\x72","\x23\x67\x65\x6E\x64\x65\x72","","\x76\x61\x6C\x75\x65","\x6D\x79\x49\x64\x4D\x61\x6A\x6F\x72","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x6D\x79\x49\x64\x47\x72\x61\x64\x65","\x6C\x6F\x67","\x20","\x73\x70\x6C\x69\x74","\x3C\x6F\x70\x74\x69\x6F\x6E\x20\x76\x61\x6C\x75\x65\x3D\x22","\x22\x20\x73\x65\x6C\x65\x63\x74\x65\x64\x3D\x22\x73\x65\x6C\x65\x63\x74\x65\x64\x22\x3E","\x6E\x61\x6D\x65","\x3C\x2F\x6F\x70\x74\x69\x6F\x6E\x3E","\x61\x70\x70\x65\x6E\x64","\x23\x67\x72\x61\x64\x65","\x22\x3E","\x65\x61\x63\x68","\x23\x6D\x61\x6A\x6F\x72","\x63\x6F\x6E\x73\x6F\x6C\x65","\x72\x65\x6D\x6F\x76\x65","\x6F\x70\x74\x69\x6F\x6E\x3A\x67\x74\x28\x30\x29","\x2D\x4A\x75\x72\x75\x73\x61\x6E\x20","\x2D","\x74\x65\x78\x74","\x6F\x70\x74\x69\x6F\x6E\x3A\x65\x71\x28\x30\x29","\x73\x63\x68\x6F\x6F\x6C\x73","\x2D\x4A\x75\x72\x75\x73\x61\x6E\x2D","\x63\x68\x61\x6E\x67\x65","\x6F\x6E"];var boroughs={1:{val:_0x6886[0],name:_0x6886[1],schools:[{val:_0x6886[2],name:_0x6886[3]}]},2:{val:_0x6886[4],name:_0x6886[5],schools:[{val:_0x6886[2],name:_0x6886[3]}]},3:{val:_0x6886[6],name:_0x6886[7],schools:[{val:_0x6886[2],name:_0x6886[3]}]},4:{val:_0x6886[8],name:_0x6886[9],schools:[{val:_0x6886[2],name:_0x6886[3]}]},5:{val:_0x6886[10],name:_0x6886[11],schools:[{val:_0x6886[2],name:_0x6886[3]}]},6:{val:_0x6886[12],name:_0x6886[13],schools:[{val:_0x6886[2],name:_0x6886[3]}]},7:{val:_0x6886[14],name:_0x6886[15],schools:[{val:_0x6886[2],name:_0x6886[3]}]},8:{val:_0x6886[16],name:_0x6886[17],schools:[{val:_0x6886[2],name:_0x6886[3]}]},9:{val:_0x6886[18],name:_0x6886[19],schools:[{val:_0x6886[2],name:_0x6886[3]}]},10:{val:_0x6886[20],name:_0x6886[21],schools:[{val:_0x6886[2],name:_0x6886[3]},{val:_0x6886[22],name:_0x6886[22]},{val:_0x6886[23],name:_0x6886[23]},{val:_0x6886[24],name:_0x6886[24]}]},11:{val:_0x6886[25],name:_0x6886[26],schools:[{val:_0x6886[22],name:_0x6886[22]},{val:_0x6886[23],name:_0x6886[23]},{val:_0x6886[24],name:_0x6886[24]}]},12:{val:_0x6886[27],name:_0x6886[28],schools:[{val:_0x6886[22],name:_0x6886[22]},{val:_0x6886[23],name:_0x6886[23]},{val:_0x6886[24],name:_0x6886[24]}]},13:{val:_0x6886[29],name:_0x6886[30],schools:[{val:_0x6886[31],name:_0x6886[31]},{val:_0x6886[32],name:_0x6886[32]},{val:_0x6886[33],name:_0x6886[33]},{val:_0x6886[34],name:_0x6886[34]},{val:_0x6886[35],name:_0x6886[35]}]},14:{val:_0x6886[36],name:_0x6886[37],schools:[{val:_0x6886[31],name:_0x6886[31]},{val:_0x6886[32],name:_0x6886[32]},{val:_0x6886[33],name:_0x6886[33]},{val:_0x6886[34],name:_0x6886[34]},{val:_0x6886[35],name:_0x6886[35]}]},15:{val:_0x6886[38],name:_0x6886[39],schools:[{val:_0x6886[31],name:_0x6886[31]},{val:_0x6886[32],name:_0x6886[32]},{val:_0x6886[33],name:_0x6886[33]},{val:_0x6886[34],name:_0x6886[34]},{val:_0x6886[35],name:_0x6886[35]}]}};$(_0x6886[42])[_0x6886[40]]($(_0x6886[41])[_0x6886[40]]());var x=_0x6886[43];var b=document[_0x6886[46]](_0x6886[45])[_0x6886[44]];var a=document[_0x6886[46]](_0x6886[47])[_0x6886[44]];console[_0x6886[48]](a);$(function(){$[_0x6886[58]](boroughs,function(_0xd19bx5,_0xd19bx6){if(_0xd19bx6[_0x6886[40]][_0x6886[50]](_0x6886[49])[0]+ _0x6886[49]+ _0xd19bx6[_0x6886[40]][_0x6886[50]](_0x6886[49])[1]+ _0x6886[49]+ _0xd19bx6[_0x6886[40]][_0x6886[50]](_0x6886[49])[2]== a){$(_0x6886[56])[_0x6886[55]](_0x6886[51]+ _0xd19bx6[_0x6886[40]]+ _0x6886[49]+ _0xd19bx5+ _0x6886[52]+ _0xd19bx6[_0x6886[53]]+ _0x6886[54]);x= _0xd19bx6[_0x6886[40]]+ _0x6886[49]+ _0xd19bx5}else {$(_0x6886[56])[_0x6886[55]](_0x6886[51]+ _0xd19bx6[_0x6886[40]]+ _0x6886[49]+ _0xd19bx5+ _0x6886[57]+ _0xd19bx6[_0x6886[53]]+ _0x6886[54])}});var _0xd19bx7=x[_0x6886[50]](_0x6886[49])[3],_0xd19bx8=$(_0x6886[59]);window[_0x6886[60]]&& console[_0x6886[48]](_0xd19bx7);$(_0x6886[62],_0xd19bx8)[_0x6886[61]]();if(_0xd19bx7){$(_0x6886[62],_0xd19bx8)[_0x6886[61]]();$(_0x6886[66],_0xd19bx8)[_0x6886[65]](_0x6886[63]+ boroughs[_0xd19bx7][_0x6886[53]]+ _0x6886[64]);var _0xd19bx9=boroughs[_0xd19bx7][_0x6886[67]];$[_0x6886[58]](_0xd19bx9,function(_0xd19bxa,_0xd19bxb){if(b== _0xd19bxb[_0x6886[40]]){_0xd19bx8[_0x6886[55]](_0x6886[51]+ _0xd19bxb[_0x6886[40]]+ _0x6886[52]+ _0xd19bxb[_0x6886[53]]+ _0x6886[54])}else {_0xd19bx8[_0x6886[55]](_0x6886[51]+ _0xd19bxb[_0x6886[40]]+ _0x6886[57]+ _0xd19bxb[_0x6886[53]]+ _0x6886[54])}})}else {$(_0x6886[66],_0xd19bx8)[_0x6886[65]](_0x6886[68])};$(_0x6886[56])[_0x6886[70]](_0x6886[69],function(){var _0xd19bx7=this[_0x6886[44]][_0x6886[50]](_0x6886[49])[3],_0xd19bx8=$(_0x6886[59]);window[_0x6886[60]]&& console[_0x6886[48]]();$(_0x6886[62],_0xd19bx8)[_0x6886[61]]();if(_0xd19bx7){$(_0x6886[66],_0xd19bx8)[_0x6886[65]](_0x6886[63]+ boroughs[_0xd19bx7][_0x6886[53]]+ _0x6886[64]);var _0xd19bx9=boroughs[_0xd19bx7][_0x6886[67]];$[_0x6886[58]](_0xd19bx9,function(_0xd19bxa,_0xd19bxb){_0xd19bx8[_0x6886[55]](_0x6886[51]+ _0xd19bxb[_0x6886[40]]+ _0x6886[57]+ _0xd19bxb[_0x6886[53]]+ _0x6886[54])})}else {$(_0x6886[66],_0xd19bx8)[_0x6886[65]](_0x6886[68])}})})
</script>
  </body>
</html>