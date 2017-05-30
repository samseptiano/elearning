<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("students_login"));
		}
	}
 
	function index(){
		$this->load->view('siswa/index');
	}
}

?>