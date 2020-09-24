<div class="m-3 judul-halaman">
    <h2>Ubah Catatan Harian - <?= $nilai_harian->nama_lengkap ?></h2>
</div>
<div class="m-3">
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('pengajar/update_catatan_harian') ?>" method="post">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" value="<?= $nilai_harian->no_induk . ' - ' . $nilai_harian->nama_lengkap ?>" readonly>
                    <input type="hidden" class="form-control" value="<?= $nilai_harian->id_peserta ?>" name="id_peserta_didik" readonly>
                    <input type="hidden" class="form-control" value="<?= $nilai_harian->tanggal_catatan ?>" name="tanggal_catatan" readonly>
                </div>
                <div class="form-group">
                    <label>Catatan Harian</label>
                    <textarea name="catatan_harian" id="catatan_harian" rows="5" class="form-control" required><?= $nilai_harian->catatan ?></textarea>
                </div>
                <button type="submit" class="btn btn-success btn-block">Update Catatan Harian</button>
            </form>
        </div>
    </div>
</div>