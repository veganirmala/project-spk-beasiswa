<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <form action="" method="POST">
        <input type="hidden" name="id_prestasi" id="id_prestasi" value="<?= $prestasi['id_prestasi']; ?>">
        <div class=" form-group">
            <label for="nim">NIM<span style="color:red;">*</span></label>
            <input type="text" name="nim" class="form-control" id="nim" placeholder="NIM" value="<?= (set_value('nim')) ? set_value('nim') : $prestasi['nim']; ?>" readonly>
            <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="id_usulan">Tahun Usulan</label>
            <select class="form-control" tabindex="-1" aria-hidden="true" name="id_usulan">
                <option value="<?php echo $prestasi['id_usulan']; ?>"><?php echo $prestasi['tahun']; ?></option>
                <?php foreach ($thusulan as $th) : ?>
                    <option value="<?php echo $th['id_usulan']; ?>"><?php echo $th['tahun']; ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('id_usulan', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class=" form-group">
            <label for="nilai_prestasi">Nilai Prestasi<span style="color:red;">*</span></label>
            <input type="text" name="nilai_prestasi" class="form-control" id="nilai_prestasi" placeholder="Nilai Prestasi" value="<?= (set_value('nilai_prestasi')) ? set_value('nilai_prestasi') : $prestasi['nilai_prestasi']; ?>">
            <?= form_error('nilai_prestasi', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <button type="submit" value="Simpan" name="submit" class="btn btn-success btn-user">
            Simpan
        </button>
        <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-primary btn-user">
            Kembali
        </button>
    </form>
</div>