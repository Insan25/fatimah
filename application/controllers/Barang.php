<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

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
		$this->load->model('Model_Barang');
	}

	public function index()
	{
		$data_barang = $this->Model_Barang->get_barang_all();
	

		$data = array (
			'data_barang' => $data_barang
	
		);
		$this->template->load('template/admin', 'barang' ,$data);
	}

	public function tambah_barang()

	{
		$data_barang = $this->Model_Barang->get_barang_all();

		$data = array(
			'action' => site_url('barang/proses_tambah_barang'),
			'kode_barang' => set_value('kd_barang'),
			'nama_barang' => set_value('nm_barang'),
			'harga_beli' => set_value('harga_beli'),
			'harga_jual' => set_value('harga_jual'),
			'id_kategori' => set_value('id_kategori'),
			'data_barang' => $data_barang
		);
		$this->template->load('template/admin', 'form_pelatih', $data);
	} //kalo ini melempar nama array biasa sebelah kanan adalah nama form
	
	public function _rules()
	{
		$this->form_validation->set_rules('kd_barang','Kode Barang','trim|required');
		$this->form_validation->set_rules('nama_barang','Nama Barang', 'trim|required');
		$this->form_validation->set_rules('harga_beli','Harga Beli','trim|required');
		$this->form_validation->set_rules('harga_jual','Harga Jual','trim|required');
		$this->form_validation->set_rules('id_kategori','Id Kategori','trim|required');
	}

	public function proses_tambah_barang()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$this->tambah_barang();
		} else {
			$data = array(
			'kd_barang' => $this->input->post('kd_barang'),
			'nm_barang' => $this->input->post('nama_barang'),
			'harga_beli' => $this->input->post('harga_beli'),
			'harga_jual' => $this->input->post('harga_jual'),
			'id_kategori' => $this->input->post('id_kategori'),
			);

			$this->Model_Barang->insert($data);

			redirect(site_url('Barang'));

			redirect(site_url('Barang/tambah_barang'));

		} // Sebelah kiri merupakan nama database

		
	}
}
