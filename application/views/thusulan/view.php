<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <div class="card mb-3 col-lg-8" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title">ID Usulan</h4>
                    <p class="card-text"><?= $usulan['id_usulan']; ?></p>
                    <h4 class="card-title">Kuota</h4>
                    <p class="card-text"><?= $usulan['kuota']; ?></p>
                    <h4 class="card-title">Tahun</h4>
                    <p class="card-text"><?= $usulan['tahun']; ?></p>
                    <h4 class="card-title">Status Usulan</h4>
                    <p class="card-text"><?= $usulan['status_usulan']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-primary btn-user">
        Kembali
    </button>
</div>