<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		// Pengecekan apakah sudah login
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
		$query = $this->db->query("SELECT *,
				IFNULL(
				(SELECT SUM(i2.qty * i2.harga) FROM itempembelian i2, pembelian p2
				WHERE i2.id_pembelian = p2.id_pembelian AND MONTH(p2.tanggal) = bulan.id AND YEAR(p2.tanggal) = 2023)
				,0) AS pembelian,
				IFNULL(
				(SELECT SUM(i3.qty * i3.harga_jual) FROM itempenjualan i3, penjualan p3
				WHERE i3.id_penjualan = p3.id_penjualan AND MONTH(p3.tanggal) = bulan.id AND YEAR(p3.tanggal) = 2023)
				,0) AS penjualan
				FROM bulan");
		$grafik = $query->result();

		$query2 = $this->db->query("SELECT
				(SELECT SUM(itempenjualan.qty * itempenjualan.harga_jual) FROM itempenjualan, penjualan
				WHERE penjualan.id_penjualan = itempenjualan.id_penjualan
				AND YEAR(penjualan.tanggal) = 2023) as total_jual,
				(SELECT SUM(itempembelian.qty * itempembelian.harga) FROM itempembelian, pembelian
				WHERE pembelian.id_pembelian = itempembelian.id_pembelian
				AND YEAR(pembelian.tanggal) = 2023) as total_beli,
				(SELECT (SELECT SUM(itempenjualan.qty * itempenjualan.harga_jual) FROM itempenjualan, penjualan
				WHERE penjualan.id_penjualan = itempenjualan.id_penjualan
				AND YEAR(penjualan.tanggal) = 2023) - (SELECT SUM(itempembelian.qty * itempembelian.harga) FROM itempembelian, pembelian
				WHERE pembelian.id_pembelian = itempembelian.id_pembelian
				AND YEAR(pembelian.tanggal) = 2023)) as laba");
		$statistik = $query2->row();

		$data = array(
			'grafik' => $grafik,
			'statistik' => $statistik,
		);

		$this->template->load('template/admin', 'dashboard', $data);
	}

	public function filtertahun()
	{
		//$bidangilmu = $this->input->post('bidangilmuid',TRUE);
		$data = $this->Model_laporan->get_tahun_laporan_penjualan()->result();
		echo json_encode($data);
	}

}
