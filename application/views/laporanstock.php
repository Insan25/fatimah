
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Beranda</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Laporan Penjualan</a></li>
                    </ol>
                </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Laporan Penjualan</h4>
                                    <div class="col-12">
                                        <form action="<?php echo site_url('LapStock/filter'); ?>" method="post">
                                            <div class="row">
                                                <div class="col-1">
                                                    <label><h5>Tanggal</h5></label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="date" name="tgl" value="<?= $tgl; ?>" class="form-control" >
                                                </div>
                                                <div class="col-2">
                                                    <input type="submit" value="Filter" class="btn btn-primary" >
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th class="text-center">Kode Barang</th>
                                                <th class="text-center">Nama Barang</th>
                                                <th class="text-center">Kategori</th>
                                                <th class="text-center">Stock Awal</th>
                                                <th class="text-center">Jlh. Pembelian</th>
                                                <th class="text-center">Jlh. Penjualan</th>
                                                <th class="text-center">Stock Akhir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no = 1;
                                            foreach($laporan_stock as $row) { ?>
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td class="text-center"><?= $row->kd_barang; ?></td>
                                                <td><?= $row->nm_barang; ?></td>
                                                <td><?= $row->nm_kategori; ?></td>
                                                <td class="text-right"><?= $row->stok; ?></td>
                                                <td class="text-right"><?= $row->jlh_beli; ?></td>
                                                <td class="text-right"><?= $row->jlh_jual; ?></td>
                                                <td class="text-right"><?= $row->stok_real; ?></td>
                                            </tr>
                                            <?php } ?>

                                        </tbody>
                                        <tfoot>
                                        <tr>
                                                <th class="text-center">No.</th>
                                                <th class="text-center">Kode Barang</th>
                                                <th class="text-center">Nama Barang</th>
                                                <th class="text-center">Kategori</th>
                                                <th class="text-center">Stock Awal</th>
                                                <th class="text-center">Jlh. Pembelian</th>
                                                <th class="text-center">Jlh. Penjualan</th>
                                                <th class="text-center">Stock Akhir</th>
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
        