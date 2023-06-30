
        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Toko Fatimah</li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-home"></i><span class="nav-text">Beranda</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo site_url('Barang'); ?>">Data Barang</a></li>
                            <li><a href="<?php echo site_url('Kategori'); ?>">Data Kategori</a></li>
                            <li><a href="<?php echo site_url('Karyawan'); ?>">Data Karyawan</a></li>
                            <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-money"></i><span class="nav-text">Transaksi</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo site_url('Pembelian'); ?>">Data Pembelian</a></li>
                            <li><a href="<?php echo site_url('Penjualan'); ?>">Data Penjualan</a></li>

                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i> <span class="nav-text">Laporan</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo site_url('LapPembelian'); ?>">Laporan Pembelian</a></li>
                            <li><a href="<?php echo site_url('LapPenjualan'); ?>">Laporan Penjualan</a></li>
                        </ul>
                    </li>

                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->