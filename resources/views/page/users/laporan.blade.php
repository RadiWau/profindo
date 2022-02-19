@extends('include.master_page')

@section('title', 'List Apoteker')

@section('content')

    <div class="content-header row">
        <div class="content-header-dark col-12">
            <div class="row">
                <div class="content-header-left col-md-12 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#"> Laporan Obat </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    List Laporan
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(Session::has('sukses'))

    <div class="alert bg-success alert-dismissible mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <strong>{{ Session::get('sukses') }}</strong>
    </div>

    @elseif(Session::has('gagal'))
    <div class="alert bg-danger alert-dismissible mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <strong>{{ Session::get('gagal') }}</strong>
    </div>
    @endif

    <div class="content-wrapper">
        <div class="content-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Laporan</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                            
                        </div>

                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="row col-md-6">
                                        <fieldset>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-primary waves-effect waves-light" type="button"><i class="la la-search"></i></button>
                                                </div>
                                                <input type="text" id="txt_search" class="form-control" placeholder="Search" aria-label="Search">

                                            </div>
                                        </fieldset>
                                    </div>
                                    <table id="tbl_data_trx" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center"></th>
                                                <th class="text-center">Transaksi ID</th>
                                                <th class="text-center">Nama Transaksi</th>
                                                <th class="text-center">Apoteker</th>
                                                <th class="text-center">Tgl Transaksi</th>
                                                <th class="text-center">Keterangan</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div> <!-- table-responsive-->
                            </div> <!-- card-body-->
                        </div> <!-- card-content -->
                    </div> <!-- end card -->
                </div> <!-- end col-md-12 -->
            </div> <!-- end row -->
        </div> <!-- end content-body -->
    </div> <!-- end content-wrapper -->


    <!-- Modal Tambah -->
   
@endsection

@push('scripts')
<script>

    function detilTRX(callback, data) {
        
        $.ajax({
            url         : "{{route('laporan.show_detil')}}",
            method      : "POST",
            data        : {"_token": "{{csrf_token()}}", "trx_id": data.trx_id},
            dataType    : "JSON",
            success     : function(response){
                var thead = '',  tbody = '';

                // thead table
                thead += "<thead><tr>";
                thead += "<th>Kode Obat</th>";
                thead += "<th>Nama Obat</th>";
                thead += "<th>Harga Obat</th>";
                thead += "<th>Jumlah Keluar</th>";
                thead += "</tr></thead>";

                
                tbody += "<tbody>";
                $.each(response.data, function (i, value) {

                    tbody += '<tr>';
                    tbody += '<td>' + value.kodeObat + '</td>';
                    tbody += '<td>' + value.nm_obat + '</td>';
                    tbody += '<td>' + value.hargaObat + '</td>';
                    tbody += '<td>' + value.OutStock +'</td>';
                    tbody += '</tr>';

                });
                tbody += "</tbody>";

                callback($('<table class="display" width="100%">' + thead + tbody + '</table>')).show();
            },
            error: function () {
                $('#output').html('Bummer: there was an error!');
            }
        });

    }

    var tbl_data_trx;
    $(document).ready(function(){

        tbl_data_trx = $("#tbl_data_trx").DataTable({
            "bLengthChange": false,
            "bFilter": true,
            "dom":"lrtip",
            "language": {
                "paginate": {
                    "previous": "Sebelumnya",
                    "next"    : "Berikutnya"
                }
            },
            "ajax" : {
                "url" : "{{route('laporan.show')}}",
                "type" : "POST",
                "data" : {"_token": "{{csrf_token()}}"}
            },
            "columns": [
                {
                    "className":'details-control',
                    "orderable":false,
                    "data":null,
                    "defaultContent": ''
                },
            ],
            'columnDefs': [{
                'targets': 1,
                'searchable':false,
                'orderable':false,
                'className': 'dt-body-center',
                "render": function ( data, type, row, meta ) {
                    return row["trx_id"];
                }
            },{
                'targets': 2,
                'searchable':true,
                'orderable':true,
                'className': 'dt-body-center',
                "render": function ( data, type, row, meta ) {
                    return row["trx_nama"];
                }
            },{
                'targets': 3,
                'searchable':true,
                'orderable':true,
                'className': 'dt-body-center',
                "render": function ( data, type, row, meta ) {
                    return row["nm_apoteker"];
                }
            },{
                'targets': 4,
                'searchable':true,
                'orderable':true,
                'className': 'dt-body-center',
                "render": function ( data, type, row, meta ) {
                    return row["trx_tanggal"];
                }
            },{
                'targets': 5,
                'searchable':true,
                'orderable':true,
                'className': 'dt-body-center',
                "render": function ( data, type, row, meta ) {
                    return row["trx_keterangan"];
                }
            }],
        });

        // get selected rows
        $('#tbl_data_trx tbody').on('click', 'td.details-control', function () {

            var tr = $(this).closest('tr');
            var td = $(this).closest('td');
            var row = tbl_data_trx.row( tr );

            if (row.child.isShown()) {
                row.child.hide();
                tr.removeClass('shown');
                tr.removeClass('selected');
            } else {
                detilTRX(row.child, row.data());
                tr.addClass('shown');
                tr.addClass('selected');
            }

        });


        $("#txt_search").keyup(function(){
            tbl_data_trx.search($(this).val()).draw();
        });

        

    });

</script>
@endpush
