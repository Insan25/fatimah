
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Data Master</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Karyawan</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)"><?= $judul ?></a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title"><?= $judul ?></h4>
                                <div class="basic-form">
                                    <div class="form">
                                        <form method="POST" action="<?php echo $action ?>">
                                        <div class="form-group col-md-12">
                                            <label>Nama Karyawan</label>
                                            <input type="hidden" name="id_karyawan" value="<?php echo $id_karyawan?>" >
                                            <input type="text" name="nm_karyawan" class="form-control" value="<?php echo $nm_karyawan ?>" id="nm_karyawan" autofocus>
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
                </div>
            </div>
            <!-- #/ container -->
    
        </div>
        
        <!--**********************************
            Content body end
        ***********************************-->

        

        