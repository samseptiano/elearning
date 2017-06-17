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
		$from_email = 'informasi@galileogasing.com';
		$subject = 'Verifikasi Email Anda';
		$message = 'Hai Pengguna,<br /><br />Silahkan klik link dibawah ini untuk verifikasi email anda.<br /><br /> http://www.testing.com/user/verify/' . md5($to_email) . '<br /><br /><br />Terima kasih<br />Galileo Gasing';
		
		//configure email settings
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.localhost.com'; //smtp host name
		$config['smtp_port'] = '465'; //smtp port number
		$config['smtp_user'] = $from_email;
		$config['smtp_pass'] = ''; //$from_email password
		$config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['newline'] = "\r\n"; //use double quotes
		$this->email->initialize($config);
		
		//send mail
		$this->email->from($from_email, 'GalileoGasing');
		$this->email->to($to_email);
		$this->email->subject($subject);
		$this->email->message($message);
		return $this->email->send();
	}
	
	//activate user account
	function verifyEmailID($key)
	{
		$data = array('status' => 1);
		$this->db->where('md5(email)', $key);
		return $this->db->update('siswa', $data);
	}
}