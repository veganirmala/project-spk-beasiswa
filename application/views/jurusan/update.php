<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <form action="" method="POST">
        <input type="hidden" name="id_jurusan" id="id_jurusan" value="<?= $jurusan['id_jurusan']; ?>">
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Fakultas</label>
            <select class="form-control" tabindex="-1" aria-hidden="true" name="id_fakultas">
                <option value="<?php echo $jurusan['id_fakultas']; ?>"><?php echo $jurusan['nama_fakultas']; ?></option>
                <?php foreach ($fakultas as $f) : ?>
                    <option value="<?php echo $f['id_fakultas']; ?>"><?php echo $f['nama_fakultas']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class=" form-group">
            <label for="nama_jurusan">Nama Jurusan</label>
            <input type="text" name="nama_jurusan" class="form-control" id="nama_jurusan" placeholder="Nama Jurusan" value="<?= (set_value('nama_jurusan')) ? set_value('nama_jurusan') : $jurusan['nama_jurusan']; ?>">
            <?php echo validation_errors(); ?>
        </div>
        <div class="form-group">
            <label for="ket_jurusan">Keterangan Jurusan</label>
            <textarea name="ket_jurusan" class="form-control" rows="3" placeholder="Deskripsi singkat"><?= (set_value('ket_jurusan')) ? set_value('ket_jurusan') : $jurusan['ket_jurusan']; ?></textarea>
        </div>
        <button type="submit" value="Simpan" name="submit" class="btn btn-primary btn-user">
            Simpan
        </button>
        <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-success btn-user">
            Kembali
        </button>
    </form>
</div>