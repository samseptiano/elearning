<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class students_login extends CI_Controller {


	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');

	}

	function index(){
		$this->load->view('siswa/login');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
			);
		$cek = $this->m_login->cek_login("siswa",$where)->num_rows();
		if($cek > 0){

			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("students"));

		}else{
			$this->session->set_flashdata('err_message', 'username atau password anda salah!');
			redirect(base_url("students_login"));
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('students'));
	}

}
