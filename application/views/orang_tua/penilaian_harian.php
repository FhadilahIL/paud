<div class="m-3 judul-halaman">
    <h1>Penilaian Harian</h1>
</div>
<div class="m-3">
    <div class="card">
        <div class="card-header">
            <strong class="card-title mb-3">Cari Berdasarkan Tanggal Penilaian</strong>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="col">
                    <label for="tanggal_penilaian">Tanggal Penilaian</label>
                    <input type="date" name="tanggal" id="tanggal_penilaian" class="form-control" />
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-responsive" id="table_penilaian_harian">
                <thead class="thead-dark">
                    <tr>
                        <th class="nomor">No</th>
                        <th class="nama">Nama Peserta</th>
                        <th style="min-width: 250px;">Sub Kompetensi Dasar</th>
                        <th style="min-width: 250px;">Nilai Checklist</th>
                        <th style="min-width: 250px;">Nilai Karya</th>
                        <th class="text-center" style="min-width: 200px;">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($nilai as $nilai) { ?>
                        <tr>
                            <td scope="row" class="nomor"><?= $no++ ?>.</td>
                            <td><?= ucwords($nilai->nama_lengkap); ?></td>
                            <td><?= $nilai->judul_sub_kd; ?></td>
                            <td><?= $nilai->nilai_checklist; ?></td>
                            <td><?= $nilai->nilai_karya; ?></td>
                            <td><?= date('l, d M Y', strtotime($nilai->tanggal_penilaian)) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <strong>Catatan Harian Siswa</strong>
        </div>
        <div class="card-body">
            <table class="table table-responsive" id="table_catatan_harian">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">No.</th>
                        <th style="min-width: 400px;">Catatan Untuk Peserta</th>
                        <th style="min-width: 300px;">Nama Peserta</th>
                        <th style="min-width: 200px;" class="text-center">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($catatan_harian as $catatan) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?>.</td>
                            <td><?= $catatan->catatan ?></td>
                            <td><?= $catatan->nama_lengkap ?></td>
                            <td><?= date('l, d M Y', strtotime($catatan->tanggal_catatan)) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>