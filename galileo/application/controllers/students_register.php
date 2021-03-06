<?php
class students_register extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->database();
		$this->load->model('m_register');
		$this->load->library('encrypt');
	}
	
	function index()
	{
		if($this->session->userdata('status_siswa') == "login"){
			redirect(base_url("students"));
		}
		else{
		$this->load->view('siswa/register');
		}
	}

	function check_availability_username(){
		$username = $this->input->post('username');
		if($username != "" && $username != $this->session->userdata('nama')){
			$where = array(
			'username' => $username
			);
		  $user_count = $this->m_register->checkAvailData("data_siswa",$where)->num_rows();

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
		$this->load->helper('email');
		$email = $this->input->post('email');
		if($email != ""){
				if(valid_email($email)){
						$where = array(
						'email' => $email
						);
					  $user_count = $this->m_register->checkAvailData("data_siswa",$where)->num_rows();

					if($user_count > 0) {
					      echo "<span class='status-not-available' style='color:red' > Email Sudah Digunakan!.</span>";
					  }
					else{
					      echo "<span class='status-available' style='color:green' > Email Tersedia!.</span>";
					  }
				}
				else{
					echo "<span class='status-available' style='color:red' > Email Tidak Valid!.</span>";
				}
				
		}
		else{
			//echo "<span class='status-available' style='color:green' > Email Kosong atau Tidak Valid!.</span>";
		}
	}

	 private function cekAvailable(){
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		
		$where = array(
			'username' => $username,
			'email' => $email
			);
		$cek = $this->m_register->checkAvailData("data_siswa",$where)->num_rows();
		return $cek;
	}

    function register()
    {
    	$expl = explode(" ",$this->input->post('grade'));

			//insert the user registration details into database
    		if($expl[2] =='SD')
    		{
				$data = array(
					'id_siswa'  => "S-".time().uniqid(),
					'kd_level' => $expl[2]."-123456",
					'username' => $this->input->post('username'),
					'password' => crypt($this->input->post('password'),"madafaka"),
					'nama_depan' => $this->input->post('first_name'),
					'nama_belakang' => $this->input->post('last_name'),
					'email' => $this->input->post('email'),
					'alamat' => $this->input->post('address'),
					'tempat_lahir' => $this->input->post('place_birth'),
					'tanggal_lahir' => $this->input->post('date_birth'),
					'level' =>$expl[2],
					'kelas' => $expl[1],
					'jurusan' => $this->input->post('major'),
					'sekolah' => $this->input->post('school'),
					'telepon' => $this->input->post('phone'),
					'jenis_kelamin' => $this->input->post('gender'),
					'tanggal_daftar' => date('Y-m-d H:i:s', strtotime('+5 hour')),
					'status' => "BELUM",
					'token' => '',
					'link_modul' => $expl[0],
					'foto' => '/assets/elearning/img/ui-sam.jpg'
				);
			}
			else
			{
				$data = array(
					'id_siswa'  => "S-".time().uniqid(),
					'kd_level' => $expl[2]."-123",
					'username' => $this->input->post('username'),
					'password' => crypt($this->input->post('password'),"madafaka"),
					'nama_depan' => $this->input->post('first_name'),
					'nama_belakang' => $this->input->post('last_name'),
					'email' => $this->input->post('email'),
					'alamat' => $this->input->post('address'),
					'tempat_lahir' => $this->input->post('place_birth'),
					'tanggal_lahir' => $this->input->post('date_birth'),
					'level' =>$expl[2],
					'kelas' => $expl[1],
					'jurusan' => $this->input->post('major'),
					'sekolah' => $this->input->post('school'),
					'telepon' => $this->input->post('phone'),
					'jenis_kelamin' => $this->input->post('gender'),
					'tanggal_daftar' => date('Y-m-d H:i:s', strtotime('+5 hour')),
					'status' => "BELUM",
					'token' => '',
					'link_modul' => $expl[0],
					'foto' => '/assets/elearning/img/ui-sam.jpg'
				);
			}
			$cek = $this -> cekAvailable();
			if($cek < 1){
				if ($this->m_register->insertUser("data_siswa",$data))
				{
					// send email
					if ($this->m_register->sendEmail($this->input->post('email')))
					{
						// successfully sent mail
						$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Registrasi sukses, silahkan cek email anda untuk verifikasi!!!</div>');
						redirect(base_url("students_register"));
					}
					else
					{
						// error
						//$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Terjadi Kesalahan. Email tidak terdaftar atau sudah digunakan!!!</div>');

						$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Registrasi sukses!!!</div>');
						redirect(base_url("students_register"));
					}
				}
				else
				{
					// error
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Terjadi kesalahan saat registrasi!!!</div>');
					redirect(base_url("students_register"));
				}
			}
			else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Email atau username anda sudah digunakan!!!</div>');
					redirect(base_url("students_register"));
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