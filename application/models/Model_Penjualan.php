<?php 

class Model_Penjualan extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_penjualan_all(){

        $sql = "SELECT *,
                (SELECT SUM(itempenjualan.qty * itempenjualan.harga_jual) FROM itempenjualan WHERE itempenjualan.id_penjualan = penjualan.id_penjualan) AS total,
                (SELECT COUNT(itempenjualan.kode_barang) FROM itempenjualan WHERE itempenjualan.id_penjualan = penjualan.id_penjualan) AS jlh_barang, 
                (SELECT SUM(itempenjualan.qty) FROM itempenjualan WHERE itempenjualan.id_penjualan = penjualan.id_penjualan) AS jlh_item from penjualan, karyawan
                WHERE penjualan.id_karyawan = karyawan.id_karyawan";

        return $this->db->query($sql)->result();
    }

    public function delete_karyawan($id_karyawan){
        $this->db->where('id_karyawan', $id_karyawan);
        $this->db->delete('karyawan'); 
    }

    
    public function insert($data){
        $this->db->insert('penjualan',$data);
    }

    public function insert_item($kode_barang, $qty, $harga, $id_penjualan){
        $this->db->query('INSERT INTO itempenjualan(kode_barang,qty,harga_jual,id_penjualan) values("' . $kode_barang . '",' . $qty . ',' . $harga . ',' . $id_penjualan . ') 
                            ON DUPLICATE KEY update qty=qty+1');

        return true;
    }

    public function get_penjualan($id_penjualan)
    {
        $sql = "SELECT *,
                (SELECT SUM(itempenjualan.qty * itempenjualan.harga_jual) FROM itempenjualan WHERE itempenjualan.id_penjualan = penjualan.id_penjualan) AS total,
                (SELECT COUNT(itempenjualan.kode_barang) FROM itempenjualan WHERE itempenjualan.id_penjualan = penjualan.id_penjualan) AS jlh_barang, 
                (SELECT SUM(itempenjualan.qty) FROM itempenjualan WHERE itempenjualan.id_penjualan = penjualan.id_penjualan) AS jlh_item
                from penjualan, karyawan
                WHERE penjualan.id_karyawan = karyawan.id_karyawan
                AND penjualan.id_penjualan = $id_penjualan";

        return $this->db->query($sql)->row();
    }

    public function get_item_penjualan($id_penjualan){

        $sql = "SELECT * from penjualan, itempenjualan, barang
                WHERE penjualan.id_penjualan = itempenjualan.id_penjualan
                AND barang.kd_barang = itempenjualan.kode_barang
                AND itempenjualan.id_penjualan = $id_penjualan";

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
 
}