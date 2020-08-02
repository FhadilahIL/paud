<div class="m-3 judul-halaman">
    <h1>Semester</h1>
</div>
<div class="m-3">
    <div class="card">
        <div class="card-header">
            <strong>Tambah Tahun Ajaran</strong>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/tambah_tahun_ajaran') ?>" method="post">
                <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <div class="form-inline">
                        <input type="text" name="awal" id="tahun_mulai" class="form-control mr-2" value="<?= $tahun_awal ?>" readonly /> / <input type="text" name="akhir" id="tahun_selesai" class="form-control ml-2" value="<?= $tahun_akhir ?>" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" <?= $disabled ?>>Simpan Tahun Ajaran</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <strong>Tambah Semester</strong>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/tambah_semester') ?>" method="post">
                <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <select name="tahun_ajaran" id="tahun-ajaran-semester" class="form-control select">
                        <option value="">-- Pilih Tahun Ajaran --</option>
                        <?php foreach ($tahun_ajaran as $tahun_ajaran) { ?>
                            <option value="<?= $tahun_ajaran->id_tahun_ajaran ?>">Tahun Ajaran <?= $tahun_ajaran->tahun_ajaran ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Semester</label>
                    <input type="text" class="form-control" id="tambah-semester" name="semester" readonly>
                </div>
                <div class="form-group">
                    <label>Tanggal Mulai Semester</label>
                    <input type="date" class="form-control date" id="tanggal_mulai" name="mulai" min="<?= $tanggal->selesai ?>" required disabled>
                </div>
                <div class="form-group">
                    <label>Tanggal Akhir Semester</label>
                    <input type="date" class="form-control" id="tanggal_akhir" name="akhir" min="<?= $tanggal_akhir ?>" required disabled>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success w-100" id="tombol-tambah-semester" disabled>Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <strong>Data Semester</strong>
        </div>
        <div class="card-body">
            <table class="table table-responsive" id="table_semester_semua">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>No.</th>
                        <th style="min-width: 300px;">Tahun Ajaran</th>
                        <th style="min-width: 130px;">Semester</th>
                        <th style="min-width: 250px;">Tanggal Mulai Semester</th>
                        <th style="min-width: 250px;">Tanggal Akhir Semester</th>
                        <th style="min-width: 110px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($semester as $semester) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?>.</td>
                            <td class="text-center">Tahun Ajaran <?= $semester->tahun_ajaran ?></td>
                            <td class="text-center"><?= $semester->semester ?></td>
                            <td class="text-center"><?= date('d M Y', strtotime($semester->mulai)) ?></td>
                            <td class="text-center"><?= date('d M Y', strtotime($semester->selesai)) ?></td>
                            <td class="text-center"><a href="<?= base_url('admin/ubah_semester/') . $semester->id_semester ?>" class="btn btn-warning text-light" style="width: 100px;">Edit</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>