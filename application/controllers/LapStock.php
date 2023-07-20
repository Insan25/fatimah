<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LapStock extends CI_Controller {

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
	 */

	 public function __construct() 
     {
         parent::__construct();
         $this->load->model('Model_laporan');
     }

	public function filter()
	{
		date_default_timezone_set('Asia/Makassar');

		$tgl = $this->input->post('tgl');
		$laporan_stock = $this->Model_laporan->get_laporan_stok($tgl);

		$data = array(
			'tgl' => set_value('tgl', date('Y-m-d')),
			'laporan_stock' => $laporan_stock,
		);
		
		$this->template->load('template/admin', 'laporanstock', $data);
	}
}
