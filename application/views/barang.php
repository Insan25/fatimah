
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Data Master</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Barang</a></li>
                    </ol>
                </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Data Barang</h4>
                                    <a href=<?php echo site_url('Barang/tambah_barang') ?> ><button type="button" class="btn mb-1 btn-primary">Tambah +</button></a>
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Harga Beli</th>
                                                <th>Harga Jual</th>
                                                <th>Stok</th>
                                                <th>Kategori</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach($data_barang as $barang) { ?>
                                            <tr>
                                                <td><?php echo $barang->kd_barang; ?></td>
                                                <td><?php echo $barang->nm_barang; ?></td>
                                                <td><?php echo $barang->harga_beli; ?></td>
                                                <td><?php echo $barang->harga_jual; ?></td>
                                                <td><?php echo $barang->stok; ?></td>
                                                <td><?php echo $barang->nm_kategori; ?></td>
                                                <td> 
                                                <a href="<?php echo site_url('Barang/hapus_barang/'.$barang->kd_barang);?>"><button type="button" class="btn btn-sm btn-danger">Hapus</button></a>
                                                <a href="<?php echo site_url('Barang/edit_barang/'.$barang->kd_barang);?>"><button type="button" class="btn btn-sm btn-info">Edit</button></a></td>
                                            </tr>

                                            <?php } ?>
                                            
                                            
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Harga Beli</th>
                                                <th>Harga Jual</th>
                                                <th>Stok</th>
                                                <th>Kategori</th>
                                                <th>Aksi</th>
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
        