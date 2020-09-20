<div class="m-3">
    <h1>Lihat Data Admin <b><?= $data_admin->nama ?></b></h1>
</div>
<div class="m-3 card">
    <div class="card-body">
        <div class="row mb-3 mt-3">
            <div class="col-2">
                <label>Nama Lengkap</label>
            </div>
            <div class="col-10">
                <label><?= $data_admin->nama ?></label>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-2">
                <label>Username</label>
            </div>
            <div class="col-10">
                <label><?= $data_admin->username ?></label>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-2">
                <label>No. Hp</label>
            </div>
            <div class="col-10">
                <label><?= $data_admin->no_hp ?></label>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-2">
                <label>Alamat</label>
            </div>
            <div class="col-10">
                <label><?= $data_admin->alamat ?></label>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-2">
                <label>Foto Profile</label>
            </div>
            <div class="col-10">
                <img src="<?= base_url('/assets/img/profile/') . $data_admin->foto ?>" width="150px" height="150px" alt="">
            </div>
        </div>
    </div>
</div>