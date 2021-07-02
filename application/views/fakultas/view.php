<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <div class="card mb-3 col-lg-8" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title">ID Fakultas</h4>
                    <p class="card-text"><?= $fakultas['id_fakultas']; ?></p>
                    <h4 class="card-title">Nama Fakultas</h4>
                    <p class="card-text"><?= $fakultas['nama_fakultas']; ?></p>
                    <h4 class="card-title">Keterangan Fakultas</h4>
                    <p class="card-text"><?= $fakultas['ket_fakultas']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-success btn-user">
        Kembali
    </button>
</div>