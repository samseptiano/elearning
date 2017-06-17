      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="<?php echo base_url(); ?>teachers/profile"><img src="<?php echo base_url(); ?>assets/elearning/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $this->session->userdata("nama"); ?></h5>
              	  	
                  <li class="mt">
                      <a href="<?php echo base_url(); ?>teachers"> <!-- class="active" -->
                          <i class="fa fa-dashboard"></i>
                          <span>Beranda</span>
                      </a>
                  </li>
				          <li class="mt" style="margin-top:8px">
                      <a href="<?php echo base_url(); ?>teachers/profile">
                          <i class="fa fa-dashboard"></i>
                          <span>Profil</span>
                      </a>
                  </li>
                  <li class="mt" style="margin-top:8px">
                      <a href="<?php echo base_url(); ?>teachers/absence">
                          <i class="fa fa-dashboard"></i>
                          <span>Absensi</span>
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
                                    <li><a  href="<?php echo base_url(); ?>teachers/consultation">Konsultasi</a></li>
                                    <li><a  href="<?php echo base_url(); ?>teachers/offline_consultation">Konsultasi Offline</a></li>
                                    <li><a  href="<?php echo base_url(); ?>teachers/inbox_consultation">Inbox Konsultasi</a></li>
                                </ul>
                            </li>
                          <li class="sub-menu">
                                <a href="javascript:;" >
                                    <i class="fa fa-book"></i>
                                    <span>Tes/Tryout Online</span>
                                </a>
                                <ul class="sub">
                                    <li><a  href="<?php echo base_url(); ?>teachers/create_test">Buat Soal</a></li>
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
                          <li><a  href="<?php echo base_url(); ?>teachers/course_schedule">Jadwal Bimbel</a></li>
                          <li><a  href="<?php echo base_url(); ?>teachers/tutor_schedule">Daftar Tutor</a></li>
                      </ul>
                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>