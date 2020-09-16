<div class="m-3 judul-halaman">
    <h1>Kompetensi Dasar</h1>
</div>
<div class="m-3">
    <div class="card">
        <div class="card-header">
            <strong class="card-title mb-3">Tambah Kompetensi Dasar</strong>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/tambah_kompetensi_dasar') ?>" method="post" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-email" class=" form-control-label">Kompetensi Dasar</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="kompetensi_dasar" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"></div>
                    <div class="col-12 col-md-9">
                        <button class="btn btn-primary w-100" type="submit">Simpan Kompetensi Dasar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <strong class="card-title mb-3">Tambah Sub Kompetensi Dasar</strong>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/tambah_sub_kompetensi_dasar') ?>" method="post" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-email" class=" form-control-label">Kompetensi Dasar</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select class="form-control form-control-sm select" name="kompetensi_dasar">
                            <option value="">-- Pilih Kompetensi Dasar --</option>
                            <?php foreach ($kompetensi_dasar as $kd) { ?>
                                <option value="<?= $kd->id_kd ?>"><?= $kd->judul_kd ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-email" class=" form-control-label">Sub Kompetensi Dasar</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="sub_kompetensi_dasar" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"></div>
                    <div class="col-12 col-md-9">
                        <button class="btn btn-primary w-100" type="submit">Simpan Sub Kompetensi Dasar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <strong class="card-title mb-3">Daftar Kompetensi Dasar</strong>
        </div>
        <div class="card-body">
            <ol class="ml-5 mb-3">
                <?php
                foreach ($kompetensi_dasar as $tampil_kd) { ?>
                    <b>
                        <li class="d-flex justify-content-start pr-5"><?= $tampil_kd->judul_kd ?><button type="button" class="btn btn-warning ml-auto" data-toggle="modal" data-target="#staticModalKd<?= $tampil_kd->id_kd ?>">Edit</button>&nbsp;<button id="tombol" onclick="hapus_data('Kompetensi Dasar','<?= base_url('admin/hapus_kompetensi_dasar/') . $tampil_kd->id_kd ?>')" class="btn btn-danger tombol-aksi tombol-hapus">Hapus</button></li>
                    </b>
                    <ol class="ml-3 mt-1">
                        <?php
                        foreach ($tampil_kompetensi_dasar as $tampil_sub_kd) {
                            if ($tampil_sub_kd->id_sub_kd) {
                                if ($tampil_kd->id_kd == $tampil_sub_kd->id_kd) { ?>
                                    <li class="d-flex justify-content-start pr-5 sub-kd"><?= $tampil_sub_kd->judul_sub_kd ?><button type="button" class="btn btn-warning ml-auto" data-toggle="modal" data-target="#staticModalSubKd<?= $tampil_sub_kd->id_sub_kd ?>">Edit</button>&nbsp;<button id="tombol" onclick="hapus_data('Sub Kompetensi Dasar','<?= base_url('admin/hapus_sub_kompetensi_dasar/') . $tampil_sub_kd->id_sub_kd ?>')" class="btn btn-danger tombol-aksi tombol-hapus">Hapus</button></li>
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