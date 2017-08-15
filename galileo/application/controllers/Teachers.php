<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Teachers extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
        $this->load->helper('url');
        if(date('Y/m/d') >= "2018/04/31"){
        	redirect('teachers_login/hE986KqwJXSVE6ug');
        }
		if($this->session->userdata('status_tutor') != "login"){
			redirect(base_url("teachers_login"));
		}
	}

	function education_cal(){
 		$where2 = array('id_tutor' => $this->session->userdata('id'));
		$data['tutor'] = $this->m_login->tampil_data("data_guru",$where2)->result();
 		$this->load->view('guru/kalender',$data);
 	}

 	function online(){
 		$data = array(
 		'online' => $this->input->post('online')
 		);
 		echo json_encode($data);
 		$data = array(
 			'online' => strtoupper($data['online'])
 			);
 		$where = array('id_tutor' => $this->session->userdata('id'));
 		$this->m_login->update_data($where,$data,'data_guru');
 		redirect('teachers');
 	}
	function index(){
		$where = array('status'=>'UNFINISHED','tanggal_selesai >'=> date("Y-m-d"));
		$data['info'] = $this->m_login->tampil_data_reminder_guru("data_reminder",$where,$this->session->userdata('id'))->result();
		$where2 = array('id_tutor' => $this->session->userdata('id'));
		$data['tutor'] = $this->m_login->tampil_data("data_guru",$where2)->result();
		$this->load->view('guru/index',$data);
	}

	function profile(){
		$where = array(
			'id_tutor' => $this->session->userdata('id')
			);
		$data['tutor'] = $this->m_login->tampil_data("data_guru",$where)->result();
		$this->load->view('guru/profil',$data);
	}

	function create_test(){
		$where=array('id_tutor' => $this->session->userdata('id'));
		$data['tutor'] = $this->m_login->tampil_data("data_guru",$where)->result();
		$this->load->view('guru/buat_soal',$data);
	}
	function delete_create_test($id="undefined"){
		$where=array('id_tutor' => $this->session->userdata('id'), 'id_soal'=>$id);
		//$this->m_login->delete_data("soal_test",$where);
		$this->m_login->delete_data("tipe_soal",$where);
		redirect('teachers/show_create_test');
	}

	function show_create_test(){
	$where2 = array('id_tutor' => $this->session->userdata('id'));
	$data['tutor'] = $this->m_login->tampil_data("data_guru",$where2)->result();

		$where=array('id_tutor' => $this->session->userdata('id'));
		$data['soal'] = $this->m_login->tampil_data("tipe_soal",$where)->result();
		$this->load->view('guru/daftar_soal',$data);
	}

	function show_create_test_detail($id="undefined"){
		$where=array('id_soal' => $id);
		$data['soal'] = $this->m_login->tampil_data("soal_test",$where)->result();
		$where2 = array('id_tutor' => $this->session->userdata('id'));
		$data['tutor'] = $this->m_login->tampil_data("data_guru",$where2)->result();
		$this->load->view('guru/daftar_soal_detail',$data);
	}

	function make_test($id="undefined"){
		$where2 = array('id_tutor' => $this->session->userdata('id'));
		$data['tutor'] = $this->m_login->tampil_data("data_guru",$where2)->result();

		$where=array('id_tutor' => $this->session->userdata('id'), 'id_soal'=> $id);
		$data['soal'] = $this->m_login->tampil_data("tipe_soal",$where)->result();
		$this->load->view('guru/buat_test',$data);
	}

	function start_test(){
		$id_soal= $this->input->post('id_soal');
		$expl=explode(" ", $this->input->post('kelas'));
		$kelas = $expl[0];
		$level = $expl[1];
		$pelajaran=$expl[2];
		$jam_mulai = $this->input->post('jam_mulai');
		$tanggal_mulai = $this->input->post('tanggal_mulai');
		$durasi = $this->input->post('durasi');
		$selesai = strtotime("+".$durasi." minutes", strtotime($jam_mulai));
		$kategori =  $this->input->post('category');
		$jurusan = $this->input->post('major');

		$data = array(
		'id_soal' => $id_soal,
		'pelajaran' => $pelajaran,
		'kelas' => $kelas,
		'level' => $level,
		'waktu_mulai' => $tanggal_mulai." ".$jam_mulai,
		'waktu_selesai' => $tanggal_mulai." ".date('H:i:sa',$selesai),
		'durasi_menit' => $durasi,
		'status' => 'TIDAK SELESAI',
		'jurusan' => $jurusan,
		'kategori' => $kategori
		);
		$this->m_login->insertData('tes_online',$data);

		$data2=array(
			'buat_tes' => 'YA'
			);
		$where =array(
			'id_soal' => $id_soal
			);
		$this->m_login->update_data($where,$data2,'tipe_soal');

		redirect('teachers/show_create_test');
	}

	function cancel_test($id){
		$id_soal= $id;
		$data2=array(
			'buat_tes' => 'TIDAK'
			);
		$data=array(
			'status' => 'BATAL'
			);
		$where =array(
			'id_soal' => $id_soal
			);
		$where2 =array(
			'id_soal' => $id_soal,
			'status' => 'TIDAK SELESAI'
			);
		$this->m_login->update_data($where2,$data,'tes_online');
		$this->m_login->update_data($where,$data2,'tipe_soal');
		//$this->m_login->delete_data('tes_online',$where);
		redirect('teachers/show_create_test');
	}

	function finish_test($id){
		$id_soal= $id;
		$data2=array(
			'buat_tes' => 'TIDAK'
			);
		$data=array(
			'status' => 'SELESAI'
			);
		$where =array(
			'id_soal' => $id_soal
			);
		$where2 =array(
			'id_soal' => $id_soal,
			'status' => 'TIDAK SELESAI'
			);
		$this->m_login->update_data($where2,$data,'tes_online');//harus DB auto update jika waktu tes habis
		$this->m_login->update_data($where,$data2,'tipe_soal');
		//$this->m_login->delete_data('tes_online',$where);
		redirect('teachers/show_create_test');
	}

	function update_create_test_detail(){
		//$i=1;
		$id_soal = $this->input->post('id_soal');
		$data  = array();
		//$todayDate = date('Y-m-d');
		for($i = 1; $i <= count($_POST['soal']); $i++) {
		    //$code=$_POST['code'][$i];
		    if($_POST['soal'][$i] != '') {
		        $data[$i] = array(
				    'soal' => $_POST['soal'][$i],
				    'A' => $_POST['A'][$i],
				    'B' => $_POST['B'][$i],
				    'C' => $_POST['C'][$i],
				    'D' => $_POST['D'][$i],
				    'jawaban' => $_POST['answer'][$i]
					);
		        $nmr = $_POST['nomor'][$i];
		        $where = array('id_soal' => $id_soal,'nomer_soal' => $nmr );
		    	}
		    	$this->m_login->update_data($where,$data[$i],'soal_test');
			}
			redirect('teachers/show_create_test_detail/'.$id_soal);
		}

	function create_test_multiple(){
		$i = $this->input->post('increment');
		$expl = explode(" ", $this->input->post('grade'));
		$id_soal = $this->input->post('id_soal');
		if($id_soal==""){
			redirect('teachers/create_test');
		}
		$pelajaran = $this->input->post('subject');
		$kelas = $expl[0];
		$level = $expl[1];
		$soal = $this->input->post('soal');
		$a = $this->input->post('A');
		$b = $this->input->post('B');
		$c = $this->input->post('C');
		$d = $this->input->post('D');
		$answer = $this->input->post('answer');

		$where=array('id_soal' => $id_soal, 'nomer_soal' => $i);
		$cek = $this->m_login->cek_login("soal_test",$where)->num_rows();
		if($cek>0){
			$data_oper = array(
			'i' => $i+=1,
		    'id_soal' => $id_soal,
		    'pelajaran' => $pelajaran,
		    'kelas' => $kelas." ".$level
			);
			$where2 = array('id_tutor' => $this->session->userdata('id'));
			$data_oper['tutor'] = $this->m_login->tampil_data("data_guru",$where2)->result();
			$this->load->view('guru/buat_soal_multi',$data_oper);
		}

		else{

		$where=array('id_soal' => $id_soal);
		$cek = $this->m_login->cek_login("soal_test",$where)->num_rows();
		if($cek>0){
			$where2=array('id_soal' => $id_soal);
			$data2 = array(
				'jumlah_soal' =>$i,
			);

		$data = array(
			'id_soal' => $id_soal,
			//'id_tutor' => $this->session->userdata('id'),
			'pelajaran' => $pelajaran,
			'soal' => $soal,
			'kelas' => $kelas,
			'level' => $level,
			'A' => $a,
			'B' => $b,
			'C' => $c,
			'D' => $d,
			'nomer_soal' => $i,
			'jawaban' => $answer,
			'tanggal_buat' => date("Y-m-d")
		);

		$data_oper = array(
			'i' => $i+=1,
	    'id_soal' => $id_soal,
	    'pelajaran' => $pelajaran,
	    'kelas' => $kelas." ".$level
		);

		$this->m_login->update_data($where2,$data2,'tipe_soal');
		$this->m_login->insertData('soal_test',$data);
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Soal Berhasil di Input!!!</div>');
			$where2 = array('id_tutor' => $this->session->userdata('id'));
			$data_oper['tutor'] = $this->m_login->tampil_data("data_guru",$where2)->result();
		$this->load->view('guru/buat_soal_multi',$data_oper);
		}

		else{
			$data2 = array(
				'id_soal' => $id_soal,
				'id_tutor' => $this->session->userdata('id'),
				'pelajaran' => $pelajaran,
				'kelas' => $kelas,
				'level' => $level,
				'jumlah_soal' =>$i,
				'tanggal_buat' => date("Y-m-d"),
				'buat_tes' => 'TIDAK'
				);

			$data = array(
				'id_soal' => $id_soal,
				//'id_tutor' => $this->session->userdata('id'),
				'pelajaran' => $pelajaran,
				'soal' => $soal,
				'kelas' => $kelas,
				'level' => $level,
				'A' => $a,
				'B' => $b,
				'C' => $c,
				'D' => $d,
				'nomer_soal' => $i,
				'jawaban' => $answer,
				'tanggal_buat' => date("Y-m-d")
			);

			$data_oper = array(
				'i' => $i+=1,
		    'id_soal' => $id_soal,
		    'pelajaran' => $pelajaran,
		    'kelas' => $kelas." ".$level
			);

			$this->m_login->insertData('tipe_soal',$data2);
			$this->m_login->insertData('soal_test',$data);
			$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Soal Berhasil di Input!!!</div>');
				$where2 = array('id_tutor' => $this->session->userdata('id'));
				$data_oper['tutor'] = $this->m_login->tampil_data("data_guru",$where2)->result();
			$this->load->view('guru/buat_soal_multi',$data_oper);
		 }
	  }
	}

	function finish_create_test_multiple(){
		if($this->input->post('grade')!=""){
		$i = $this->input->post('increment');
		$expl = explode(" ", $this->input->post('grade'));
		$id_soal = $this->input->post('id_soal');
		$pelajaran = $this->input->post('subject');
		$kelas = $expl[0];
		$level = $expl[1];
		$soal = $this->input->post('soal');
		$a = $this->input->post('A');
		$b = $this->input->post('B');
		$c = $this->input->post('C');
		$d = $this->input->post('D');
		$answer = $this->input->post('answer');
	$data = array(
		'id_soal' => $id_soal,
		//'id_tutor' => $this->session->userdata('id'),
		'pelajaran' => $pelajaran,
		'kelas' => $kelas,
		'soal' => $soal,
		'level' => $level,
		'A' => $a,
		'B' => $b,
		'C' => $c,
		'D' => $d,
		'nomer_soal' => $i,
		'jawaban' => $answer,
		'tanggal_buat' => date("Y-m-d")
		
	);
	
	$where2=array('id_soal' => $id_soal);
			$data2 = array(
				'jumlah_soal' =>$i,
			);

	$this->m_login->update_data($where2,$data2,'tipe_soal');
	$this->m_login->insertData('soal_test',$data);
	$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Soal Berhasil di Input!!!</div>');
	redirect('teachers/create_test');
	}
	else{
	$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Anda Belum Memilih Kelas!!!</div>');
	redirect('teachers/create_test');	
	}
	}

	function finish_create_test(){
		if($this->input->post('grade')!=""){
		$i = $this->input->post('increment');
		$expl = explode(" ", $this->input->post('grade'));
		$id_soal = $this->input->post('id_soal');
		$pelajaran = $this->input->post('subject');
		$kelas = $expl[0];
		$level = $expl[1];
		$soal = $this->input->post('soal');
		$a = $this->input->post('A');
		$b = $this->input->post('B');
		$c = $this->input->post('C');
		$d = $this->input->post('D');
		$answer = $this->input->post('answer');
	$data = array(
		'id_soal' => $id_soal,
		//'id_tutor' => $this->session->userdata('id'),
		'pelajaran' => $pelajaran,
		'kelas' => $kelas,
		'soal' => $soal,
		'level' => $level,
		'A' => $a,
		'B' => $b,
		'C' => $c,
		'D' => $d,
		'nomer_soal' => $i,
		'jawaban' => $answer,
		'tanggal_buat' => date("Y-m-d")
		
	);
	$data2 = array(
		'id_soal' => $id_soal,
		'id_tutor' => $this->session->userdata('id'),
		'pelajaran' => $pelajaran,
		'kelas' => $kelas,
		'level' => $level,
		'jumlah_soal' =>$i,
		'tanggal_buat' => date("Y-m-d"),
		'buat_tes' => 'TIDAK'
	);
	$this->m_login->insertData('tipe_soal',$data2);
	$this->m_login->insertData('soal_test',$data);
	$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Soal Berhasil di Input!!!</div>');
	redirect('teachers/create_test');
	}
	else{
	$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Anda Belum Memilih Kelas!!!</div>');
	redirect('teachers/create_test');	
	}
	}

	function absence(){
		$where2 = array('id_tutor' => $this->session->userdata('id'));
		$data['tutor'] = $this->m_login->tampil_data("data_guru",$where2)->result();


		$where = array('id_tutor' => $this->session->userdata('id'), 'tanggal>' => Date('y:m:d', strtotime("-30 days")));
		//$data['absen'] = $this->m_login->tampil_data("data_kbm",$where)->result();

		$this->load->helper(array('url'));
		$this->load->model('pagination_model');

		$this->load->database();
		$jumlah_data = $this->pagination_model->total_data('data_kbm',$where);
		$this->load->library('pagination');
		$config['base_url'] = base_url().'teachers/absence/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 5;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$data['absen'] = $this->pagination_model->datas($config['per_page'],$from,'data_kbm',$where);	
		$this->load->view('guru/absensi',$data);
	}

	function request_absence(){
	$expl = explode(" ", $this->input->post('grade'));
	$id_absen = "ABS - ".uniqid();
	$id_tutor = $this->session->userdata('id');
	$materi = $this->input->post('topic');
	$kelas = $expl[0];
	$level = $expl[1];
	$pelajaran = $this->input->post('subject');
	$status = $this->input->post('status');
	$tanggal = $this->input->post('date');
	$jam_masuk = $this->input->post('time_in');
	$jam_keluar = $this->input->post('time_out');
	$data = array(
		'id_absen' => $id_absen,
		'id_tutor' => $id_tutor,
		'materi' => $materi,
		'tanggal' => date("Y/m/d"),
		'jam_masuk' => $jam_masuk,
		'jam_keluar' => $jam_keluar,
		'kelas' => $kelas,
		'level' => $level,
		'pelajaran' => $pelajaran,
		'status_hadir' =>$status
	);
	$this->m_login->insertData('data_kbm',$data);
	$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Absen Sukses!!!</div>');
	redirect('teachers/absence');
	}

	function edit_profile(){
		
		$where = array('id_tutor' => $this->session->userdata('id'));
		$data['tutor'] = $this->m_login->edit_data($where,'data_guru')->result();
		$this->load->view('guru/profil_edit',$data);
	}

	function edit_password(){
	$where2 = array('id_tutor' => $this->session->userdata('id'));
	$data['tutor'] = $this->m_login->tampil_data("data_guru",$where2)->result();
		$this->load->view('guru/password_edit',$data);
	}

	function tutor_schedule(){
		$where2 = array('id_tutor' => $this->session->userdata('id'));
		$data['tutor'] = $this->m_login->tampil_data("data_guru",$where2)->result();
		$where = array();
		$data['jadwal'] = $this->m_login->tampil_data("data_guru",$where)->result();
		$this->load->view('guru/jadwal_tutor',$data);
	}

	function offline_consultation(){
		$where2 = array('id_tutor' => $this->session->userdata('id'));
		$data['tutor'] = $this->m_login->tampil_data("data_guru",$where2)->result();

		$where3 = array();
		$data['tutor2'] = $this->m_login->auth2("data_guru",$where3);
		$kelasdb = $data['tutor2']->level ;
		$pelajaran = $data['tutor2']->bidang ;

		$where = array('status_konsultasi' => "BELUM DITERiMA",
						'id_tutor' => $this->session->userdata('id'),
						'pelajaran' => $pelajaran);
		$data['konsul'] = $this->m_login->tampil_data("data_konsultasi",$where)->result();
		$this->load->view('guru/konsul_offline',$data);
	}
	function offline_consultation_fragment(){	
		$where3 = array();
		$data['tutor2'] = $this->m_login->auth2("data_guru",$where3);
		$kelasdb = $data['tutor2']->level ;
		$pelajaran = $data['tutor2']->bidang ;

		$where = array('status_konsultasi' => "BELUM DITERiMA",
						'id_tutor' => $this->session->userdata('id'), 
						'pelajaran' => $pelajaran);
		$data['konsul'] = $this->m_login->tampil_data("data_konsultasi",$where)->result();
		$this->load->view('guru/konsul_offline_fragment',$data);
	}

	function offline_consultation_acc($id="undefined") {
		$data = array(
			'status_konsultasi'=>'DITERIMA'
			);
		 $where = array('id_konsul' => $id);
			$this->m_login->update_data($where,$data,"data_konsultasi"); 
		    redirect('teachers/offline_consultation');
		  }

	function offline_consultation_reject($id="undefined") {
		$data = array(
			'status_konsultasi'=>'DITOLAK'
			);
		 $where = array('id_konsul' => $id);
			$this->m_login->update_data($where,$data,"data_konsultasi"); 
		    redirect('teachers/offline_consultation');
	}


	function consultation(){	
		$where2 = array('id_tutor' => $this->session->userdata('id'));
		$data['tutor'] = $this->m_login->tampil_data("data_guru",$where2)->result();
		$where = array();
		$data['siswa'] = $this->m_login->tampil_data2("data_siswa",$where)->result();
		$this->load->view('guru/konsultasi',$data);
	}

	function consultation_fragment(){	
		$where = array();
		$data['siswa'] = $this->m_login->tampil_data2("data_siswa",$where)->result();
		$this->load->view('guru/konsultasi_fragment',$data);
	}

	function course_schedule(){
		$where2 = array('id_tutor' => $this->session->userdata('id'));
		$data['tutor'] = $this->m_login->tampil_data("data_guru",$where2)->result();
		$where = array();
		$data['jadwal'] = $this->m_login->tampil_data("jadwal_bimbel",$where)->result();
		$this->load->view('guru/jadwal_bimbel',$data);
	}

	function inbox_consultation_fragment(){
		$where = array('chats.receiver'=>$this->session->userdata('id'),'chats.status'=>'UNREAD');
		$data['chat2'] = $this->m_login->tampil_data_join("chats",$where)->result();

		$where3 = array();
		$data['siswa'] = $this->m_login->tampil_data("data_siswa",$where3)->result();
		
		$data['chat'] = $this->m_login->queri($this->session->userdata('id'))->result();
		$this->load->view('guru/inbox_konsultasi_fragment',$data);
	}

	function inbox_consultation(){
		$where2 = array('id_tutor' => $this->session->userdata('id'));
		$data['tutor'] = $this->m_login->tampil_data("data_guru",$where2)->result();

		$where = array('chats.receiver'=>$this->session->userdata('id'),'chats.status'=>'UNREAD');
		$data['chat2'] = $this->m_login->tampil_data_join("chats",$where)->result();

		$where3 = array();
		$data['siswa'] = $this->m_login->tampil_data("data_siswa",$where3)->result();

		$data['chat'] = $this->m_login->queri($this->session->userdata('id'))->result();
		$this->load->view('guru/inbox_konsultasi',$data);
	}

	public function export_excel($id='undefined'){
		    $where = array(
		 	'tipe_soal.id_tutor' => $this->session->userdata('id'),
		 	'data_ujian.id_soal' =>$id
			);

           $data = array( 
           	'title' => 'laporan_nilai_tes_siswa_per_'.date('d-m-Y')."_".$id,
           	'nilai' => $this->m_login->join_data_nilai_detail("data_ujian",$where)->result()
           	);
           $this->load->view('guru/export_excel',$data);
      }

	function score_list(){
		$where2 = array('id_tutor' => $this->session->userdata('id'));
		$data['tutor'] = $this->m_login->tampil_data("data_guru",$where2)->result();

		 $where = array(
		 'tipe_soal.id_tutor' => $this->session->userdata('id')
		 );

		 $this->load->helper(array('url'));
		$this->load->model('pagination_model');

		$this->load->database();
		$jumlah_data = $this->pagination_model->jumlah_data2('data_ujian',$where);
		$this->load->library('pagination');
		$config['base_url'] = base_url().'teachers/score_list';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$data['nilai'] = $this->pagination_model->data2($config['per_page'],$from,'data_ujian',$where);
		//$this->load->view('guru/daftar_nilai_detail',$data);
		//$data['nilai'] = $this->m_login->join_data_nilai("data_ujian",$where)->result();
		$this->load->view('guru/daftar_nilai',$data);
	}

	function score_list_detail($id='undefined',$general='undefined'){
		$where2 = array('id_tutor' => $this->session->userdata('id'));
		$data['tutor'] = $this->m_login->tampil_data("data_guru",$where2)->result();

		 $where = array(
		 'tipe_soal.id_tutor' => $this->session->userdata('id'),'data_ujian.id_soal' =>$id, 'data_ujian.jurusan' => $general
		 );
		// $data['nilai'] = $this->m_login->join_data_nilai_detail("data_ujian",$where)->result();
		// $this->load->view('guru/daftar_nilai_detail',$data);

		$this->load->helper(array('url'));
		$this->load->model('pagination_model');

		$this->load->database();
		$jumlah_data = $this->pagination_model->jumlah_data('data_ujian',$where);
		$this->load->library('pagination');
		$config['base_url'] = base_url().'teachers/score_list_detail/'.$id."/".$general;
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$from = $this->uri->segment(5);
		$this->pagination->initialize($config);		
		$data['nilai'] = $this->pagination_model->data($config['per_page'],$from,'data_ujian',$where);
		$this->load->view('guru/daftar_nilai_detail',$data);
	}

	function update_password(){
	$id = $this->session->userdata('id');
	$old_password = crypt($this->input->post('old_password'),"madafaka");
	$password = crypt($this->input->post('password'),"madafaka");
	$retype_new_password =crypt($this->input->post('retype_new_password'),"madafaka");


	$where = array(
		'id_tutor' => $id
	);

	$data['tutor'] = $this->m_login->auth2("data_guru",$where);
	if($old_password==$data['tutor']->password){
		if(strcmp($password,$retype_new_password)==0){
				$datas = array(
					'password' => $password
				);
					$this->m_login->update_data($where,$datas,'data_guru');
					$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Password Berhasil DiUpdate!!!</div>');
					redirect('teachers/profile');
		}
		else{
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> Ketik Ulang Password Salah!!!</div>');
			redirect('teachers/edit_password');
		}
	}
	else{
	$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Password Lama Anda Salah!!!</div>');
	redirect('teachers/edit_password');
	}
	}

	function delete_account(){
		$where = array(
			'id_tutor' => $this->session->userdata('id')
			);
		$this->m_login->delete_data('data_guru',$where);
		$this->session->sess_destroy();
		redirect(base_url('teachers'));
	}

	function delete_photo(){
		$data = array(
			'foto' => '/assets/elearning/img/ui-sam.jpg'
			);
		$where = array(
			'id_tutor' => $this->session->userdata('id')
			);

		$datas['tutor'] = $this->m_login->auth2("data_guru",$where);
		$pathfoto = ".".$datas['tutor']->foto;

		if(unlink($pathfoto)){
		$this->m_login->update_data($where,$data,'data_guru');
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Foto Berhasil di Hapus!!!</div>');
		redirect('teachers/profile');
		}
		else{
			$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Foto Berhasil di Hapus!!!</div>');
		redirect('teachers/profile');
		}
	}

	function update_photo(){
			//load the helper
			$this->load->helper('form');
			$rand = "I-".$this->session->userdata('id');
			//Configure
			//set the path where the files uploaded will be copied. NOTE if using linux, set the folder to permission 777
			$new_name = $rand.$_FILES["userfiles"]['name'];
			$config['file_name'] = $new_name;
			$upload_path = '/assets/elearning/img/teachers_uploads/';
			$config['upload_path'] = '.'.$upload_path;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '500';
			$config['max_width'] = '800';
			$config['max_height'] = '800';
			$config['overwrite'] = TRUE;   
			
			//load the upload library
			$this->load->library('upload', $config);
	    	$this->upload->initialize($config);
	    	$this->upload->set_allowed_types('*');

			$data['upload_data'] = '';
	    
			//if not successful, set the error message
			if (!$this->upload->do_upload('userfile')) {
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">'.$this->upload->display_errors().'</div>');

			} else { //else, set the success message
	      	$data['upload_data'] = $this->upload->data();

		      		$data = array(
					'foto' => $upload_path.$data['upload_data']['file_name']
					);
					$where = array(
					'id_tutor' => $this->session->userdata('id')
					);

					$this->m_login->update_data($where,$data,'data_guru');
					$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Foto Berhasil di Update!!!</div>');
			}
			
			//load the view/upload.php
			redirect('teachers/profile');
	}

	function update_profile(){
	$expl = explode(" ",$this->input->post('grade'));
	$username = $this->input->post('username');
	$id = $this->input->post('id_tutor');
	$nama_depan = $this->input->post('fname');
	$nama_belakang = $this->input->post('lname');
	$tempat_lahir = $this->input->post('place_birth');
	$tanggal_lahir = $this->input->post('date_birth');
	$alamat = $this->input->post('address');
	$telepon = $this->input->post('phone');
	$link_modul = $expl[0];
	$kelas = $expl[1];
	$jenis_kelamin = $this->input->post('gender');
	$bidang = $this->input->post('skill');
	$data = array(
		'username' =>$username,
		'nama_depan' => $nama_depan,
		'nama_belakang' => $nama_belakang,
		'tempat_lahir' => $tempat_lahir,
		'tanggal_lahir' => $tanggal_lahir,
		'alamat' => $alamat,
		'telepon' => $telepon,
		'level' => $kelas,
		'link_modul' => $link_modul,
		'bidang' => $bidang,
		'jenis_kelamin' => $jenis_kelamin
	);

	$where = array(
		'id_tutor' => $id
	);

	$this->m_login->update_data($where,$data,'data_guru');
	$this->session->unset_userdata('nama');
	$this->session->set_userdata('nama' , $username);
	$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Profil Berhasil di Update!!!</div>');
	redirect('teachers/profile');
}

