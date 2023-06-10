
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

        <div class="container-fluid mt-3">
                <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('Barang'); ?>">Data Barang</a></li>
                        <li class="breadcrumb-item active"><a href="">Tambah</a></li>
                    </ol>
                </div>
                </div>

            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="card-title">Tambah Barang</h4>
                                <div class="basic-form">
                                    <form method="POST" action="<?php echo $action ?>">
                                        <div class="form">
                                            <div class="form-group col-md-6">
                                                <label>Kode Barang</label>
                                                <input type="text" name="kd_barang" class="form-control" value=" <?php echo $kode_barang ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Nama Barang</label>
                                                <input type="text" name="nama_barang" class="form-control" value=" <?php echo $nama_barang ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Harga Beli</label>
                                                <input type="text" name="harga_beli" class="form-control" value="<?php echo $harga_beli ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Harga Jual</label>
                                                <input type="text" name="harga_jual" class="form-control" value="<?php echo $harga_jual ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Kategori</label>
                                                <input type="text" name="id_kategori" class="form-control" value="<?php echo $id_kategori ?>">
                                            </div>
                                            <button type="submit" class="btn mb-1 btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                                    <div class="chart-wrapper">
                                        <canvas id="chart_widget_2"></canvas>
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
        