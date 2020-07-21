<div class="m-3 judul-halaman">
    <h1>Catatan Perkembangan - Emosi</h1>
</div>
<div class="m-3">
    <div class="card">
        <div class="card-header">
            <strong>Lihat Berdasarkan Semester</strong>
        </div>
        <div class="card-body">
            <select name="semester" id="semester_emosi_guru" class="form-control select">
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
            <select name="peserta" id="peserta_didik_emosi" class="form-control select">
                <option value="">-- Pilih Peserta Didik --</option>
                <?php foreach ($tampil_peserta as $peserta) { ?>
                    <option value="<?= $peserta->id_peserta ?>"><?= $peserta->no_induk ?> - <?= $peserta->nama_lengkap ?></option>
                <?php } ?>
            </select>
            <div id="tambah-perkembangan-emosi"></div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="mb-5">
                <table class="table table-responsive" id="table_penilaian_emosi">
                    <thead class="thead-dark">
                        <tr>
                            <th class="nomor">No</th>
                            <th style="min-width: 200px;" class="text-center">No Induk</th>
                            <th style="min-width: 300px;">Nama Peserta</th>
                            <th style="min-width: 150px;">Menangis</th>
                            <th style="min-width: 150px;">Memukul</th>
                            <th style="min-width: 150px;">Marah</th>
                            <th style="min-width: 150px;">Diam</th>
                            <th style="min-width: 150px;">Melamun</th>
                            <th style="min-width: 150px;">Gembira</th>
                            <th style="min-width: 100px;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-catatan-emosi"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>