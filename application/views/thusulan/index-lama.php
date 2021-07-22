<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
            <a href="<?= base_url('thusulan/usulan_tambah'); ?>" class="btn btn-primary" title="Tambah Data"><i class="fas fa-plus"> Tambah</i></a>
            <?php echo $this->session->flashdata('message'); ?>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="table-responsive">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <form class="form-inline mr-auto w-25 navbar-search float-right">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <table class="mt-5 table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <!-- Nama Kolom -->
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kuota</th>
                                    <th>Tahun</th>
                                    <th>Status Tahun Usulan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($usulan)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        Data Tahun Usulan tidak berhasil ditemukan
                                    </div>
                                <?php endif; ?>
                                <?php $i = 1; ?>
                                <?php foreach ($usulan as $th) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $th['kuota']; ?></td>
                                        <td><?= $th['tahun']; ?></td>
                                        <td><?= $th['status_usulan']; ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>thusulan/usulan_view/<?= $th['id_usulan']; ?>" class="btn btn-success" title="Detail Data"><i class="fas fa-info-circle"></i></a>
                                            <a href="<?= base_url(); ?>thusulan/usulan_edit/<?= $th['id_usulan']; ?>" class="btn btn-danger" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <a href="<?= base_url(); ?>thusulan/usulan_delete/<?= $th['id_usulan']; ?>" class="btn btn-warning" title="Delete Data" onclick="return confirm('Apakah anda akan menghapus data ini?');"><i class="fas fa-trash-alt"></i></a>
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

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2020</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
<!-- Bootstrap core JavaScript-->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="assets/js/demo/datatables-demo.js"></script>