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

	public function cek_tes($table,$where)//for tutor
	{
    $this->db->select('*');
    $q1 = $this->db->get_where($table,$where);
    return $q1->num_rows();
	}

	public function auth_jawaban_test($table,$where)//for tes siswa
	{
    $this->db->select('jawaban');
    $q1 = $this->db->get_where($table,$where)->result_array();
    $arr = array();
    foreach ($q1 as $row)
		{
		    $arr[]=$row['jawaban'];

		}
		return $arr;
	}
//===============================================================================================//afterlogin
	function tampil_data($table,$where){
		return $this->db->get_where($table, $where);
	}	

	function delete_data($table,$where){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function decry_pass($table,$where){
		$this->db->select(' password ');
		$this->db->from($table);
		$this->db->where($where);
		return $this->encrypt->decode($this->db->get());
	}	

	function tampil_data_join($table,$where){
		$this->db->select(' * ');
		$this->db->from($table);
		$this->db->join('siswa', 'siswa.username = chats.sender');
		$this->db->where($where);
		$this->db->order_by("time","desc");
		$this->db->limit(4);
		return $this->db->get();
	}	

	function insertData($table,$data)
    {
		return $this->db->insert($table, $data);
	}

	function tampil_data_join_soal_siswa($table,$where){
		$this->db->select(' * ');
		$this->db->from($table);
		$this->db->join('tes_online', 'tes_online.id_soal = soal_test.id_soal');
		$this->db->where($where);
		//$this->db->order_by("time","desc");
		//$this->db->limit(4);
		return $this->db->get();
	}	

	function tampil_data_join2($table,$where){
		$this->db->select(' * ');
		$this->db->from($table);
		$this->db->join('tutor', 'tutor.username = chats.sender');
		$this->db->where($where);
		$this->db->order_by("time","desc");
		$this->db->limit(4);
		return $this->db->get();
	}	

	function edit_data($where,$table){		
	return $this->db->get_where($table,$where);
	}

	function update_data_join($table,$data,$where){
		$this->db->join('siswa', 'siswa.username = chats.sender');
		$this->db->where($where);
		$this->db->from($table);
		$this->db->update($table,$data);
	}	

	function update_data_join2($table,$data,$where){
		$this->db->join('tutor', 'tutor.username = chats.sender');
		$this->db->where($where);
		$this->db->from($table);
		$this->db->update($table,$data);
	}	

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
}

?>