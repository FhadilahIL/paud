<div class="m-3 judul-halaman">
    <h1>Cetak Laporan</h1>
</div>
<div class="m-3">
    <div class="card">
        <div class="card-header">
            <strong>Cetak Laporan Berdasarkan Peserta Didik</strong>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Pilih Peserta Didik</label>
                <select name="id_peserta" class="form-inline select" id="a" onchange="tabelCetak()">
                    <option value="">-- Pilih Peserta Didik --</option>
                    <?php foreach ($peserta_didik as $murid) { ?>
                        <option value="<?= $murid->id_peserta ?>"><?= $murid->no_induk ?> - <?= $murid->nama_lengkap ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <strong>Data Peserta Didik</strong>
        </div>
        <div class="card-body">
            <table class="table table-responsive">
                <tr>
                    <th style="min-width: 150px;" class="text-center">No. Induk</th>
                    <th class="nama">Nama Peserta</th>
                    <th style="min-width: 300px;">Nama Orang Tua</th>
                    <th style="min-width: 200px;">Jenis Kelamin</th>
                    <th style="min-width: 320px;">Tempat, Tanggal Lahir</th>
                    <th class="text-center" style="min-width: 200px;">Tanggal Masuk</th>
                    <th class="text-center" style="min-width: 250px;">Tahun Ajaran</th>
                    <th class="text-center" style="min-width: 250px;">Aksi</th>
                </tr>
                <tbody id="isi_data_peserta"></tbody>
            </table>
        </div>
    </div>
    <div class="card collapse" id="collapseExample">
        <div class="card-body m-2" id="body_laporan">
            <div class="d-flex justify-content-end">
                <a id="cetak_pdf" href="<?= base_url("pengajar/cetak_pdf") ?>" target="_blank" class="btn btn-primary shadow"><small>Cetak</small></a>
            </div>
            <div id="bio_laporan"></div>
            <table class="table table-borderless table-responsive mb-4">
                <tr>
                    <td colspan="7"><b>Catatan Perkembangan Emosi</b></td>
                </tr>
                <tr>
                    <td><small>Semester</small></td>
                    <td style="min-width: 127px"><small>Menangis</small></td>
                    <td style="min-width: 127px"><small>Memukul</small></td>
                    <td style="min-width: 127px"><small>Marah</small></td>
                    <td style="min-width: 127px"><small>Diam</small></td>
                    <td style="min-width: 127px"><small>Melamun</small></td>
                    <td style="min-width: 127px"><small>Gembira</small></td>
                </tr>
                <tbody id="cetak_emosi_peserta"></tbody>
            </table>
            <table class="table table-responsive table-borderless">
                <tr>
                    <td colspan="9"><b>Catatan Perkembangan Kesehatan dan Jasmani</b></td>
                </tr>
                <tr>
                    <td><small>Semester</small></td>
                    <td style="min-width: 87px"><small>Mata</small></td>
                    <td style="min-width: 87px"><small>Mulut</small></td>
                    <td style="min-width: 87px"><small>Gigi</small></td>
                    <td style="min-width: 87px"><small>Telinga</small></td>
                    <td style="min-width: 87px"><small>Hidung</small></td>
                    <td><small>Anggota Badan</small></td>
                    <td><small>Berat Badan</small></td>
                    <td><small>Tinggi Badan</small></td>
                </tr>
                <tbody id="cetak_perkembangan_peserta"></tbody>
            </table>
        </div>
    </div>
</div>