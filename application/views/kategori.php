
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Beranda</a></li>
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
                                    <h4 class="card-title">Data Kategori</h4>
                                    <a href=<?php echo site_url('Kategori/tambah_kategori') ?> ><button type="button" class="btn mb-1 btn-primary">Tambah +</button></a>
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No. Kategori</th>
                                                <th>Nama Kategori</th>
                                                <th> Aksi </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                            foreach($kategori as $jenis) { ?>
                                            <tr>
                                                <td><?php echo $jenis->id_kategori; ?></td>
                                                <td><?php echo $jenis->nm_kategori; ?></td>
                                                <td>
                                                <a href="<?php echo site_url('kategori/hapus_kategori/'.$jenis->id_kategori); ?>"><button type="button" class="btn btn-sm btn-danger">Hapus</button></a>
                                                <a href="<?php echo site_url('Kategori/edit_kategori/'.$jenis->id_kategori); ?>"><button type="button" class="btn btn-sm btn-info">Edit</button></a>
                                            </td>
                                            </tr>

                                            <?php } ?>
                                            
                                            
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                                <th>No. Kategori</th>
                                                <th>Nama Kategori</th>
                                                <th> Aksi </th>
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
        