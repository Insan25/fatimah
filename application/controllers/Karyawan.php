<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

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
         $this->load->model('Model_Karyawan');
     }

	public function index()
	{
        $data_karyawan = $this->Model_Karyawan->get_karyawan_all();

        $data = array (
            'karyawan' => $data_karyawan
        );
 
		$this->template->load('template/admin', 'karyawan', $data);
	}

    public function hapus_karyawan($id_karyawan){
        $this->Model_Karyawan->delete_karyawan($id_karyawan);
        redirect(site_url('karyawan'));
    
        }

        public function tambah_karyawan()
        {
            $data_karyawan = $this->Model_Karyawan->get_karyawan_all();

    
            $data = array(
                'action' => site_url('karyawan/proses_tambah_karyawan'),
                'id_karyawan' => set_value('id_karyawan'),
                'nm_karyawan' => set_value('nm_karyawan'),
                'password' => set_value('password'),
                'karyawan' => $data_karyawan
            );

            $this->template->load('template/admin','form_karyawan',$data);
        }

        public function _rules()
	{
		$this->form_validation->set_rules('nm_karyawan','Nama Karyawan', 'trim|required');
        $this->form_validation->set_rules('password','Password');
	
	}

    public function proses_tambah_karyawan()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$this->tambah_karyawan();
		} else {
			$data = array(
			'nm_karyawan' => $this->input->post('nm_karyawan'),
            'password' => $this->input->post('password'),
			);

			$this->Model_Karyawan->insert($data);

			redirect(site_url('Karyawan'));

			redirect(site_url('Karyawan/tambah_karyawan'));

		} // Sebelah kiri merupakan nama database
	}

	public function edit_karyawan($id_karyawan){
		
		$karyawan_data = $this->Model_Karyawan->get_karyawan($id_karyawan);
		$data_karyawan = $this->Model_Karyawan->get_karyawan_all();
		$data = array(
			'action' => site_url('Karyawan/proses_ubah_karyawan'),
			'id_karyawan' => $karyawan_data->id_karyawan,
			'nm_karyawan' => $karyawan_data->nm_karyawan,
			'password' =>$karyawan_data->password,
			'karyawan' => $data_karyawan
		);

		$this->template->load('template/admin','form_karyawan',$data);
	}

	public function proses_ubah_karyawan()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$id_karyawan = $this->input->post('id_karyawan');
			$this->edit_karyawan($id_karyawan);
		} else {
			$id_karyawan = $this->input->post('id_karyawan');
			$data = array(
				'nm_karyawan' => $this->input->post('nm_karyawan'),
				'password' => $this->input->post('password')
			);

			$this->Model_Karyawan->update($id_karyawan, $data);
			redirect(site_url('Karyawan'));
		}
	}


}
