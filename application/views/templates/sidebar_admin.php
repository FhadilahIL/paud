<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo logo-mobile" href="<?= base_url() ?>">
                    <img src="<?= base_url('/') ?>assets/img/settings/logo/logo.png" alt="Sipendi" />
                </a>
                <button class="hamburger pt-n2 hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="has-sub <?= $active[0] ?>">
                    <a class="js-arrow" href="<?= base_url('admin') ?>">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li class="has-sub <?= $active[1] ?>">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-desktop"></i>Master Data</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li class="<?= $active[2] ?>">
                            <a href="<?= base_url('admin/data_user') ?>">Data User</a>
                        </li>
                        <li class="<?= $active[3] ?>">
                            <a href="<?= base_url('admin/peserta_didik') ?>">Peserta Didik</a>
                        </li>
                        <li class="<?= $active[4] ?>">
                            <a href="<?= base_url('admin/kompetensi_dasar') ?>">Kompetensi Dasar</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub <?= $active[5] ?>">
                    <a href="<?= base_url('admin/penilaian_harian') ?>">
                        <i class="fas fa-tachometer-alt"></i>Penilaian Harian</a>
                </li>
                <li class="has-sub <?= $active[6] ?>">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-desktop"></i>Catatan Perkembangan</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li class="<?= $active[7] ?>">
                            <a href="<?= base_url('admin/nilai_emosi') ?>">Emosi</a>
                        </li>
                        <li class="<?= $active[8] ?>">
                            <a href="<?= base_url('admin/nilai_kesehatan') ?>">Kesehatan dan Jasmani</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub <?= $active[9] ?>">
                    <a href="<?= base_url('admin/cetak_laporan') ?>">
                        <i class="fas fa-tachometer-alt"></i>Cetak Laporan</a>
                </li>
                <li class="has-sub <?= $active[10] ?>">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-desktop"></i>Pengaturan</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li class="<?= $active[11] ?>">
                            <a href="<?= base_url('admin/profile_sekolah') ?>">Profile Sekolah</a>
                        </li>
                        <li class="<?= $active[12] ?>">
                            <a href="<?= base_url('admin/semester') ?>">Semester</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->
<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="<?= base_url('/') ?>assets/img/settings/logo/logo_header.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="has-sub <?= $active[0] ?>">
                    <a href="<?= base_url('admin') ?>">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li class="has-sub <?= $active[1] ?>">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-chart-bar"></i>Master Data</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class="<?= $active[2] ?>">
                            <a href="<?= base_url('admin/data_user') ?>">Data User</a>
                        </li>
                        <li class="<?= $active[3] ?>">
                            <a href="<?= base_url('admin/peserta_didik') ?>">Peserta Didik</a>
                        </li>
                        <li class="<?= $active[4] ?>">
                            <a href="<?= base_url('admin/kompetensi_dasar') ?>">Kompetensi Dasar</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub <?= $active[5] ?>">
                    <a href="<?= base_url('admin/penilaian_harian') ?>">
                        <i class="fas fa-tachometer-alt"></i>Penilaian Harian</a>
                </li>
                <li class="has-sub <?= $active[6] ?>">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-chart-bar"></i>Catatan Perkembangan</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class="<?= $active[7] ?>">
                            <a href="<?= base_url('admin/nilai_emosi') ?>">Emosi</a>
                        </li>
                        <li class="<?= $active[8] ?>">
                            <a href="<?= base_url('admin/nilai_kesehatan') ?>">Kesehatan dan Jasmani</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub <?= $active[9] ?>">
                    <a href="<?= base_url('admin/cetak_laporan') ?>">
                        <i class="fas fa-tachometer-alt"></i>Cetak Laporan</a>
                </li>
                <li class="has-sub <?= $active[10] ?>">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-chart-bar"></i>Pengaturan</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li class="<?= $active[11] ?>">
                            <a href="<?= base_url('admin/profile_sekolah') ?>">Profile Sekolah</a>
                        </li>
                        <li class="<?= $active[12] ?>">
                            <a href="<?= base_url('admin/semester') ?>">Semester</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
<!-- MAIN CONTENT-->