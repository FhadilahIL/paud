<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan - <?= $biodata->nama_lengkap ?> - <?= time() ?></title>
    <link rel="stylesheet" href="<?= base_url('/') ?>assets/css/bootstrap.css">
</head>

<body>
    <table class="w-100 ml-1">
        <tr>
            <td style="width: 151px;" valign="center" align="center">
                <img src="<?= base_url('/') ?>assets/img/settings/logo/logo.png" width="150px" alt="">
            </td>
            <td valign="center">
                <div class="text-center">
                    <p class="font-weight-bold mt-2" style="line-height: 1.2em; font-size: 11pt;">Pendidikan Anak Usia Dini (PAUD)</p>
                    <p class="mt-n3 font-weight-bolder" style="font-size: 20pt; line-height: 1.2em;">MELATI</p>
                    <p class="mt-n3 font-weight-bold" style="line-height: 1.2em; font-size: 11pt;">Izin Opersional : No. 421.1/Kep.6676.1-Dindik</p>
                    <p class="mt-n3 font-weight-bold" style="line-height: 1em; font-size: 11pt;">NPSN : 69911270</p>
                    <p class="mt-n3" style="font-size: 10pt; line-height: 2em;">Jl. Sumatra RT.004/RW.02 No. 4 Kel. Jombang</p>
                    <p class="mt-n3" style="font-size: 10pt; line-height: 1em;">Kec. Ciputat - Kota Tangerang Selatan - Banten 15414 Hp. 0813 9803 4098</p>
                </div>
            </td>
        </tr>
    </table>
    <div style="background-color: black; height: 2px; margin-bottom: 2px;" class="ml-2"></div>
    <div style="background-color: black; height: 3px;" class="ml-2 mb-2"></div>
    <h2 class="ml-2">Biodata Peserta</h2>
    <small>
        <table cellpadding=10 class="mb-4" style="width: 720px;">
            <tr height="50px">
                <td style="width: 100px; max-width: 150.5px" align="left" valign="top">No. Induk</td>
                <td style="width: 5px;" align="left" valign="top">:</td>
                <td style="width: 195px;" align="left" valign="top"><?= $biodata->no_induk ?></td>
                <td style="width: 100px; max-width: 150.5px" align="left" valign="top">Nama Orang Tua</td>
                <td style="width: 5px;" align="left" valign="top">:</td>
                <td style="width: 195px;" align="left" valign="top"><?= $biodata->nama ?></td>
            </tr>
            <tr height="50px">
                <td style="width: 100px; max-width: 150.5px" align="left" valign="top">Nama Lengkap</td>
                <td style="width: 5px;" align="left" valign="top">:</td>
                <td style="width: 195px;" align="left" valign="top"><?= $biodata->nama_lengkap ?></td>
                <td style="width: 100px; max-width: 150.5px" align="left" valign="top">Nama Pekerjaan</td>
                <td style="width: 5px;" align="left" valign="top">:</td>
                <td style="width: 195px;" align="left" valign="top"><?= $biodata->pekerjaan ?></td>
            </tr>
            <tr height="50px">
                <td style="width: 100px; max-width: 150.5px" align="left" valign="top">Nama Panggilan</td>
                <td style="width: 5px;" align="left" valign="top">:</td>
                <td style="width: 195px;" align="left" valign="top"><?= $biodata->nama_panggilan ?></td>
                <td style="width: 100px; max-width: 150.5px" align="left" valign="top">No. Telp</td>
                <td style="width: 5px;" align="left" valign="top">:</td>
                <td style="width: 195px;" align="left" valign="top"><?= $biodata->no_hp ?></td>
            </tr>
            <tr height="50px">
                <td style="width: 100px; max-width: 150.5px" align="left" valign="top">Jenis Kelamin</td>
                <td style="width: 5px;" align="left" valign="top">:</td>
                <td style="width: 195px;" align="left" valign="top"><?= $jenis_kelamin ?></td>
                <td style="width: 100px; max-width: 150.5px" rowspan="4" align="left" valign="top">Alamat</td>
                <td style="width: 5px;" rowspan="3" align="left" valign="top">:</td>
                <td style="width: 195px;" rowspan="4" align="left" valign="top"><?= $biodata->alamat ?></td>
            </tr>
            <tr height="50px">
                <td style="width: 100px; max-width: 150.5px" align="left" valign="top">Agama</td>
                <td style="width: 5px;" align="left" valign="top">:</td>
                <td style="width: 195px;" align="left" valign="top"><?= $biodata->agama ?></td>
            </tr>
            <tr height="50px">
                <td style="width: 100px; max-width: 150.5px" align="left" valign="top">Tempat Lahir</td>
                <td style="width: 5px;" align="left" valign="top">:</td>
                <td style="width: 195px;" align="left" valign="top"><?= $biodata->tempat_lahir ?></td>
            </tr>
            <tr height="50px">
                <td style="width: 100px; max-width: 150.5px" align="left" valign="top">Tanggal Lahir</td>
                <td style="width: 5px;" align="left" valign="top">:</td>
                <td style="width: 195px;" align="left" valign="top"><?= $tanggal_lahir ?></td>
            </tr>
        </table>
        <h4 class="ml-2">Catatan Perkembangan Emosi</h4>
        <table class="ml-2 mb-4 w-100" cellpadding=8 border="1">
            <tr class="text-center">
                <th style="width: 30px;">Semester</th>
                <th>Menangis</th>
                <th>Memukul</th>
                <th>Marah</th>
                <th>Diam</th>
                <th>Melamun</th>
                <th>Gembira</th>
            </tr>
            <?php foreach ($nilai_emosi as $emosi) { ?>
                <tr>
                    <td class="text-center"><?= $emosi->semester ?></td>
                    <td><?= $emosi->menangis ?></td>
                    <td><?= $emosi->memukul ?></td>
                    <td><?= $emosi->marah ?></td>
                    <td><?= $emosi->diam ?></td>
                    <td><?= $emosi->melamun ?></td>
                    <td><?= $emosi->gembira ?></td>
                </tr>
            <?php } ?>
        </table>
        <h4 class="ml-2">Catatan Perkembangan Kesehatan dan Jasmani</h4>
        <table class="w-100 ml-2" cellpadding=10 border="1">
            <tr class="text-center">
                <th style="width: 30px;">Semester</th>
                <th>Mata</th>
                <th>Mulut</th>
                <th>Gigi</th>
                <th>Telinga</th>
                <th>Hidung</th>
                <th>Anggota Badan</th>
                <th>Berat Badan</th>
                <th>Tinggi Badan</th>
            </tr>
            <?php foreach ($nilai_kesehatan as $kesehatan) { ?>
                <tr>
                    <td class="text-center"><?= $kesehatan->semester ?></td>
                    <td><?= $kesehatan->mata ?></td>
                    <td><?= $kesehatan->mulut ?></td>
                    <td><?= $kesehatan->gigi ?></td>
                    <td><?= $kesehatan->telinga ?></td>
                    <td><?= $kesehatan->hidung ?></td>
                    <td><?= $kesehatan->anggota_badan ?></td>
                    <td><?= $kesehatan->berat_badan ?> Kg</td>
                    <td><?= $kesehatan->tinggi_badan ?> cm</td>
                </tr>
            <?php } ?>
        </table>
    </small>

    <script src="<?= base_url('/') ?>assets/js/jquery-3.5.1.js"></script>
    <script src="<?= base_url('/') ?>assets/js/bootstrap.js"></script>
</body>

</html>