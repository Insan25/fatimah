<?php

function get_laporan_penjualan($tahun=null) {
    $sql = "SELECT vrpenjualan.* FROM vrpenjualan";

    if(!empty($tahun)) {
        $sql = "SELECT vrpenjualan.* FROM vrpenjualan
        WHERE vrpenjualan.tahun = '".$tahun."'";
    }

    return $this->db->query($sql)->result();
}

function get_tahun_laporan_penjualan(){
    $sql ="SELECT DISTINCT YEAR(penjualan,tanggal) as tahun 
    FROM penjualan
    ORDER BY (SELECT tahun) DESC";

    return $this->db->query($sql)->result();
}