<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <div class="card mb-3 col-lg-8" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="col">
                    <div class="card-body">
                        <h4 class="card-title">NIM</h4>
                        <p class="card-text"><?= $mahasiswa['nim']; ?></p>
                        <h4 class="card-title">Nama Mahasiswa</h4>
                        <p class="card-text"><?= $mahasiswa['nama_mhs']; ?></p>
                        <h4 class="card-title">Jenis Kelamin Mahasiswa</h4>
                        <p class="card-text"><?= $mahasiswa['jk_mhs']; ?></p>
                        <h4 class="card-title">No HP Mahasiswa</h4>
                        <p class="card-text"><?= $mahasiswa['no_hp_mhs']; ?></p>
                        <h4 class="card-title">Alamat Mahasiswa</h4>
                        <p class="card-text"><?= $mahasiswa['alamat_mhs']; ?></p>
                        <h4 class="card-title">Nama Prodi</h4>
                        <p class="card-text"><?= $mahasiswa['nama_prodi']; ?></p>
                        <h4 class="card-title">Nama Orang Tua</h4>
                        <p class="card-text"><?= $mahasiswa['ortu_nama']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="col">
                    <div class="card-body">
                        <h4 class="card-title">Pekerjaan Orang Tua</h4>
                        <p class="card-text"><?= $mahasiswa['ortu_pekerjaan']; ?></p>
                        <h4 class="card-title">Penghasilan Orang Tua</h4>
                        <p class="card-text"><?= $mahasiswa['ortu_penghasilan']; ?></p>
                        <h4 class="card-title">Tanggungan Orang Tua</h4>
                        <p class="card-text"><?= $mahasiswa['ortu_tanggungan']; ?></p>
                        <h4 class="card-title">No HP Orang Tua</h4>
                        <p class="card-text"><?= $mahasiswa['ortu_nohp']; ?></p>
                        <h4 class="card-title">Nama Bank</h4>
                        <p class="card-text"><?= $mahasiswa['bank_nama']; ?></p>
                        <h4 class="card-title">No Rekening Bank</h4>
                        <p class="card-text"><?= $mahasiswa['bank_norek']; ?></p>
                        <h4 class="card-title">Semester</h4>
                        <p class="card-text"><?= $mahasiswa['smt']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-success btn-user">
        Kembali
    </button>
</div>