<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account</h1>
                        </div>
                        <form action="<?= base_url('auth/registration'); ?>" method="POST">
                            <div class=" form-group">
                                <label for="email">E-mail<span style="color:red;">*</span></label>
                                <input type="text" name="email" class="form-control" id="email" placeholder="***@gmail.com" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Lengkap<span style="color:red;">*</span></label>
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="jk_user">Jenis Kelamin</label>
                                <br>
                                <input type="radio" id="perempuan" name="jk_user" value="Perempuan" <?php echo set_radio('jk_user', 'Perempuan', TRUE); ?>>
                                <label>Perempuan</label>
                                <tr><input type="radio" id="laki-laki" name="jk_user" value="Laki-laki" <?php echo set_radio('jk_user', 'Laki-laki', TRUE); ?>>
                                    <label>Laki-laki</label>
                                </tr>
                                <?= form_error('jk_user', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class=" form-group">
                                <label for="password">Password<span style="color:red;">*</span></label>
                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                <br>
                                <div class="form-group ml-2">
                                    <input type="checkbox" class="form-checkbox" id="form-checkbox" name="form-checkbox" onclick="myFunction()">
                                    <label for="showPass">Show Password</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tipe User<span style="color:red;">*</span></label>
                                <select class="form-control" tabindex="-1" aria-hidden="true" name="tipe" value="<?= set_value('tipe'); ?>">
                                    <option value=" Admin">Admin</option>
                                </select>
                                <?= form_error('tipe', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" tabindex="-1" aria-hidden="true" name="status" value="<?= set_value('status'); ?>">
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                                <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <button type="submit" value="Simpan" name="submit" class="btn btn-success btn-user">
                                Registration
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

<script type="text/javascript">
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>