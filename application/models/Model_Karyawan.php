<?php 

class Model_Karyawan extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_karyawan_all(){

        $sql = "SELECT karyawan.* from karyawan";

        return $this->db->query($sql)->result();
    }

    public function delete_karyawan($id_karyawan){
        $this->db->where('id_karyawan', $id_karyawan);
        $this->db->delete('karyawan'); 
    }

    
    public function insert($data){
        $this->db->insert('karyawan',$data);
    }

    public function get_karyawan($id_karyawan)
    {
        $this->db->where('id_karyawan',$id_karyawan);
        return $this->db->get('karyawan')->row();
    }
    
    public function update($id_karyawan, $data)
    {
        $this->db->where('id_karyawan', $id_karyawan);
        $this->db->update('karyawan', $data);
    }
 
}