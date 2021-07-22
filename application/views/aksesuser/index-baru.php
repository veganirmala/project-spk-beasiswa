<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistem Pendukung Keputusan Pemberian Beasiswa</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/start/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url(); ?>assets/start/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="">SPK-BEASISWA</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?= base_url() . 'aksesuser'; ?>">Home</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?= base_url() . 'auth'; ?>">Login Admin</a></li>
                    <form action="<?php echo base_url() . 'aksesuser/cari_mhs'; ?>" class="form-inline mx-0 mx-lg-1" method="post">
                        <input class="form-control" type="text" placeholder="Search" aria-label="Search" name="mhs">
                        <br>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari Mahasiswa</button>
                    </form>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead text-white">
        <div class="container d-flex align-items-center flex-column">
            <main role="main" class="container">
                <div class="my-0 p-3 bg-white rounded shadow-sm">
                    <h6 class="page-section-heading text-uppercase text-secondary border-bottom border-gray pb-2 mb-0">Rekap Hasil Rekomendasi Seleksi Beasiswa</h6>
                    <!-- <?php
                            $no = 1;
                            foreach ($rekap as $rek) { ?>
                        <div class="media text-muted pt-3">
                            <button type="button" class="btn btn-primary"><?= $no++; ?></button>
                            <p class="media-body pb-3 mb-0  lh-125 border-bottom border-gray">
                                <strong class="d-block text-gray-dark"><?= $rek['nim'] . " " . $rek['nama_mhs']; ?></strong>
                                <?= $rek['tahun'] . " - " . "  Skor Akhir= " . $rek['skor_total'] . " - "; ?>
                                <strong><?= "Status: " . $rek['status']; ?></strong>

                            </p>
                        </div>
                    <?php } ?> -->

                    <small class="d-block text-right mt-3">
                        <a href="#">Jumlah data: <?= $no - 1; ?></a>
                    </small>
                </div>
            </main>
        </div>
    </header>

    <!-- Copyright Section
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy; Your Website 2021</small></div>
    </div> -->

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?= base_url(); ?>assets/start/js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>