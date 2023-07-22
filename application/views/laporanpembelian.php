
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Laporan</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Laporan Pembelian</a></li>
                    </ol>
                </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Laporan Pembelian</h4>
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tahun</th>
                                                <th>Jan</th>
                                                <th>Feb</th>
                                                <th>Mar</th>
                                                <th>Apr</th>
                                                <th>May</th>
                                                <th>Jun</th>
                                                <th>Jul</th>
                                                <th>Agt</th>
                                                <th>Sep</th>
                                                <th>Okt</th>
                                                <th>Nov</th>
                                                <th>Des</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no = 1;
                                            foreach($laporan_pembelian as $pembelian) { ?>
                                           <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $pembelian->tahun; ?></td>
                                                <td><?= $pembelian->jan; ?></td>
                                                <td><?= $pembelian->feb; ?></td>
                                                <td><?= $pembelian->mar; ?></td>
                                                <td><?= $pembelian->apr; ?></td>
                                                <td><?= $pembelian->mei; ?></td>
                                                <td><?= $pembelian->jun; ?></td>
                                                <td><?= $pembelian->jul; ?></td>
                                                <td><?= $pembelian->agt; ?></td>
                                                <td><?= $pembelian->sep; ?></td>
                                                <td><?= $pembelian->okt; ?></td>
                                                <td><?= $pembelian->nop; ?></td>
                                                <td><?= $pembelian->des; ?></td>
                                            </tr>
                                            <?php } ?>

                                            
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                                <th>No.</th>
                                                <th>Tahun</th>
                                                <th>Jan</th>
                                                <th>Feb</th>
                                                <th>Mar</th>
                                                <th>Apr</th>
                                                <th>May</th>
                                                <th>Jun</th>
                                                <th>Jul</th>
                                                <th>Agt</th>
                                                <th>Sep</th>
                                                <th>Okt</th>
                                                <th>Nov</th>
                                                <th>Des</th>
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
        