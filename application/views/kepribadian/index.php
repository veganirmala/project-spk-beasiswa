<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template -->
    <link href="<?= base_url(); ?>assets/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>assets/sbadmin/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url(); ?>assets/sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url(); ?>assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

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
                            <a href="<?= base_url('kepribadian/kepribadian_tambah'); ?>" class="btn btn-primary" title="Tambah Data"><i class="fas fa-plus"> Tambah</i></a>
                            <?php echo $this->session->flashdata('message'); ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Tahun Usulan</th>
                                            <th>Nilai Pribadi</th>
                                            <th>IPK</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($kepribadian)) : ?>
                                            <div class="alert alert-danger" role="alert">
                                                Data Kepribadian tidak berhasil ditemukan
                                            </div>
                                        <?php endif; ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($kepribadian as $kpr) : ?>
                                            <tr>
                                                <th scope="row"><?= $i; ?></th>
                                                <td><?= $kpr['nim']; ?></td>
                                                <td><?= $kpr['tahun']; ?></td>
                                                <td><?= $kpr['nilai_pribadi']; ?></td>
                                                <td><?= $kpr['ipk']; ?></td>
                                                <td>
                                                    <a href="<?= base_url(); ?>kepribadian/kepribadian_view/<?= $kpr['id_kepribadian']; ?>" class="btn btn-success" title="Detail Data"><i class="fas fa-info-circle"></i></a>
                                                    <a href="<?= base_url(); ?>kepribadian/kepribadian_edit/<?= $kpr['id_kepribadian']; ?>" class="btn btn-danger" title="Edit Data"><i class="fas fa-edit"></i></a>
                                                    <a href="<?= base_url(); ?>kepribadian/kepribadian_delete/<?= $kpr['id_kepribadian']; ?>" class="btn btn-warning" title="Delete Data" onclick="return confirm('Apakah anda akan menghapus data ini?');"><i class="fas fa-trash-alt"></i></a>
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

</body>

</html>