<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <div class="card mb-3 col-lg-8" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title">Nama Jurusan</h4>
                    <p class="card-text"><?= $prodi['nama_jurusan']; ?></p>
                    <h4 class="card-title">ID Prodi</h4>
                    <p class="card-text"><?= $prodi['id_prodi']; ?></p>
                    <h4 class="card-title">Nama Prodi</h4>
                    <p class="card-text"><?= $prodi['nama_prodi']; ?></p>
                    <h4 class="card-title">Jenjang</h4>
                    <p class="card-text"><?= $prodi['jenjang']; ?></p>
                    <h4 class="card-title">Keterangan Prodi</h4>
                    <p class="card-text"><?= $prodi['ket_prodi']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-success btn-user">
        Kembali
    </button>
</div>