<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <form action="<?= base_url('prestasi/prestasi_tambah'); ?>" method="POST">
        <div class=" form-group">
            <label for="nim">NIM</label>
            <input type="text" name="nim" class="form-control" id="nim" placeholder="NIM">
            <?php echo validation_errors(); ?>
        </div>
        <div class="form-group">
            <label for="id_usulan">Tahun Usulan</label>
            <select class="form-control" tabindex="-1" aria-hidden="true" name="id_usulan">
                <?php foreach ($thusulan as $th) : ?>
                    <option value="<?php echo $th['id_usulan']; ?>"><?php echo $th['tahun']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class=" form-group">
            <label for="nilai_prestasi">Nilai Prestasi</label>
            <input type="text" name="nilai_prestasi" class="form-control" id="nilai_prestasi" placeholder="Nilai Prestasi">
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