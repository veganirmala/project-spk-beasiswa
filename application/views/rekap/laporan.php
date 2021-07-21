<html>

<head>
    <title><?= $title; ?></title>
    <style>
        table tr td {
            font-size: 14px;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        table tr .text {
            text-align: center;
            font-size: 14px;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        table tr .text2 {
            text-align: left;
            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;
        }

        table tr .text3 {
            text-align: right;
            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>

<body class="mt-5">
    <div class="container">
        <center>
            <table>
                <tr>
                    <td>
                        <img src="<?= base_url() . 'assets/sbadmin/undiksha.png'; ?>" alt="" width="150" height="150">
                    </td>
                    <td>
                        <center>
                            <font size="6.5">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</font><br>
                            <font size="6">UNIVERSITAS PENDIDIKAN GANESHA</font><br>
                            <font size="5.5"><b>FAKULTAS TEKNIK DAN KEJURUAN</b></font><br>
                            <font size="5">Alamat Jalan Udayana Nomor 11, Singaraja 81116</font><br>
                            <font size="5">Telepon (0362) 25571 Fax. (0362) 25561</font><br>
                            <font size="5">Laman http://ftk.undiksha.ac.id</font><br>
                        </center>
                    </td>
                </tr>
            </table>
            <tr>
                <td colspan="5" size="12px" color="black" align="center" width="25%">
                    <hr>
                </td>
            </tr>
            <table width="600" align="center">
                <tr>
                    <td class="text">
                        <b>Hasil Rekomendasi Seleksi Beasiswa Peningkatan Prestasi Akademik</b>
                    </td>
                </tr>
            </table>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">NIM</th>
                        <th scope="col">SKOR IPK</th>
                        <th scope="col">SKOR PRIBADI</th>
                        <th scope="col">SKOR PRESTASI</th>
                        <th scope="col">SKOR EKONOMI</th>
                        <th scope="col">SKOR TOTAL</th>
                        <th scope="col">STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($rekap as $rkp) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $rkp['nim']; ?></td>
                            <td><?= $rkp['skor_ip']; ?></td>
                            <td><?= $rkp['skor_pribadi']; ?></td>
                            <td><?= $rkp['skor_prestasi']; ?></td>
                            <td><?= $rkp['skor_ekonomi']; ?></td>
                            <td><?= $rkp['skor_total']; ?></td>
                            <td><?= $rkp['status']; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </center>
        <!-- <table>
            <tr>
                <td class="text2" align="left">Menyetujui,<br>Ketua<br><br><br>(Drs.lalala)<br>NIP.0775</td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="text3" align="right">Singaraja,<br>Staff Beasiswa<br><br><br>(Drs.lalala)<br>NIP.0775</td>
            </tr>
        </table> -->
        <script type="text/javascript">
            window.print();
        </script>
    </div>
</body>

</html>