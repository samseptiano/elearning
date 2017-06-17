<?php
class teachers_register extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->database();
		$this->load->model('m_register');
	}
	
	function index()
	{
		$this->load->view('guru/register');
	}

	function check_availability_username(){
		$username = $this->input->post('username');
		if($username != ""){
			$where = array(
			'username' => $username
			);
		  $user_count = $this->m_register->checkAvailData("tutor",$where)->num_rows();

		if($user_count > 0) {
		     //s $this->session->set_flashdata('usrnm_msg','Username Sudah Ada!!!');
		      echo "<span class='status-not-available' style='color:red' > Username Sudah Digunakan.</span>";
		     //redirect(base_url("students_register"));
		  }
		else{
		      //$this->session->set_flashdata('usrnm_msg','Username Tersedia!!!');
		      echo "<span class='status-available' style='color:green' > Username Tersedia!.</span>";
		      //redirect(base_url("students_register"));
		  }
		}
		else{
			//echo "<span class='status-available' style='color:green' > Email Kosong!.</span>";
		}
	}

	function check_availability_email(){
		$email = $this->input->post('email');
		if($email != ""){
			$where = array(
			'email' => $email
			);
		  $user_count = $this->m_register->checkAvailData("tutor",$where)->num_rows();

		if($user_count > 0) {
		      echo "<span class='status-not-available' style='color:red' > Email Sudah Digunakan!.</span>";
		  }
		else{
		      echo "<span class='status-available' style='color:green' > Email Tersedia!.</span>";
		  }
		}
		else{
			//echo "<span class='status-available' style='color:green' > Email Kosong!.</span>";
		}
	}

	 private function cekAvailable(){
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		
		$where = array(
			'username' => $username,
			'email' => $email
			);
		$cek = $this->m_register->checkAvailData("tutor",$where)->num_rows();
		return $cek;
	}

    function register()
    {
			//insert the user registration details into database
			$data = array(
				'id_tutor'  => "T-".time().uniqid(),
				'username' => $this->input->post('username'),
				'password' => crypt($this->input->post('password'),"madafaka"),
				'nama_depan' => $this->input->post('first_name'),
				'nama_belakang' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'bidang' => $this->input->post('subject'),
				'alamat' => $this->input->post('address'),
				'tempat_lahir' => $this->input->post('place_birth'),
				'tanggal_lahir' => $this->input->post('date_birth'),
				'kelas' => $this->input->post('grade'),
				'telepon' => $this->input->post('phone'),
				'jenis_kelamin' => $this->input->post('gender'),
				'tanggal_daftar' => date('Y-m-d H:i:s'),
				'status' => "not verified"
			);
			$cek = $this -> cekAvailable();
			if($cek < 1){
				if ($this->m_register->insertUser("tutor",$data))
				{
					// send email
					if ($this->m_register->sendEmail($this->input->post('email')))
					{
						// successfully sent mail
						$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Registrasi sukses, silahkan cek email anda untuk verifikasi!!!</div>');
						redirect(base_url("teachers_register"));
					}
					else
					{
						// error
						$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Terjadi Kesalahan. Email tidak terdaftar atau sudah digunakan!!!</div>');
						redirect(base_url("teachers_register"));
					}
				}
				else
				{
					// error
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Terjadi kesalahan saat registrasi!!!</div>');
					redirect(base_url("teachers_register"));
				}
			}
			else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Email atau username anda sudah digunakan!!!</div>');
					redirect(base_url("teachers_register"));
			}
		}
	
	function verify($hash=NULL)
	{
		if ($this->user_model->verifyEmailID($hash))
		{
			$this->session->set_flashdata('verify_msg','<div class="alert alert-success text-center">Your Email Address is successfully verified! Please login to access your account!</div>');
			redirect('user/register');
		}
		else
		{
			$this->session->set_flashdata('verify_msg','<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
			redirect('user/register');
		}
	}
}