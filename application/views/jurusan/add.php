<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <form action="<?= base_url('jurusan/jurusan_tambah'); ?>" method="POST">
        <div class="form-group">
            <label for="id_fakultas">Nama Fakultas</label>
            <select class="form-control" tabindex="-1" aria-hidden="true" name="id_fakultas">
                <?php foreach ($fakultas as $f) : ?>
                    <option value="<?php echo $f['id_fakultas']; ?>"><?php echo $f['nama_fakultas']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class=" form-group">
            <label for="nama_jurusan">Nama Jurusan</label>
            <input type="text" name="nama_jurusan" class="form-control" id="nama_jurusan" placeholder="Nama Jurusan">
            <?php echo validation_errors(); ?>
        </div>
        <div class="form-group">
            <label for="ket_jurusan">Keterangan Jurusan</label>
            <textarea name="ket_jurusan" class="form-control" rows="3" placeholder="Deskripsi singkat"></textarea>
        </div>
        <button type="submit" value="Simpan" name="submit" class="btn btn-primary btn-user">
            Simpan
        </button>
        <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-success btn-user">
            Kembali
        </button>
    </form>
</div>