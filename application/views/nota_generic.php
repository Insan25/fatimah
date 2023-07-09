<html>
    <head>
        <title>Cetak Nota <?= $id_penjualan ?></title>
        <link href="<?= base_url() ?>assets/css/print.css" rel="stylesheet">
    </head>
    <body class="struk">
        <section class="sheet">
        <img src="<?= base_url() ?>assets/images/paypal.png" alt="" width="100%">
        <?php $judul = "FATIMAH STORE"; ?>
        <h2><?= str_repeat("&nbsp;", (16 - strlen($judul))). $judul; ?></h2>
        <!-- <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="txt-center">Banjarmasin</td>
                    </tr>
                    <tr>
                        <td>Telp: 085651111156</td>
                    </tr>
                </table> -->
            <!-- // echo(str_repeat("=", 40)."<br/>");
            // $invoice = "$d->invoice". str_repeat("&nbsp;", (40 - (strlen($d->invoice))));
            // $kasir = user('name'). str_repeat("&nbsp;", (40 - (strlen(user('name')))));
            // $tgl = date('d-m-Y H:i:s', strtotime($d->created_at)). str_repeat("&nbsp;", (40 - (strlen(date('d-m-Y H:i:s', strtotime($d->created_at))))));
            // $customer = '['. $customer->nia.'] '.$customer->name;
            // $customer = $customer. str_repeat("&nbsp;", (48 - (strlen($customer)))); -->

            <table cellpadding="0" cellspacing="0" style="width:100%">
                    <tr>
                        <td align="left" class="txt-left">Nota&nbsp;</td>
                        <td align="left" class="txt-left">:</td>
                        <td align="left" class="txt-left">&nbsp;<?= $id_penjualan; ?></td>
                    </tr>
                    <tr>
                        <td align="left" class="txt-left">Waktu&nbsp;</td>
                        <td align="left" class="txt-left">:</td>
                        <td align="left" class="txt-left">&nbsp;<?= date('d-m-Y H:i', strtotime($tanggal)); ?></td>
                    </tr>
                    <tr>
                        <td align="left" class="txt-left">Kasir&nbsp;</td>
                        <td align="left" class="txt-left">:</td>
                        <td align="left" class="txt-left">&nbsp;<?= $nm_karyawan; ?></td>
                    </tr>
                </table>
                <?php
            echo '<br/>';
            // $tItem = 'Item'. str_repeat("&nbsp;", (13 - strlen('Item')));
            // $tQty  = 'Qty'. str_repeat("&nbsp;", (6 - strlen('Qty')));
            // $tHarga= str_repeat("&nbsp;", (9 - strlen('Harga'))).'Harga';
            // $tTotal= str_repeat("&nbsp;", (10 - strlen('Total'))).'Total';
            // $caption = $tItem. $tQty. $tHarga. $tTotal;

            echo    '<table cellpadding="0" cellspacing="0" style="width:100%">
                        <tr>
                            <td align="left" class="txt-left">'. str_repeat("=", 38) . '</td>
                        </tr>';
            if(!empty( $itempenjualan_data ))
            {
                foreach($itempenjualan_data as $row)
                {
                    $item = $row->nm_barang. str_repeat("&nbsp;", (38 - (strlen($row->nm_barang))));
                    echo '<tr>';
                        echo'<td align="left" class="txt-left">'.$item.'</td>';
                    echo '</tr>';

                    echo '<tr>';
                    $qty        = str_repeat("&nbsp;", 1) . $row->qty. 'x ';
    
                    $price      = '@' . number_format($row->harga_jual,0,',','.');

                    $subtotal   = str_repeat("&nbsp;",(16 - (strlen(number_format($row->subtotal,0,',','.'))))) . number_format($row->subtotal,0,',','.');

                    // $total      = $v->total;
                    // $lentotal   = strlen($v->total);
                    // $total      = str_repeat("&nbsp;", ( 10 - $lentotal) ). $v->total;
                        echo'<td class="txt-left" align="left">'.$qty. $price . $subtotal.'</td>';
                    
                    echo '</tr>';
                }

                echo '<tr><td>'. str_repeat('-', 27).'</td></tr>';

                //Sub Total
                $titleST = 'Total';
                $titleST = $titleST. ' '. $jlh_barang.' produk';
                $ST      = number_format($total,0,',','.');
                $ST      = str_repeat("&nbsp;", ( 13 - strlen($ST)) ). $ST;
                echo '<tr><td>'. $titleST. $ST.'</td></tr>';

                echo '<tr><td>'. str_repeat('-', 27).'</td></tr>';
                //Diskon
                // $titleDs = 'Diskon';
                // $titleDs = $titleDs. str_repeat("&nbsp;", ( 15 - strlen($titleDs)) );
                // $Ds      = Rupiah($d->disc, 2);
                // $Ds      = str_repeat("&nbsp;", ( 23 - strlen($Ds)) ). $Ds;
                // echo '<tr><td>'. $titleDs. $Ds.'</td></tr>';
                //PPN
                // $titlePPn = 'PPN';
                // $titlePPn = $titlePPn. str_repeat("&nbsp;", ( 15 - strlen($titlePPn)) );
                // $PPn      = Rupiah($d->ppn, 2);
                // $PPn      = str_repeat("&nbsp;", ( 23 - strlen($PPn)) ). $PPn;
                // echo '<tr><td>'. $titlePPn. $PPn.'</td></tr>';

                //Grand Total
                // $titleGT = 'Grand&nbspTotal';
                // $titleGT = $titleGT. str_repeat("&nbsp;", ( 19 - strlen($titleGT)) );
                // $GT      = Rupiah($d->grand_total, 2);
                // $GT      = str_repeat("&nbsp;", ( 23 - strlen($GT)) ). $GT;
                // echo '<tr><td>'. $titleGT. $GT.'</td></tr>';
                
                //Bayar
                // $titlePy = 'BAYAR';
                // $titlePy = $titlePy. str_repeat("&nbsp;", ( 15 - strlen($titlePy)) );
                // $Py      = Rupiah($d->pay, 2);
                // $Py      = str_repeat("&nbsp;", ( 23 - strlen($Py)) ). $Py;
                // echo '<tr><td>'. $titlePy. $Py.'</td></tr>';

                // $kembali= $d->payment_type == 'Angsuran' ? 0 : $d->pay - $d->grand_total;
                // //Kembali
                // $titleK = 'KEMBALI';
                // $titleK = $titleK. str_repeat("&nbsp;", ( 15 - strlen($titleK)) );
                // $Kb     = Rupiah(($kembali), 2);
                // $Kb      = str_repeat("&nbsp;", ( 23 - strlen($Kb)) ). $Kb;
                // echo '<tr><td>'. $titleK. $Kb.'</td></tr>';
                // echo '<tr><td>&nbsp;</td></tr>';

            }
            echo '</table>';

            $footer = 'TERIMA KASIH';
            $starSpace = ( 25 - strlen($footer) ) / 2;
            $starFooter = str_repeat('*', $starSpace+1);
            echo '<br/>'; 
            echo($starFooter. '&nbsp;'.$footer . '&nbsp;'. $starFooter."<br/>");
            echo '<p>&nbsp;</p>'; 
            echo str_repeat('=', 29);
            
        ?>
        </section>
        
    </body>
    <script type="text/javascript">
        window.print();
    </script>
</html>