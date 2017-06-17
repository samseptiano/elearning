      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="<?php echo base_url(); ?>students/profile"><img src="<?php echo base_url(); ?>assets/elearning/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $this->session->userdata("nama"); ?></h5>
              	  	
                  <li class="mt">
                      <a href="<?php echo base_url(); ?>students"> <!-- class="active" -->
                          <i class="fa fa-dashboard"></i>
                          <span>Beranda</span>
                      </a>
                  </li>
				  <li class="mt" style="margin-top:8px">
                      <a href="<?php echo base_url(); ?>students/profile">
                          <i class="fa fa-user"></i>
                          <span>Profil</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Pembelajaran</span>
                      </a>
                      <ul class="sub">
                          <li class="sub-menu">
                                <a href="javascript:;" >
                                    <i class="fa fa-book"></i>
                                    <span>Pembelajaran</span>
                                </a>
                                <ul class="sub">
                                    <li><a  href="<?php echo base_url(); ?>students/consultation">Konsultasi</a></li>
                                    <li><a  href="<?php echo base_url(); ?>students/offline_consultation">Konsultasi Offline</a></li>
                                    <li><a  href="<?php echo base_url(); ?>students/inbox_consultation">Inbox Konsultasi</a></li>
                                </ul>
                            </li>
                          <li class="sub-menu">
                                <a href="javascript:;" >
                                    <i class="fa fa-book"></i>
                                    <span>Tes/Tryout Online</span>
                                </a>
                                <ul class="sub">
                                    <li><a  href="<?php echo base_url(); ?>students/test_list">Lihat Daftar Tes</a></li>
                                    <li><a  href="#">Lihat Nilai</a></li>
                                </ul>
                            </li>
                          <li><a  href="#">Download Modul</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Lihat</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="calendar.html">Calendar Bimbel</a></li>
                          <li><a  href="<?php echo base_url(); ?>students/course_schedule">Jadwal Bimbel</a></li>
                          <li><a  href="<?php echo base_url(); ?>students/tutor_schedule">Daftar Tutor</a></li>
                      </ul>
                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>