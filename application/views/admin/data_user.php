<div class="m-3 judul-halaman">
    <h1>Data User</h1>
</div>
<div class="m-3">
    <button type="button" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#staticModalTambahAdmin">
        Tambah Admin
    </button>
    <?php if ($this->session->flashdata('berhasil_admin')) { ?>
        <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
            <span class="badge badge-pill badge-primary">Berhasil</span>
                <?= $this->session->flashdata('berhasil_admin'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } elseif ($this->session->flashdata('gagal_admin')) { ?>
        <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
            <span class="badge badge-pill badge-primary">Gagal</span>
            <?= $this->session->flashdata('gagal_admin'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <div class="table-responsive">
        <table class="table">
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
                    foreach($admin as $datad) { ?>
                        <tr>
                            <td scope="row" class="nomor"><?= $no++ ?>.</td>
                            <td><?= $datad->nama; ?></td>
                            <td><?= $datad->username; ?></td>
                            <td class="text-center"><a href="" class="btn btn-warning text-light tombol-aksi">Edit</a> <a href="<?= base_url('admin/hapus_admin/') . $datad->id_user ?>" class="btn btn-danger tombol-aksi">Hapus</a></td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="m-3">
    <button type="button" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#staticModalTambahAdmin">
        Tambah Guru
    </button>
    <?php if ($this->session->flashdata('berhasil')) { ?>
        <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
            <span class="badge badge-pill badge-primary">Berhasil</span>
            <?= $this->session->flashdata('berhasil'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } elseif ($this->session->flashdata('gagal')) { ?>
        <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
            <span class="badge badge-pill badge-primary">Gagal</span>
            <?= $this->session->flashdata('gagal'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <div class="table-responsive">
        <table class="table">
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
                    foreach($guru as $datgu) { ?>
                        <tr>
                            <td scope="row" class="nomor"><?= $no++ ?>.</td>
                            <td><?= $datgu->nama; ?></td>
                            <td><?= $datgu->username; ?></td>
                            <td class="text-center"><a href="" class="btn btn-warning text-light tombol-aksi">Edit</a> <a href="" class="btn btn-danger tombol-aksi">Hapus</a></td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="m-3">
    <button type="button" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#staticModalTambahOrtu">
        Tambah Orang Tua
    </button>
    <?php if ($this->session->flashdata('berhasil')) { ?>
        <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
            <span class="badge badge-pill badge-primary">Berhasil</span>
            <?= $this->session->flashdata('berhasil'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } elseif ($this->session->flashdata('gagal')) { ?>
        <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
            <span class="badge badge-pill badge-primary">Gagal</span>
            <?= $this->session->flashdata('gagal'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <div class="table-responsive">
        <table class="table">
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
                    foreach($ortu as $dator) { ?>
                        <tr>
                            <td scope="row" class="nomor"><?= $no++ ?>.</td>
                            <td><?= $dator->nama; ?></td>
                            <td><?= $dator->username; ?></td>
                            <td class="text-center"><a href="" class="btn btn-warning text-light tombol-aksi">Edit</a> <a href="" class="btn btn-danger tombol-aksi">Hapus</a></td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>