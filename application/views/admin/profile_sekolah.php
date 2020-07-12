<div class="m-3 judul-halaman">
    <h1>Profile Sekolah</h1>
</div>
<div class="col-md">
    <div class="card">
        <img class="card-img-top logo-profile-sekolah" src="<?= base_url('/') ?>assets/img/settings/logo/logo.png" alt="Card image cap">
        <div class="card-body">
            <h2 class="card-title mb-3"><?= $profile_sekolah->nama_sekolah ?></h2>
            <div>
                <table class="table">
                    <tr>
                        <td width="200">NPSN</td>
                        <td width="20">:</td>
                        <td><?= $profile_sekolah->npsn ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?= $profile_sekolah->alamat ?></td>
                    </tr>
                    <tr>
                        <td>No. Telepon</td>
                        <td>:</td>
                        <td><?= $profile_sekolah->no_telp ?></td>
                    </tr>
                    <tr>
                        <td>Fax</td>
                        <td>:</td>
                        <td><?= $profile_sekolah->fax ?></td>
                    </tr>
                    <tr>
                        <td>Email Sekolah</td>
                        <td>:</td>
                        <td><?= $profile_sekolah->email_sekolah ?></td>
                    </tr>
                    <tr>
                        <td>Kepala Sekolah</td>
                        <td>:</td>
                        <td><?= $profile_sekolah->kepala_sekolah ?></td>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-warning ml-auto text-light shadow" data-toggle="modal" data-target="#staticModalProfileSekolah">Ubah Profile Sekolah</button>
            </div>
        </div>
    </div>
</div>