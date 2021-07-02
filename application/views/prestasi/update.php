<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <form action="" method="POST">
        <input type="hidden" name="id_prestasi" id="id_prestasi" value="<?= $prestasi['id_prestasi']; ?>">
        <div class=" form-group">
            <label for="nim">NIM</label>
            <input type="text" name="nim" class="form-control" id="nim" placeholder="NIM" value="<?= (set_value('nim')) ? set_value('nim') : $prestasi['nim']; ?>" readonly>
            <?php echo validation_errors(); ?>
        </div>
        <div class="form-group">
            <label for="id_usulan">Tahun Usulan</label>
            <select class="form-control" tabindex="-1" aria-hidden="true" name="id_usulan">
                <option value="<?php echo $prestasi['id_usulan']; ?>"><?php echo $prestasi['tahun']; ?></option>
                <?php foreach ($thusulan as $th) : ?>
                    <option value="<?php echo $th['id_usulan']; ?>"><?php echo $th['tahun']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class=" form-group">
            <label for="nilai_prestasi">Nilai Prestasi</label>
            <input type="text" name="nilai_prestasi" class="form-control" id="nilai_prestasi" placeholder="Nilai Prestasi" value="<?= (set_value('nilai_prestasi')) ? set_value('nilai_prestasi') : $prestasi['nilai_prestasi']; ?>">
            <?php echo validation_errors(); ?>
        </div>
        <button type="submit" value="Simpan" name="submit" class="btn btn-primary btn-user">
            Simpan
        </button>
        <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-success btn-user">
            Kembali
        </button>
    </form>
</div>