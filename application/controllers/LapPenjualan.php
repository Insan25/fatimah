<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LapPenjualan extends CI_Controller {

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 * 
	 */


	 public function __construct() 
	 {
		 parent::__construct();
		 $this->load->model('Model_laporan');
		$this->is_logged_in();
	}

	public function is_logged_in()
	{
		if ($this->session->userdata('logged_in')==FALSE)
		{
			redirect('Auth');
		} 
	}

	public function index()
	{
		$tahun = $this->input->post('tahun');
		$laporan_penjualan = $this->Model_laporan->get_laporan_penjualan($tahun);
		$get_tahun = $this->Model_laporan->get_tahun_laporan_penjualan($tahun);

		$data = array(
			'action' => site_url('LapPenjualan/index'),
			'tahun' => set_value('tahun' , $tahun),
			'get_tahun' => $get_tahun,
			'laporan_penjualan' => $laporan_penjualan
		);

		$this->template->load('template/admin', 'laporanpenjualan', $data);
	}
}
