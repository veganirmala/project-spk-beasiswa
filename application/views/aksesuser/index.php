<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Sistem Pendukung Keputusan Pemberian Beasiswa</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/offcanvas/">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url(); ?>/assets/css-user/dist/css/bootstrap.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="<?= base_url(); ?>/assets/css-user/offcanvas.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <a class="navbar-brand mr-auto mr-lg-0" href="#">SPK-BEASISWA</a>
        <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url() . 'aksesuser'; ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() . 'auth'; ?>">Login Admin</a>
                </li>
                <!-- <li class="nav-item" href="<?= base_url() . 'auth'; ?>" data-toggle="modal" data-target="#loginModal">
                    <a class="nav-link" href="<?= base_url() . 'auth'; ?>">Login Admin</a>
                </li> -->
            </ul>
            <form action="<?php echo base_url() . 'aksesuser/cari_mhs'; ?>" class="form-inline my-2 my-lg-0" method="post">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="mhs">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari Mahasiswa</button>
            </form>
        </div>
    </nav>



    <main role="main" class="container">
        <!-- <div class="my-3 p-3 bg-white rounded shadow-sm">

            <div class="input-group">
                <form action="<?php echo base_url() . 'aksesuser/cari_tahun'; ?>" class="form-inline my-2 my-lg-0" method="post">
                    <select name="th" class="custom-select mr-1" id="inputGroupSelect04" aria-label="Example select with button addon">
                        <option selected>Pilih Tahun Usulan</option>
                        <?php foreach ($th_aktif as $th) { ?>
                            <option value="<?= $th['tahun']; ?>"><?= $th['tahun']; ?></option>

                        <?php } ?>
                    </select>
                    <div class="input-group">
                        <button class="btn btn-secondary" type="submit">Cari</button>
                    </div>
                </form>
                <form action="<?php echo base_url() . 'aksesuser/cari_status'; ?>" class="form-inline my-2 my-lg-0" method="post">
                    <select name="status" class="custom-select ml-5 mr-1" id="inputGroupSelect04" aria-label="Example select with button addon">
                        <option selected>Pilih Status Usulan</option>
                        <option value="Draf">Draf</option>
                        <option value="Diusulkan">Diusulkan</option>
                        <option value="Tidak Diusulkan">Tidak Diusulkan</option>

                    </select>
                    <div class="input-group">
                        <button class="btn btn-secondary" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div> -->
        <div class="my-3 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom border-gray pb-2 mb-0">Rekap Hasil Rekomendasi Seleksi Beasiswa</h6>

            <!-- <?php
                    $no = 1;
                    foreach ($rekap as $rek) { ?>
                <div class="media text-muted pt-3">
                    <button type="button" class="btn btn-primary mr-3"><?= $no++; ?></button>
                    <p class="media-body pb-3 mb-0  lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark"><?= $rek['nim'] . " " . $rek['nama']; ?></strong>
                        <?= $rek['tahun'] . " - " . $rek['id_beasiswa'] . " - " . $rek['nama_jurusan'] . " - " . $rek['nama_prodi'] . " - Skor Akhir= " . $rek['skor_total'] . " - "; ?>
                        <strong><?= "Status: " . $rek['ket_rekap']; ?></strong>

                    </p>
                </div>
            <?php } ?> -->

            <small class="d-block text-right mt-3">
                <a href="#">Jumlah data: <?= $no - 1; ?></a>
            </small>
        </div>


    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="../assets/dist/js/bootstrap.bundle.js"></script>
    <script src="offcanvas.js"></script>
</body>

</html>