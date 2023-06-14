<?php 

class Model_Kategori extends CI_Model {
    public function __construct() {
        parent::__construct();
    }



    public function get_kategori_all(){

        $sql = "SELECT kategori.* from kategori";

        return $this->db->query($sql)->result();
    }

    public function insert($data){
        $this->db->insert('kategori',$data);
    }

    public function delete_kategori($id_kategori){
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kategori'); 
    }

    public function get_kategori($id_kategori)
    {
        $this->db->where('id_kategori',$id_kategori);
        return $this->db->get('kategori')->row();
    }

    public function update($id_kategori, $data)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori', $data);
    }
    
}