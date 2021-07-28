<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <form action="" method="POST">
        <input type="hidden" name="id_user" id="id_user" value="<?= $user['id_user']; ?>">
        <div class=" form-group">
            <label for="email">Email<span style="color:red;">*</span></label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?= (set_value('email')) ? set_value('email') : $user['email']; ?>">
            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="nama">Nama Lengkap<span style="color:red;">*</span></label>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" value="<?= (set_value('nama')) ? set_value('nama') : $user['nama']; ?>">
            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="jk_user">Jenis Kelamin</label>
            <br>
            <input type="radio" id="perempuan" name="jk_user" value="Perempuan" <?php if ($user['jk_user'] == 'Perempuan') echo 'checked' ?>>
            <label>Perempuan</label>
            <tr><input type="radio" id="laki-laki" name="jk_user" value="Laki-laki" <?php if ($user['jk_user'] == 'Laki-laki') echo 'checked' ?>>
                <label>Laki-laki</label>
            </tr>
            <?= form_error('jk_user', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class=" form-group">
            <label for="password">Password<span style="color:red;">*</span></label>
            <br>
            <small><i><span style="color:red;">*</span>Kosongkan jika tidak ingin mengubah password</i></small>
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
            <select class="form-control" tabindex="-1" aria-hidden="true" name="tipe">
                <option value="<?= $user['tipe']; ?>"><?= $user['tipe']; ?></option>
                <option value="Admin">Admin</option>
            </select>
            <?= form_error('tipe', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <button type="submit" value="Simpan" name="submit" class="btn btn-success btn-user">
            Simpan
        </button>
        <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-primary btn-user">
            Kembali
        </button>
    </form>
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