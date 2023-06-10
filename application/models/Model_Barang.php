<?php 

class Model_Barang extends CI_Model {
    function __construct() {
        parent::__construct();
    }



    function get_barang_all(){
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('kategori','kategori.id_kategori = barang.id_kategori');

        return $this->db->get()->result();
    }

    function insert($data){
        $this->db->insert('barang',$data);
    }
}