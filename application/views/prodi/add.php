<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <form action="<?= base_url('prodi/prodi_tambah'); ?>" method="POST">
        <div class="form-group">
            <label for="id_jurusan">Nama Jurusan</label>
            <select class="form-control" tabindex="-1" aria-hidden="true" name="id_jurusan">
                <?php foreach ($jurusan as $j) : ?>
                    <option value="<?php echo $j['id_jurusan']; ?>"><?php echo $j['nama_jurusan']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class=" form-group">
            <label for="nama_prodi">Nama Prodi</label>
            <input type="text" name="nama_prodi" class="form-control" id="nama_prodi" placeholder="Nama prodi">
            <?php echo validation_errors(); ?>
        </div>
        <div class=" form-group">
            <label for="jenjang">Jenjang</label>
            <select class="form-control" tabindex="-1" aria-hidden="true" name="jenjang">
                <option value="D3">D3</option>
                <option value="S1">S1</option>
            </select>
        </div>
        <?php echo validation_errors(); ?>
        <div class="form-group">
            <label for="ket_prodi">Keterangan prodi</label>
            <textarea name="ket_prodi" class="form-control" rows="3" placeholder="Deskripsi singkat"></textarea>
        </div>
        <button type="submit" value="Simpan" name="submit" class="btn btn-primary btn-user">
            Simpan
        </button>
        <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-success btn-user">
            Kembali
        </button>
    </form>
</div>