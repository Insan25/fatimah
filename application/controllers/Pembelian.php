<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

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
		$this->load->model('Model_Pembelian');
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
		$data_pembelian = $this->Model_Pembelian->get_pembelian_all();

		$data = array (
            'pembelian' => $data_pembelian
        );

		$this->template->load('template/admin', 'datapembelian', $data);
	}

	public function tambah_pembelian()
	{
		date_default_timezone_set('Asia/Makassar');
		$data = array(
			'tanggal' => date('Y-m-d H:i:s'),
			'id_karyawan' => $this->session->userdata('id_karyawan'),
		);

		$this->Model_Pembelian->insert($data);

		// Mencari ID yang diinput terakhir
		$lastid = $this->Model_Pembelian->inqlastid()->lastid;

		redirect(site_url('Pembelian/detail/'.$lastid));
	}

	public function detail($id_pembelian){
		
		$pembelian_data = $this->Model_Pembelian->get_pembelian($id_pembelian);
		$itempembelian_data = $this->Model_Pembelian->get_item_pembelian($id_pembelian);
		$data = array(
			'action' => site_url('pembelian/proses_tambah_item'),
			'id_pembelian' => $id_pembelian,
			'tanggal' => $pembelian_data->tanggal,
			'nm_karyawan' => $pembelian_data->nm_karyawan,
			'jlh_barang' => $pembelian_data->jlh_barang,
			'jlh_item' => $pembelian_data->jlh_item,
			'total' => $pembelian_data->total,
			'itempembelian_data' => $itempembelian_data
		);

		$this->template->load('template/admin','form_itempembelian',$data);
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_barang','Kode Barang', 'trim|required');
	
	}
	public function _rules_item()
	{
		$this->form_validation->set_rules('id_barang','Kode Barang', 'trim|required');
	
	}

	public function proses_tambah_item()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$id_pembelian = $this->input->post('id_pembelian');
			$this->detail($id_pembelian);
		} else {
			$kode_barang = $this->input->post('kode_barang');
			$cek = $this->db->query('SELECT * FROM barang WHERE kd_barang="'.$kode_barang.'"');
			if($cek->num_rows() > 0) 
			{
				$id_pembelian = $this->input->post('id_pembelian');
				$kode_barang = $this->input->post('kode_barang');
				$barang_data = $this->Model_Barang->get_barang($kode_barang);
				$qty = 1;
				$harga = $barang_data->harga_beli;
				

				$this->Model_Pembelian->insert_item($kode_barang, $qty, $harga, $id_pembelian);

				redirect(site_url('Pembelian/detail/'.$id_pembelian));

			} else {
				$id_pembelian = $this->input->post('id_pembelian');

				$this->session->set_flashdata('tdkada', 'Kode Barang Tidak Ditemukan!');

				redirect(site_url('Pembelian/detail/'.$id_pembelian));
			}
	}
	}

	public function hapus_pembelian($id_pembelian)
	{
		$this->Model_Pembelian->delete_pembelian($id_pembelian);
		redirect(site_url('pembelian'));
	}
	
	public function hapus_pembelianbarang($id_barang, $id_pembelian)
	{
		$this->Model_Pembelian->delete_barang($id_pembelian, $id_barang);

		redirect(site_url('Pembelian/detail/'.$id_pembelian));
	}

	public function proses_ubah_item()
	{
		$this->_rules_item();
		if($this->form_validation->run() == FALSE) {
			$id_pembelian = $this->input->post('id_pembelian');
			$this->detail($id_pembelian);
		} else {
			$id_pembelian = $this->input->post('id_pembelian');
			$id_barang = $this->input->post('id_barang');
			$qty = $this->input->post('qty');
			

			$this->Model_Pembelian->update_item($id_barang,$qty,$id_pembelian);

			redirect(site_url('Pembelian/detail/'.$id_pembelian));

		} // Sebelah kiri merupakan nama database
	}


}
