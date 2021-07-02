<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <form action="" method="POST">
        <input type="hidden" name="id_bidang" id="id_bidang" value="<?= $bidang['id_bidang']; ?>">
        <div class=" form-group">
            <label for="nama_bidang">Nama Bidang</label>
            <input type="text" name="nama_bidang" class="form-control" id="nama_bidang" placeholder="Nama Bidang" value="<?= (set_value('nama_bidang')) ? set_value('nama_bidang') : $bidang['nama_bidang']; ?>">
            <?php echo validation_errors(); ?>
        </div>
        <div class="form-group">
            <label for="tingkat">Tingkat</label>
            <select class="form-control" tabindex="-1" aria-hidden="true" name="tingkat">
                <option value="<?= $bidang['tingkat']; ?>"><?= $bidang['tingkat']; ?></option>
                <option value="Lokal">Lokal</option>
                <option value="Kabupaten">Kabupaten</option>
                <option value="Provinsi">Provinsi</option>
                <option value="Nasional">Nasional</option>
                <option value="Internasional">Internasional</option>
            </select>
        </div>
        <div class="form-group">
            <label for="juara">Juara</label>
            <select class="form-control" tabindex="-1" aria-hidden="true" name="juara">
                <option value="<?= $bidang['juara']; ?>"><?= $bidang['juara']; ?></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>
        <div class=" form-group">
            <label for="skor">Skor</label>
            <input type="text" name="skor" class="form-control" id="skor" placeholder="skor" value="<?= (set_value('skor')) ? set_value('skor') : $bidang['skor']; ?>">
            <?php echo validation_errors(); ?>
        </div>
        <div class="form-group">
            <label for="status_bidang">Status</label>
            <select class="form-control" tabindex="-1" aria-hidden="true" name="status_bidang">
                <option value="<?= $bidang['status_bidang']; ?>"><?= $bidang['status_bidang']; ?></option>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
        </div>
        <button type="submit" value="Simpan" name="submit" class="btn btn-primary btn-user">
            Simpan
        </button>
        <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-success btn-user">
            Kembali
        </button>
    </form>
</div>