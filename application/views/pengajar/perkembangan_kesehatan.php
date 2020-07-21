<div class="m-3 judul-halaman">
    <h1>Catatan Perkembangan - Kesehatan</h1>
</div>
<div class="m-3">
    <div class="card">
        <div class="card-header">
            <strong>Lihat Berdasarkan Semester</strong>
        </div>
        <div class="card-body">
            <label>Pilih Semester</label>
            <select name="semester" id="semester_kesehatan_guru" class="form-control select">
                <option value="">-- Pilih Semester --</option>
                <?php foreach ($tampil_semester as $semester) { ?>
                    <option value="<?= $semester->id_semester ?>">Semester <?= $semester->semester ?> (<?= $semester->tahun_ajaran ?>)</option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <strong>Tambah Nilai Perkembangan Kesehatan</strong>
        </div>
        <div class="card-body">
            <label>Pilih Peserta Didik</label>
            <select name="peserta" id="peserta_didik_kesehatan" class="form-control select">
                <option value="">-- Pilih Peserta Didik --</option>
                <?php foreach ($tampil_peserta as $peserta) { ?>
                    <option value="<?= $peserta->id_peserta ?>"><?= $peserta->no_induk ?> - <?= $peserta->nama_lengkap ?></option>
                <?php } ?>
            </select>
            <div id="tambah-perkembangan-kesehatan"></div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="mb-5">
                <table class="table table-responsive" id="table_penilaian_kesehatan">
                    <thead class="thead-dark">
                        <tr>
                            <th class="nomor">No</th>
                            <th style="min-width: 200px;" class="text-center">No Induk</th>
                            <th style="min-width: 300px;">Nama Peserta</th>
                            <th style="min-width: 150px;">Mata</th>
                            <th style="min-width: 150px;">Mulut</th>
                            <th style="min-width: 150px;">Gigi</th>
                            <th style="min-width: 150px;">Telinga</th>
                            <th style="min-width: 150px;">Hidung</th>
                            <th style="min-width: 200px;">Anggota Badan</th>
                            <th style="min-width: 150px;">Berat Badan</th>
                            <th style="min-width: 150px;">Tinggi Badan</th>
                            <th style="min-width: 100px;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-catatan-kesehatan"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>