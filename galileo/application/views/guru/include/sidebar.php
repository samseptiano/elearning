      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="<?php echo base_url(); ?>teachers/profile">
                  <?php foreach($tutor as $u){ ?>
                  <img src="<?php echo base_url().$u->foto ?>" style="width:75px;height:75px" class="img-circle" width="60"></a></p>
                  <?php } ?>
              	  <h5 class="centered"><?php echo $this->session->userdata("nama"); ?></h5>
              	  	<input type="hidden" id="tgl" value="<?php echo $u->tanggal_daftar ?>">
                  <li class="mt">
                      <a href="<?php echo base_url(); ?>teachers"> <!-- class="active" -->
                          <i class="fa fa-home"></i>
                          <span>Beranda</span>
                      </a>
                  </li>
				          <li class="mt" style="margin-top:8px">
                      <a href="<?php echo base_url(); ?>teachers/profile">
                          <i class="fa fa-user"></i>
                          <span>Profil</span>
                      </a>
                  </li>
                  <li class="mt" style="margin-top:8px">
                      <a href="<?php echo base_url(); ?>teachers/absence">
                          <i class="fa fa-check"></i>
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
                                    <span>Chat/Konsul</span>
                                </a>
                                <ul class="sub">
                                    <li><a  href="<?php echo base_url(); ?>teachers/consultation">Konsultasi Online</a></li>
                                    <li><a  href="<?php echo base_url(); ?>teachers/offline_consultation">Konsultasi Offline</a></li>
                                    <li><a  href="<?php echo base_url(); ?>teachers/inbox_consultation">Inbox Konsultasi Online</a></li>
                                </ul>
                            </li>
                          <li class="sub-menu">
                                <a href="javascript:;" >
                                    <i class="fa fa-pencil"></i>
                                    <span>Tes/Tryout Online</span>
                                </a>
                                <ul class="sub">
                                    <li><a  href="<?php echo base_url(); ?>teachers/create_test">Buat/Lihat Soal Tes</a></li>
                                    <li><a  href="<?php echo base_url(); ?>teachers/score_list">Lihat Nilai</a></li>

                                </ul>
                            </li>
                          <li><a  href="<?php echo $u->link_modul ?>">Download Modul</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Lihat</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url(); ?>teachers/education_cal">Calendar Bimbel</a></li>
                          <li><a  href="<?php echo base_url(); ?>teachers/course_schedule">Jadwal Bimbel</a></li>
                          <li><a  href="<?php echo base_url(); ?>teachers/tutor_schedule">Daftar Tutor</a></li>
                      </ul>
                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>