$(function () {
    $('.js-basic-example').DataTable({
        responsive: true,
        "pageLength": 25,
        "lengthMenu": [
            [5, 10, 25, 50, -1], 
            [5, 10, 25, 50, "Semua"]
        ]
    });

    $('.js-basic-example-rekap-absen').DataTable({
        responsive: true,
        "pageLength": 25,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Semua"]],
        "aoColumns": [
                        null, 
                        null, 
                        null,
                        null, 
                        null, 
                        null,
                        { 
                            "bSortable": false
                        }
                    ],
    });

    $('.js-basic-example-rekap-absen-karyawan').DataTable({
        responsive: true,
        "pageLength": 25,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Semua"]],
        "aoColumns": [
                        null,
                        null, 
                        null, 
                        null,
                        null, 
                        null, 
                        null,
                        { 
                            "bSortable": false
                        }
                    ],
    });

    /**/
    $('.js-basic-example-program-kerja-admin').DataTable({
        responsive: true,
        "pageLength": 25,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Semua"]],
        "aoColumns": [
                        null,
                        null, 
                        null, 
                        null,
                        null, 
                        null,
                        { 
                            "bSortable": false
                        }
                    ],
    });

   $('.js-basic-example-program-kerja-lembaga').DataTable({
        responsive: true,
        "pageLength": 25,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Semua"]],
        "aoColumns": [
                        null,
                        null, 
                        null, 
                        null,
                        null, 
                        { 
                            "bSortable": false
                        }
                    ],
    });
    /**/

    $('.js-basic-example-rekap-absen-bulanan').DataTable({
        responsive: true,
        "pageLength": 25,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Semua"]],
        "aoColumns": [
                        null, 
                        null, 
                        null,
                        null, 
                        null, 
                        null,
                        null, 
                        null,
                        { 
                            "bSortable": false
                        }
                    ],
    });

    $('.js-basic-example-hari-libur').DataTable({
        responsive: true,
        "pageLength": 25,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Semua"]],
        "aoColumns": [ 
                        null, 
                        null,
                        null, 
                        null,
                        { 
                            "bSortable": false
                        }
                    ],
    });

    $('.js-basic-example-user').DataTable({
        responsive: true,
        "pageLength": 25,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Semua"]],
        "aoColumns": [
                        null, 
                        null,
                        null, 
                        null, 
                        null,
                        null, 
                        { 
                            "bSortable": false
                        }
                    ],
    });

    $('.js-basic-example-lembaga').DataTable({
        responsive: true,
        "pageLength": 25,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Semua"]],
        "aoColumns": [
                        null, 
                        null,
                        null, 
                        null, 
                        null,
                        { 
                            "bSortable": false
                        }
                    ],
    });

    $('.js-basic-example-role').DataTable({
        responsive: true,
        "pageLength": 25,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Semua"]],
        "aoColumns": [
                        null, 
                        null,
                        null, 
                        null, 
                        { 
                            "bSortable": false
                        }
                    ],
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});