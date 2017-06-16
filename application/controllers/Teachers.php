<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers extends CI_Controller {

 
	function __construct(){
		parent::__construct();

		$this->load->model('m_login');
        $this->load->helper('url');

		if($this->session->userdata('status_tutor') != "login"){
			redirect(base_url("teachers_login"));
		}
	}
 
	function index(){
		$where = array('status'=>'UNFINISHED','tanggal_selesai >'=> date("Y-m-d"),'penerima'=>'TUTOR');
		$data['info'] = $this->m_login->tampil_data("pengumuman",$where)->result();
		$this->load->view('guru/index',$data);
	}

	function profile(){
		$where = array(
			'id_tutor' => $this->session->userdata('id')
			);
		$data['tutor'] = $this->m_login->tampil_data("tutor",$where)->result();
		$this->load->view('guru/profil',$data);
	}
  
}

?>