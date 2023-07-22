<?php 

class Model_Pembelian extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_pembelian_all(){

        $sql = "SELECT *,
                (SELECT SUM(itempembelian.qty * itempembelian.harga) FROM itempembelian WHERE itempembelian.id_pembelian = pembelian.id_pembelian) AS total,
                (SELECT COUNT(itempembelian.id_barang) FROM itempembelian WHERE itempembelian.id_pembelian = pembelian.id_pembelian) AS jlh_barang, 
                (SELECT SUM(itempembelian.qty) FROM itempembelian WHERE itempembelian.id_pembelian = pembelian.id_pembelian) AS jlh_item from pembelian, karyawan
                WHERE pembelian.id_karyawan = karyawan.id_karyawan";

        return $this->db->query($sql)->result();
    }

    public function delete_karyawan($id_karyawan){
        $this->db->where('id_karyawan', $id_karyawan);
        $this->db->delete('karyawan'); 
    }

    
    public function insert($data){
        $this->db->insert('pembelian',$data);
    }

    public function insert_item($id_barang, $qty, $harga, $id_pembelian){
        $this->db->query('INSERT INTO itempembelian(id_barang,qty,harga,id_pembelian) values("' . $id_barang . '",' . $qty . ',' . $harga . ',' . $id_pembelian . ') 
                            ON DUPLICATE KEY update qty=qty+1');

        return true;
    }

    public function get_pembelian($id_pembelian)
    {
        $sql = "SELECT *,
                (SELECT SUM(itempembelian.qty * itempembelian.harga) FROM itempembelian WHERE itempembelian.id_pembelian = pembelian.id_pembelian) AS total,
                (SELECT COUNT(itempembelian.id_barang) FROM itempembelian WHERE itempembelian.id_pembelian = pembelian.id_pembelian) AS jlh_barang, 
                (SELECT SUM(itempembelian.qty) FROM itempembelian WHERE itempembelian.id_pembelian = pembelian.id_pembelian) AS jlh_item
                from pembelian, karyawan
                WHERE pembelian.id_karyawan = karyawan.id_karyawan
                AND pembelian.id_pembelian = $id_pembelian";

        return $this->db->query($sql)->row();
    }

    public function get_item_pembelian($id_pembelian){

        $sql = "SELECT * from pembelian, itempembelian, barang
                WHERE pembelian.id_pembelian = itempembelian.id_pembelian
                AND barang.kd_barang = itempembelian.id_barang
                AND itempembelian.id_pembelian = $id_pembelian";

        return $this->db->query($sql)->result();
    }
    
    public function update($id_karyawan, $data)
    {
        $this->db->where('id_karyawan', $id_karyawan);
        $this->db->update('karyawan', $data);
    }

    public function inqlastid()
	{   
       $query = $this->db->query('SELECT LAST_INSERT_ID() as lastid');
        
       $res = $query->row();
       return $res;

	}

    public function delete_pembelian($id_pembelian){
        $this->db->where('id_pembelian', $id_pembelian);
        $this->db->delete('pembelian');
    }

    public function delete_barang($id_pembelian, $id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        $this->db->where('id_pembelian', $id_pembelian);
        $this->db->delete('itempembelian');
    }

    public function get_item_pembelian_by_kdbarang($id_pembelian, $id_barang){

        $sql = "SELECT *
                from itempembelian, barang
                WHERE barang.kd_barang = itempembelian.id_barang
                AND itempembelian.id_pembelian = $id_pembelian
                AND itempembelian.id_barang = '$id_barang'";

        return $this->db->query($sql)->row();
    }

    public function update_item($id_barang, $qty, $id_pembelian){
        $this->db->query("UPDATE itempembelian SET qty=$qty WHERE id_barang='$id_barang' AND id_pembelian=$id_pembelian");

        return true;
    }

    

 
 
 
}