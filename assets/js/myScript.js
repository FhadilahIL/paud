// datatables data user (admin)
$(document).ready(function () {
    $('#table_admin').DataTable({
        "lengthMenu": [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"]
        ]
    });

    $('#table_guru').DataTable({
        "lengthMenu": [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"]
        ]
    });

    $('#table_ortu').DataTable({
        "lengthMenu": [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"]
        ]
    });

    $('#table_peserta').DataTable({
        "lengthMenu": [
            [10, 20, 30, -1],
            [10, 20, 30, "All"]
        ]
    });

    $('#table_semester_semua').DataTable({})

    $('#table_penilaian_harian').DataTable({
        'order': [[4, "desc"]]
    });

    $('#table_catatan_harian').DataTable({
        'order': [[3, "desc"]]
    });

    $(".select").select2({
        theme: 'bootstrap4',
        placeholder: "-- Please Select --",
        allowClear: true
    });

    $('#tahun_ajaran').change(function () {
        var id = document.getElementById('tahun_ajaran').value
        // console.log(id)
        $.ajax({
            type: 'get',
            url: '/paud/admin/no_induk/' + id,
            dataType: 'json',
            success: function (data) {
                var tahun = data[0].tahun_ajaran
                var tahun_awal = tahun.substring(0, 4)
                var tahun_akhir = parseInt(tahun_awal) + 1
                var kode = data[0].no_induk
                // console.log(tahun_akhir)
                if (kode) {
                    if (kode.substring(7) == tahun_awal.substring(2, 4) + "." + tahun_akhir.toString().substring(2, 4)) {
                        if (parseInt(kode.substring(3, 6)) > 0 && parseInt(kode.substring(3, 6)) < 10) {
                            document.getElementById('no_induk2').value = '00' + (parseInt(kode.substring(3, 6)) + 1)
                        } else if (parseInt(kode.substring(3, 6)) > 9 && parseInt(kode.substring(3, 6)) < 99) {
                            document.getElementById('no_induk2').value = '0' + (parseInt(kode.substring(3, 6)) + 1)
                        } else if (parseInt(kode.substring(3, 6)) > 98) {
                            document.getElementById('no_induk2').value = (parseInt(kode.substring(3, 6)) + 1)
                        }
                    } else {
                        document.getElementById('no_induk2').value = '001'
                    }
                } else {
                    document.getElementById('no_induk2').value = '001'
                }
                document.getElementById('no_induk3').value = tahun_awal.substring(2, 4) + "." + tahun_akhir.toString().substring(2, 4)
            }
        })
    })

    $('#semester_emosi').change(function () {
        var id_semester = document.getElementById('semester_emosi').value
        $.ajax({
            type: 'get',
            url: '/paud/admin/nilai_emosi_peserta/' + id_semester,
            dataType: 'json',
            success: function (data) {
                var html = '';
                console.log(data.length)
                if (data.length > 0) {
                    var no = 1;
                    data.forEach(data => {
                        html += '<tr>';
                        html += '<td class="text-center">' + no++ + '.</td>';
                        html += '<td class="text-center">' + data.no_induk + '</td>';
                        html += '<td>' + data.nama_lengkap + '</td>';
                        html += '<td>' + data.menangis + '</td>';
                        html += '<td>' + data.memukul + '</td>';
                        html += '<td>' + data.marah + '</td>';
                        html += '<td>' + data.diam + '</td>';
                        html += '<td>' + data.melamun + '</td>';
                        html += '<td>' + data.gembira + '</td>';
                        html += '</tr>';
                    });
                    $('#tbody-catatan-emosi').html(html)
                } else {
                    html += '<tr><td colspan="9" class="text-center">Tidak Ada Data Catatan Emosi</td></tr>';
                    $('#tbody-catatan-emosi').html(html)
                }
            }
        })
    })

    $('#semester_kesehatan').change(function () {
        var id_semester = document.getElementById('semester_kesehatan').value
        $.ajax({
            type: 'get',
            url: '/paud/admin/nilai_kesehatan_peserta/' + id_semester,
            dataType: 'json',
            success: function (data) {
                var html = '';
                console.log(data.length)
                if (data.length > 0) {
                    var no = 1;
                    data.forEach(data => {
                        html += '<tr>';
                        html += '<td class="text-center">' + no++ + '.</td>';
                        html += '<td class="text-center">' + data.no_induk + '</td>';
                        html += '<td>' + data.nama_lengkap + '</td>';
                        html += '<td>' + data.mata + '</td>';
                        html += '<td>' + data.mulut + '</td>';
                        html += '<td>' + data.gigi + '</td>';
                        html += '<td>' + data.telinga + '</td>';
                        html += '<td>' + data.hidung + '</td>';
                        html += '<td>' + data.anggota_badan + '</td>';
                        html += '<td>' + data.berat_badan + ' Kg</td>';
                        html += '<td>' + data.tinggi_badan + ' cm</td>';
                        html += '</tr>';
                    });
                    $('#tbody-catatan-kesehatan').html(html)
                } else {
                    html += '<tr><td colspan="11" class="text-center">Tidak Ada Data Catatan Kesehatan</td></tr>';
                    $('#tbody-catatan-kesehatan').html(html)
                }
            }
        })
    })

    $('#tahun-ajaran-semester').change(function () {
        var id_tahun_ajaran = document.getElementById('tahun-ajaran-semester').value
        $.ajax({
            type: 'get',
            url: '/paud/admin/tampil_semester_dipilih/' + id_tahun_ajaran,
            dataType: 'json',
            success: function (data) {
                var semester = data[0].semester
                var mulai = document.getElementById('tanggal_mulai')
                var akhir = document.getElementById('tanggal_akhir')
                var tombol = document.getElementById('tombol-tambah-semester')
                // console.log(semester)
                if (semester == '1') {
                    document.getElementById('tambah-semester').value = '2'
                    mulai.disabled = false
                    akhir.disabled = false
                    tombol.disabled = false
                } else if (semester == '2') {
                    document.getElementById('tambah-semester').value = '-'
                    mulai.disabled = true
                    akhir.disabled = true
                    tombol.disabled = true
                } else {
                    document.getElementById('tambah-semester').value = '1'
                    mulai.disabled = false
                    akhir.disabled = false
                    tombol.disabled = false
                }
            }
        })
    })

    let tfKd = document.getElementById('tf-kd')
    if (tfKd.value) {
        document.getElementById('btn-kd').removeAttribute('disabled');
    }
});

// image preview edit guru
let hasil = document.getElementById('hasil')
let gambar = document.getElementById('foto')
let preview = document.getElementById('preview')

gambar.addEventListener('change', function () {
    if (gambar.value == '') {
        hasil.hidden = true
        preview.hidden = true
    } else {
        hasil.hidden = false
        preview.hidden = false

    }
})

function tampilkanPreview(gambar, idPreview) {
    // membuat objek gambar
    var gb = gambar.files;

    // loop untuk merender gambar
    for (var i = 0; i < gb.length; i++) {
        // bikin variabel
        var gbPreview = gb[i];
        var imageType = /image.*/;
        var preview = document.getElementById(idPreview);
        var reader = new FileReader();

        if (gbPreview.type.match(imageType)) {
            // jika tipe data sesuai
            preview.file = gbPreview;
            reader.onload = (function (element) {
                return function (e) {
                    element.src = e.target.result;
                };
            })(preview);

            $('.img-preview').css('display', 'block');
            // membaca data URL gambar
            reader.readAsDataURL(gbPreview);
            preview.style.width = '150px';
            preview.style.height = '150px';

        } else {
            // jika tipe data tidak sesuai
            alert("Type file tidak sesuai. Khusus image.");
        }
    }
}

