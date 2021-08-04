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

        table th .text2 {
            text-align: left;
            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;
        }

        table th .text3 {
            text-align: left;
            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .flex {
            display: flex;
            justify-content: space-between;
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
                        <th scope="col">NAMA MAHASISWA</th>
                        <th scope="col">TAHUN USULAN</th>
                        <th scope="col">SKOR TOTAL</th>
                        <th scope="col">STATUS KELAYAKAN</th>
                        <th scope="col">RANKING</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php $ranking = 1; ?>
                    <?php foreach ($rekap as $rkp) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $rkp['nim']; ?></td>
                            <td><?= $rkp['nama_mhs']; ?></td>
                            <td><?= $rkp['tahun']; ?></td>
                            <!-- <td><?= $rkp['skor_ip']; ?></td>
                            <td><?= $rkp['skor_pribadi']; ?></td>
                            <td><?= $rkp['skor_prestasi']; ?></td>
                            <td><?= $rkp['skor_ekonomi']; ?></td> -->
                            <td><?= $rkp['skor_total']; ?></td>
                            <td><?= $rkp['status']; ?></td>
                            <td><?= $ranking ?></td>
                        </tr>
                        <?php $i++; ?>
                        <?php $ranking++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </center>

        <h6 class="flex">
            <span class="text2" align="left"></span>
            <!-- <span class="text3" align="right">Singaraja,<?= date(' d-m-Y '); ?><br>a/n Dekan<br>Wakil Dekan III,<br><br>Cokorda Istri Raka Marsiti, S.Pd., M.Pd.<br>NIP. 197103031997032001</span> -->
            <span class="text3" align="left">Singaraja,<?= date(' d-m-Y '); ?><br>a/n Dekan<br>Wakil Dekan III,<br><br><br><br>Cokorda Istri Raka Marsiti, S.Pd., M.Pd.<br>NIP. 197103031997032001</span>
        </h6>
        <script type="text/javascript">
            window.print();
        </script>
    </div>
</body>

</html>