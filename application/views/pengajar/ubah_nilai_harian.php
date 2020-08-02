<div class="m-3 judul-halaman">
    <h2>Ubah Penilaian Harian - <?= $nilai_harian->nama_lengkap ?></h2>
</div>
<div class="m-3">
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('pengajar/update_nilai_harian') ?>" method="post">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" value="<?= $nilai_harian->no_induk . ' - ' . $nilai_harian->nama_lengkap ?>" readonly>
                    <input type="hidden" class="form-control" value="<?= $nilai_harian->id_peserta ?>" name="id_peserta_didik" readonly>
                    <input type="hidden" class="form-control" value="<?= $nilai_harian->id_sub_kd ?>" name="id_sub_kd" readonly>
                </div>
                <div class="form-group">
                    <label>Nilai Checklist</label>
                    <select name="nilai_checklist" id="nilai_checklist" class="form-control select">
                        <option value="">-- Pilih Nilai Checklist --</option>
                        <option value="Belum Berkembang" <?= $nilai_checklist[0] ?>>Belum Berkembang</option>
                        <option value="Mulai Berkembang" <?= $nilai_checklist[1] ?>>Mulai Berkembang</option>
                        <option value="Berkembang Sesuai Harapan" <?= $nilai_checklist[2] ?>>Berkembang Sesuai Harapan</option>
                        <option value="Berkembang Sangat Baik" <?= $nilai_checklist[3] ?>>Berkembang Sangat Baik</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nilai Karya</label>
                    <select name="nilai_karya" id="nilai_karya" class="form-control select">
                        <option value="">-- Pilih Nilai Karya --</option>
                        <option value="Belum Berkembang" <?= $nilai_karya[0] ?>>Belum Berkembang</option>
                        <option value="Mulai Berkembang" <?= $nilai_karya[1] ?>>Mulai Berkembang</option>
                        <option value="Berkembang Sesuai Harapan" <?= $nilai_karya[2] ?>>Berkembang Sesuai Harapan</option>
                        <option value="Berkembang Sangat Baik" <?= $nilai_karya[3] ?>>Berkembang Sangat Baik</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success btn-block">Update Nilai Harian</button>
            </form>
        </div>
    </div>
</div>