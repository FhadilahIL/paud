<div class="m-3 judul_halaman">
    <h1>Penilaian Harian</h1>
</div>
<div class="m-3">
    <div class="card">
        <div class="card-header">
            <strong>Tampilkan Nilai Berdasarkan Tanggal</strong>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Pilih Tanggal</label>
                <input type="date" name="tanggal_nilai" id="tanggal_nilai" class="form-control" value="<?= date('Y-m-d') ?>">
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <strong>Daftar Penilaian Harian</strong>
        </div>
        <div class="card-body">
            <div class="mt-3 mb-3">
                <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseTambah" role="button" aria-expanded="false" aria-controls="multiCollapseTambah">+ Tambah Penilaian Harian</a>
                <div class="collapse multi-collapse mt-3" id="multiCollapseTambah">
                    <div class="card card-body">
                        <form action="<?= base_url('pengajar/tambah_penilaian_harian') ?>" method="post">
                            <div class="form-group">
                                <label>Pilih Peserta Didik</label>
                                <select name="peserta_didik" id="peserta_didik" class="form-control select" required>
                                    <option value="">-- Pilih Peserta Didik --</option>
                                    <?php foreach ($tampil_peserta as $peserta) { ?>
                                        <option value="<?= $peserta->id_peserta ?>"><?= $peserta->no_induk . ' - ' . $peserta->nama_lengkap ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pilih Kompetensi Dasar</label>
                                <select name="sub_kompetensi_dasar" id="sub_kompetensi_dasar" class="form-control select" required>
                                    <option value="">-- Pilih Sub Kompetensi Dasar --</option>
                                    <?php $no = 1;
                                    foreach ($kompetensi_dasar as $tampil_kd) { ?>
                                        <?php $no_sub = 1;
                                        foreach ($tampil_kompetensi_dasar as $tampil_sub_kd) {
                                            if ($tampil_sub_kd->id_sub_kd) {
                                                if ($tampil_kd->id_kd == $tampil_sub_kd->id_kd) { ?>
                                                    <option value="<?= $tampil_sub_kd->id_sub_kd ?>"><?= $no . '.' . $no_sub++ . ' ' . $tampil_sub_kd->judul_sub_kd ?></option>
                                        <?php }
                                            }
                                        } ?>
                                        </ol>
                                        <br />
                                    <?php ++$no;
                                    } ?>
                                    </ol>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nilai Checklist</label>
                                <select name="nilai_checklist" id="nilai_checklist" class="form-control select" required>
                                    <option value="">-- Pilih Nilai Checklist --</option>
                                    <option value=" Belum Berkembang">Belum Berkembang</option>
                                    <option value="Mulai Berkembang">Mulai Berkembang</option>
                                    <option value="Berkembang Sesuai Harapan">Berkembang Sesuai Harapan</option>
                                    <option value="Berkembang Sangat Baik">Berkembang Sangat Baik</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nilai Karya</label>
                                <select name="nilai_karya" id="nilai_karya" class="form-control select" required>
                                    <option value="">-- Pilih Nilai Karya --</option>
                                    <option value=" Belum Berkembang">Belum Berkembang</option>
                                    <option value="Mulai Berkembang">Mulai Berkembang</option>
                                    <option value="Berkembang Sesuai Harapan">Berkembang Sesuai Harapan</option>
                                    <option value="Berkembang Sangat Baik">Berkembang Sangat Baik</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Penilaian</label>
                                <input type="date" class="form-control" max="<?= date('Y-m-d') ?>" value="<?= date('Y-m-d') ?>" name="tanggal_penilaian" required>
                            </div>
                            <div class="text-right">
                                <a class="btn btn-danger" data-toggle="collapse" href="#multiCollapseTambah" role="button" aria-expanded="false" aria-controls="multiCollapseTambah">Cancel</a>
                                <button type="submit" class="btn btn-success">Simpan Penilaian Harian</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table table-responsive">
                <tr>
                    <th class="nomor">No</th>
                    <th style="min-width: 150px;">No. Induk</th>
                    <th class="nama">Nama Peserta</th>
                    <th style="min-width: 300px;">Nilai Checklist</th>
                    <th style="min-width: 300px;">Nilai Karya</th>
                    <th class="text-center" style="min-width: 200px;">Tanggal</th>
                    <th class="text-center" style="min-width: 250px;">Aksi</th>
                </tr>
                <tbody id="isi_nilai_harian"></tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <strong>Daftar Catatan Harian</strong>
        </div>
        <div class="card-body">
            <a class="btn btn-primary mb-3 mt-3" data-toggle="collapse" href="#multiCollapseTambahCatatan" role="button" aria-expanded="false" aria-controls="multiCollapseTambah">+ Tambah Catatan Harian</a>
            <div class="collapse multi-collapse mt-3" id="multiCollapseTambahCatatan">
                <div class="card card-body">
                    <form action="<?= base_url('pengajar/tambah_catatan_harian') ?>" method="post">
                        <div class="form-group">
                            <label>Pilih Peserta Didik</label>
                            <select name="peserta_didik" id="peserta_didik" class="form-control select" required>
                                <option value="">-- Pilih Peserta Didik</option>
                                <?php foreach ($tampil_peserta as $peserta) { ?>
                                    <option value="<?= $peserta->id_peserta ?>"><?= $peserta->no_induk . ' - ' . $peserta->nama_lengkap ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Penilaian</label>
                            <input type="date" class="form-control" max="<?= date('Y-m-d') ?>" name="tanggal_penilaian" id="tanggal_penilaian" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Catatan Untuk Peserta</label>
                            <textarea type="text" class="form-control" rows="5" name="catatan_harian" id="catatan_harian" required></textarea>
                        </div>
                        <div class="text-right">
                            <a class="btn btn-danger" data-toggle="collapse" href="#multiCollapseTambahCatatan" role="button" aria-expanded="false" aria-controls="multiCollapseTambah">Cancel</a>
                            <button type="submit" class="btn btn-success">Simpan Catatan Harian</button>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-responsive">
                <tr>
                    <th class="text-center">No.</th>
                    <th style="min-width: 150px;">No. Induk</th>
                    <th style="min-width: 300px;">Nama Peserta</th>
                    <th style="min-width: 400px;">Catatan Untuk Peserta</th>
                    <th style="min-width: 200px;" class="text-center">Tanggal</th>
                    <th style="min-width: 250px;" class="text-center">Aksi</th>
                </tr>
                <tbody id="isi_catatan_harian"></tbody>
            </table>
        </div>
    </div>
</div>