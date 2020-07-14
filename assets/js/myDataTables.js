$(document).ready(function () {
    $('#tanggal_penilaian').change(function () {
        var fullDate = new Date($('#tanggal_penilaian').val())
        var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
        var hari = days[fullDate.getDay()]
        var tanggal = fullDate.getDate()
        var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        var bulan = months[fullDate.getMonth()]
        var tahun = fullDate.getFullYear()

        var tableA = $('#table_penilaian_harian').DataTable();
        tableA.search(hari + ', ' + tanggal + ' ' + bulan + ' ' + tahun).draw();

        var tableB = $('#table_catatan_harian').DataTable();
        tableB.search(hari + ', ' + tanggal + ' ' + bulan + ' ' + tahun).draw();
    })
})