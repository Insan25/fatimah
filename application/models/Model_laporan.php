
<?php 

class Model_laporan extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function get_laporan_penjualan($tahun=null) {
        $sql = "SELECT vrpenjualan.* FROM vrpenjualan";
    
        if(!empty($tahun)) {
            $sql = "SELECT vrpenjualan.* FROM vrpenjualan
            WHERE vrpenjualan.tahun = '".$tahun."'";
        }
    
        return $this->db->query($sql)->result();
    }
    
    function get_tahun_laporan_penjualan(){
        $sql ="SELECT DISTINCT YEAR(penjualan.tanggal) as tahun 
        FROM penjualan
        ORDER BY (SELECT tahun) DESC";
    
        return $this->db->query($sql)->result();
    }

    function get_laporan_stok($tgl=null){
        date_default_timezone_set('Asia/Makassar');
        $tglnow = date('Y-m-d');
        $sql ="SELECT *,
            IFNUll((SELECT SUM(qty) FROM barang, itempenjualan, penjualan 
            WHERE barang.kd_barang = b.kd_barang
            AND barang.kd_barang = itempenjualan.kode_barang 
            AND itempenjualan.id_penjualan = penjualan.id_penjualan
            AND penjualan.status_lunas = 'Y'
            AND penjualan.tanggal <= '$tglnow'),0) as jlh_jual,
            IFNUll((SELECT SUM(qty) FROM barang, itempembelian, pembelian 
            WHERE barang.kd_barang = b.kd_barang
            AND barang.kd_barang = itempembelian.id_barang 
            AND itempembelian.id_pembelian = pembelian.id_pembelian
            AND pembelian.tanggal <= '$tglnow'),0) as jlh_beli,
            (SELECT b.stok - 'jlh_jual' + 'jlh_beli') as stok_real
            FROM barang b
            INNER JOIN kategori k ON k.id_kategori = b.id_kategori
            ORDER BY k.nm_kategori ASC, b.nm_barang ASC";

        if(!empty($tgl)){
            $sql ="SELECT *,
            IFNUll((SELECT SUM(qty) FROM barang, itempenjualan, penjualan 
            WHERE barang.kd_barang = b.kd_barang
            AND barang.kd_barang = itempenjualan.kode_barang 
            AND itempenjualan.id_penjualan = penjualan.id_penjualan
            AND penjualan.status_lunas = 'Y'
            AND penjualan.tanggal <= '$tgl'),0) as jlh_jual,
            IFNUll((SELECT SUM(qty) FROM barang, itempembelian, pembelian 
            WHERE barang.kd_barang = b.kd_barang
            AND barang.kd_barang = itempembelian.id_barang 
            AND itempembelian.id_pembelian = pembelian.id_pembelian
            AND pembelian.tanggal <= '$tgl'),0) as jlh_beli,
            (SELECT b.stok - 'jlh_jual' + 'jlh_beli') as stok_real
            FROM barang b
            INNER JOIN kategori k ON k.id_kategori = b.id_kategori
            ORDER BY k.nm_kategori ASC, b.nm_barang ASC";
        }
    
        return $this->db->query($sql)->result();
    }
}