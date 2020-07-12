<div class="page-container">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <div class="header-button ml-auto">
                        <div class="account-wrap ml-auto">
                            <div class="account-item clearfix js-item-menu">
                                <?php if ($user->foto != 'default.svg') { ?>
                                    <div class="image foto-profile">
                                        <img src="<?= base_url('/') ?>assets/img/profile/<?= $user->foto; ?>" />
                                    <?php } else { ?>
                                        <img src="<?= base_url('/') ?>assets/img/profile/<?= $user->foto; ?>" class="w-75 ml-2" />
                                    <?php } ?>
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn" href="#"><?= $this->session->userdata('nama'); ?></a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <?php if ($user->foto != 'default.svg') { ?>
                                                <div class="image foto-profile">
                                                    <img src="<?= base_url('/') ?>assets/img/profile/<?= $user->foto; ?>" />
                                                <?php } else { ?>
                                                    <img src="<?= base_url('/') ?>assets/img/profile/<?= $user->foto; ?>" />
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#"><?= $this->session->userdata('nama'); ?></a>
                                            </h5>
                                            <span class="email">Username : <?= $user->username; ?></span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <?php if ($this->session->userdata('id_role') == 1) { ?>
                                                <a href="<?= base_url('admin/my_profile') ?>">
                                                <?php } else if ($this->session->userdata('id_role') == 2) { ?>
                                                    <a href="<?= base_url('pengajar/my_profile') ?>">
                                                    <?php } else if ($this->session->userdata('id_role') == 3) { ?>
                                                        <a href="<?= base_url('ortu/my_profile') ?>">
                                                        <?php } ?>
                                                        <i class="zmdi zmdi-account"></i>My Profile</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="<?= base_url('auth/logout') ?>">
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