<?php 
 
class pagination_model extends CI_Model{
	function data($number,$offset,$table,$where){
		$this->db->select('data_ujian.id_siswa ,data_ujian.nilai, data_ujian.waktu ,data_ujian.kelas, data_ujian.level, data_ujian.id_soal, data_siswa.nama_depan,data_siswa.nama_belakang,data_siswa.username, tipe_soal.pelajaran, tipe_soal.id_soal,tipe_soal.id_tutor,data_ujian.kategori,data_ujian.jurusan , data_guru.username as data_guru');
		$this->db->from($table);
		$this->db->join('tipe_soal', 'tipe_soal.id_soal = data_ujian.id_soal');
		$this->db->join('data_siswa', 'data_ujian.id_siswa = data_siswa.id_siswa');
		$this->db->join('data_guru', 'tipe_soal.id_tutor = data_guru.id_tutor');
		$this->db->where($where);
		$this->db->order_by("data_ujian.waktu","desc");
		$this->db->limit($number,$offset);
		//$this->db->group_by('data_ujian.id_soal');
		return $query = $this->db->get()->result();		
	}
 
	function jumlah_data($table,$where){
		$this->db->select('data_ujian.id_siswa ,data_ujian.nilai, data_ujian.waktu ,data_ujian.kelas, data_ujian.level, data_ujian.id_soal, data_siswa.nama_depan,data_siswa.nama_belakang,data_siswa.username, tipe_soal.pelajaran, tipe_soal.id_soal,tipe_soal.id_tutor,data_ujian.kategori, data_guru.username as tutor_user');
		$this->db->from($table);
		$this->db->join('tipe_soal', 'tipe_soal.id_soal = data_ujian.id_soal');
		$this->db->join('data_siswa', 'data_ujian.id_siswa = data_siswa.id_siswa');
		$this->db->join('data_guru', 'tipe_soal.id_tutor = data_guru.id_tutor');
		$this->db->where($where);
		//$this->db->group_by('data_ujian.id_soal');
		$this->db->order_by("data_ujian.waktu","desc");
		//$this->db->limit(4);
		return $this->db->get()->num_rows();
	}	


	function datas($number,$offset,$table,$where){
		$this->db->from($table);
		$this->db->where($where);
		$this->db->limit($number,$offset);
		return $query = $this->db->get()->result();		
	}
 
	function total_data($table,$where){
		$this->db->from($table);
		$this->db->where($where);
		return $this->db->get()->num_rows();
	}



	function data2($number,$offset,$table,$where){
		$this->db->select('data_ujian.id_siswa ,data_ujian.nilai,data_ujian.jurusan, data_ujian.waktu ,data_ujian.kelas, data_ujian.level, data_ujian.id_soal,data_ujian.kategori,data_ujian.pelajaran');
		$this->db->from($table);
		$this->db->join('tipe_soal', 'tipe_soal.id_soal = data_ujian.id_soal');
		$this->db->where($where);
		//$this->db->group_by('data_ujian.id_soal');
		$this->db->group_by(array("data_ujian.id_soal", "data_ujian.kategori" , "data_ujian.jurusan"));
		$this->db->limit($number,$offset);
		//$this->db->group_by('data_ujian.id_soal');
		$this->db->order_by("data_ujian.waktu","desc");
		return $query = $this->db->get()->result();		
	}
 
	function jumlah_data2($table,$where){
		$this->db->select('data_ujian.id_siswa ,data_ujian.nilai, data_ujian.waktu ,data_ujian.kelas, data_ujian.level, data_ujian.id_soal,data_ujian.kategori');
		$this->db->from($table);
		$this->db->join('tipe_soal', 'tipe_soal.id_soal = data_ujian.id_soal');
		$this->db->where($where);
		$this->db->group_by('data_ujian.id_soal');
		$this->db->where($where);
		//$this->db->group_by('data_ujian.id_soal');
		//$this->db->order_by("data_ujian.waktu","desc");
		//$this->db->limit(4);
		return $this->db->get()->num_rows();
	}		
}

?>