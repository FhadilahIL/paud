<div class="m-3">
    <h1>Dashboard</h1>
</div>
<div class="m-3 card-dash">
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-center">
                        <img src="<?= base_url('/') ?>assets/img/settings/logo/logo.png" width="30%" alt="">
                    </div>
                    <h2 class="text-center"><?= $sekolah->nama_sekolah ?></h2>
                    <div class="row mt-4">
                        <div class="col">
                            <h3 class="text-center">Profile Sekolah</h3>
                            <hr />
                            <div class="row p-1">
                                <div class="col-4">NPSN</div>
                                <div class="col-1">:</div>
                                <div class="col-7"><?= $sekolah->npsn ?></div>
                            </div>
                            <div class="row p-1">
                                <div class="col-4">Alamat</div>
                                <div class="col-1">:</div>
                                <div class="col-7"><?= $sekolah->alamat ?></div>
                            </div>
                            <div class="row p-1">
                                <div class="col-4">No. Telp</div>
                                <div class="col-1">:</div>
                                <div class="col-7"><?= $sekolah->no_telp ?></div>
                            </div>
                            <div class="row p-1">
                                <div class="col-4">Fax</div>
                                <div class="col-1">:</div>
                                <div class="col-7"><?= $sekolah->fax ?></div>
                            </div>
                            <div class="row p-1">
                                <div class="col-4">Email Sekolah</div>
                                <div class="col-1">:</div>
                                <div class="col-7"><?= $sekolah->email_sekolah ?></div>
                            </div>
                            <div class="row p-1">
                                <div class="col-4">Kepala</div>
                                <div class="col-1">:</div>
                                <div class="col-7"><?= $sekolah->kepala_sekolah ?></div>
                            </div>
                        </div>
                        <div class="col">
                            <h3 class="text-center">Visi & Misi</h3>
                            <hr />
                            <div class="ml-3">
                                <strong>Visi</strong>
                                <p class="p-1 text-justify">Membentuk dan mendidik anak usia dini yang sehat, cerdas, kreatif dan berakhlakul karimah.</p>
                                <strong>Misi</strong>
                                <p class="p-1 text-justify">Mempersiapkan anak dalam bidang pengembangan moral dan nilai agama, bahasa, kognitif, fisik dan sosial emosional dan kemandirian untuk menuju ke jenjang berikutnya.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="statistic card-dash">
        <div class="section__content">
            <div class="row">
                <div class="col">
                    <div class="statistic__item shadow">
                        <h2 class="number"><?= $peserta_didik ?></h2>
                        <span class="desc">Jumlah Peserta Didik</span>
                        <div class="icon">
                            <i class="zmdi zmdi-account-o"></i>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="statistic__item shadow">
                        <h2 class="number"><?= $kompetensi_dasar ?></h2>
                        <span class="desc">Jumlah Kompetensi Dasar</span>
                        <div class="icon">
                            <i class="zmdi zmdi-account-o"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>