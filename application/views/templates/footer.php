<div class="row">
    <div class="col-md-12">
        <div class="copyright">
            <p>Copyright &copy; <?= date('Y') ?> Sipendi Jombang. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->
<!-- modal static Tambah Admin -->
<div class="modal fade" id="staticModalTambahAdmin" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="staticModalLabel">Tambah Admin</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/tambah_admin') ?>" method="post">
                    <div class="row form-group">
                        <div class="col-3 col-md-3">
                            <label class=" form-control-label">Nama Lengkap<sup class="text-danger">*</sup></label>
                        </div>
                        <div class="col-9 col-md-9">
                            <input type="text" id="text-input" name="nama" placeholder="Your Name" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-3 col-md-3">
                            <label class=" form-control-label">Username<sup class="text-danger">*</sup></label>
                        </div>
                        <div class="col-9 col-md-9">
                            <input type="text" id="text-input" name="username" placeholder="Your Username" class="form-control" required>
                            <p class="form-text text-muted"><sup class="text-danger">*tanpa tanda spasi</sup></p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-3 col-md-3">
                            <label class=" form-control-label">Password<sup class="text-danger">*</sup></label>
                        </div>
                        <div class="col-9 col-md-9">
                            <input type="password" id="text-input" name="password" placeholder="Your Password" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-3 col-md-3">
                            <label class=" form-control-label">Confirm Password<sup class="text-danger">*</sup></label>
                        </div>
                        <div class="col-9 col-md-9">
                            <input type="password" id="text-input" name="confirm_password" placeholder="Your Password" class="form-control" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal static Tambah Admin -->
<!-- modal static Tambah Admin -->
<div class="modal fade" id="staticModalTambahGuru" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="staticModalLabel">Tambah Guru</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/tambah_guru') ?>" method="post">
                    <div class="row form-group">
                        <div class="col-3 col-md-3">
                            <label class=" form-control-label">Nama Lengkap<sup class="text-danger">*</sup></label>
                        </div>
                        <div class="col-9 col-md-9">
                            <input type="text" id="text-input" name="nama" placeholder="Your Name" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-3 col-md-3">
                            <label class=" form-control-label">Username<sup class="text-danger">*</sup></label>
                        </div>
                        <div class="col-9 col-md-9">
                            <input type="text" id="text-input" name="username" placeholder="Your Username" class="form-control" required>
                            <p class="form-text text-muted"><sup class="text-danger">*tanpa tanda spasi</sup></p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-3 col-md-3">
                            <label class=" form-control-label">Password<sup class="text-danger">*</sup></label>
                        </div>
                        <div class="col-9 col-md-9">
                            <input type="password" id="text-input" name="password" placeholder="Your Password" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-3 col-md-3">
                            <label class=" form-control-label">Confirm Password<sup class="text-danger">*</sup></label>
                        </div>
                        <div class="col-9 col-md-9">
                            <input type="password" id="text-input" name="confirm_password" placeholder="Your Password" class="form-control" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal static Tambah Guru -->
<!-- modal static Tambah Orang Tua -->
<div class="modal fade" id="staticModalTambahOrtu" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="staticModalLabel">Tambah Orang Tua</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/tambah_ortu') ?>" method="post">
                    <div class="row form-group">
                        <div class="col-3 col-md-3">
                            <label class=" form-control-label">Nama Lengkap<sup class="text-danger">*</sup></label>
                        </div>
                        <div class="col-9 col-md-9">
                            <input type="text" id="text-input" name="nama" placeholder="Your Name" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-3 col-md-3">
                            <label class=" form-control-label">Username<sup class="text-danger">*</sup></label>
                        </div>
                        <div class="col-9 col-md-9">
                            <input type="text" id="text-input" name="username" placeholder="Your Username" class="form-control" required>
                            <p class="form-text text-muted"><sup class="text-danger">*tanpa tanda spasi</sup></p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-3 col-md-3">
                            <label class=" form-control-label">Password<sup class="text-danger">*</sup></label>
                        </div>
                        <div class="col-9 col-md-9">
                            <input type="password" id="text-input" name="password" placeholder="Your Password" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-3 col-md-3">
                            <label class=" form-control-label">Confirm Password<sup class="text-danger">*</sup></label>
                        </div>
                        <div class="col-9 col-md-9">
                            <input type="password" id="text-input" name="confirm_password" placeholder="Your Password" class="form-control" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal static Tambah Orang Tua -->
