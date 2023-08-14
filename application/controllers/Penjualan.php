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
			'id_karyawan' => $this->session->userdata('id_karyawan'),
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
			'status_lunas' => $penjualan_data->status_lunas,
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
			'tunai' => $penjualan_data->tunai,
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
			// Periksa Ketersediaan Kode Barang
			$kode_barang = $this->input->post('kode_barang');
			$cek = $this->db->query('SELECT * FROM barang WHERE kd_barang="'.$kode_barang.'"');
			if($cek->num_rows() > 0) 
			{
				$id_penjualan = $this->input->post('id_penjualan');
				$kode_barang = $this->input->post('kode_barang');
				$barang_data = $this->Model_Barang->get_barang($kode_barang);
				$qty = 1;
				$harga_jual = $barang_data->harga_jual;
				
				// Periksa ketersediaan stok
				$tgl = date('Y-m-d');
				$stok = $this->Model_Penjualan->get_stok_barang($tgl, $kode_barang)->stok_real;
				if(($stok - $qty) < 0){

					$id_penjualan = $this->input->post('id_penjualan');

					$this->session->set_flashdata('tdkcukup', 'Stock Barang Tidak Cukup!');

					redirect(site_url('Penjualan/detail/'.$id_penjualan));

				} else {
					
					$this->Model_Penjualan->insert_item($kode_barang, $qty, $harga_jual, $id_penjualan);

					redirect(site_url('Penjualan/detail/'.$id_penjualan));
				}

			} else {
				$id_penjualan = $this->input->post('id_penjualan');

				$this->session->set_flashdata('tdkada', 'Kode Barang Tidak Ditemukan!');

				redirect(site_url('Penjualan/detail/'.$id_penjualan));
			}

			
			

		} // Sebelah kiri merupakan nama database
	}

	public function proses_ubah_item()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$id_penjualan = $this->input->post('id_penjualan');
			$this->detail($id_penjualan);
		} else {
			$id_penjualan = $this->input->post('id_penjualan');
			$kode_barang = $this->input->post('kode_barang');
			$qty = $this->input->post('qty');
			$harga_jual = $this->input->post('harga_jual');

			// Periksa ketersediaan stok
			$tgl = date('Y-m-d');
			$stok = $this->Model_Penjualan->get_stok_barang($tgl, $kode_barang)->stok_real;
			if(($stok - $qty) < 0){

				$id_penjualan = $this->input->post('id_penjualan');

				$this->session->set_flashdata('tdkcukup', 'Stock Barang Tidak Cukup!');

				redirect(site_url('Penjualan/detail/'.$id_penjualan));

			} else {
				
				$this->Model_Penjualan->update_item($kode_barang, $qty, $harga_jual, $id_penjualan);

				redirect(site_url('Penjualan/detail/'.$id_penjualan));
			}
			


		} // Sebelah kiri merupakan nama database
	}

	public function hapus_penjualan($id_penjualan)
	{
		$this->Model_Penjualan->delete_penjualan($id_penjualan);
		redirect(site_url('penjualan'));
	}

	public function hapus_penjualanbarang($kode_barang, $id_penjualan)
	{
		$this->Model_Penjualan->delete_barang($id_penjualan, $kode_barang);

		redirect(site_url('Penjualan/detail/'.$id_penjualan));
	}

	public function set_lunas($id_penjualan)
	{
		$data = array(
			'tunai' => $this->input->post('tunai'),
			'status_lunas' => 'Y',
		);

		$this->Model_Penjualan->update($id_penjualan, $data);
		redirect(site_url('Penjualan'));
		
	}
}
