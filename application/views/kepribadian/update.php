<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <form action="" method="POST">
        <input type="hidden" name="id_kepribadian" id="id_kepribadian" value="<?= $kepribadian['id_kepribadian']; ?>">
        <div class=" form-group">
            <label for="nim">NIM</label>
            <input type="text" name="nim" class="form-control" id="nim" placeholder="NIM" value="<?= (set_value('nim')) ? set_value('nim') : $kepribadian['nim']; ?>" readonly>
            <?php echo validation_errors(); ?>
        </div>
        <div class="form-group">
            <label for="id_usulan">Tahun Usulan</label>
            <select class="form-control" tabindex="-1" aria-hidden="true" name="id_usulan">
                <option value="<?php echo $kepribadian['id_usulan']; ?>"><?php echo $kepribadian['tahun']; ?></option>
                <?php foreach ($thusulan as $th) : ?>
                    <option value="<?php echo $th['id_usulan']; ?>"><?php echo $th['tahun']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class=" form-group">
            <label for="nilai_pribadi">Nilai Kepribadian</label>
            <input type="text" name="nilai_pribadi" class="form-control" id="nilai_pribadi" placeholder="Nilai Kepribadian" value="<?= (set_value('nilai_pribadi')) ? set_value('nilai_pribadi') : $kepribadian['nilai_pribadi']; ?>">
            <?php echo validation_errors(); ?>
        </div>
        <div class=" form-group">
            <label for="ipk">IPK</label>
            <input type="text" name="ipk" class="form-control" id="ipk" placeholder="IPK" value="<?= (set_value('ipk')) ? set_value('ipk') : $kepribadian['ipk']; ?>">
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