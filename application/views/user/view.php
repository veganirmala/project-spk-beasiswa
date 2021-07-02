<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <div class="card mb-3 col-lg-8" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title">ID User</h4>
                    <p class="card-text"><?= $user['id_user']; ?></p>
                    <h4 class="card-title">Email User</h4>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <h4 class="card-title">Nama User</h4>
                    <p class="card-text"><?= $user['nama']; ?></p>
                    <h4 class="card-title">Jenis Kelamin</h4>
                    <p class="card-text"><?= $user['jk_user']; ?></p>
                    <h4 class="card-title">Tipe</h4>
                    <p class="card-text"><?= $user['tipe']; ?></p>
                    <h4 class="card-title">Status</h4>
                    <p class="card-text"><?= $user['status']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-success btn-user">
        Kembali
    </button>
</div>