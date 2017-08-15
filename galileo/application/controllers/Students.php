<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Students extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('encrypt');
		$this->load->model('m_login');
		$this->load->model('Chat_model');
        $this->load->helper('url');
        if(date('Y/m/d') >= "2018/04/31"){
        	redirect('students_login/hE986KqwJXSVE6ug');
        }
		if($this->session->userdata('status_siswa') != "login"){
			redirect(base_url("students_login"));
		}
	}

	function online(){
 		$data = array(
 		'online' => $this->input->post('online')
 		);
 		echo json_encode($data);
 		$data = array(
 			'online' => strtoupper($data['online'])
 			);
 		$where = array('id_siswa' => $this->session->userdata('id'));
 		$this->m_login->update_data($where,$data,'data_siswa');
 		redirect('students');
 	}

 	function education_cal(){
 		$where2 = array('id_siswa' => $this->session->userdata('id'));
		$data['siswa'] = $this->m_login->tampil_data("data_siswa",$where2)->result();
 		$this->load->view('siswa/kalender',$data);
 	}

	function index(){
		if($this->session->userdata('student_test') != "progress"){
			$where = array('status'=>'UNFINISHED','tanggal_selesai >'=> date("Y-m-d"));
			$data['info'] = $this->m_login->tampil_data_reminder_siswa("data_reminder",$where,$this->session->userdata('id'))->result();
			$where2 = array('id_siswa' => $this->session->userdata('id'));
			$data['siswa'] = $this->m_login->tampil_data("data_siswa",$where2)->result();
			$this->load->view('siswa/index',$data);
		}
		else{
			$xxx = $this->session->userdata('id_soal');
			//$xxx= 'Q-INGGRIS-1086335703594a303fdb3936.60177774';
			redirect("students/start_test/".$xxx);
		}

	}

	function profile(){
		if($this->session->userdata('student_test') != "progress"){
			$where = array(
				'id_siswa' => $this->session->userdata('id')
				);
			$data['siswa'] = $this->m_login->tampil_data("data_siswa",$where)->result();
			$this->load->view('siswa/profil',$data);
			}
		else{
			$xxx = $this->session->userdata('id_soal');
			//$xxx= 'Q-INGGRIS-1086335703594a303fdb3936.60177774';
			redirect("students/start_test/".$xxx);
		}
	}

	function consultation(){	
				$where2 = array('id_siswa' => $this->session->userdata('id'));
		$data['siswa'] = $this->m_login->tampil_data("data_siswa",$where2)->result();
		$where = array();
		$data['tutor'] = $this->m_login->tampil_data2("data_guru",$where)->result();
		$this->load->view('siswa/konsultasi',$data);
	}

	function consultation_fragment(){	
		$where = array();
		$data['tutor'] = $this->m_login->tampil_data2("data_guru",$where)->result();
		$this->load->view('siswa/konsultasi_fragment',$data);
	}

	function edit_profile(){
		if($this->session->userdata('student_test') != "progress"){
			$where = array('id_siswa' => $this->session->userdata('id'));
			$data['siswa'] = $this->m_login->edit_data($where,'data_siswa')->result();
			$this->load->view('siswa/profil_edit',$data);
		}
		else{
			$xxx = $this->session->userdata('id_soal');
			//$xxx= 'Q-INGGRIS-1086335703594a303fdb3936.60177774';
			redirect("students/start_test/".$xxx);
		}
	}
	function edit_password(){
		if($this->session->userdata('student_test') != "progress"){
		$where2 = array('id_siswa' => $this->session->userdata('id'));
		$data['siswa'] = $this->m_login->tampil_data("data_siswa",$where2)->result();
		$this->load->view('siswa/password_edit',$data);
		}
		else{
			$xxx = $this->session->userdata('id_soal');
			//$xxx= 'Q-INGGRIS-1086335703594a303fdb3936.60177774';
			redirect("students/start_test/".$xxx);
		}
	}

	function start_test($id_soal="undefined"){
			$where2 = array('id_siswa' => $this->session->userdata('id'));
			$data['siswa'] = $this->m_login->tampil_data("data_siswa",$where2)->result();

			$where3 = array('id_siswa' => $this->session->userdata('id'), 'id_soal' => $id_soal);
			$ada = $this->m_login->cek_tes("data_ujian",$where3);
			if($ada < 1){
				$where = array('soal_test.id_soal' => $id_soal, 'status' => 'TIDAK SELESAI');
				$data['soal'] = $this->m_login->tampil_data_join_soal_siswa('soal_test',$where)->result();

				if($this->session->userdata('student_test')!='progress'){
					$this->session->set_userdata( [ 'id_soal' => $id_soal , 'student_test' => 'progress' ] );
				}
				$this->load->view('siswa/test',$data);
			}
			else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Anda Sudah Melakukan Tes!!! </div>');
				redirect('students/test_list');
			}
	}

	function calculate_test(){
		$mark = 0;
		$id_soal = $this->input->post('id_soal');
		$expl = explode(" ", $this->input->post('grade'));
		$wheres=array('id_soal'=> $id_soal);
		$datas = $this->m_login->auth_jawaban_test("soal_test",$wheres);
		$kategori = $this->input->post('kategori');
		$jurusan = $this->input->post('jurusan');
		$pelajaran = $this->input->post('pelajaran');

		for($i = 1; $i <= count($_POST['soal']); $i++) {
				if($_POST['answer'][$i] == $datas[$i-1]){
					$mark+=10;
				}
			}
			$total = ($mark*10)/count($_POST['soal']);
		$data = array(
			'id_siswa' => $this->session->userdata('id'),
			'id_soal' => $id_soal,
			'nilai' => $total,
			'waktu' => date('Y-m-d H:i:s', strtotime('+5 hour')),
			'jurusan' => $jurusan,
			'kelas' => $expl[0],
			'level' => $expl[1],
			'pelajaran' => $pelajaran,
			'kategori' => $kategori
			);
		$where2 = array('id_soal' => $id_soal);
		$this->m_login->insertData('data_ujian',$data);
		$this->session->unset_userdata('student_test');
		$this->session->unset_userdata('id_soal');
		redirect('students/test_list');

	}

	function test_list(){
		if($this->session->userdata('student_test') != "progress"){
			$where2 = array('id_siswa' => $this->session->userdata('id'));
			$data['siswa'] = $this->m_login->tampil_data("data_siswa",$where2)->result();

			$wheres=array('id_siswa'=> $this->session->userdata('id'));
			$datas['siswa'] = $this->m_login->auth("data_siswa",$wheres);
			$level = $datas['siswa']->level;
			$kelas = $datas['siswa']->kelas;
			$jurusan = $datas['siswa']->jurusan;
			$where = array('level' => $level, 'kelas' => $kelas,'status' => 'TIDAK SELESAI','waktu_mulai<=' => date('Y-m-d H:i:s', strtotime('+5 hour')), 'waktu_selesai>=' => date('Y-m-d H:i:s', strtotime('+5 hour')) );
			$data['soal'] = $this->m_login->tampil_data_tes("tes_online",$where,$jurusan)->result();
			$this->load->view('siswa/daftar_tes_soal',$data);
		}
		else{
			$xxx = $this->session->userdata('id_soal');
			//$xxx= 'Q-INGGRIS-1086335703594a303fdb3936.60177774';
			redirect("students/start_test/".$xxx);
		}
	}

	function test_list_fragment(){
		if($this->session->userdata('student_test') != "progress"){
			$where2 = array('id_siswa' => $this->session->userdata('id'));
			$data['siswa'] = $this->m_login->tampil_data("data_siswa",$where2)->result();

			$wheres=array('id_siswa'=> $this->session->userdata('id'));
			$datas['siswa'] = $this->m_login->auth("data_siswa",$wheres);
			$level = $datas['siswa']->level;
			$kelas = $datas['siswa']->kelas;
			$jurusan = $datas['siswa']->jurusan;
			$where = array('level' => $level, 'kelas' => $kelas,'status' => 'TIDAK SELESAI','waktu_mulai<=' => date('Y-m-d H:i:s', strtotime('+5 hour')), 'waktu_selesai>=' => date('Y-m-d H:i:s', strtotime('+5 hour')) );
			$data['soal'] = $this->m_login->tampil_data_tes("tes_online",$where,$jurusan)->result();
			$this->load->view('siswa/daftar_tes_soal_fragment',$data);
		}
		else{
			$xxx = $this->session->userdata('id_soal');
			redirect("students/start_test/".$xxx);
		}
	}

	function tutor_schedule(){
				$where2 = array('id_siswa' => $this->session->userdata('id'));
		$data['siswa'] = $this->m_login->tampil_data("data_siswa",$where2)->result();
		$where = array();
		$data['tutor'] = $this->m_login->tampil_data("data_guru",$where)->result();
		$this->load->view('siswa/jadwal_tutor',$data);
	}
	function offline_consultation(){
				$where2 = array('id_siswa' => $this->session->userdata('id'));
		$data['siswa'] = $this->m_login->tampil_data("data_siswa",$where2)->result();
		$where = array('id_siswa'=> $this->session->userdata('id'),  'tanggal>' => Date('y:m:d', strtotime("-30 days")));
		$data['konsul'] = $this->m_login->tampil_data("data_konsultasi_siswa",$where)->result();
		$this->load->view('siswa/konsultasi_offline',$data);

	}

	function offline_consultation_fragment(){
		$where = array('id_siswa'=> $this->session->userdata('id'),  'tanggal>' => Date('y:m:d', strtotime("-30 days")));
		$data['konsul'] = $this->m_login->tampil_data("data_konsultasi_siswa",$where)->result();
		$this->load->view('siswa/konsultasi_offline_fragment',$data);

	}

	function request_offline_consultation(){
		$data = array(
				'id_konsul' => date(Ymdhsa).uniqid(),
				'id_siswa'  => $this->session->userdata('id'),
				'pelajaran' => $this->input->post('subject'),
				'tanggal' => $this->input->post('date'),
				'jam' => $this->input->post('time'),
				'materi' => $this->input->post('topic'),
				'status_konsultasi' => 'BELUM DITERIMA',
				'tanggal_kirim' => date('Y-m-d H:i:s', strtotime('+5 hour'))
			);
		$this->m_login->insertData('data_konsultasi_siswa',$data);
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Permintaan Konsultasi Terkirim </div>');
		redirect(base_url('students/offline_consultation'));

	}

	function course_schedule(){
				$where2 = array('id_siswa' => $this->session->userdata('id'));
		$data['siswa'] = $this->m_login->tampil_data("data_siswa",$where2)->result();
		$where = array();
		$data['jadwal'] = $this->m_login->tampil_data("jadwal_bimbel",$where)->result();
		$this->load->view('siswa/jadwal_bimbel',$data);
	}

	function inbox_consultation_fragment(){
		$where = array('chats.receiver'=>$this->session->userdata('id'),'chats.status'=>'UNREAD');
		$data['chat2'] = $this->m_login->tampil_data_join2("chats",$where)->result();

		$where3 = array();
		$data['tutor'] = $this->m_login->tampil_data("data_guru",$where3)->result();

		$data['chat'] = $this->m_login->queri($this->session->userdata('id'))->result();
		$this->load->view('siswa/inbox_konsultasi_fragment',$data);
	}


	function score_list(){
		$where2 = array('id_siswa' => $this->session->userdata('id'));
		$data['siswa'] = $this->m_login->tampil_data("data_siswa",$where2)->result();


		$this->load->helper(array('url'));
		$this->load->model('pagination_model');

		$this->load->database();
		$jumlah_data = $this->pagination_model->total_data('data_ujian',$where2);
		$this->load->library('pagination');
		$config['base_url'] = base_url().'students/score_list/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$data['nilai'] = $this->pagination_model->datas($config['per_page'],$from,'data_ujian',$where2);
		$this->load->view('siswa/daftar_nilai',$data);
	}


	function inbox_consultation(){
		$where2 = array('id_siswa' => $this->session->userdata('id'));
		$data['siswa'] = $this->m_login->tampil_data("data_siswa",$where2)->result();
		
		$where = array('chats.receiver'=>$this->session->userdata('id'),'chats.status'=>'UNREAD');
		$data['chat2'] = $this->m_login->tampil_data_join2("chats",$where)->result();

		$where3 = array();
		$data['tutor'] = $this->m_login->tampil_data("data_guru",$where3)->result();

		$data['chat'] = $this->m_login->queri($this->session->userdata('id'))->result();
		$this->load->view('siswa/inbox_konsultasi',$data);
	}

	function update_password(){
	$id = $this->session->userdata('id');
	$old_password = crypt($this->input->post('old_password'),"madafaka");
	$password = crypt($this->input->post('password'),"madafaka");
	$retype_new_password =crypt($this->input->post('retype_new_password'),"madafaka");


	$where = array(
		'id_siswa' => $id
	);

	$data['siswa'] = $this->m_login->auth("data_siswa",$where);
	if($old_password==$data['siswa']->password){
		if(strcmp($password,$retype_new_password)==0){
				$datas = array(
					'password' => $password
				);
					$this->m_login->update_data($where,$datas,'data_siswa');
					$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Password Berhasil DiUpdate!!!</div>');
					redirect('students/profile');
		}
		else{
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> Ketik Ulang Password Salah!!!</div>');
			redirect('students/edit_password');
		}
	}
	else{
	$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Password Lama Anda Salah!!!</div>');
	redirect('students/edit_password');
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
			$upload_path = '/assets/elearning/img/students_uploads/';
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
					'id_siswa' => $this->session->userdata('id')
					);

					$this->m_login->update_data($where,$data,'data_siswa');
					$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Foto Berhasil di Update!!!</div>');
			}
			
			//load the view/upload.php
			redirect('students/profile');
	}
	function delete_account(){
		$where = array(
			'id_siswa' => $this->session->userdata('id')
			);
		$this->m_login->delete_data('data_siswa',$where);
		$this->session->sess_destroy();
		redirect(base_url('students'));
	}

	function delete_photo(){
		$data = array(
			'foto' => '/assets/elearning/img/ui-sam.jpg'
			);
		$where = array(
			'id_siswa' => $this->session->userdata('id')
			);

		$datas['siswa'] = $this->m_login->auth("data_siswa",$where);
		$pathfoto = ".".$datas['siswa']->foto;

		if(unlink($pathfoto)){
		$this->m_login->update_data($where,$data,'data_siswa');
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Foto Berhasil di Hapus!!!</div>');
		redirect('students/profile');
		}
		else{
			$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Foto Berhasil di Hapus!!!</div>');
		redirect('students/profile');
		}
	}

	function update_profile(){
		$username = $this->input->post('username');
		$expl = explode(" ", $this->input->post('grade'));
	$id = $this->input->post('id_siswa');
	$nama_depan = $this->input->post('fname');
	$nama_belakang = $this->input->post('lname');
	$tempat_lahir = $this->input->post('place_birth');
	$tanggal_lahir = $this->input->post('date_birth');
	$alamat = $this->input->post('address');
	$jurusan = $this->input->post('major');
	$telepon = $this->input->post('phone');
	$link_modul = $expl[0];
	$kelas = $expl[1];
	$level = $expl[2];
	$jenis_kelamin = $this->input->post('gender');
	$sekolah = $this->input->post('school');
	$data = array(
		'username' => $username,
		'nama_depan' => $nama_depan,
		'nama_belakang' => $nama_belakang,
		'tempat_lahir' => $tempat_lahir,
		'tanggal_lahir' => $tanggal_lahir,
		'alamat' => $alamat,
		'telepon' => $telepon,
		'level' => $level,
		'link_modul' => $link_modul,
		'kelas' => $kelas,
		'jurusan' => $jurusan,
		'sekolah' => $sekolah,
		'jenis_kelamin' => $jenis_kelamin
	);

	$where = array(
		'id_siswa' => $id
	);

	$this->m_login->update_data($where,$data,'data_siswa');
	$this->session->unset_userdata('nama');
	$this->session->set_userdata('nama' , $username);
	$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Profil Berhasil di Update!!!</div>');
	redirect('students/profile');
}
//=============================================================================
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
			'id_tutor' => $username,
			'status' => "SUDAH"
			);
	$data['tes'] = $this->m_login->auth2("data_guru",$where);
	$usernamedb = $data['tes']->id_tutor ;

	if($usernamedb == "undefined" || $usernamedb ==""){
		redirect('students');
	}
	else{
		$data = array(
			'status'=>'READ'
			);
		 $where = array('chats.receiver'=>$this->session->userdata('id'), 'chats.sender'=>$username);
			$this->m_login->update_data_join2("chats",$data,$where);      
		    $where = array('id_tutor' => $username);
			$data['tutor'] = $this->m_login->tampil_data('data_guru',$where)->result();
						$where2 = array('id_siswa' => $this->session->userdata('id'));
				$data['siswa'] = $this->m_login->tampil_data("data_siswa",$where2)->result();
		    $this->load->view('siswa/chat_siswa',$data);
	}
  }

public function konsul_hapus($username = "undefined") {       
    $data = array(
	'status'=>'READ'
	);
 $where = array('chats.receiver'=>$this->session->userdata('id'), 'chats.sender'=>$username);
	$this->m_login->update_data_join2("chats",$data,$where);      
    $where = array('id_tutor' => $username);
    $data['siswa'] = $this->m_login->tampil_data("data_guru",$where)->result();
    redirect('students/inbox_consultation');
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
    echo "[{\"time\":" +  time() + "}]";
  }
  
}

?>