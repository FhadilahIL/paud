<div class="m-3 judul-halaman">
    <h1>Data User</h1>
</div>
<div class="m-3">
    <div class="card">
        <div class="card-body">
            <button type="button" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#staticModalTambahAdmin">
                Tambah Admin
            </button>
            <table class="table table-responsive" id="table_admin">
                <thead class="thead-dark">
                    <tr>
                        <th class="nomor">No</th>
                        <th class="nama">Nama</th>
                        <th class="username">Username</th>
                        <th class="text-center aksi">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($admin as $datad) { ?>
                        <tr>
                            <td scope="row" class="nomor"><?= $no++ ?>.</td>
                            <td><?= ucwords($datad->nama); ?></td>
                            <td><?= $datad->username; ?></td>
                            <td class="text-center"><a href="<?= base_url('admin/lihat_admin/') . $datad->id_user; ?>" class="btn btn-info text-light tombol-aksi">Lihat Data</a> <button id="tombol" onclick="hapus_data('Admin','<?= base_url('admin/hapus_admin/') . $datad->id_user ?>')" class="btn btn-danger tombol-aksi tombol-hapus">Hapus</button></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <button type="button" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#staticModalTambahGuru">
                Tambah Pengajar
            </button>
            <table class="table table-responsive" id="table_guru">
                <thead class="thead-dark">
                    <tr>
                        <th class="nomor">No</th>
                        <th class="nama">Nama</th>
                        <th class="username">Username</th>
                        <th class="text-center aksi">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($guru as $datgu) { ?>
                        <tr>
                            <td scope="row" class="nomor"><?= $no++ ?>.</td>
                            <td><?= ucwords($datgu->nama); ?></td>
                            <td><?= $datgu->username; ?></td>
                            <td class="text-center"><a href="<?= base_url('admin/edit_guru/' . $datgu->id_user) ?>" class="btn btn-warning text-light tombol-aksi">Edit</a> <button id="tombol" onclick="hapus_data('Guru','<?= base_url('admin/hapus_guru/') . $datgu->id_user ?>')" class=" btn btn-danger tombol-aksi tombol-hapus">Hapus</button></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <button type="button" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#staticModalTambahOrtu">
                Tambah Orang Tua
            </button>
            <table class="table table-responsive" id="table_ortu">
                <thead class="thead-dark">
                    <tr>
                        <th class="nomor">No</th>
                        <th class="nama">Nama</th>
                        <th class="username">Username</th>
                        <th class="text-center aksi">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($ortu as $dator) { ?>
                        <tr>
                            <td scope="row" class="nomor"><?= $no++ ?>.</td>
                            <td><?= ucwords($dator->nama); ?></td>
                            <td><?= $dator->username; ?></td>
                            <td class="text-center"><a href="<?= base_url('admin/edit_ortu/' . $dator->id_user) ?>" class="btn btn-warning text-light tombol-aksi">Edit</a> <button onclick="hapus_data('Orang Tua','<?= base_url('admin/hapus_ortu/') . $dator->id_user ?>')" class="btn btn-danger tombol-aksi tombol-hapus">Hapus</button></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>