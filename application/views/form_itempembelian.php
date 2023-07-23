
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Transaksi</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Data Pembelian</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail Pembelian</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Data Pembelian</h4>
                                <div class="basic-form">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <tr>
                                            <td width="20%">ID Pembelian</td>
                                            <td><?= $id_pembelian; ?></td>
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
                                    </table>
                                </div><br/>
                            <h4 class="card-title">Item pembelian</h4>
                                <div class="basic-form">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <tr>
                                            <th width="5%" class="text-center">No.</th>
                                            <th class="text-center">Kode Barang</th>
                                            <th width="40%" class="text-center">Nama Barang</th>
                                            <th class="text-center">Harga</th>
                                            <th class="text-center">Qty</th>
                                            <th class="text-center">Subtotal</th>
                                            <th class="text-center">Aksi</tdh>
                                        </tr>
                                        <?php 
                                            $no = 1;
                                            foreach($itempembelian_data as $row) { ?>
                                            <tr>
                                                <td align="center"><?php echo $no; ?></td>
                                                <td class="text-center"><?php echo $row->id_barang; ?></td>
                                                <td><?php echo $row->nm_barang; ?></td>
                                                <td align="right">Rp. <?php echo number_format($row->harga,2,',','.'); ?></td>
                                                <td align="right"><?php echo $row->qty; ?></td>
                                                <td align="right">Rp. <?php echo number_format($row->qty * $row->harga,2,',','.'); ?></td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".bd-example-modal-sm<?php echo $row->id_barang; ?>">Ubah</button>
                                                    <a href="<?php echo site_url('Pembelian/hapus_pembelianbarang/'.$row->id_barang.'/'.$row->id_pembelian);?>"><button type="button" class="btn btn-sm btn-danger">Hapus</button></a>
                                                </td>
                                            </tr>

                                            <?php $no++; } ?>
                                            <form action="<?= $action; ?>" method="post">
                                                <tr>
                                                    <td colspan="6">
                                                        <input type="text" name="kode_barang" class="form-control" autofocus />
                                                        <input type="hidden" name="id_pembelian" value="<?= $id_pembelian; ?>" />
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-sm btn-info">Tambah</button>
                                                    </td>
                                                </tr>
                                            </form>
                                    </table>
                                </div>
                            </div>
                             <div class="card-footer">
                                <a href="<?php echo site_url('Pembelian');?>" class="btn btn-sm btn-danger">Kembali</a>
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
        foreach($itempembelian_data as $items) { ?>
        <div class="modal fade bd-example-modal-sm<?php echo $items->id_barang; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Data Item Pembelian</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <?php 
                        $item = $this->Model_Pembelian->get_item_pembelian_by_kdbarang($id_pembelian, $items->id_barang);
                     ?>
                    <form action="<?= site_url('Pembelian/proses_ubah_item') ?>" method="post">
                        <div class="modal-body">
                             <div class="form-group">
                                <label for="" class="col-form-label">Nama Barang</label>
                                <input type="hidden" value="<?= $id_pembelian; ?>" name="id_pembelian">
                                <input type="hidden" value="<?= $item->id_barang; ?>" name="id_barang">
                                <input type="text" name="nm_baang" class="form-control" value="<?= $item->nm_barang; ?>" readonly>
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

        