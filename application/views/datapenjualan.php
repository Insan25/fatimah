
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Transaksi</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Penjualan</a></li>
                    </ol>
                </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Data Penjualan</h4>
                                    <a href=<?php echo site_url('Penjualan/tambah_penjualan') ?> ><button type="button" class="btn mb-1 btn-primary">Tambah +</button></a>
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th class="text-center">Penjualan ID</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Pembuat</th>
                                                <th class="text-center">Jlh. Barang</th>
                                                <th class="text-center">Jlh. Items</th>
                                                <th class="text-center">Total</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no = 1;
                                                foreach($penjualan as $row) { ?>
                                                <tr>
                                                    <td align="center"><?php echo $no; ?></td>
                                                    <td class="text-center"><?php echo $row->id_penjualan; ?></td>
                                                    <td class="text-center"><?php echo $row->tanggal; ?></td>
                                                    <td><?php echo $row->nm_karyawan; ?></td>
                                                    <td align="right"><?php echo $row->jlh_barang; ?></td>
                                                    <td align="right"><?php echo $row->jlh_item; ?></td>
                                                    <td align="right"><?php echo number_format($row->total,2,',','.'); ?></td>
                                                    <td class="text-center">
                                                        <a href="<?php echo site_url('Penjualan/detail/'.$row->id_penjualan); ?>" class="btn btn-sm btn-primary">Detail</a>

                                                        <?php if($row->status_lunas == 'Y') { ?>
                                                            <a href="<?php echo site_url('Penjualan/cetak/'.$row->id_penjualan); ?>" target="_blank" class="btn btn-sm btn-warning">Cetak</a>
                                                        <?php } ?>
                                                        <a href="<?php echo site_url('Penjualan/hapus_penjualan/'.$row->id_penjualan);?>"><button type="button" class="btn btn-sm btn-danger">Hapus</button></a>
                                                    </td>   
                                                </tr>

                                            <?php $no++; } ?>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th class="text-center">Penjualan ID</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Pembuat</th>
                                                <th class="text-center">Jlh. Barang</th>
                                                <th class="text-center">Jlh. Items</th>
                                                <th class="text-center">Total</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        