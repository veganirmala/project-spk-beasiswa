<body class="mt-5">
    <div class="container">
        <h3 align="center" class="font-weight-bold"><?= $title; ?></h3>
        <table class="table table-bordered">
            <thead>
                <tr>
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
        <script type="text/javascript">
            window.print();
        </script>
    </div>
</body>