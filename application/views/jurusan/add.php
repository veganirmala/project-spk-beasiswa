<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <form action="<?= base_url('jurusan/jurusan_tambah'); ?>" method="POST">
        <div class="form-group">
            <label for="id_fakultas">Nama Fakultas<span style="color:red;">*</span></label>
            <select class="form-control" tabindex="-1" aria-hidden="true" name="id_fakultas" value="<?= set_value('id_fakultas'); ?>">
                <?php foreach ($fakultas as $f) : ?>
                    <option value="<?php echo $f['id_fakultas']; ?>"><?php echo $f['nama_fakultas']; ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('id_fakultas', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class=" form-group">
            <label for="nama_jurusan">Nama Jurusan<span style="color:red;">*</span></label>
            <input type="text" name="nama_jurusan" class="form-control" id="nama_jurusan" placeholder="Nama Jurusan" value="<?= set_value('nama_jurusan'); ?>">
            <?= form_error('nama_jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="ket_jurusan">Keterangan Jurusan</label>
            <textarea name="ket_jurusan" class="form-control" rows="3" placeholder="Deskripsi singkat" value="<?= set_value('ket_jurusan'); ?>"></textarea>
            <?= form_error('ket_jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <button type="submit" value="Simpan" name="submit" class="btn btn-success btn-user">
            Simpan
        </button>
        <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-primary btn-user">
            Kembali
        </button>
    </form>
</div>