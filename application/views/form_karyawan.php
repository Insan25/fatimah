
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Tambah Karyawan</h4>
                                <div class="basic-form">
                                    <div class="form">
                                        <form method="POST" action="<?php echo $action ?>">
                                        <div class="form-group col-md-12">
                                            <label>Nama Karyawan</label>
                                            <input type="hidden" name="id_karyawan" value="<?php echo $id_karyawan?>" >
                                            <input type="text" name="nm_karyawan" class="form-control" value=" <?php echo $nm_karyawan ?>" id="nm_karyawan" autofocus>
                                        </div>
                                        <div class="form-group col-md-12">
                                        <label>Password</label>
                                            <input type="password" name="password" class="form-control" value="<?php echo $password ?>">
                                        </div>
                                        <div class="form-group col-md-12">
                                        <button type="submit" class="btn mb-1 btn-primary">Simpan</button>
                                            <a href="<?= site_url('Karyawan') ?>" class="btn mb-1 btn-danger">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Data Barang</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Id Karyawan</th>
                                                <th>Nama Karyawan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach($karyawan as $jenis) { ?>
                                            <tr>
                                                <td><?php echo $jenis->id_karyawan; ?></td>
                                                <td><?php echo $jenis->nm_karyawan; ?></td>
                                            </tr>

                                            <?php } ?>
                                            
                                            
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                                <th>Id Karyawan</th>
                                                <th>Nama Karyawan</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                
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

        

        