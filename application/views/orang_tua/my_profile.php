<div class="m-3 judul-halaman">
    <h1>Edit Data</h1>
</div>
<div class="m-3">
    <div class="card">
        <div class="card-header">
            <h3>Username : <?= $user->username ?></h3>
        </div>
        <div class="card-body">
            <form action="<?= base_url('ortu/update_my') ?>" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="id_user" value="<?= $user->id_user ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" value="<?= ucwords($user->nama) ?>" maxlength="50">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" name="password" minlength="8">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirm" minlength="8">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <textarea class="form-control" name="alamat"><?= $user->alamat ?></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Pekerjaan</label>
                    <input type="text" class="form-control" name="pekerjaan" value="<?= $user->pekerjaan ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nomor HP</label>
                    <input type="number" class="form-control" name="no_hp" value="<?= $user->no_hp ?>" maxlength="13">
                </div>
                <div class="form-group">
                    <label for="profile">Foto Profile</label>
                    <div>
                        <img src="<?= base_url('assets/img/profile/') . $user->foto ?>" width="150" class="mb-2">
                        <p id="hasil" hidden>Preview Profile Upload</p>
                        <img id="preview" class="mb-3 rounded" hidden />
                    </div>
                    <input type="file" class="form-control-file" value="" name="foto" id="foto" accept=".jpg, .png, .jpeg, .pdf" onchange="tampilkanPreview(this,'preview')">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>