<div class="m-3 judul-halaman">
    <h1>Kompetensi Dasar</h1>
</div>
<div class="m-3">
    <div class="card">
        <div class="card-header">
            <strong class="card-title mb-3">Daftar Kompetensi Dasar</strong>
        </div>
        <div class="card-body">
            <ol class="ml-5">
                <?php foreach ($kompetensi_dasar as $tampil_kd) { ?>
                    <b>
                        <li class="d-flex justify-content-start pr-5"><?= $tampil_kd->judul_kd ?></li>
                    </b>
                    <ol class="ml-3">
                        <?php foreach ($tampil_kompetensi_dasar as $tampil_sub_kd) {
                            if ($tampil_sub_kd->id_sub_kd) {
                                if ($tampil_kd->id_kd == $tampil_sub_kd->id_kd) { ?>
                                    <li class="d-flex justify-content-start pr-5 sub-kd"><?= $tampil_sub_kd->judul_sub_kd ?></li>
                        <?php }
                            }
                        } ?>
                    </ol>
                    <br />
                <?php } ?>
            </ol>
        </div>
    </div>
</div>