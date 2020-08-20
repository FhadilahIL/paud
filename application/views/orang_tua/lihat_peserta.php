<div class="m-3 judul-halaman">
    <h1>Lihat Data Peserta <?= $murid->no_induk ?></h1>
</div>
<div class="m-3">
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-3 col-form-label">No. Induk</label>
        <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $murid->no_induk ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-3 col-form-label">Nama Lengkap</label>
        <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $murid->nama_lengkap ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-3 col-form-label">Nama Panggilan</label>
        <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $murid->nama_panggilan ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-3 col-form-label">Jenis Kelamin</label>
        <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $kelamin ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-3 col-form-label">Agama</label>
        <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $murid->agama ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-3 col-form-label">Tempat, Tanggal Lahir</label>
        <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $murid->tempat_lahir ?>, <?= date('d M Y', strtotime($murid->tanggal_lahir)) ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-3 col-form-label">Anak Ke </label>
        <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $murid->anak_ke ?>">
        </div>
    </div>
</div>