<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistem Pendidikan Usia Dini">
    <meta name="author" content="Putri Nadella Junialdi">
    <meta name="keywords" content="Sipendi">

    <!-- Title Page-->
    <title><?= $judul; ?></title>
    <link rel="shortcut icon" href="<?= base_url('/') ?>assets/img/settings/logo/logo.png" type="image/x-icon">

    <!-- Fontfaces CSS-->
    <link href="<?= base_url('/') ?>assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?= base_url('/') ?>assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url('/') ?>assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url('/') ?>assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?= base_url('/') ?>assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?= base_url('/') ?>assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url('/') ?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url('/') ?>assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?= base_url('/') ?>assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url('/') ?>assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?= base_url('/') ?>assets/js/select2/dist/css/select2.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url('/') ?>assets/css/select2-bootstrap4.css" rel="stylesheet" media="all">
    <link href="<?= base_url('/') ?>assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?= base_url('/') ?>assets/css/theme.css" rel="stylesheet" media="all">
    <link href="<?= base_url('/') ?>assets/css/style.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/') ?>assets/js/datatable/datatables.css" />

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="flash-data-notif" data-flashdata="<?= $this->session->flashdata('notif'); ?>"></div>
        <div class="flash-data-perintah" data-flashdata="<?= $this->session->flashdata('perintah'); ?>"></div>
        <div class="flash-data-pesan" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>