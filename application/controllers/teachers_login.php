<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class teachers_login extends CI_Controller {


	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');

	}

	function index(){
		if($this->session->userdata('status_tutor') == "login"){
			redirect(base_url("teachers"));
		}
		else{
		$this->load->view('guru/login');
		}
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = crypt($this->input->post('password'),"madafaka");
		$where = array(
			'username' => $username,
			'status' => "verified"
			);
		//$cek = $this->m_login->cek_login("tutor",$where)->num_rows();
		$data['tutor'] = $this->m_login->auth2("tutor",$where);
		$usernamedb = $data['tutor']->username ;
		$passworddb = $data['tutor']->password ;
		if($usernamedb == $username && $passworddb == $password){

			$data_session = array(
				'nama' => $username,
				'id' => $data['tutor']->id_tutor,
				'status_tutor' => "login"
				);
			$ol = array(
				'online'=>'YES'
			);
			$this->m_login->update_data($where,$ol,"tutor");
			$this->session->set_userdata($data_session);

			redirect(base_url("teachers"));

		}
		else{
			$this->session->set_flashdata('err_message', '<div class="alert alert-danger text-center">Oops!. username atau password anda salah!!!</div>');
			redirect(base_url("teachers_login"));
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
		$this->m_login->update_data($where,$data,'tutor');

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
			'id_tutor' => $this->session->userdata('id'),
			'status' => "verified"
			);
		$ol = array(
				'online'=>'NO'
			);
		$this->m_login->update_data($where,$ol,"tutor");
		$this->session->sess_destroy();
		redirect(base_url('teachers'));
	}

}
