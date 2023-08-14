<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Penjualan</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">Rp <?php echo number_format($statistik->total_jual,0,',','.'); ?></h2>
                                    <p class="text-white mb-0"> </p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="icon-tag"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Pembelian</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">Rp <?php echo number_format($statistik->total_beli,0,',','.'); ?></h2>
                                    <p class="text-white mb-0"> </p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Laba</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">Rp <?php echo number_format($statistik->laba,0,',','.'); ?></h2>
                                    <p class="text-white mb-0"> </p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-7">
                            <div class="card-body">
                                <h3 class="card-title text-white">Kasir</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?= $this->session->userdata('nm_karyawan'); ?></h2>
                                    <p class="text-white mb-0"> </p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-user"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body pb-0 d-flex justify-content-between">
                                        <div>
                                            <h4 class="mb-1">Grafik</h4>
                                            <p>Penjualan & Pembelian</p>
                                        </div>
                                    </div>
                                    <div class="chart-wrapper">
                                        <canvas id="chart_widget_20"></canvas>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="w-100 mr-2">
                                                <h6>Penjualan</h6>
                                                <div class="progress" style="height: 6px">
                                                    <div class="progress-bar bg-danger" style="width: 100%"></div>
                                                </div>
                                            </div>
                                            <div class="ml-2 w-100">
                                                <h6>Pembelian</h6>
                                                <div class="progress" style="height: 6px">
                                                    <div class="progress-bar bg-primary" style="width: 100%"></div>
                                                </div>
                                            </div>
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