<?php 
//===============================================================================================//beforelogin 
class m_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}

	public function auth($table,$where)
	{
    $this->db->select('id_siswa,username,password,level,kelas');
    $q1 = $this->db->get_where($table,$where);
    return $q1->row();
	}
	public function auth2($table,$where)//for tutor
	{
    $this->db->select('id_tutor,username,password');
    $q1 = $this->db->get_where($table,$where);
    return $q1->row();
	}
//===============================================================================================//afterlogin
	function tampil_data($table,$where){
		return $this->db->get_where($table, $where);
	}	

	function decry_pass($table,$where){
		$this->db->select(' password ');
		$this->db->from($table);
		$this->db->where($where);
		return $this->encrypt->decode($this->db->get());
	}	



	function insertData($table,$data)
    {
		return $this->db->insert($table, $data);
	}


	
	function edit_data($where,$table){		
	return $this->db->get_where($table,$where);
	}


	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
}

?>