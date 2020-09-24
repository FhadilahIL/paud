<div class="m-3 judul-halaman">
    <h1>Ubah Catatan Perkembangan - Emosi</h1>
</div>
<div class="m-3">
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('pengajar/update_nilai_emosi') ?>" method="post">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" value="<?= $nilai_emosi->nama_lengkap ?>" readonly>
                    <input type="hidden" class="form-control" value="<?= $id_peserta_didik ?>" name="id_peserta_didik" readonly>
                    <input type="hidden" class="form-control" value="<?= $id_semester ?>" name="id_semester" readonly>
                </div>
                <div class="form-group">
                    <label>Menangis</label>
                    <select name="menangis" id="menangis" class="form-control select" required>
                        <option value="">-- Pilih Emosi --</option>
                        <option value="Tidak Pernah" <?= $menangis[0] ?>>Tidak Pernah</option>
                        <option value="Kadang" <?= $menangis[1] ?>>Kadang</option>
                        <option value="Sering" <?= $menangis[2] ?>>Sering</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Memukul</label>
                    <select name="memukul" id="memukul" class="form-control select" required>
                        <option value="">-- Pilih Emosi --</option>
                        <option value="Tidak Pernah" <?= $memukul[0] ?>>Tidak Pernah</option>
                        <option value="Kadang" <?= $memukul[1] ?>>Kadang</option>
                        <option value="Sering" <?= $memukul[2] ?>>Sering</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Marah</label>
                    <select name="marah" id="marah" class="form-control select" required>
                        <option value="">-- Pilih Emosi --</option>
                        <option value="Tidak Pernah" <?= $marah[0] ?>>Tidak Pernah</option>
                        <option value="Kadang" <?= $marah[1] ?>>Kadang</option>
                        <option value="Sering" <?= $marah[2] ?>>Sering</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Diam</label>
                    <select name="diam" id="diam" class="form-control select" required>
                        <option value="">-- Pilih Emosi --</option>
                        <option value="Tidak Pernah" <?= $diam[0] ?>>Tidak Pernah</option>
                        <option value="Kadang" <?= $diam[1] ?>>Kadang</option>
                        <option value="Sering" <?= $diam[2] ?>>Sering</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Melamun</label>
                    <select name="melamun" id="melamun" class="form-control select" required>
                        <option value="">-- Pilih Emosi --</option>
                        <option value="Tidak Pernah" <?= $melamun[0] ?>>Tidak Pernah</option>
                        <option value="Kadang" <?= $melamun[1] ?>>Kadang</option>
                        <option value="Sering" <?= $melamun[2] ?>>Sering</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Gembira</label>
                    <select name="gembira" id="gembira" class="form-control select" required>
                        <option value="">-- Pilih Emosi --</option>
                        <option value="Tidak Pernah" <?= $gembira[0] ?>>Tidak Pernah</option>
                        <option value="Kadang" <?= $gembira[1] ?>>Kadang</option>
                        <option value="Sering" <?= $gembira[2] ?>>Sering</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success btn-block">Update Nilai Emosi</button>
            </form>
        </div>
    </div>
</div>