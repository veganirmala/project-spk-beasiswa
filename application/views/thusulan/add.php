<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <form action="<?= base_url('thusulan/usulan_tambah'); ?>" method="POST">
        <div class=" form-group">
            <label for="kuota">Kuota</label>
            <input type="text" name="kuota" class="form-control" id="kuota" placeholder="Kuota Tahun Usulan">
            <?php echo validation_errors(); ?>
        </div>
        <div class=" form-group">
            <label for="tahun">Tahun</label>
            <input type="text" name=tahun class="form-control" id=tahun placeholder="Tahun Usulan">
            <?php echo validation_errors(); ?>
        </div>
        <div class="form-group">
            <label for="status_usulan">Status</label>
            <select class="form-control" tabindex="-1" aria-hidden="true" name="status_usulan">
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