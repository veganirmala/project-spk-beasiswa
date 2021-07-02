<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <form action="<?= base_url('fakultas/fakultas_tambah'); ?>" method="POST">
        <div class=" form-group">
            <label for="nama_fakultas">Nama Fakultas</label>
            <input type="text" name="nama_fakultas" class="form-control" id="nama_fakultas" placeholder="Nama Fakultas">
            <?php echo validation_errors(); ?>
        </div>
        <div class="form-group">
            <label for="ket_fakultas">Keterangan Fakultas</label>
            <textarea name="ket_fakultas" class="form-control" rows="3" placeholder="Deskripsi singkat"></textarea>
        </div>
        <button type="submit" value="Simpan" name="submit" class="btn btn-primary btn-user">
            Simpan
        </button>
        <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-success btn-user">
            Kembali
        </button>
    </form>
</div>