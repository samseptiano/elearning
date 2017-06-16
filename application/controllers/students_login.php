<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class students_login extends CI_Controller {

	function __construct(){
		parent::__construct();	
		$this->load->library('encrypt');	
		$this->load->model('m_login');
		$this->load->library('email');	

	}

	function index(){
		if($this->session->userdata('status_siswa') == "login"){
			redirect(base_url("students"));
		}
		else{
		$this->load->view('siswa/login');
		}
	}

	function aksi_login(){
		//$key = "12345678901234567890123456789012";
		$username = $this->input->post('username');
		$password = crypt($this->input->post('password'),"madafaka");
		$where = array(
			'username' => $username,
			'status' => "verified"
			);

		//$cek = $this->m_login->cek_login("siswa",$where)->num_rows();
		$data['siswa'] = $this->m_login->auth("siswa",$where);
		$usernamedb = $data['siswa']->username ;
		$passworddb = $data['siswa']->password ;
		if($usernamedb == $username && $passworddb == $password){

			$data_session = array(
				'nama' => $username,
				'id' => $data['siswa']->id_siswa, 
				'status_siswa' => "login"
				);
			$ol = array(
				'online'=>'YES'
			);
			$this->m_login->update_data($where,$ol,"siswa");
			$this->session->set_userdata($data_session);

			redirect(base_url("students"));

		}
		else{
			$this->session->set_flashdata('err_message', '<div class="alert alert-danger text-center">Oops!. username/password anda salah atau belum terdaftar!!!</div>');
			redirect(base_url("students_login"));
		}
	}

	function forgot_password(){
		$email = $this->input->post('email');
		$token = md5($email);
		$data = array(
				'token' => $token
			);
		$where = array(
			'email' => $email
			);
		$this->m_login->update_data($where,$data,'siswa');

		$to = $email;
		$from = "infogalileo@gmail.com";

		$msg = 'Hai Pengguna,<br /><br />Silahkan klik link dibawah ini untuk verifikasi email anda.<br /><br /> '.base_url().
		'students_login/reset_password/'. md5($email) . '<br /><br /><br />Terima kasih<br />Galileo Gasing';
		$headers = 'From: '.$from."\r\n".
			'Reply-To: '.$from."\r\n" .
			'X-Mailer: PHP/' . phpversion();
		$subject = "Reset Password";
		if (mail($to, $subject, $msg,$headers)) {
		   echo("<p>Email successfully sent!</p>");
		  } else {
		   echo("<p>Email delivery failed…</p>");
		  }
		//$this->email->from("sammuel.septiano@gmail.com" , 'Galileo');
      	//$this->email->to($email); 
      	//$this->email->subject('Runnable CodeIgniter Email Example');
      	//$this->email->message('Hello from Runnable CodeIgniter Email Example App!');
      	 //$this->email->send();
	}


	function logout(){
		$where = array(
			'id_siswa' => $this->session->userdata('id'),
			'status' => "verified"
			);
		$ol = array(
				'online'=>'NO'
			);
		$this->m_login->update_data($where,$ol,"siswa");
		$this->session->sess_destroy();
		redirect(base_url('students'));
	}

}
