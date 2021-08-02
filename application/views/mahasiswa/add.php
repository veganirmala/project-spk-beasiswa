<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <form action="<?= base_url('mahasiswa/mahasiswa_tambah'); ?>" method="POST">
        <div class="row">
            <!-- awal kolom 1 -->
            <div class="col-md-6">
                <div class="col">
                    <div class="form-group">
                        <label for="nim">NIM<span style="color:red;">*</span></label>
                        <input type="text" name="nim" class="form-control" id="nim" placeholder="NIM" value="<?= set_value('nim'); ?>">
                        <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nama_mhs">Nama Mahasiswa<span style="color:red;">*</span></label>
                        <input type="text" name="nama_mhs" class="form-control" id="nama_mhs" placeholder="Nama Mahasiswa" value="<?= set_value('nama_mhs'); ?>">
                        <?= form_error('nama_mhs', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="jk_mhs">Jenis Kelamin</label>
                        <br>
                        <input type="radio" id="perempuan" name="jk_mhs" value="Perempuan" <?php echo set_radio('jk_mhs', 'Perempuan', TRUE); ?>>
                        <label>Perempuan</label>
                        <tr><input type="radio" id="laki-laki" name="jk_mhs" value="Laki-laki" <?php echo set_radio('jk_mhs', 'Laki-laki', TRUE); ?>>
                            <label>Laki-laki</label>
                        </tr>
                        <br>
                        <?= form_error('jk_mhs', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="no_hp_mhs">No HP Mahasiswa</label>
                        <input type="text" name="no_hp_mhs" class="form-control" id="no_hp_mhs" placeholder="No HP Mahasiswa" value="<?= set_value('no_hp_mhs'); ?>">
                        <?= form_error('no_hp_mhs', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="alamat_mhs">Alamat Mahasiswa</label>
                        <input type="text" name="alamat_mhs" class="form-control" id="alamat_mhs" placeholder="Alamat Mahasiswa" value="<?= set_value('alamat_mhs'); ?>">
                        <?= form_error('alamat_mhs', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="id_prodi">Nama Prodi<span style="color:red;">*</span></label>
                        <select class="form-control" tabindex="-1" aria-hidden="true" name="id_prodi" value="<?= set_value('id_prodi'); ?>">
                            <?php foreach ($prodi as $p) : ?>
                                <option value="<?php echo $p['id_prodi']; ?>"><?php echo $p['nama_prodi']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('id-prodi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="ortu_nama">Nama Orang Tua</label>
                        <input type="text" name="ortu_nama" class="form-control" id="ortu_nama" placeholder="Nama Orang Tua" value="<?= set_value('ortu_nama'); ?>">
                        <?= form_error('ortu_nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
            </div>
            <!-- akhir kolom 1 -->
            <!-- awal kolom 2 -->
            <div class="col-md-6">
                <div class="col">
                    <div class="form-group">
                        <label for="ortu_pekerjaan">Pekerjaan Orang Tua<span style="color:red;">*</span></label>
                        <input type="text" name="ortu_pekerjaan" class="form-control" id="ortu_pekerjaan" placeholder="Pekerjaan Orang Tua" value="<?= set_value('ortu_pekerjaan'); ?>">
                        <?= form_error('ortu_pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="ortu_penghasilan">Penghasilan Orang Tua<span style="color:red;">*</span></label>
                        <input type="text" name="ortu_penghasilan" class="form-control" id="ortu_penghasilan" placeholder="Penghasilan Orang Tua" value="<?= set_value('ortu_penghasilan'); ?>">
                        <?= form_error('ortu_penghasilan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="ortu_tanggungan">Tanggungan Orang Tua<span style="color:red;">*</span></label>
                        <input type="text" name="ortu_tanggungan" class="form-control" id="ortu_tanggungan" placeholder="Tanggungan Orang Tua" value="<?= set_value('ortu_tanggungan'); ?>">
                        <?= form_error('ortu_tanggungan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="ortu_nohp">No HP Orang Tua</label>
                        <input type="text" name="ortu_nohp" class="form-control" id="ortu_nohp" placeholder="No HP Orang Tua" value="<?= set_value('ortu_nohp'); ?>">
                        <?= form_error('ortu_nohp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="bank_nama">Nama Bank</label>
                        <input type="text" name="bank_nama" class="form-control" id="bank_nama" placeholder="Nama Bank" value="<?= set_value('bank_nama'); ?>">
                        <?= form_error('bank_nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="bank_norek">No Rekening Bank</label>
                        <input type="text" name="bank_norek" class="form-control" id="bank_norek" placeholder="No Rekening Bank" value="<?= set_value('bank_norek'); ?>">
                        <?= form_error('bank_norek', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="smt">Semester<span style="color:red;">*</span></label>
                        <select class="form-control" tabindex="-1" aria-hidden="true" name="smt" value="<?= set_value('smt'); ?>">
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
                        <?= form_error('smt', '<small class="text-danger pl-3">', '</small>'); ?>
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
                </div>
            </div>
            <!-- akhir kolom 2 -->
        </div>
        <button type="submit" value="Simpan" name="submit" class="btn btn-success btn-user">
            Simpan
        </button>
        <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-primary btn-user">
            Kembali
        </button>
    </form>
</div>

<script type="text/javascript">
    var rupiah = document.getElementById('ortu_penghasilan');
    ortu_penghasilan.addEventListener('keyup', function(e) {
        //tambahkan 'Rp.' pada saat form di ketik
        //gunakan fungsi formatRupiah() untuk mengubah angka yang diketik menjadi format angka
        ortu_penghasilan.value = formatRupiah(this.value, 'Rp.');
    });

    /* fungsi formatRupiah() */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        //tambahkan titik jika yang diinput sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

<script type="text/javascript">
    var notelp = document.getElementById('no_hp_mhs');
    notelp.addEventListener('keyup', function(e) {
        var number_string = this.value.replace(/[^,\d]/g, '').toString()
        //gunakan fungsi formatnotelp() untuk mengubah angka yang diketik menjadi format angka
        notelp.value = number_string;
    });

    var notelportu = document.getElementById('ortu_nohp');
    notelportu.addEventListener('keyup', function(e) {
        var number_string = this.value.replace(/[^,\d]/g, '').toString()
        //gunakan fungsi formatnotelportu() untuk mengubah angka yang diketik menjadi format angka
        notelportu.value = number_string;
    });
</script>