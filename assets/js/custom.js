// datatable users
$(document).ready(function() {
    $('#datatable-users').DataTable();
    $('#datatable-guru').DataTable();
    $('#datatable-siswa').DataTable();
    $('#datatable-mapel').DataTable();
    $('#datatable-tahun-pelajaran').DataTable({
        "order": [[ 1, "asc" ]]
    });
    // $('#datatable-walikelas').DataTable();
} );