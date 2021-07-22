<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <form action="<?= base_url('kepribadian/kepribadian_tambah'); ?>" method="POST">
        <div class=" form-group">
            <label for="nim">NIM<span style="color:red;">*</span></label>
            <input type="text" name="nim" class="form-control" id="nim" placeholder="NIM" value="<?= set_value('nim'); ?>">
            <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="id_usulan">Tahun Usulan</label>
            <select class="form-control" tabindex="-1" aria-hidden="true" name="id_usulan" value="<?= set_value('id_usulan'); ?>">
                <?php foreach ($thusulan as $th) : ?>
                    <option value="<?php echo $th['id_usulan']; ?>"><?php echo $th['tahun']; ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('id_usulan', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class=" form-group">
            <label for="nilai_pribadi">Nilai Kepribadian<span style="color:red;">*</span></label>
            <input type="text" name="nilai_pribadi" class="form-control" id="nilai_pribadi" placeholder="Nilai Kepribadian" value="<?= set_value('nilai_pribadi'); ?>">
            <?= form_error('nilai_pribadi', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class=" form-group">
            <label for="ipk">IPK<span style="color:red;">*</span></label>
            <input type="text" name="ipk" class="form-control" id="ipk" placeholder="IPK" value="<?= set_value('ipk'); ?>">
            <?= form_error('ipk', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <button type="submit" value="Simpan" name="submit" class="btn btn-success btn-user">
            Simpan
        </button>
        <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-primary btn-user">
            Kembali
        </button>
    </form>
</div>