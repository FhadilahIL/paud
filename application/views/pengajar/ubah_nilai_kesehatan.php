<div class="m-3 judul-halaman">
    <h1>Ubah Catatan Perkembangan - Kesehatan</h1>
</div>
<div class="m-3">
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('pengajar/update_nilai_kesehatan') ?>" method="post">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" value="<?= $nilai_kesehatan->nama_lengkap ?>" readonly>
                    <input type="hidden" class="form-control" value="<?= $id_peserta_didik ?>" name="id_peserta_didik" readonly>
                    <input type="hidden" class="form-control" value="<?= $id_semester ?>" name="id_semester" readonly>
                </div>
                <div class="form-group">
                    <label>Mata</label>
                    <select name="mata" id="mata" class="form-control select">
                        <option value="">-- Pilih Kesehatan --</option>
                        <option value="Baik" <?= $mata[0] ?>>Baik</option>
                        <option value="Cukup" <?= $mata[1] ?>>Cukup</option>
                        <option value="Kurang" <?= $mata[2] ?>>Kurang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Mulut</label>
                    <select name="mulut" id="mulut" class="form-control select">
                        <option value="">-- Pilih Kesehatan --</option>
                        <option value="Baik" <?= $mulut[0] ?>>Baik</option>
                        <option value="Cukup" <?= $mulut[1] ?>>Cukup</option>
                        <option value="Kurang" <?= $mulut[2] ?>>Kurang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Gigi</label>
                    <select name="gigi" id="gigi" class="form-control select">
                        <option value="">-- Pilih Kesehatan --</option>
                        <option value="Baik" <?= $gigi[0] ?>>Baik</option>
                        <option value="Cukup" <?= $gigi[1] ?>>Cukup</option>
                        <option value="Kurang" <?= $gigi[2] ?>>Kurang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Telinga</label>
                    <select name="telinga" id="telinga" class="form-control select">
                        <option value="">-- Pilih Kesehatan --</option>
                        <option value="Baik" <?= $telinga[0] ?>>Baik</option>
                        <option value="Cukup" <?= $telinga[1] ?>>Cukup</option>
                        <option value="Kurang" <?= $telinga[2] ?>>Kurang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Hidung</label>
                    <select name="hidung" id="hidung" class="form-control select">
                        <option value="">-- Pilih Kesehatan --</option>
                        <option value="Baik" <?= $hidung[0] ?>>Baik</option>
                        <option value="Cukup" <?= $hidung[1] ?>>Cukup</option>
                        <option value="Kurang" <?= $hidung[2] ?>>Kurang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Anggota Badan</label>
                    <select name="anggota_badan" id="anggota_badan" class="form-control select">
                        <option value="">-- Pilih Kesehatan --</option>
                        <option value="Baik" <?= $anggota_badan[0] ?>>Baik</option>
                        <option value="Cukup" <?= $anggota_badan[1] ?>>Cukup</option>
                        <option value="Kurang" <?= $anggota_badan[2] ?>>Kurang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Berat Badan <sub><strong>(Kg)</strong></sub></label>
                    <input type="text" class="form-control col-1" id="berat_badan" maxlength="3" name="berat_badan" oninput="this.value = this.value.replace(/[^0-9]/g,'').replace(/(\..*)\./g, '$1')" value="<?= $nilai_kesehatan->berat_badan ?>" required />
                </div>
                <div class="form-group">
                    <label>Tinggi Badan <sub><strong>(Cm)</strong></sub></label>
                    <input type="text" class="form-control col-1" maxlength="3" id="tinggi_badan" name="tinggi_badan" oninput="this.value = this.value.replace(/[^0-9]/g,'').replace(/(\..*)\./g, '$1')" value="<?= $nilai_kesehatan->tinggi_badan ?>" required />
                </div>
                <button type="submit" class="btn btn-success btn-block">Update Nilai Kesehatan</button>
            </form>
        </div>
    </div>
</div>