<div class="m-3 judul-halaman">
    <h1>Peserta Didik</h1>
</div>
<div class="m-3 card">
    <div class="card-body">
        <table class="table table-responsive" id="table_peserta">
            <thead class="thead-dark">
                <tr>
                    <th class="nomor">No</th>
                    <th class="username">No. Induk</th>
                    <th class="nama">Nama Lengkap</th>
                    <th class="text-center" style="width: 100px;">Status</th>
                    <th class="text-center aksi">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($murid as $murid) { ?>
                    <tr>
                        <td scope="row" class="nomor"><?= $no++ ?>.</td>
                        <td><?= ucwords($murid->no_induk); ?></td>
                        <td><?= $murid->nama_lengkap; ?></td>
                        <td><?= $murid->status; ?></td>
                        <td class="text-center"><a href="<?= base_url('ortu/ubah_peserta/' . $murid->id_peserta) ?>" class="btn btn-warning text-light tombol-aksi">Edit</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>