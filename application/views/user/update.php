<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <form action="" method="POST">
        <input type="hidden" name="id_user" id="id_user" value="<?= $user['id_user']; ?>">
        <div class=" form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?= (set_value('email')) ? set_value('email') : $user['email']; ?>">
            <?php echo validation_errors(); ?>
        </div>
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" value="<?= (set_value('nama')) ? set_value('nama') : $user['nama']; ?>">
        </div>
        <div class="form-group">
            <label for="jk_user">Jenis Kelamin</label>
            <br>
            <input type="radio" id="perempuan" name="jk_user" value="F" <?php if ($user['jk_user'] == 'F') echo 'checked' ?>>
            <label>Perempuan</label>
            <tr><input type="radio" id="laki-laki" name="jk_user" value="M" <?php if ($user['jk_user'] == 'M') echo 'checked' ?>>
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
                <option value="<?= $user['tipe']; ?>"><?= $user['tipe']; ?></option>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Status</label>
            <select class="form-control" tabindex="-1" aria-hidden="true" name="status">
                <option value="<?= $user['status']; ?>"><?= $user['status']; ?></option>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
        </div>
        <button type="submit" value="Simpan" name="submit" class="btn btn-primary btn-user">
            Simpan
        </button>
        <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-success btn-user">
            Kembali
        </button>
    </form>
</div>