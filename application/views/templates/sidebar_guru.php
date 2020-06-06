<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="<?= base_url() ?>">
                    <img src="<?= base_url('/') ?>assets/images/icon/logo.png" alt="Sipendi" />
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
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-desktop"></i>Master Data
                        <span class="arrow float-right">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="index2.html">Peserta Didik</a>
                        </li>
                        <li>
                            <a href="index3.html">Kompetensi Dasar</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="<?= base_url('') ?>">
                        <i class="fas fa-tachometer-alt"></i>Penilaian Harian</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-desktop"></i>Perkembangan
                        <span class="arrow float-right">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list ">
                        <li>
                            <a href="index.html">Emosi</a>
                        </li>
                        <li>
                            <a href="index2.html">Kesehatan dan Jasmani</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="<?= base_url('') ?>">
                        <i class="fas fa-tachometer-alt"></i>Cetak Laporan</a>
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
            <img src="<?= base_url('/') ?>assets/images/icon/logo.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar small">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a href="<?= base_url('') ?>">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-chart-bar"></i>Master Data
                        <span class="arrow float-right">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="index2.html">Peserta Didik</a>
                        </li>
                        <li>
                            <a href="index3.html">Kompetensi Dasar</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="<?= base_url('') ?>">
                        <i class="fas fa-tachometer-alt"></i>Penilaian Harian</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-chart-bar"></i>Perkembangan
                        <span class="arrow float-right">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="index.html">Emosi</a>
                        </li>
                        <li>
                            <a href="index2.html">Kesehatan dan Jasmani</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="<?= base_url('') ?>">
                        <i class="fas fa-tachometer-alt"></i>Cetak Laporan</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
<!-- MAIN CONTENT-->