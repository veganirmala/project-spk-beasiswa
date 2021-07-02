<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <div class="card mb-3 col-lg-8" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title">ID Bidang</h4>
                    <p class="card-text"><?= $bidang['id_bidang']; ?></p>
                    <h4 class="card-title">Nama Bidang</h4>
                    <p class="card-text"><?= $bidang['nama_bidang']; ?></p>
                    <h4 class="card-title">Tingkat</h4>
                    <p class="card-text"><?= $bidang['tingkat']; ?></p>
                    <h4 class="card-title">Juara</h4>
                    <p class="card-text"><?= $bidang['juara']; ?></p>
                    <h4 class="card-title">Skor</h4>
                    <p class="card-text"><?= $bidang['skor']; ?></p>
                    <h4 class="card-title">Status Bidang</h4>
                    <p class="card-text"><?= $bidang['status_bidang']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-success btn-user">
        Kembali
    </button>
</div>