<!-- modal static Tambah Peserta Didik -->
<div class="modal fade" id="staticModalTambahPesertaDidik" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="staticModalLabel">Tambah Peserta Didik</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/tambah_peserta') ?>" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tahun Ajaran</label>
                        <select class="form-control form-control-sm select" name="tahun_ajaran" id="tahun_ajaran">
                            <option value="">-- Pilih Tahun Ajaran --</option>
                            <?php foreach ($tahun_ajaran as $tahun_ajaran) { ?>
                                <option value="<?= $tahun_ajaran->id_tahun_ajaran ?>">Tahun Ajaran <?= date('Y', strtotime($tahun_ajaran->mulai)) ?> / <?= date('Y', strtotime('+1 year', strtotime($tahun_ajaran->mulai))) ?></option>
                            <?php } ?>
                        </select>
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">No. Induk</label>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control form-control-sm text-center" name="no_induk1" maxlength="2">
                            </div> /
                            <div class="col">
                                <input type="text" class="form-control form-control-sm text-center" name="no_induk2" id="no_induk2" readonly>
                            </div> /
                            <div class="col">
                                <input type="text" class="form-control form-control-sm text-center" name="no_induk3" id="no_induk3" readonly>
                            </div>
                        </div>
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Lengkap</label>
                        <input type="text" class="form-control form-control-sm" name="nama_lengkap">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Panggilan</label>
                        <input type="text" class="form-control form-control-sm" name="nama_panggilan">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Kelamin</label>
                        <select class="form-control form-control-sm select" name="jenis_kelamin">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="L">Laki - Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Agama</label>
                        <select class="form-control form-control-sm select" name="agama">
                            <option value="">-- Pilih Agama --</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tempat Lahir</label>
                        <input type="text" class="form-control form-control-sm" name="tempat_lahir" required>
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Lahir</label>
                        <input type="date" class="form-control form-control-sm" name="tanggal_lahir" required>
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Anak Ke</label>
                        <input type="number" class="form-control form-control-sm" name="anak_ke" required>
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Orang Tua</label>
                        <select class="form-control form-control-sm select" name="ortu">
                            <option value="">-- Pilih Orang Tua --</option>
                            <?php foreach ($orang_tua as $ortu) { ?>
                                <option value="<?= $ortu->id_user ?>"><?= $ortu->nama ?></option>
                            <?php } ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal static Tambah Peserta Didik -->

<?php if ($_SERVER['REQUEST_URI'] == '/paud/admin/kompetensi_dasar') {
    foreach ($tampil_kompetensi_dasar as $tampil_sub_kd) { ?>
        <!-- Modal Edit Sub Kompetensi -->
        <div class="modal fade" id="staticModalSubKd<?= $tampil_sub_kd->id_sub_kd ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="staticModalLabel">Edit Sub Kompetensi Dasar</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/edit_sub_kompetensi_dasar/') . $tampil_sub_kd->id_sub_kd ?>" method="post">
                            <div class="row form-group">
                                <div class="col-4 col-md-4">
                                    <label class=" form-control-label">Sub Kompetensi Dasar<sup class="text-danger">*</sup></label>
                                </div>
                                <div class="col-8 col-md-8">
                                    <input type="text" id="text-input" name="judul_sub_kd" value="<?= $tampil_sub_kd->judul_sub_kd ?>" class="form-control" required>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal Edit Sub Kompetensi -->
    <?php }
    foreach ($kompetensi_dasar as $tampil_kd) { ?>
        <!-- Modal Edit Sub Kompetensi -->
        <div class="modal fade" id="staticModalKd<?= $tampil_kd->id_kd ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="staticModalLabel">Edit Kompetensi Dasar</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/edit_kompetensi_dasar/') . $tampil_kd->id_kd ?>" method="post">
                            <div class="row form-group">
                                <div class="col-4 col-md-4">
                                    <label class=" form-control-label">Kompetensi Dasar<sup class="text-danger">*</sup></label>
                                </div>
                                <div class="col-8 col-md-8">
                                    <input type="text" id="text-input" name="judul_kd" value="<?= $tampil_kd->judul_kd ?>" class="form-control" required>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal Edit Sub Kompetensi -->
<?php }
} ?>

