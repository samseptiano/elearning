
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {
 
	function __construct(){
		parent::__construct();
		$this->load->model('m_login');;
        $this->load->helper('url');

		if($this->session->userdata('status_siswa') != "login"){
			redirect(base_url("students_login"));
		}
	}
 
	function index(){
		$where = array('status'=>'UNFINISHED','tanggal_selesai >'=> date("Y-m-d"),'penerima'=>'SISWA');
		$data['info'] = $this->m_login->tampil_data("pengumuman",$where)->result();
		$this->load->view('siswa/index',$data);

	}

	function profile(){
		$where = array(
			'id_siswa' => $this->session->userdata('id')
			);
		$data['siswa'] = $this->m_login->tampil_data("siswa",$where)->result();
		$this->load->view('siswa/profil',$data);
	}


}

?>