<?php 

class Model_Kategori extends CI_Model {
    function __construct() {
        parent::__construct();
    }



    function get_kategori_all(){

        $sql = "SELECT kategori.* from kategori";

        return $this->db->query($sql)->result();
    }

   
}