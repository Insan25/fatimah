        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="<?= base_url() ?>assets/plugins/common/common.min.js"></script>
    <script src="<?= base_url() ?>assets/js/custom.min.js"></script>
    <script src="<?= base_url() ?>assets/js/settings.js"></script>
    <script src="<?= base_url() ?>assets/js/gleek.js"></script>
    <script src="<?= base_url() ?>assets/js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="<?= base_url() ?>assets/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="<?= base_url() ?>assets/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="<?= base_url() ?>assets/plugins/d3v3/index.js"></script>
    <script src="<?= base_url() ?>assets/plugins/topojson/topojson.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="<?= base_url() ?>assets/plugins/raphael/raphael.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/morris/morris.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins-init/morris-init.js"></script>
    <!-- Pignose Calender -->
    <script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="<?= base_url() ?>assets/plugins/chartist/js/chartist.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>

    <script src="<?= base_url() ?>assets/js/dashboard/dashboard-1.js"></script>

    <script src="<?= base_url() ?>assets/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

    <script src="<?= base_url() ?>assets/plugins/sweetalert/js/sweetalert.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/sweetalert/js/sweetalert.init.js"></script>


    <script>
        $(function() {
            getperiodeberanda();
        });

        function getperiodeberanda() {
            $.ajax({
                url : "<?php echo site_url('Dashboard/filtertahun');?>",
                method : "POST",
                async : true,
                dataType : 'json',
                success: function(data){
                        
                    var html;
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].tahun+'>'+data[i].tahun+'</option>';
                    }
                    $('#periodeberanda').html(html);

                }
            });
            return false;
        }


        (function($) {
        "use strict"

        <?php
            $label = "";
            $pembelian = "";
            $penjualan = "";
            foreach($grafik as $g){
                $label .= '"' . $g->nama . '",';
                $pembelian .= $g->pembelian . ',';
                $penjualan .= $g->penjualan . ',';
            }
        ?>

        let ctx = document.getElementById("chart_widget_20");
        ctx.height = 280;
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: [<?= substr($label, 0, -1); ?>],
                type: 'line',
                defaultFontFamily: 'Montserrat',
                datasets: [{
                    data: [<?= substr($pembelian, 0, -1); ?>],
                    label: "Pembelian",
                    backgroundColor: '#847DFA',
                    borderColor: '#847DFA',
                    borderWidth: 0.5,
                    pointStyle: 'circle',
                    pointRadius: 5,
                    pointBorderColor: 'transparent',
                    pointBackgroundColor: '#847DFA',
                }, {
                    label: "Penjualan",
                    data: [<?= substr($penjualan, 0, -1); ?>],
                    backgroundColor: '#F196B0',
                    borderColor: '#F196B0',
                    borderWidth: 0.5,
                    pointStyle: 'circle',
                    pointRadius: 5,
                    pointBorderColor: 'transparent',
                    pointBackgroundColor: '#F196B0',
                }]
            },
            options: {
                responsive: !0,
                maintainAspectRatio: false,
                tooltips: {
                    mode: 'index',
                    titleFontSize: 12,
                    titleFontColor: '#000',
                    bodyFontColor: '#000',
                    backgroundColor: '#fff',
                    titleFontFamily: 'Montserrat',
                    bodyFontFamily: 'Montserrat',
                    cornerRadius: 3,
                    intersect: false,
                },
                legend: {
                    display: false,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        fontFamily: 'Montserrat',
                    },


                },
                scales: {
                    xAxes: [{
                        display: false,
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        scaleLabel: {
                            display: false,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: false,
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }]
                },
                title: {
                    display: false,
                }
            }
        });

    })(jQuery);

    </script>

    <?php if($this->session->flashdata('tdkada')){ ?>
        <script>
            swal("<?= $this->session->flashdata('tdkada'); ?>", "Periksa Kembali Kode Barang Anda", "error");
        </script>
    <?php } ?>

    <?php if($this->session->flashdata('tdkcukup')){ ?>
        <script>
            swal("<?= $this->session->flashdata('tdkcukup'); ?>", "Periksa Kembali Stock Barang Anda", "error");
        </script>
    <?php } ?>

</body>

</html>