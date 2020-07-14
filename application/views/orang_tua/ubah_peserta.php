<div class="m-3 judul-halaman">
    <h1>Ubah Data Peserta <?= $murid->no_induk ?></h1>
</div>
<div class="m-3">
    <form action="<?= base_url('ortu/edit_peserta') ?>" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">No. Induk</label>
            <input type="text" class="form-control form-control-sm" value="<?= $murid->no_induk ?>" name="no_induk" readonly>
            <input type="hidden" class="form-control form-control-sm" value="<?= $murid->id_peserta ?>" name="id_peserta" readonly>
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Lengkap</label>
            <input type="text" class="form-control form-control-sm" name="nama_lengkap" value="<?= $murid->nama_lengkap ?>">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Panggilan</label>
            <input type="text" class="form-control form-control-sm" name="nama_panggilan" value="<?= $murid->nama_panggilan ?>">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Jenis Kelamin</label>
            <select class="form-control form-control-sm select" name="jenis_kelamin">
                <option>-- Pilih Jenis Kelamin --</option>
                <option value="L" <?= $kelamin[0] ?>>Laki - Laki</option>
                <option value="P" <?= $kelamin[1] ?>>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Agama</label>
            <select class="form-control form-control-sm select" name="agama">
                <option>-- Pilih Agama --</option>
                <option value="Islam" <?= $agama[0] ?>>Islam</option>
                <option value="Kristen" <?= $agama[1] ?>>Kristen</option>
                <option value="Hindu" <?= $agama[2] ?>>Hindu</option>
                <option value="Budha" <?= $agama[3] ?>>Budha</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Tempat Lahir</label>
            <input type="text" class="form-control form-control-sm" name="tempat_lahir" value="<?= $murid->tempat_lahir ?>">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Tanggal Lahir</label>
            <input type="date" class="form-control form-control-sm" name="tanggal_lahir" value="<?= $murid->tanggal_lahir ?>">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Anak Ke</label>
            <input type="number" class="form-control form-control-sm" name="anak_ke" value="<?= $murid->anak_ke ?>">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <button type="submit" class="btn btn-primary w-100">Simpan Data</button>
    </form>
</div>