<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <form action="" method="POST">
        <input type="hidden" name="id_usulan" id="id_usulan" value="<?= $usulan['id_usulan']; ?>">
        <div class=" form-group">
            <label for="kuota">Kuota<span style="color:red;">*</span></label>
            <input type="text" name="kuota" class="form-control" id="kuota" placeholder="Kuota Tahun Usulan" value="<?= (set_value('kuota')) ? set_value('kuota') : $usulan['kuota']; ?>">
            <?= form_error('kuota', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class=" form-group">
            <label for="tahun">Tahun<span style="color:red;">*</span></label>
            <input type="text" name=tahun class="form-control" id=tahun placeholder="Tahun Usulan" value="<?= (set_value('tahun')) ? set_value('tahun') : $usulan['tahun']; ?>">
            <?= form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="status_usulan">Status<span style="color:red;">*</span></label>
            <select class="form-control" tabindex="-1" aria-hidden="true" name="status_usulan">
                <option value="<?= $usulan['status_usulan']; ?>"><?= $usulan['status_usulan']; ?></option>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
            <?= form_error('status_usulan', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <button type="submit" value="Simpan" name="submit" class="btn btn-success btn-user">
            Simpan
        </button>
        <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-primary btn-user">
            Kembali
        </button>
    </form>
</div>