<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <div class="card mb-3 col-lg-8" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title">NIM</h4>
                    <p class="card-text"><?= $prestasi['nim']; ?></p>
                    <h4 class="card-title">Tahun Usulan</h4>
                    <p class="card-text"><?= $prestasi['tahun']; ?></p>
                    <h4 class="card-title">Nama Prestasi</h4>
                    <p class="card-text"><?= $prestasi['nilai_prestasi']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-success btn-user">
        Kembali
    </button>
</div>