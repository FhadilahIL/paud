<div class="m-3 judul-halaman">
    <h1>My Profile</h1>
</div>
<div class="m-3">
    <div class="card">
        <div class="card-header">
            <h3>Username : <?= $user->username ?></h3>
        </div>
        <div class="card-body">
            <form action="<?= base_url('pengajar/update_my') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input type="hidden" class="form-control" name="id_user" value="<?= $user->id_user ?>" maxlength="50">
                    <input type="text" class="form-control" name="nama" value="<?= ucwords($user->nama) ?>" maxlength="50">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" name="password" maxlength="50">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="confirm_password" maxlength="50">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">No Hp</label>
                    <input type="number" class="form-control" name="no_hp" maxlength="13" value="<?= $user->no_hp ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <textarea class="form-control" name="alamat" rows="5"><?= $user->alamat ?></textarea>
                </div>
                <div class="form-group">
                    <label for="profile">Foto Profile</label>
                    <div>
                        <img src="<?= base_url('assets/img/profile/') . $user->foto ?>" width="150" class="mb-2">
                        <p id="hasil" hidden>Preview Profile Update</p>
                        <img id="preview" class="mb-3 rounded" hidden />
                    </div>
                    <input type="file" class="form-control-file" value="" name="foto" id="foto" accept=".jpg, .png, .jpeg, .pdf" onchange="tampilkanPreview(this,'preview')">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>