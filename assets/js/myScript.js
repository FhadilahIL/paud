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

    $('#tampil_peserta_emosi').change(function () {
        var id_peserta = document.getElementById('tampil_peserta_emosi').value
        $.ajax({
            type: 'get',
            url: '/paud/ortu/nilai_emosi_peserta/' + id_peserta,
            dataType: 'json',
            success: function (data) {
                var html = '';
                // console.log(data.length)
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

    $('#semester_kesehatan_guru').change(function () {
        var id_semester = document.getElementById('semester_kesehatan_guru').value
        $.ajax({
            type: 'get',
            url: '/paud/pengajar/nilai_kesehatan_semester/' + id_semester,
            dataType: 'json',
            success: function (data) {
                var html = '';
                // console.log(data.length)
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
                        html += '<td clas="text-center"><a class="btn btn-warning text-light tombol-aksi" href="ubah_nilai_kesehatan/' + data.id_peserta + '/' + data.id_semester + '">Edit</a></td>';
                        html += '</tr>';
                    });
                    $('#tbody-catatan-kesehatan').html(html)
                } else {
                    html += '<tr><td colspan="9" class="text-center">Tidak Ada Data Catatan Emosi</td></tr>';
                    $('#tbody-catatan-kesehatan').html(html)
                }
            }
        })
        var notif = '<p class="text-center mt-3">Silahkan Pilih Peserta Didik</p>';
        $('#tambah-perkembangan-kesehatan').html(notif)
    })

    $('#semester_emosi_guru').change(function () {
        var id_semester = document.getElementById('semester_emosi_guru').value
        $.ajax({
            type: 'get',
            url: '/paud/pengajar/nilai_emosi_semester/' + id_semester,
            dataType: 'json',
            success: function (data) {
                var html = '';
                // console.log(data.length)
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
                        html += '<td clas="text-center"><a class="btn btn-warning text-light tombol-aksi" href="ubah_nilai_emosi/' + data.id_peserta + '/' + data.id_semester + '">Edit</a></td>';
                        html += '</tr>';
                    });
                    $('#tbody-catatan-emosi').html(html)
                } else {
                    html += '<tr><td colspan="9" class="text-center">Tidak Ada Data Catatan Emosi</td></tr>';
                    $('#tbody-catatan-emosi').html(html)
                }
            }
        })
        var notif = '<p class="text-center mt-3">Silahkan Pilih Peserta Didik</p>';
        $('#tambah-perkembangan-emosi').html(notif)
    })

    $('#tampil_peserta_kesehatan').change(function () {
        var id_peserta = document.getElementById('tampil_peserta_kesehatan').value
        $.ajax({
            type: 'get',
            url: '/paud/ortu/nilai_kesehatan_peserta/' + id_peserta,
            dataType: 'json',
            success: function (data) {
                var html = '';
                // console.log(data.length)
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

    $('#peserta_didik_kesehatan').change(function () {
        var id_peserta = document.getElementById('peserta_didik_kesehatan').value
        var id_semester = document.getElementById('semester_kesehatan_guru').value
        $.ajax({
            type: 'get',
            url: '/paud/pengajar/tampil_keterangan_kesehatan/' + id_peserta + '/' + id_semester,
            dataType: 'json',
            success: function (data) {
                // console.log(data)
                var html = ''
                if (data) {
                    html += '<p class="text-center mt-3">Perkembangan Kesehatan Sudah Dinilai</p>'
                    $('#tambah-perkembangan-kesehatan').html(html)
                } else {
                    html += '<form action="simpan_kesehatan" method="post">'
                    html += '<input type="hidden" class="form-control col-1" id="id_semester" name="id_semester" value="' + id_semester + '" readonly />'
                    html += '<input type="hidden" class="form-control col-1" id="id_peserta" name="id_peserta" value="' + id_peserta + '" readonly />'
                    html += '<label class="mt-3">Mata</label>'
                    html += '<select name="mata" id="mata" class="form-control select">'
                    html += '<option value="">-- Pilih Kesehatan Mata --</option>'
                    html += '<option value="Baik">Baik</option>'
                    html += '<option value="Cukup">Cukup</option>'
                    html += '<option value="Kurang">Kurang</option>'
                    html += '</select>'
                    html += '<label class="mt-3">Mulut</label>'
                    html += '<select name="mulut" id="mulut" class="form-control select">'
                    html += '<option value="">-- Pilih Kesehatan Mulut --</option>'
                    html += '<option value="Baik">Baik</option>'
                    html += '<option value="Cukup">Cukup</option>'
                    html += '<option value="Kurang">Kurang</option>'
                    html += '</select>'
                    html += '<label class="mt-3">Gigi</label>'
                    html += '<select name="gigi" id="gigi" class="form-control select">'
                    html += '<option value="">-- Pilih Kesehatan Gigi --</option>'
                    html += '<option value="Baik">Baik</option>'
                    html += '<option value="Cukup">Cukup</option>'
                    html += '<option value="Kurang">Kurang</option>'
                    html += '</select>'
                    html += '<label class="mt-3">Telinga</label>'
                    html += '<select name="telinga" id="telinga" class="form-control select">'
                    html += '<option value="">-- Pilih Kesehatan Telinga --</option>'
                    html += '<option value="Baik">Baik</option>'
                    html += '<option value="Cukup">Cukup</option>'
                    html += '<option value="Kurang">Kurang</option>'
                    html += '</select>'
                    html += '<label class="mt-3">Hidung</label>'
                    html += '<select name="hidung" id="hidung" class="form-control select">'
                    html += '<option value="">-- Pilih Kesehatan Hidung --</option>'
                    html += '<option value="Baik">Baik</option>'
                    html += '<option value="Cukup">Cukup</option>'
                    html += '<option value="Kurang">Kurang</option>'
                    html += '</select>'
                    html += '<label class="mt-3">Anggota Badan</label>'
                    html += '<select name="anggota_badan" id="anggota_badan" class="form-control select">'
                    html += '<option value="">-- Pilih Kesehatan Anggota Badan --</option>'
                    html += '<option value="Baik">Baik</option>'
                    html += '<option value="Cukup">Cukup</option>'
                    html += '<option value="Kurang">Kurang</option>'
                    html += '</select>'
                    html += '<label class="mt-3">Berat Badan <sub><strong>(Kg)</strong></sub></label>'
                    html += '<input type="number" maxlength="3" class="form-control col-1" id="berat_badan" name="berat_badan" />'
                    html += '<label class="mt-3">Tinggi Badan <sub><strong>(Cm)</strong></sub></label>'
                    html += '<input type="number" maxlength="3" class="form-control col-1" id="tinggi_badan" name="tinggi_badan" />'
                    html += '<button type="submit" class="btn btn-success btn-block mt-3" id="simpan_kesehatan">Simpan Penilaian Kesehatan</button>'
                    html += '</form>'
                    $('#tambah-perkembangan-kesehatan').html(html)
                }
            }
        })
    })

    $('#peserta_didik_emosi').change(function () {
        var id_peserta = document.getElementById('peserta_didik_emosi').value
        var id_semester = document.getElementById('semester_emosi_guru').value
        $.ajax({
            type: 'get',
            url: '/paud/pengajar/tampil_keterangan_emosi/' + id_peserta + '/' + id_semester,
            dataType: 'json',
            success: function (data) {
                // console.log(data)
                var html = ''
                if (data) {
                    html += '<p class="text-center mt-3">Perkembangan Emosi Sudah Dinilai</p>'
                    $('#tambah-perkembangan-emosi').html(html)
                } else {
                    html += '<form action="simpan_emosi" method="post">'
                    html += '<input type="hidden" class="form-control col-1" id="id_semester" name="id_semester" value="' + id_semester + '" readonly />'
                    html += '<input type="hidden" class="form-control col-1" id="id_peserta" name="id_peserta" value="' + id_peserta + '" readonly />'
                    html += '<label class="mt-3">Menangis</label>'
                    html += '<select name="menangis" id="menangis" class="form-control select">'
                    html += '<option value="">-- Pilih Emosi Peserta --</option>'
                    html += '<option value="Tidak Pernah">Tidak Pernah</option>'
                    html += '<option value="Kadang">Kadang</option>'
                    html += '<option value="Sering">Sering</option>'
                    html += '</select>'
                    html += '<label class="mt-3">Memukul</label>'
                    html += '<select name="memukul" id="memukul" class="form-control select">'
                    html += '<option value="">-- Pilih Emosi Peserta --</option>'
                    html += '<option value="Tidak Pernah">Tidak Pernah</option>'
                    html += '<option value="Kadang">Kadang</option>'
                    html += '<option value="Sering">Sering</option>'
                    html += '</select>'
                    html += '<label class="mt-3">Marah</label>'
                    html += '<select name="marah" id="marah" class="form-control select">'
                    html += '<option value="">-- Pilih Emosi Peserta --</option>'
                    html += '<option value="Tidak Pernah">Tidak Pernah</option>'
                    html += '<option value="Kadang">Kadang</option>'
                    html += '<option value="Sering">Sering</option>'
                    html += '</select>'
                    html += '<label class="mt-3">Diam</label>'
                    html += '<select name="diam" id="diam" class="form-control select">'
                    html += '<option value="">-- Pilih Emosi Peserta --</option>'
                    html += '<option value="Tidak Pernah">Tidak Pernah</option>'
                    html += '<option value="Kadang">Kadang</option>'
                    html += '<option value="Sering">Sering</option>'
                    html += '</select>'
                    html += '<label class="mt-3">Melamun</label>'
                    html += '<select name="melamun" id="melamun" class="form-control select">'
                    html += '<option value="">-- Pilih Emosi Peserta --</option>'
                    html += '<option value="Tidak Pernah">Tidak Pernah</option>'
                    html += '<option value="Kadang">Kadang</option>'
                    html += '<option value="Sering">Sering</option>'
                    html += '</select>'
                    html += '<label class="mt-3">Gembira</label>'
                    html += '<select name="gembira" id="gembira" class="form-control select">'
                    html += '<option value="">-- Pilih Emosi Peserta --</option>'
                    html += '<option value="Tidak Pernah">Tidak Pernah</option>'
                    html += '<option value="Kadang">Kadang</option>'
                    html += '<option value="Sering">Sering</option>'
                    html += '</select>'
                    html += '<button type="submit" class="btn btn-success btn-block mt-3" id="simpan_emosi">Simpan Penilaian Emosi</button>'
                    html += '</form>'
                    $('#tambah-perkembangan-emosi').html(html)
                }
            }
        })
    })

    var tanggal_nilai = document.getElementById('tanggal_nilai').value
    if (tanggal_nilai != '') {
        $.ajax({
            type: 'get',
            url: '/paud/pengajar/tampil_nilai/' + tanggal_nilai,
            dataType: 'json',
            success: function (data) {
                var html = ''
                if (data.length == 0) {
                    html += '<tr>'
                    html += '<td colspan="7" class="text-center">Belum Ada Penilaian Harian</td>'
                    html += '</tr>'
                } else {
                    var no = 1;
                    data.forEach(data => {
                        html += '<tr>'
                        html += '<td class="text-center">' + no++ + '.</td>';
                        html += '<td>' + data.no_induk + '</td>';
                        html += '<td>' + data.nama_lengkap + '</td>';
                        html += '<td>' + data.nilai_checklist + '</td>';
                        html += '<td>' + data.nilai_karya + '</td>';
                        html += '<td class="text-center">' + data.tanggal_penilaian + '</td>';
                        html += '<td class="text-center"><a class="btn btn-warning text-light tombol-aksi" href="ubah_nilai_harian/' + data.id_peserta + '/' + data.tanggal_penilaian + '">Edit</a> <a class="btn btn-danger tombol-aksi" href="hapus_nilai_harian/' + data.id_peserta + '/' + data.tanggal_penilaian + '">Hapus</a></td>';
                        html += '</tr>'
                    });
                }
                $('#isi_nilai_harian').html(html)
            }
        })
        $.ajax({
            type: 'get',
            url: '/paud/pengajar/tampil_catatan/' + tanggal_nilai,
            dataType: 'json',
            success: function (data) {
                var html = ''
                if (data.length == 0) {
                    html += '<tr>'
                    html += '<td colspan="7" class="text-center">Belum Ada Catatan Harian</td>'
                    html += '</tr>'
                } else {
                    var no = 1;
                    data.forEach(data => {
                        html += '<tr>'
                        html += '<td class="text-center">' + no++ + '.</td>';
                        html += '<td>' + data.no_induk + '</td>';
                        html += '<td>' + data.nama_lengkap + '</td>';
                        html += '<td>' + data.catatan + '</td>';
                        html += '<td class="text-center">' + data.tanggal_catatan + '</td>';
                        html += '<td class="text-center"><a class="btn btn-warning text-light tombol-aksi" href="ubah_catatan_harian/' + data.id_peserta + '/' + data.tanggal_catatan + '">Edit</a> <a class="btn btn-danger tombol-aksi" href="hapus_catatan_harian/' + data.id_peserta + '/' + data.tanggal_catatan + '">Hapus</a></td>';
                        html += '</tr>'
                    });
                }
                $('#isi_catatan_harian').html(html)
            }
        })
    }

    $('#tanggal_nilai').change(function () {
        var tanggal_nilai = document.getElementById('tanggal_nilai').value
        $.ajax({
            type: 'get',
            url: '/paud/pengajar/tampil_nilai/' + tanggal_nilai,
            dataType: 'json',
            success: function (data) {
                var html = ''
                if (data.length == 0) {
                    html += '<td colspan="7" class="text-center">Belum Ada Penilaian Harian</td>'
                } else {
                    var no = 1;
                    data.forEach(data => {
                        html += '<tr>'
                        html += '<td class="text-center">' + no++ + '.</td>';
                        html += '<td class="text-center">' + data.no_induk + '</td>';
                        html += '<td>' + data.nama_lengkap + '</td>';
                        html += '<td>' + data.nilai_checklist + '</td>';
                        html += '<td>' + data.nilai_karya + '</td>';
                        html += '<td class="text-center">' + data.tanggal_penilaian + '</td>';
                        html += '<td class="text-center"><a class="btn btn-warning text-light tombol-aksi" href="ubah_nilai_harian/' + data.id_peserta + '/' + data.tanggal_penilaian + '">Edit</a> <a class="btn btn-danger tombol-aksi" href="hapus_nilai_harian/' + data.id_peserta + '/' + data.tanggal_penilaian + '">Hapus</a></td>';
                        html += '<'
                    });
                }
                $('#isi_nilai_harian').html(html)
            }
        })
        $.ajax({
            type: 'get',
            url: '/paud/pengajar/tampil_catatan/' + tanggal_nilai,
            dataType: 'json',
            success: function (data) {
                var html = ''
                if (data.length == 0) {
                    html += '<tr>'
                    html += '<td colspan="7" class="text-center">Belum Ada Catatan Harian</td>'
                    html += '</tr>'
                } else {
                    var no = 1;
                    data.forEach(data => {
                        html += '<tr>'
                        html += '<td class="text-center">' + no++ + '.</td>';
                        html += '<td>' + data.no_induk + '</td>';
                        html += '<td>' + data.nama_lengkap + '</td>';
                        html += '<td>' + data.catatan + '</td>';
                        html += '<td class="text-center">' + data.tanggal_catatan + '</td>';
                        html += '<td class="text-center"><a class="btn btn-warning text-light tombol-aksi" href="ubah_catatan_harian/' + data.id_peserta + '/' + data.tanggal_catatan + '">Edit</a> <a class="btn btn-danger tombol-aksi" href="hapus_catatan_harian/' + data.id_peserta + '/' + data.tanggal_catatan + '">Hapus</a></td>';
                        html += '</tr>'
                    });
                }
                $('#isi_catatan_harian').html(html)
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

