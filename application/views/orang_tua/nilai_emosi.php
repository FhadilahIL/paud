<div class="m-3 judul-halaman">
    <h1>Perkembangan - Emosi</h1>
</div>
<div class="m-3">
    <div class="card">
        <div class="card-header">
            <strong>Datfar Peserta</strong>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="semester">Pilih Nama Peserta Didik</label>
                <select class="form-control select" name="semester" id="tampil_peserta_emosi">
                    <option value="">-- Pilih Peserta Didik --</option>
                    <?php foreach ($tampil_peserta as $peserta) { ?>
                        <option value="<?= $peserta->id_peserta ?>"><?= $peserta->nama_lengkap ?></option>
                    <?php } ?>
                </select>
            </div>
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
                        </tr>
                    </thead>
                    <tbody id="tbody-catatan-emosi"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>