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
	
	
}