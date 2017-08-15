<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class students_login extends CI_Controller {

	function __construct(){
		parent::__construct();	
		$this->load->library('encrypt');	
		$this->load->model('m_login');
		//$this->load->library('email');	

	}

	function hE986KqwJXSVE6ug(){
		if(date('Y/m/d') < "2018/04/31"){
        	redirect('students');
        }
        else{
		$this->load->view('001313790acbe0e5bb0ed4db5b462f17/lock_screen');
		}
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
			'status' => "SUDAH"
			);

		//$cek = $this->m_login->cek_login("siswa",$where)->num_rows();
		$data['siswa'] = $this->m_login->auth("data_siswa",$where);
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
			$this->m_login->update_data($where,$ol,"data_siswa");
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
		$where = array(
			'email' => $email
			);
		$cek = $this->m_login->tampil_data("data_siswa",$where)->num_rows();
		if($cek > 0){
				$token = md5($email);
				$data = array(
						'token' => $token
					);
				$where = array(
					'email' => $email
					);
				$this->m_login->update_data($where,$data,'data_siswa');

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


				 $message = 'Hai Pengguna, <br /><br />Silahkan klik link dibawah ini untuk reset password anda.<br /><br />'.base_url().
				'students_login/reset_password/'. md5($email) . '<br /><br /><br />Terima kasih<br />Galileo Gasing';
		          $this->load->library('email', $config);
			      $this->email->set_newline("\r\n");
			      $this->email->from('jancong45@gmail.com'); // change it to yours
			      $this->email->to($email);// change it to yours
			      $this->email->subject('Permintaan Reset Password Akun');
			      $this->email->message($message);
			      if($this->email->send())
			     {
			      $this->load->view('siswa/email_sent');
			     }
			     else
			    {
			     show_error($this->email->print_debugger());
			    }
			}
			else{
				$this->session->set_flashdata('err_message', '<div class="alert alert-danger text-center">Oops!. Email Anda Tidak Terdaftar!!!</div>');
				redirect('students_login');
			}
	}

	function reset_password($token="undefined"){
		$where = array(
			'token'=>$token
			);
		$cek = $this->m_login->tampil_data("data_siswa",$where)->num_rows();
		if($cek > 0){
			$this->load->view('siswa/password_reset');

		}
		else{
			redirect('students_login');
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
		$this->m_login->update_data($where,$data,'data_siswa');
		redirect('students_login');
	}


	function logout(){
		$where = array(
			'id_siswa' => $this->session->userdata('id'),
			'status' => "SUDAH"
			);
		$ol = array(
				'online'=>'NO'
			);
		$this->m_login->update_data($where,$ol,"data_siswa");
		$this->session->sess_destroy();
		redirect(base_url('students'));
	}

}