//============================================================================================

function keep_read(){

	$data2 = array(
 		'sender' => $this->input->post('sender')
 		);
 		echo json_encode($data2);

	$data = array(
	'status'=>'READ'
	);
 $where = array('chats.receiver'=>$this->session->userdata('id'), 'chats.sender'=>$data2['sender']);
	$this->m_login->update_data_join("chats",$data,$where);      
}

public function konsul($username = "undefined") {
	$where = array(
			'id_siswa' => $username,
			'status' => "SUDAH"
			);
	$data['tes'] = $this->m_login->auth("data_siswa",$where);
	$usernamedb = $data['tes']->id_siswa ;

	if($usernamedb == "undefined" || $usernamedb ==""){
		redirect('Teachers');
}
else{
	$data = array(
	'status'=>'READ'
	);
 $where = array('chats.receiver'=>$this->session->userdata('id'), 'chats.sender'=>$username);
	$this->m_login->update_data_join("chats",$data,$where);      
    $where = array('id_siswa' => $username);
    $data['siswa'] = $this->m_login->tampil_data("data_siswa",$where)->result();
    	$where2 = array('id_tutor' => $this->session->userdata('id'));
	$data['tutor'] = $this->m_login->tampil_data("data_guru",$where2)->result();
    $this->load->view('guru/chat_guru',$data);
	}
  }

  public function konsul_fragment($username = "undefined") {
$data = array(
	'status'=>'READ'
	);
 $where = array('chats.receiver'=>$this->session->userdata('id'), 'chats.sender'=>$username);
	$this->m_login->update_data_join("chats",$data,$where);      
    $where = array('username' => $username);
    $data['siswa'] = $this->m_login->tampil_data("data_siswa",$where)->result();
    	$where2 = array('id_tutor' => $this->session->userdata('id'));
	$data['tutor'] = $this->m_login->tampil_data("data_guru",$where2)->result();
    $this->load->view('guru/chat_guru_fragment',$data);
  }


  public function konsul_hapus($username = "undefined") {
$data = array(
	'status'=>'READ'
	);
 $where = array('chats.receiver'=>$this->session->userdata('id'), 'chats.sender'=>$username);
	$this->m_login->update_data_join("chats",$data,$where);      
    $where = array('username' => $username);
    $data['siswa'] = $this->m_login->tampil_data("data_siswa",$where)->result();
    redirect('teachers/inbox_consultation');
  }
  
  public function get_chats() {
    /* Connect to the mySQL database - config values can be found at:
    /application/config/database.php */
    $dbconnect = $this->load->database();
    
    /* Load the database model:
    /application/models/simple_model.php */
    $this->load->model('Chat_model');
    
    /* Create a table if it doesn't exist already */
    $this->Chat_model->create_table();
    
    echo json_encode($this->Chat_model->get_chat_after($_REQUEST["time"],$_REQUEST["sender"],$_REQUEST["receiver"]));
    $data = array(
	'status'=>'READ'
	);
  }
  
  public function insert_chat() {
    /* Connect to the mySQL database - config values can be found at:
    /application/config/database.php */
    $dbconnect = $this->load->database();
    
    /* Load the database model:
    /application/models/simple_model.php */
    $this->load->model('Chat_model');
    
    /* Create a table if it doesn't exist already */
    $this->Chat_model->create_table();

    $this->Chat_model->insert_message($_REQUEST["message"],$_REQUEST["sender"],$_REQUEST["receiver"]); 
  }
  
  public function time() {
  	$date = new DateTime();
    echo "[{\"time\":" +  $date->getTimestamp() + "}]";
  }
  
}

?>