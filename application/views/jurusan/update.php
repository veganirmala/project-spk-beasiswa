<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <form action="" method="POST">
        <input type="hidden" name="id_jurusan" id="id_jurusan" value="<?= $jurusan['id_jurusan']; ?>">
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Fakultas<span style="color:red;">*</span></label>
            <select class="form-control" tabindex="-1" aria-hidden="true" name="id_fakultas">
                <option value="<?php echo $jurusan['id_fakultas']; ?>"><?php echo $jurusan['nama_fakultas']; ?></option>
                <?php foreach ($fakultas as $f) : ?>
                    <option value="<?php echo $f['id_fakultas']; ?>"><?php echo $f['nama_fakultas']; ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('id_fakultas', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class=" form-group">
            <label for="nama_jurusan">Nama Jurusan<span style="color:red;">*</span></label>
            <input type="text" name="nama_jurusan" class="form-control" id="nama_jurusan" placeholder="Nama Jurusan" value="<?= (set_value('nama_jurusan')) ? set_value('nama_jurusan') : $jurusan['nama_jurusan']; ?>">
            <?= form_error('nama_jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="ket_jurusan">Keterangan Jurusan</label>
            <textarea name="ket_jurusan" class="form-control" rows="3" placeholder="Deskripsi singkat"><?= (set_value('ket_jurusan')) ? set_value('ket_jurusan') : $jurusan['ket_jurusan']; ?></textarea>
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