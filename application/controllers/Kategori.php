<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

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
		$this->load->model('Model_Kategori');
	}
	public function index()
	{
        $kategori_data = $this->Model_Kategori->get_kategori_all();

        $data = array(
            'kategori' => $kategori_data
        );
		$this->template->load('template/admin', 'kategori',$data);
	}

	public function tambah_kategori()
	{
		$kategori_data = $this->Model_Kategori->get_kategori_all();

		$data = array(
			'action' => site_url('kategori/proses_tambah_kategori'),
			'judul' => 'Tambah Kategori',
			'id_kategori' => set_value('id_kategori'),
			'nm_kategori' => set_value('nm_kategori'),
			'kategori' => $kategori_data
		);
		$this->template->load('template/admin','form_kategori',$data);
	}


	public function _rules()
	{
		$this->form_validation->set_rules('nm_kategori','Nama Kategori', 'trim|required');
	
	}

	public function proses_tambah_kategori()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$this->tambah_kategori();
		} else {
			$data = array(
			'nm_kategori' => $this->input->post('nm_kategori'),
			);

			$this->Model_Kategori->insert($data);

			redirect(site_url('Kategori'));

			redirect(site_url('Kategori/tambah_kategori'));

		} // Sebelah kiri merupakan nama database
	}
	public function hapus_kategori($id_kategori){
	$this->Model_Kategori->delete_kategori($id_kategori);
	redirect(site_url('kategori'));

	}

	public function edit_kategori($id_kategori){
		
		$data_kategori = $this->Model_Kategori->get_kategori($id_kategori);
		$kategori_data = $this->Model_Kategori->get_kategori_all();
		$data = array(
			'action' => site_url('kategori/proses_ubah_kategori'),
			'judul' => 'Edit Kategori',
			'id_kategori' => $data_kategori->id_kategori,
			'nm_kategori' => $data_kategori->nm_kategori,
			'kategori' => $kategori_data
		);

		$this->template->load('template/admin','form_kategori',$data);
	}

	public function proses_ubah_kategori()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$id_kategori = $this->input->post('id_kategori');
			$this->edit_kategori($id_kategori);
		} else {
			$id_kategori = $this->input->post('id_kategori');
			$data = array(
				'id_kategori' =>$this->input->post('id_kategori'),
				'nm_kategori' => $this->input->post('nm_kategori')
			);

			$this->Model_Kategori->update($id_kategori, $data);
			redirect(site_url('Kategori'));
		}
	}

}