<?php if ($_SERVER['REQUEST_URI'] == '/paud/admin/profile_sekolah') { ?>
    <!-- Modal Edit Sub Kompetensi -->
    <div class="modal fade" id="staticModalProfileSekolah" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="staticModalLabel">Edit Profile Sekolah</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/edit_profile_sekolah') ?>" method="post">
                        <div class="row form-group">
                            <div class="col-4 col-md-4">
                                <label class=" form-control-label">Nama Sekolah<sup class="text-danger">*</sup></label>
                            </div>
                            <div class="col-8 col-md-8">
                                <input type="text" id="text-input" name="nama_sekolah" value="<?= $profile_sekolah->nama_sekolah ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-4 col-md-4">
                                <label class=" form-control-label">NPSN<sup class="text-danger">*</sup></label>
                            </div>
                            <div class="col-8 col-md-8">
                                <input type="text" id="text-input" name="npsn" value="<?= $profile_sekolah->npsn ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-4 col-md-4">
                                <label class=" form-control-label">Alamat<sup class="text-danger">*</sup></label>
                            </div>
                            <div class="col-8 col-md-8">
                                <textarea id="text-input" name="alamat" class="form-control" rows="5" required><?= $profile_sekolah->alamat ?></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-4 col-md-4">
                                <label class=" form-control-label">No. Telepon<sup class="text-danger">*</sup></label>
                            </div>
                            <div class="col-8 col-md-8">
                                <input type="text" id="text-input" name="no_telp" value="<?= $profile_sekolah->no_telp ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-4 col-md-4">
                                <label class=" form-control-label">Fax<sup class="text-danger">*</sup></label>
                            </div>
                            <div class="col-8 col-md-8">
                                <input type="text" id="text-input" name="fax" value="<?= $profile_sekolah->fax ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-4 col-md-4">
                                <label class=" form-control-label">Email Sekolah<sup class="text-danger">*</sup></label>
                            </div>
                            <div class="col-8 col-md-8">
                                <input type="text" id="text-input" name="email_sekolah" value="<?= $profile_sekolah->email_sekolah ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-4 col-md-4">
                                <label class=" form-control-label">Kepala Sekolah<sup class="text-danger">*</sup></label>
                            </div>
                            <div class="col-8 col-md-8">
                                <input type="text" id="text-input" name="kepala_sekolah" value="<?= $profile_sekolah->kepala_sekolah ?>" class="form-control" required>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
</div>

</div>
<!-- Jquery JS-->
<script src="<?= base_url('/') ?>assets/js/jquery-3.5.1.js"></script>
<!-- Bootstrap JS-->
<script src="<?= base_url('/') ?>assets/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="<?= base_url('/') ?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="<?= base_url('/') ?>assets/vendor/slick/slick.min.js">
</script>
<script src="<?= base_url('/') ?>assets/vendor/wow/wow.min.js"></script>
<script src="<?= base_url('/') ?>assets/vendor/animsition/animsition.min.js"></script>
<script src="<?= base_url('/') ?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="<?= base_url('/') ?>assets/vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="<?= base_url('/') ?>assets/vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="<?= base_url('/') ?>assets/vendor/circle-progress/circle-progress.min.js"></script>
<script src="<?= base_url('/') ?>assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?= base_url('/') ?>assets/vendor/chartjs/Chart.bundle.min.js"></script>
<script src="<?= base_url('/') ?>assets/js/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript" src="<?= base_url('/') ?>assets/js/datatable/datatables.js"></script>
<script src="<?= base_url('/') ?>assets/js/sweetalert2/sweetalert2.all.min.js"></script>

<!-- Main JS-->
<script src="<?= base_url('/') ?>assets/js/main.js"></script>
<script src="<?= base_url('/') ?>assets/js/mySweetAlert.js"></script>
<script src="<?= base_url('/') ?>assets/js/myDataTables.js"></script>
<script src="<?= base_url('/') ?>assets/js/myScript.js"></script>

</body>

</html>
<!-- end document-->