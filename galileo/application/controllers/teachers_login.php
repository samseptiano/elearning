<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class teachers_login extends CI_Controller {


	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');

	}
	function hE986KqwJXSVE6ug(){
		if(date('Y/m/d') < "2018/04/31"){
        	redirect('teachers');
        }
        else{
		$this->load->view('001313790acbe0e5bb0ed4db5b462f17/lock_screen');
		}
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
			'status' => "SUDAH"
			);
		//$cek = $this->m_login->cek_login("data_guru",$where)->num_rows();
		$data['tutor'] = $this->m_login->auth2("data_guru",$where);
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
			$this->m_login->update_data($where,$ol,"data_guru");
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
		$where = array(
			'email' => $email
			);
		$cek = $this->m_login->tampil_data("data_guru",$where)->num_rows();
		if($cek > 0){
					$token = md5($email);
					$data = array(
							'token' => $token
						);
					$where = array(
						'email' => $email
						);
					$this->m_login->update_data($where,$data,'data_guru');

					$config = Array(
						  'protocol' => 'smtp',
						  'smtp_host' => 'ssl://smtp.googlemail.com',
						  'smtp_port' => 465,
						  'smtp_user' => 'jancong45@gmail.com', // change it to yours
						  'smtp_pass' => '', // change it to yours
						  'mailtype' => 'html',
						  'charset' => 'iso-8859-1',
						  'wordwrap' => TRUE
						);


					 $message = 'Hai Pengguna, <br /><br />Silahkan klik link dibawah ini untuk reset password anda.<br /><br /> '.base_url().
					'teachers_login/reset_password/'. md5($email) . '<br /><br /><br />Terima kasih<br />Galileo Gasing';
			          $this->load->library('email', $config);
				      $this->email->set_newline("\r\n");
				      $this->email->from('jancong45@gmail.com'); // change it to yours
				      $this->email->to($email);// change it to yours
				      $this->email->subject('Permintaan Reset Password Akun');
				      $this->email->message($message);
				      if($this->email->send())
				     {
				      $this->load->view('guru/email_sent');
				     }
				     else
				    {
				     show_error($this->email->print_debugger());
				    }
				}
				else{
					$this->session->set_flashdata('err_message', '<div class="alert alert-danger text-center">Oops!. Email Anda Tidak Terdaftar!!!</div>');
					redirect('teachers_login');
				}
	}

	function reset_password($token="undefined"){
		$where = array(
			'token'=>$token
			);
		$cek = $this->m_login->tampil_data("data_guru",$where)->num_rows();
		if($cek > 0){
			$this->load->view('guru/password_reset');

		}
		else{
			redirect('teachers_login');
		}
		

	}

	function update_password(){
		$token = $this->input->post('token');
		$password = $this->input->post('password');
		$where = array(
			'token'=> $token
			);
		$data = array(
			'password' => crypt($password,"madafaka"),
			'token' => ""
			);
		$this->m_login->update_data($where,$data,'data_guru');
		redirect('teachers_login');
	}


	function logout(){
		$where = array(
			'id_tutor' => $this->session->userdata('id'),
			'status' => "SUDAH"
			);
		$ol = array(
				'online'=>'NO'
			);
		$this->m_login->update_data($where,$ol,"data_guru");
		$this->session->sess_destroy();
		redirect(base_url('teachers'));
	}

}
