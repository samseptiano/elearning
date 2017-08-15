      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="<?php echo base_url()?>students" class="logo"><b>GALILEO GASING</b></a>
            <!--logo end-->
            <div class="top-menu">

            	<ul class="nav pull-right top-menu">
                <li>                            
                <div class="dropdown" style="margin-top:15px;margin-right: 10px">
                    <button style="font-size:11px;background: #52a835;border:1px solid #458e2c !important;font-color:#f2f2f2;  " class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Pengaturan
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu" style="min-width: 10px">
                                <li><a href="<?php echo base_url()?>students/edit_profile">Ubah Profil</a></li>
                                <li><a href="<?php echo base_url()?>students/edit_password">Ubah Sandi</a></li>
                                <li><a href="<?php echo base_url()?>assets/elearning/documentation/student_user_guide_18367538245762.pdf">Panduan</a></li>
                                <li><a class="logout" href="<?php echo base_url(); ?>students_login/logout">Keluar</a></li>
                        </ul>
                </div>
            </div>
        </header>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript">
            window.addEventListener('load', function(e) {
                  if (navigator.onLine) {
                    var dataString = 'YES';
                           $.ajax({
                                    url: "<?php echo base_url(); ?>"+"students/online",
                                    //async: false,
                                    type: "POST",
                                    dataType:"json",
                                    data: {online: dataString},
                                    cache: false,
                                    success: function(res){
                                        if(res){ alert('sukses 1')}
                                        else{alert('gagal')}
                                    }
                                    }); 
                            e.preventDefault();
                    console.log('Anda Sedang online..');
                  } else {
                    var dataString = 'NO';
                           $.ajax({
                                    url: "<?php echo base_url(); ?>"+"students/online",
                                    //async: false,
                                    type: "POST",
                                    dataType:"json",
                                    data: {online: dataString},
                                    cache: false,
                                    success: function(res){
                                        if(res){ alert('sukses 2')}
                                        else{alert('gagal')}
                                    }
                                    }); 
                            e.preventDefault();
                    console.log('Anda Sedang offline..');
                  }
                }, false);

                window.addEventListener('online', function(e) {
                     var dataString = 'YES';
                           $.ajax({
                                    url: "<?php echo base_url(); ?>"+"students/online",
                                    //async: false,
                                    type: "POST",
                                    dataType:"json",
                                    data: {online: dataString},
                                    cache: false,
                                    success: function(res){
                                        if(res){ alert('sukses 3')}
                                        else{alert('gagal')}
                                    }
                                    }); 
                            e.preventDefault();
                  alert('Tersambung kembali..');
                  console.log('Anda Sedang online..');
                }, false);

                window.addEventListener('offline', function(e) {
                    var dataString = 'NO';
                           $.ajax({
                                    url:  "<?php echo base_url(); ?>"+"students/online",
                                    //async: false,
                                    type: "POST",
                                    dataType:"json",
                                    data: {online: dataString},
                                    cache: false,
                                    success: function(res){
                                        if(res){ alert('sukses 3')}
                                        else{alert('gagal')}
                                    }
                                    }); 
                            e.preventDefault();
                  alert('Koneksi anda Down..');
                  console.log('Anda Sedang offline..');
                }, false);
        </script>