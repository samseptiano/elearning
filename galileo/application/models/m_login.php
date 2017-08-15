<?php 
//===============================================================================================//beforelogin 
class m_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}

	public function auth($table,$where)
	{
    $this->db->select('id_siswa,username,password,level,jurusan,kelas,foto,email,token');
    $q1 = $this->db->get_where($table,$where);
    return $q1->row();
	}
	public function auth2($table,$where)//for tutor
	{
    $this->db->select('id_tutor,username,password,foto,email,token,level,bidang');
    $q1 = $this->db->get_where($table,$where);
    return $q1->row();
	}

	public function cek_tes($table,$where)//for tutor
	{
    $this->db->select('id_soal');
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

	public function id_soal($table,$where)
	{
    $this->db->select('*');
    $q1 = $this->db->get_where($table,$where);
    return $q1->row();
	}
//===============================================================================================//afterlogin
	function tampil_data($table,$where){
		return $this->db->get_where($table, $where);
	}

	function tampil_data_reminder_guru($table,$where,$penerima){
		$this->db->select("*");
		$this->db->from($table);
		$this->db->where($where);
		$this->db->group_start();
		$this->db->where('penerima','GURU');
		$this->db->or_where('penerima',$penerima);
		$this->db->group_end();
		return $this->db->get();
	}
	function tampil_data_reminder_siswa($table,$where,$penerima){
		$this->db->select("*");
		$this->db->from($table);
		$this->db->where($where);
		$this->db->group_start();
		$this->db->where('penerima','SISWA');
		$this->db->or_where('penerima',$penerima);
		$this->db->group_end();
		return $this->db->get();
	}

	function tampil_data_tes($table,$where,$jurusan){
		$this->db->select("*");
		$this->db->from($table);
		$this->db->where($where);
		$this->db->group_start();
		$this->db->where('jurusan','GENERAL');
		$this->db->or_where('jurusan',$jurusan);
		$this->db->group_end();
		return $this->db->get();
	}

	function tampil_data2($table,$where){
		$this->db->order_by("online","desc");
		return $this->db->get_where($table, $where);
	}

	function insertData($table,$data)
    {
		return $this->db->insert($table, $data);
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
		$this->db->select('count(chats.message) as message, chats.sender ');
		$this->db->from($table);
		$this->db->join('data_siswa', 'data_siswa.id_siswa = chats.sender');
		$this->db->where($where);
		$this->db->order_by("MAX(time)","desc");
		$this->db->group_by('chats.sender');
		//$this->db->limit(1);
		return $this->db->get();
	}

	function queri($receiver){
		return $this->db->query("SELECT tt.*
								FROM chats tt
								INNER JOIN
								    (SELECT sender, MAX(time) AS MaxTime, message, receiver
								    FROM chats where receiver = '".$receiver."' 
								    GROUP BY sender) groupedtt 
								ON tt.sender = groupedtt.sender 
								AND tt.time = groupedtt.MaxTime
								where tt.receiver = '".$receiver."' and tt.status = 'UNREAD' order by groupedtt.MaxTime desc ");
	}

	function join_data_nilai($table,$where){
		$this->db->select('data_ujian.id_siswa ,data_ujian.nilai, data_ujian.waktu ,data_ujian.kelas, data_ujian.level, data_ujian.id_soal,data_ujian.kategori');
		$this->db->from($table);
		$this->db->join('tipe_soal', 'tipe_soal.id_soal = data_ujian.id_soal');
		$this->db->where($where);
		$this->db->group_by('data_ujian.id_soal');
		//$this->db->order_by("data_ujian.waktu","desc");
		//$this->db->limit(4);
		return $this->db->get();
	}

	function join_data_nilai_detail($table,$where){
		$this->db->select('data_ujian.id_siswa ,data_ujian.nilai, data_ujian.waktu ,data_ujian.kelas, data_ujian.level, data_ujian.id_soal, data_siswa.nama_depan,data_siswa.nama_belakang,data_siswa.username, tipe_soal.pelajaran, tipe_soal.id_soal,tipe_soal.id_tutor,data_ujian.kategori, data_guru.username as tutor_user');
		$this->db->from($table);
		$this->db->join('tipe_soal', 'tipe_soal.id_soal = data_ujian.id_soal');
		$this->db->join('data_siswa', 'data_ujian.id_siswa = data_siswa.id_siswa');
		$this->db->join('data_guru', 'tipe_soal.id_tutor = data_guru.id_tutor');
		$this->db->where($where);
		//$this->db->group_by('data_ujian.id_soal');
		$this->db->order_by("data_ujian.waktu","desc");
		//$this->db->limit(4);
		return $this->db->get();
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
		$this->db->select('count(chats.message) as message, chats.sender');
		$this->db->from($table);
		$this->db->join('data_guru', 'data_guru.id_tutor = chats.sender');
		$this->db->where($where);
		$this->db->order_by("MAX(time)","desc");
		$this->db->group_by('chats.sender');
		//$this->db->limit(1);
		return $this->db->get();
	}	

	function edit_data($where,$table){		
	return $this->db->get_where($table,$where);
	}

	function update_data_join($table,$data,$where){
		$this->db->join('data_siswa', 'data_siswa.id_siswa = chats.sender');
		$this->db->where($where);
		$this->db->from($table);
		$this->db->update($table,$data);
	}	

	function update_data_join2($table,$data,$where){
		$this->db->join('data_guru', 'data_guru.id_tutor = chats.sender');
		$this->db->where($where);
		$this->db->from($table);
		$this->db->update($table,$data);
	}	

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	
function tampil_excel($table){
	$query = $this->db->get($table);
	return $query->result_array();
}

}
?>