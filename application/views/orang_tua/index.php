<div class="m-3">
    <h1>Dashboard</h1>
</div>
<div class="m-3">
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
                                <p class="p-1 text-justify">1. Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis nisi modi soluta assumenda et, adipisci dolorum nesciunt iste? Non, eum tenetur? Illo quam repellat facilis sint hic quae nihil dolorem.</p>
                                <p class="p-1 text-justify">2. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam at natus sequi deserunt, perspiciatis voluptatum autem unde nemo exercitationem non. Deleniti iste ab delectus magni ut, pariatur deserunt eligendi eos?</p>
                                <strong>Misi</strong>
                                <p class="p-1 text-justify">1. Lorem ipsum dolor sit amet consectetur adipisicing elit. A, dolores!</p>
                                <p class="p-1 text-justify">2. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae accusamus animi suscipit consequuntur ipsam nulla?</p>
                                <p class="p-1 text-justify">3. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt ex sit laborum?</p>
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
            </div>
        </div>
    </section>
</div>