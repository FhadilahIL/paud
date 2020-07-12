// $.fn.dataTable.search.push(
//     function (settings, data, dataIndex) {
//         var nama = document.getElementById('nama').value
//         var tanggal_penilaian = document.getElementById('tanggal_penilaian').value
//         var data_nama = data[1];
//         var data_tanggal = data[4];
//         if ((isNaN(nama)) && (isNaN(tanggal_penilaian)) || ((nama == data_nama) && isNaN(tanggal_penilaian)) || (isNan(nama) && (tanggal_penilaian == data_tanggal)) || ((nama == data_nama) && (tanggal_penilaian == data_tanggal))) {
//             return true;
//         } else {
//             return false;
//         }
//     }
// );

$(document).ready(function () {
    var tableA = $('#table_penilaian_harian').DataTable();
    $('#tanggal_penilaian').change(function () {
        tableA.search($(this).val()).draw();
    })
    var tableB = $('#table_catatan_harian').DataTable();
    $('#tanggal_penilaian').change(function () {
        tableB.search($(this).val()).draw();
    })
})