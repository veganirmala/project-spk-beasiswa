<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <form action="" method="POST">
        <input type="hidden" name="id_fakultas" id="id_fakultas" value="<?= $fakultas['id_fakultas']; ?>">
        <div class=" form-group">
            <label for="nama_fakultas">Nama Fakultas<span style="color:red;">*</span></label>
            <input type="text" name="nama_fakultas" class="form-control" id="nama_fakultas" placeholder="Nama Fakultas" value="<?= (set_value('nama_fakultas')) ? set_value('nama_fakultas') : $fakultas['nama_fakultas']; ?>">
            <?= form_error('nama_fakultas', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="ket_fakultas">Keterangan Fakultas</label>
            <textarea name="ket_fakultas" class="form-control" rows="3" placeholder="Deskripsi singkat"><?= (set_value('ket_fakultas')) ? set_value('ket_fakultas') : $fakultas['ket_fakultas']; ?></textarea>
            <?= form_error('ket_fakultas', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <button type="submit" value="Simpan" name="submit" class="btn btn-success btn-user">
            Simpan
        </button>
        <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-primary btn-user">
            Kembali
        </button>
    </form>
</div>