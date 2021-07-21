<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <form action="<?= base_url('PrestasiBidang/bidang_tambah'); ?>" method="POST">
        <div class=" form-group">
            <label for="nama_bidang">Nama Bidang<span style="color:red;">*</span></label>
            <input type="text" name="nama_bidang" class="form-control" id="nama_bidang" placeholder="Nama Bidang" value="<?= set_value('nama_bidang'); ?>">
            <?= form_error('nama_bidang', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="tingkat">Tingkat<span style="color:red;">*</span></label>
            <select class="form-control" tabindex="-1" aria-hidden="true" name="tingkat" value="<?= set_value('tingkat'); ?>">
                <option value="Lokal">Lokal</option>
                <option value="Kabupaten">Kabupaten</option>
                <option value="Provinsi">Provinsi</option>
                <option value="Nasional">Nasional</option>
                <option value="Internasional">Internasional</option>
            </select>
            <?= form_error('tingkat', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="juara">Juara<span style="color:red;">*</span></label>
            <select class="form-control" tabindex="-1" aria-hidden="true" name="juara" value="<?= set_value('juara'); ?>">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <?= form_error('juara', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class=" form-group">
            <label for="skor">Skor<span style="color:red;">*</span></label>
            <input type="text" name="skor" class="form-control" id="skor" placeholder="Skor" value="<?= set_value('skor'); ?>">
            <?= form_error('skor', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="status_bidang">Status</label>
            <select class="form-control" tabindex="-1" aria-hidden="true" name="status_bidang" value="<?= set_value('status_bidang'); ?>">
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
            <?= form_error('status_bidang', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <button type="submit" value="Simpan" name="submit" class="btn btn-success btn-user">
            Simpan
        </button>
        <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-primary btn-user">
            Kembali
        </button>
    </form>
</div>