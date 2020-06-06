<div class="page-container">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <div class="header-button ml-auto">
                        <div class="account-wrap ml-auto">
                            <div class="account-item clearfix js-item-menu">
                                <?php if ($user->foto != 'default.jpg'){
                                    if ($this->session->userdata('id_role') == 1) { ?>
                                        <div class="image">
                                            <img src="<?= base_url('/') ?>assets/img/profile/admin/<?= $user->foto; ?>" />
                                        </div>
                                    <?php } elseif ($this->session->userdata('id_role') == 2) { ?>
                                        <div class="image">
                                            <img src="<?= base_url('/') ?>assets/img/profile/guru/<?= $user->foto; ?>" />
                                        </div>
                                    <?php } elseif ($this->session->userdata('id_role') == 3) { ?>
                                        <div class="image">
                                            <img src="<?= base_url('/') ?>assets/img/profile/ortu/<?= $user->foto; ?>" />
                                        </div>
                                    <?php } ?>
                                <?php } else { ?>
                                    <div class="image">
                                        <img src="<?= base_url('/') ?>assets/img/profile/<?= $user->foto; ?>" />
                                    </div>
                                <?php } ?>
                                <div class="content">
                                    <a class="js-acc-btn" href="#"><?= $this->session->userdata('nama'); ?></a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                    <?php if ($user->foto != 'default.jpg'){
                                    if ($this->session->userdata('id_role') == 1) { ?>
                                        <div class="image">
                                            <img src="<?= base_url('/') ?>assets/img/profile/admin/<?= $user->foto; ?>" />
                                        </div>
                                    <?php } elseif ($this->session->userdata('id_role') == 2) { ?>
                                        <div class="image">
                                            <img src="<?= base_url('/') ?>assets/img/profile/guru/<?= $user->foto; ?>" />
                                        </div>
                                    <?php } elseif ($this->session->userdata('id_role') == 3) { ?>
                                        <div class="image">
                                            <img src="<?= base_url('/') ?>assets/img/profile/ortu/<?= $user->foto; ?>" />
                                        </div>
                                    <?php } ?>
                                <?php } else { ?>
                                    <div class="image">
                                        <img src="<?= base_url('/') ?>assets/img/profile/<?= $user->foto; ?>" />
                                    </div>
                                <?php } ?>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#"><?= $this->session->userdata('nama'); ?></a>
                                            </h5>
                                            <span class="email"><?= $user->username; ?></span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>My Profile</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="#">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER DESKTOP-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">