<?php
class m_register extends CI_Model
{
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	//insert into user table
	function insertUser($table,$data)
    {
		return $this->db->insert($table, $data);
	}
	
	//check 
	function checkAvailData($table,$where){
		return $this->db->get_where($table,$where);
	}
	
	//send verification email to user's email id
	function sendEmail($to_email)
	{
		
	}
	
	//activate user account
	function verifyEmailID($key)
	{
		$data = array('status' => 1);
		$this->db->where('md5(email)', $key);
		return $this->db->update('data_siswa', $data);
	}
}