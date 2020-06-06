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
<div class="modal fade" id="staticModalTambahAdmin" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
    data-backdrop="static">
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
                            <label class=" form-control-label">Nama Lengkap</label>
                        </div>
                        <div class="col-9 col-md-9">
                            <input type="text" id="text-input" name="nama" placeholder="Your Name" class="form-control">
                            <!-- <small class="form-text text-muted">This is a help text</small> -->
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-3 col-md-3">
                            <label class=" form-control-label">Username</label>
                        </div>
                        <div class="col-9 col-md-9">
                            <input type="text" id="text-input" name="username" placeholder="Your Username" class="form-control">
                            <!-- <small class="form-text text-muted">This is a help text</small> -->
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-3 col-md-3">
                            <label class=" form-control-label">Password</label>
                        </div>
                        <div class="col-9 col-md-9">
                            <input type="text" id="text-input" name="password" placeholder="Your Password" class="form-control">
                            <!-- <small class="form-text text-muted">This is a help text</small> -->
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-3 col-md-3">
                            <label class=" form-control-label">Confirm Password</label>
                        </div>
                        <div class="col-9 col-md-9">
                            <input type="text" id="text-input" name="confirm_password" placeholder="Your Password" class="form-control">
                            <!-- <small class="form-text text-muted">This is a help text</small> -->
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
<!-- modal static Tambah Guru -->
<div class="modal fade" id="staticModalTambahGuru" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticModalLabel">Tambah Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    This is a static modal, backdrop click will not close it.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal static Tambah Guru -->
<!-- modal static Tambah Orang Tua -->
<div class="modal fade" id="staticModalTambahOrtu" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticModalLabel">Tambah Orang Tua</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    This is a static modal, backdrop click will not close it.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal static Tambah Orang Tua -->
</div>

</div>
<!-- Jquery JS-->
<script src="<?= base_url('/') ?>assets/vendor/jquery-3.2.1.min.js"></script>
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
<script src="<?= base_url('/') ?>assets/vendor/select2/select2.min.js">
</script>

<!-- Main JS-->
<script src="<?= base_url('/') ?>assets/js/main.js"></script>

</body>

</html>
<!-- end document-->