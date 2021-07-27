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
                    <a href="<?= base_url('jurusan/jurusan_tambah'); ?>" class="btn btn-primary" title="Tambah Data"><i class="fas fa-plus"></i> Tambah</a>
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Fakultas</th>
                                    <th>Nama Jurusan</th>
                                    <th>Keterangan Jurusan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($jurusan)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        Data Jurusan tidak berhasil ditemukan
                                    </div>
                                <?php endif; ?>
                                <?php $i = 1; ?>
                                <?php foreach ($jurusan as $jrsn) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $jrsn['nama_fakultas']; ?></td>
                                        <td><?= $jrsn['nama_jurusan']; ?></td>
                                        <td><?= $jrsn['ket_jurusan']; ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>jurusan/jurusan_view/<?= $jrsn['id_jurusan']; ?>" class="btn btn-success" title="Detail Data"><i class="fas fa-info-circle"></i></a>
                                            <a href="<?= base_url(); ?>jurusan/jurusan_edit/<?= $jrsn['id_jurusan']; ?>" class="btn btn-danger" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <a href="<?= base_url(); ?>jurusan/jurusan_delete/<?= $jrsn['id_jurusan']; ?>" class="btn btn-warning" title="Delete Data" onclick="return confirm('Apakah anda akan menghapus data ini?');"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
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