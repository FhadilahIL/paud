<div class="m-3 judul-halaman">
    <h1>Peserta Didik</h1>
</div>
<div class="m-3 card">
    <div class="card-body">
        <table class="table table-responsive" id="table_peserta">
            <thead class="thead-dark">
                <tr>
                    <th class="nomor">No</th>
                    <th style="min-width: 200px;">No. Induk</th>
                    <th style="min-width: 350px;">Nama Lengkap</th>
                    <th class="text-center" style="width: 150px;">Status</th>
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
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>