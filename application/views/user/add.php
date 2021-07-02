<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tambah User</h1>
                        </div>
                        <form action="<?= base_url('user/user_tambah'); ?>" method="POST">
                            <div class=" form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                                <?php echo validation_errors(); ?>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap">
                            </div>
                            <!-- <div class="form-group">
                                <label for="jk_user">Jenis Kelamin</label>
                                <div class="custom-control custom-radio ml-2">
                                    <input type="radio" id="laki-laki" name="jk_user" value="M" <?php echo set_radio('jk_user', 'M', TRUE); ?> class="custom-control-input">
                                    <label class="custom-control-label" for="laki-laki">Laki-laki</label>
                                </div>
                                <div class="custom-control custom-radio ml-2">
                                    <input type="radio" id="perempuan" name="jk_user" value="F" <?php echo set_radio('jk_user', 'F', TRUE); ?> class="custom-control-input">
                                    <label class="custom-control-label" for="perempuan">Perempuan</label>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label for="jk_user">Jenis Kelamin</label>
                                <br>
                                <input type="radio" id="perempuan" name="jk_user" value="F" <?php echo set_radio('jk_user', 'F', TRUE); ?>>
                                <label>Perempuan</label>
                                <tr><input type="radio" id="laki-laki" name="jk_user" value="M" <?php echo set_radio('jk_user', 'M', TRUE); ?>>
                                    <label>Laki-laki</label>
                                </tr>
                            </div>
                            <div class=" form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Enter Password...">
                                <?php echo validation_errors(); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tipe User</label>
                                <select class="form-control" tabindex="-1" aria-hidden="true" name="tipe">
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" tabindex="-1" aria-hidden="true" name="status">
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                            <button type="submit" value="Simpan" name="submit" class="btn btn-primary btn-user">
                                Simpan
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?php echo base_url(); ?>auth">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>