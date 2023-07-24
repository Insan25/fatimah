
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Transaksi</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Data Penjualan</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail Penjualan</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Data Penjualan</h4>
                                <div class="basic-form">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <tr>
                                            <td width="20%">ID Penjualan</td>
                                            <td><?= $id_penjualan; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td><?php echo date('d-m-Y H:i:s',strtotime($tanggal)); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Penerima</td>
                                            <td><?php echo $nm_karyawan; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Barang</td>
                                            <td><?php echo $jlh_barang; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Items</td>
                                            <td><?php echo $jlh_item; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td><b>Rp. <?php echo number_format($total,2,',','.'); ?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Lunas</td>
                                            <td>
                                                <?php if($status_lunas == 'Y') { ?>
                                                    <span class="badge badge-success">Lunas</span>
                                                <?php } else { ?>
                                                    <span class="badge badge-danger">Belum</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div><br/>
                            <h4 class="card-title">Item Penjualan</h4>
                                <div class="basic-form">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <tr>
                                            <th width="5%" class="text-center">No.</th>
                                            <th class="text-center">Kode Barang</th>
                                            <th width="40%" class="text-center">Nama Barang</th>
                                            <th class="text-center">Harga</th>
                                            <th class="text-center">Qty</th>
                                            <th class="text-center">Subtotal</th>
                                            <?php if($status_lunas == 'T') { ?>
                                                <th class="text-center">Aksi</th>
                                            <?php } ?>
                                        </tr>
                                        <?php 
                                            $no = 1;
                                            foreach($itempenjualan_data as $row) { ?>
                                            <tr>
                                                <td align="center"><?php echo $no; ?></td>
                                                <td class="text-center"><?php echo $row->kode_barang; ?></td>
                                                <td><?php echo $row->nm_barang; ?></td>
                                                <td align="right">Rp. <?php echo number_format($row->iharga_jual,2,',','.'); ?></td>
                                                <td align="right"><?php echo $row->qty; ?></td>
                                                <td align="right">Rp. <?php echo number_format($row->qty * $row->iharga_jual,2,',','.'); ?></td>
                                                <?php if($status_lunas == 'T') { ?>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".bd-example-modal-sm<?php echo $row->kode_barang; ?>">Edit</button></a>
                                                        <a href="<?php echo site_url('Penjualan/hapus_penjualanbarang/'.$row->kode_barang.'/'.$row->id_penjualan);?>"><button type="button" class="btn btn-sm btn-danger">Hapus</button></a>
                                                    </td>
                                                <?php } ?>
                                            </tr>

                                                <?php $no++; } ?>
                                                <form action="<?= $action; ?>" method="post">
                                                <?php if($status_lunas == 'T') { ?>
                                                    <tr>
                                                        <td colspan="6">
                                                            <input type="text" name="kode_barang" class="form-control" autofocus autocomplete="off" />
                                                            <input type="hidden" name="id_penjualan" value="<?= $id_penjualan; ?>" />
                                                        </td>
                                                        <td class="text-center">
                                                            <button class="btn btn-sm btn-info">Tambah</button>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </form>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo site_url('Penjualan');?>" class="btn btn-sm btn-danger">Kembali</a>
                                <?php if($status_lunas == 'T') { ?>
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#basicModal">Pembayaran</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="basicModal">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Pembayaran</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="<?= site_url('Penjualan/set_lunas/'.$id_penjualan) ?>">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Nominal</label>
                                                        <input type="number" name="tunai" class="form-control" autocomplete="off" >
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-primary" value="Lunas">
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
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
        <?php 
            foreach($itempenjualan_data as $items) { ?>
                <div class="modal fade bd-example-modal-sm<?php echo $items->kode_barang; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Data Item Penjualan</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <?php 
                                $item = $this->Model_Penjualan->get_item_penjualan_by_kdbarang($id_penjualan, $items->kode_barang);
                            ?>
                            <form action="<?= site_url('Penjualan/proses_ubah_item') ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Nama Barang</label>
                                        <input type="hidden" value="<?= $id_penjualan; ?>" name="id_penjualan">
                                        <input type="hidden" value="<?= $item->kode_barang; ?>" name="kode_barang">
                                        <input type="text" name="nm_baang" class="form-control" value="<?= $item->nm_barang; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Harga</label>
                                        <input type="text" name="harga_jual" class="form-control" value="<?= $item->iharga_jual; ?>" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Qty</label>
                                        <input type="text" name="qty" class="form-control" id="recipient-name" value="<?= $item->qty; ?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" value="Ubah" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        <?php } ?>
        