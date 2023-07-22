
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Data Master</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Karyawan</a></li>
                    </ol>
                </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Data Karyawan</h4>
                                    <a href=<?php echo site_url('Karyawan/tambah_karyawan') ?> ><button type="button" class="btn mb-1 btn-primary">Tambah +</button></a>
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No. Karyawan</th>
                                                <th>Nama Karyawan</th>
                                                <th> Aksi </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                            foreach($karyawan as $krwn) { ?>
                                            <tr>
                                                <td><?php echo $krwn->id_karyawan; ?></td>
                                                <td><?php echo $krwn->nm_karyawan; ?></td>
                                                <td>
                                                <a href="<?php echo site_url('karyawan/hapus_karyawan/'.$krwn->id_karyawan); ?>"><button type="button" class="btn btn-sm btn-danger">Hapus</button></a>
                                                <a href="<?php echo site_url('Karyawan/edit_karyawan/'.$krwn->id_karyawan); ?>"><button type="button" class="btn btn-sm btn-info">Edit</button></a>
                                            </td>
                                            </tr>

                                            <?php } ?>
                                            
                                            
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                                <th>No. Karyawan</th>
                                                <th>Nama Karyawan</th>
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
        