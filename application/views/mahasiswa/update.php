<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <form action="" method="POST">
        <input type="hidden" name="nim" id="nim" value="<?= $mhs['nim']; ?>">
        <div class="row">
            <!-- awal kolom 1 -->
            <div class="col-md-6">
                <div class="col">
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" name="nim" class="form-control" id="nim" placeholder="NIM" value="<?= (set_value('nim')) ? set_value('nim') : $mhs['nim']; ?>">
                        <?php echo validation_errors(); ?>
                    </div>
                    <div class="form-group">
                        <label for="nama_mhs">Nama Mahasiswa</label>
                        <input type="text" name="nama_mhs" class="form-control" id="nama_mhs" placeholder="Nama Mahasiswa" value="<?= (set_value('nama_mhs')) ? set_value('nama_mhs') : $mhs['nama_mhs']; ?>">
                        <?php echo validation_errors(); ?>
                    </div>
                    <div class="form-group">
                        <label for="jk_mhs">Jenis Kelamin</label>
                        <br>
                        <input type="radio" id="perempuan" name="jk_mhs" value="F" <?php if ($mhs['jk_mhs'] == 'F') echo 'checked' ?>>
                        <label>Perempuan</label>
                        <tr><input type="radio" id="laki-laki" name="jk_mhs" value="M" <?php if ($mhs['jk_mhs'] == 'M') echo 'checked' ?>>
                            <label>Laki-laki</label>
                        </tr>
                        <br>
                    </div>
                    <!-- <div class="form-group">
                        <label for="jk_mhs">Jenis Kelamin</label>
                        <div class="custom-control custom-radio ml-2">
                            <input type="radio" id="laki-laki" name="jk_mhs" value="M" <?php if ($mhs['jk_mhs'] == 'M') echo 'checked' ?> class="custom-control-input">
                            <label class="custom-control-label" for="laki-laki">Laki-laki</label>
                        </div>
                        <div class="custom-control custom-radio ml-2">
                            <input type="radio" id="perempuan" name="jk_mhs" value="F" <?php if ($mhs['jk_mhs'] == 'F') echo 'checked' ?> class="custom-control-input">
                            <label class="custom-control-label" for="perempuan">Perempuan</label>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label for="no_hp_mhs">No HP Mahasiswa</label>
                        <input type="text" name="no_hp_mhs" class="form-control" id="no_hp_mhs" placeholder="No HP Mahasiswa" value="<?= (set_value('no_hp_mhs')) ? set_value('no_hp_mhs') : $mhs['no_hp_mhs']; ?>">
                        <?php echo validation_errors(); ?>
                    </div>
                    <div class="form-group">
                        <label for="alamat_mhs">Alamat Mahasiswa</label>
                        <input type="text" name="alamat_mhs" class="form-control" id="alamat_mhs" placeholder="Alamat Mahasiswa" value="<?= (set_value('alamat_mhs')) ? set_value('alamat_mhs') : $mhs['alamat_mhs']; ?>">
                        <?php echo validation_errors(); ?>
                    </div>
                    <div class="form-group">
                        <label for="id_prodi">Nama Prodi</label>
                        <select class="form-control" tabindex="-1" aria-hidden="true" name="id_prodi">
                            <option value="<?php echo $mhs['id_prodi']; ?>"><?php echo $mhs['nama_prodi']; ?></option>
                            <?php foreach ($prodi as $p) { ?>
                                <option value="<?php echo $p['id_prodi']; ?>"><?php echo $p['nama_prodi']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ortu_nama">Nama Orang Tua</label>
                        <input type="text" name="ortu_nama" class="form-control" id="ortu_nama" placeholder="Nama Orang Tua" value="<?= (set_value('ortu_nama')) ? set_value('ortu_nama') : $mhs['ortu_nama']; ?>">
                        <?php echo validation_errors(); ?>
                    </div>
                </div>
            </div>
            <!-- akhir kolom 1 -->
            <!-- awal kolom 2 -->
            <div class="col-md-6">
                <div class="col">
                    <div class="form-group">
                        <label for="ortu_pekerjaan">Pekerjaan Orang Tua</label>
                        <input type="text" name="ortu_pekerjaan" class="form-control" id="ortu_pekerjaan" placeholder="Pekerjaan Orang Tua" value="<?= (set_value('ortu_pekerjaan')) ? set_value('ortu_pekerjaan') : $mhs['ortu_pekerjaan']; ?>">
                        <?php echo validation_errors(); ?>
                    </div>
                    <div class="form-group">
                        <label for="ortu_penghasilan">Penghasilan Orang Tua</label>
                        <input type="text" name="ortu_penghasilan" class="form-control" id="ortu_penghasilan" placeholder="Penghasilan Orang Tua" value="<?= (set_value('ortu_penghasilan')) ? set_value('ortu_penghasilan') : $mhs['ortu_penghasilan']; ?>">
                        <?php echo validation_errors(); ?>
                    </div>
                    <div class="form-group">
                        <label for="ortu_tanggungan">Tanggungan Orang Tua</label>
                        <input type="text" name="ortu_tanggungan" class="form-control" id="ortu_tanggungan" placeholder="Tanggungan Orang Tua" value="<?= (set_value('ortu_tanggungan')) ? set_value('ortu_tanggungan') : $mhs['ortu_tanggungan']; ?>">
                        <?php echo validation_errors(); ?>
                    </div>
                    <div class="form-group">
                        <label for="ortu_nohp">No HP Orang Tua</label>
                        <input type="text" name="ortu_nohp" class="form-control" id="ortu_nohp" placeholder="No HP Orang Tua" value="<?= (set_value('ortu_nohp')) ? set_value('ortu_nohp') : $mhs['ortu_nohp']; ?>">
                        <?php echo validation_errors(); ?>
                    </div>
                    <div class="form-group">
                        <label for="bank_nama">Nama Bank</label>
                        <input type="text" name="bank_nama" class="form-control" id="bank_nama" placeholder="Nama Bank" value="<?= (set_value('bank_nama')) ? set_value('bank_nama') : $mhs['bank_nama']; ?>">
                        <?php echo validation_errors(); ?>
                    </div>
                    <div class="form-group">
                        <label for="bank_norek">No Rekening Bank</label>
                        <input type="text" name="bank_norek" class="form-control" id="bank_norek" placeholder="No Rekening Bank" value="<?= (set_value('bank_norek')) ? set_value('bank_norek') : $mhs['bank_norek']; ?>">
                        <?php echo validation_errors(); ?>
                    </div>
                    <div class="form-group">
                        <label for="smt">Semester</label>
                        <select class="form-control" tabindex="-1" aria-hidden="true" name="smt">
                            <option value="<?= $mhs['smt']; ?>"><?= $mhs['smt']; ?></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- akhir kolom 2 -->
        </div>
        <button type="submit" value="Simpan" name="submit" class="btn btn-primary btn-user">
            Simpan
        </button>
        <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-success btn-user">
            Kembali
        </button>
    </form>
</div>