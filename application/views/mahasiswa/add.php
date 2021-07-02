<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <form action="<?= base_url('mahasiswa/mahasiswa_tambah'); ?>" method="POST">
        <div class="row">
            <!-- awal kolom 1 -->
            <div class="col-md-6">
                <div class="col">
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" name="nim" class="form-control" id="nim" placeholder="NIM">
                        <?php echo validation_errors(); ?>
                    </div>
                    <div class="form-group">
                        <label for="nama_mhs">Nama Mahasiswa</label>
                        <input type="text" name="nama_mhs" class="form-control" id="nama_mhs" placeholder="Nama Mahasiswa">
                        <?php echo validation_errors(); ?>
                    </div>
                    <div class="form-group">
                        <label for="jk_mhs">Jenis Kelamin</label>
                        <br>
                        <input type="radio" id="perempuan" name="jk_mhs" value="F" <?php echo set_radio('jk_mhs', 'F', TRUE); ?>>
                        <label>Perempuan</label>
                        <tr><input type="radio" id="laki-laki" name="jk_mhs" value="M" <?php echo set_radio('jk_mhs', 'M', TRUE); ?>>
                            <label>Laki-laki</label>
                        </tr>
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="no_hp_mhs">No HP Mahasiswa</label>
                        <input type="text" name="no_hp_mhs" class="form-control" id="no_hp_mhs" placeholder="No HP Mahasiswa">
                        <?php echo validation_errors(); ?>
                    </div>
                    <div class="form-group">
                        <label for="alamat_mhs">Alamat Mahasiswa</label>
                        <input type="text" name="alamat_mhs" class="form-control" id="alamat_mhs" placeholder="Alamat Mahasiswa">
                        <?php echo validation_errors(); ?>
                    </div>
                    <div class="form-group">
                        <label for="id_prodi">Nama Prodi</label>
                        <select class="form-control" tabindex="-1" aria-hidden="true" name="id_prodi">
                            <?php foreach ($prodi as $p) : ?>
                                <option value="<?php echo $p['id_prodi']; ?>"><?php echo $p['nama_prodi']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ortu_nama">Nama Orang Tua</label>
                        <input type="text" name="ortu_nama" class="form-control" id="ortu_nama" placeholder="Nama Orang Tua">
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
                        <input type="text" name="ortu_pekerjaan" class="form-control" id="ortu_pekerjaan" placeholder="Pekerjaan Orang Tua">
                        <?php echo validation_errors(); ?>
                    </div>
                    <div class="form-group">
                        <label for="ortu_penghasilan">Penghasilan Orang Tua</label>
                        <input type="text" name="ortu_penghasilan" class="form-control" id="ortu_penghasilan" placeholder="Penghasilan Orang Tua">
                        <?php echo validation_errors(); ?>
                    </div>
                    <div class="form-group">
                        <label for="ortu_tanggungan">Tanggungan Orang Tua</label>
                        <input type="text" name="ortu_tanggungan" class="form-control" id="ortu_tanggungan" placeholder="Tanggungan Orang Tua">
                        <?php echo validation_errors(); ?>
                    </div>
                    <div class="form-group">
                        <label for="ortu_nohp">No HP Orang Tua</label>
                        <input type="text" name="ortu_nohp" class="form-control" id="ortu_nohp" placeholder="No HP Orang Tua">
                        <?php echo validation_errors(); ?>
                    </div>
                    <div class="form-group">
                        <label for="bank_nama">Nama Bank</label>
                        <input type="text" name="bank_nama" class="form-control" id="bank_nama" placeholder="Nama Bank">
                        <?php echo validation_errors(); ?>
                    </div>
                    <div class="form-group">
                        <label for="bank_norek">No Rekening Bank</label>
                        <input type="text" name="bank_norek" class="form-control" id="bank_norek" placeholder="No Rekening Bank">
                        <?php echo validation_errors(); ?>
                    </div>
                    <div class="form-group">
                        <label for="smt">Semester</label>
                        <select class="form-control" tabindex="-1" aria-hidden="true" name="smt">
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