<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
                    <!-- tampilin tahun usulan aktif -->
                    <!-- <div class="form-group">
                        <label for="id_usulan">Tahun Usulan</label>
                        <select class="form-control" tabindex="-1" aria-hidden="true" name="id_usulan" value="<?= set_value('id_usulan'); ?>">
                            <?php foreach ($thusulan as $th) : ?>
                                <option value="<?php echo $th['id_usulan']; ?>"><?php echo $th['tahun']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('id_usulan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div> -->
                    <a href="<?= base_url('rekap/rekap_sinkron'); ?>" class="btn btn-primary" title="Sinkronisasi Data"><i class="fas fa-spinner"></i> Sinkronisasi</a>
                    <a href="<?= base_url('rekap/cetak_rekap'); ?>" class="btn btn-info" title="Cetak Data"><i class="fas fa-file-download"></i> Cetak</a>
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <!-- <th>NAMA</th> -->
                                    <th>Tahun Usulan</th>
                                    <th>Skor IPK</th>
                                    <th>Skor Pribadi</th>
                                    <th>Skor Prestasi</th>
                                    <th>Skor Ekonomi</th>
                                    <th>Skor Total</th>
                                    <th>Status Kelayakan</th>
                                    <th>Ranking</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($rekap)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        Data Rekap tidak berhasil ditemukan
                                    </div>
                                <?php endif; ?>
                                <?php $i = 1; ?>
                                <?php $ranking = 1; ?>
                                <?php foreach ($rekap as $rkp) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $rkp['nim']; ?></td>
                                        <!-- <td><?= $rkp['nama_mhs']; ?></td> -->
                                        <td><?= $rkp['tahun']; ?></td>
                                        <td><?= $rkp['skor_ip']; ?></td>
                                        <td><?= $rkp['skor_pribadi']; ?></td>
                                        <td><?= $rkp['skor_prestasi']; ?></td>
                                        <td><?= $rkp['skor_ekonomi']; ?></td>
                                        <td><?= $rkp['skor_total']; ?></td>
                                        <td><?= $rkp['status']; ?></td>
                                        <td><?= $ranking ?></td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php $ranking++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->