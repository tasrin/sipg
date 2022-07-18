function initMargin() {
    $('.pagination').attr('style', 'margin-bottom: 10px; margin-left :-5px;');
    $('.pagination').attr('class', 'pagination float-left float-sm-left float-md-none float-xl-none;');
    $('.dataTables_length label').attr('style', 'margin: 5px 0;');
}

var table = $('#datatable').DataTable({
            "language": {
                "zeroRecords": "Tidak ada data",
                "emptyTable": "Tidak ada data",
                "paginate": {
                    "next": "<span class='d-none d-md-block d-sm-none'>Next </span> <span class='d-sm-block d-md-none d-lg-none'><i class='fa fa-arrow-right'></i> </span>",
                    "previous": "<span class='d-none d-md-block d-sm-none'>Previous </span> <span class='d-sm-block d-md-none d-lg-none'><i class='fa fa-arrow-left'></i> </span>",
                }
            },
        "lengthChange": true,
        "ordering": true,
        "info": false,
        'Page':false,
        "pageLength": 10,
        "dom": '<"card-body p-0 m-0 table-responsive"t><"card-footer pr-2 pb-1 mb-0 col-md-12 btn-sm"p>',
        "fnDrawCallback": function() {
            initMargin();
        }
});

$('#search').on( 'keyup', function () {
    table
    .search( this.value )
    .draw();
});