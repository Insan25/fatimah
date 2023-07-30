
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Data Master</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Barang</a></li>
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
                                        <div class="form-group col-md-12">
                                            <label>Kode Barang</label>
                                            <input type="text" name="kd_barang" class="form-control" value=" <?php echo $kd_barang ?>"
                                            id="kd_barang" onkeypress="nextfieldBarcode(event)" autofocus>
                                        </div>
                                        <form method="POST" action="<?php echo $action ?>">
                                        <div class="form-group col-md-12">
                                            <label>Nama Barang</label>
                                            <input type="hidden" name="kd_barang" id="kode_barang" value=" <?php echo $kd_barang ?>">
                                            <input type="text" name="nm_barang" class="form-control" value=" <?php echo $nm_barang ?>"
                                            id="nama_barang">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Harga Beli</label>
                                            <input type="text" name="harga_beli" class="form-control" value="<?php echo $harga_beli ?>">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Harga Jual</label>
                                            <input type="text" name="harga_jual" class="form-control" value="<?php echo $harga_jual ?>">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Stok</label>
                                            <input type="number" name="stok" class="form-control" value="<?php echo $stok ?>">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Kategori</label>
                                            <select class="form-control show-tick" name="id_kategori">
                                            <?php
                                            foreach($data_kategori as $kategori){?>
                                            <option value='<?php echo $kategori->id_kategori ?>' <?php if($kategori->id_kategori == $id_kategori) {echo "selected"; } ?>>
                                            <?php echo $kategori->nm_kategori ?>    
                                        </option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                        <button type="submit" class="btn mb-1 btn-primary">Simpan</button>
                                            <a href="<?= site_url('Barang') ?>" class="btn mb-1 btn-danger">Kembali</a>
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
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Harga Beli</th>
                                                <th>Harga Jual</th>
                                                <th>Kategori</th>
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
                                                <td><?php echo $barang->nm_kategori; ?></td>
                                            </tr>

                                            <?php } ?>
                                            
                                            
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Harga Beli</th>
                                                <th>Harga Jual</th>
                                                <th>Kategori</th>
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

        <script>
            function nextfieldBarcode(event){  // fungsi saat tombol enter
                if(event.keyCode == 13 || event.which == 13){
                    var x =  document.getElementById('kd_barang').value
                    document.getElementById('kode_barang').value = x;
                    document.getElementById('nama_barang').focus();
                } 
            }

            document.getElementById("kd_barang").onchange = function() {myFunction()};

            function myFunction() {
                var x =  document.getElementById('kd_barang').value
                    document.getElementById('kode_barang').value = x;
                    document.getElementById('nama_barang').focus();
}
        </script>
        