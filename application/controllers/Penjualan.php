<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

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
		$this->load->model('Model_Penjualan');
		$this->load->model('Model_Barang');
     }

	public function index()
	{
		$data_penjualan = $this->Model_Penjualan->get_penjualan_all();

		$data = array (
            'penjualan' => $data_penjualan
        );

		$this->template->load('template/admin', 'datapenjualan', $data);
	}

	public function tambah_penjualan()
	{
		date_default_timezone_set('Asia/Makassar');
		$data = array(
			'tanggal' => date('Y-m-d H:i:s'),
			'id_karyawan' => 4,
		);

		$this->Model_Penjualan->insert($data);

		// Mencari ID yang diinput terakhir
		$lastid = $this->Model_Penjualan->inqlastid()->lastid;

		redirect(site_url('Penjualan/detail/'.$lastid));
	}

	public function detail($id_penjualan){
		
		$penjualan_data = $this->Model_Penjualan->get_penjualan($id_penjualan);
		$itempenjualan_data = $this->Model_Penjualan->get_item_penjualan($id_penjualan);
		$data = array(
			'action' => site_url('Penjualan/proses_tambah_item'),
			'id_penjualan' => $id_penjualan,
			'tanggal' => $penjualan_data->tanggal,
			'nm_karyawan' => $penjualan_data->nm_karyawan,
			'jlh_barang' => $penjualan_data->jlh_barang,
			'jlh_item' => $penjualan_data->jlh_item,
			'total' => $penjualan_data->total,
			'itempenjualan_data' => $itempenjualan_data
		);

		$this->template->load('template/admin','form_itempenjualan',$data);
	}

	public function cetak($id_penjualan){
		
		$penjualan_data = $this->Model_Penjualan->get_penjualan($id_penjualan);
		$itempenjualan_data = $this->Model_Penjualan->get_item_penjualan($id_penjualan);
		$data = array(
			'action' => site_url('Penjualan/proses_tambah_item'),
			'id_penjualan' => $id_penjualan,
			'tanggal' => $penjualan_data->tanggal,
			'nm_karyawan' => $penjualan_data->nm_karyawan,
			'jlh_barang' => $penjualan_data->jlh_barang,
			'jlh_item' => $penjualan_data->jlh_item,
			'total' => $penjualan_data->total,
			'itempenjualan_data' => $itempenjualan_data
		);

		$this->load->view('nota_generic',$data);
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_barang','Kode Barang', 'trim|required');
	
	}

	public function proses_tambah_item()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$id_penjualan = $this->input->post('id_penjualan');
			$this->detail($id_penjualan);
		} else {
			$id_penjualan = $this->input->post('id_penjualan');
			$kode_barang = $this->input->post('kode_barang');
			$barang_data = $this->Model_Barang->get_barang($kode_barang);
			$qty = 1;
			$harga_jual = $barang_data->harga_jual;
			

			$this->Model_Penjualan->insert_item($kode_barang, $qty, $harga_jual, $id_penjualan);

			redirect(site_url('Penjualan/detail/'.$id_penjualan));

		} // Sebelah kiri merupakan nama database
	}
}
