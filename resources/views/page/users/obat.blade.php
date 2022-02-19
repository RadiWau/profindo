@extends('include.master_page')

@section('title', 'List Apoteker')

@section('content')
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/selects/select2.min.css">
    <div class="content-header row">
        <div class="content-header-dark col-12">
            <div class="row">
                <div class="content-header-left col-md-12 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#"> Master Obat </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    List Obat
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
                            <h4 class="card-title">Data Obat</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                            <div class="heading-elements">
                                <button class="btn btn-primary btn-sm" title="Obat Keluar" data-target="#modalOutObat" data-toggle="modal"><i class="ft-plus white"></i> Obat Keluar</button>
                                <button class="btn btn-primary btn-sm" title="Tambah Obat" data-target="#modalTambah" data-toggle="modal"><i class="ft-plus white"></i> Tambah Obat</button>
                            </div>
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
                                    <table id="tbl_data_obat" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Kode Obat</th>
                                                <th class="text-center">Nama Obat</th>
                                                <th class="text-center">Harga Obat</th>
                                                <th class="text-center">Stock Obat</th>
                                                <th class="text-center">Tanggal Kedeluarsa</th>
                                                <th class="text-center">Aksi</th>
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
    <div class="modal animated fade text-left" id="modalOutObat" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title white">Form Transaksi Obat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form form-horizontal striped-labels form-bordered" id="form_trx_obat" action="{{route('obat.trx_add')}}" method="post">
                        @csrf
                        <div class="form-body">
                            <div class="form-group row mx-auto">
                                <label class="col-md-3 label-control">Nama Transaksi <span style="color:red;">*</span></label>
                                <div class="col-md-9">
                                    <fieldset class="form-group position-relative">
                                        <input type="text" id="txt_nm_trx" name="txt_nm_trx" class="form-control" placeholder="Nama Transaksi" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group row mx-auto">
                                <label class="col-md-3 label-control">Keterangan</label>
                                <div class="col-md-9">
                                    <fieldset class="form-group position-relative">
                                        <input type="text" id="txt_keterangan" name="txt_keterangan" class="form-control" placeholder="Keterangan" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group row pt-2">
                                <button type="button" id="btn_tambah_obat" class="btn btn-primary"> 
                                    Tambah Obat
                                </button>
                            </div>
                            <div class="row">
                                <div class="col-md-3 label-control">
                                    <label class="label-control">List Obat</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="row element pt-1" id="div_1">
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <select class="form-control" id="txt_obat" name="txt_obat[]" required></select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-2">
                                            <fieldset class="form-group">
                                                <input type="text" id="qty" name="qty[]" class="form-control" placeholder="Jumlah" maxlength="3" required>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions right">
                            <button type="submit" id="btn_proses" class="btn btn-primary">
                                <i class="la la-save"></i> Simpan
                            </button>
                            <button type="button" data-dismiss="modal" class="btn btn-warning mr-1">
                                <i class="la la-refresh"></i> Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal animated fade text-left" id="modalTambah" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title white">Masukan Data Obat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form form-horizontal striped-labels form-bordered" id="form_tambah_obat" action="{{route('obat.add')}}" method="post">
                        @csrf
                        <div class="form-body">
                            <div class="form-group row mx-auto">
                                <label class="col-md-3 label-control">Nama Obat <span style="color:red;">*</span></label>
                                <div class="col-md-9">
                                    <fieldset class="form-group position-relative">
                                        <input type="text" id="txt_nm_obat" name="txt_nm_obat" class="form-control StringNumber" placeholder="Nama Obat" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group row mx-auto">
                                <label class="col-md-3 label-control">Harga Obat <span style="color:red;">*</span></label>
                                <div class="col-md-9">
                                    <fieldset class="form-group position-relative">
                                        <input type="number" id="txt_harga_obat" name="txt_harga_obat" class="form-control StringNumber" placeholder="Harga Obat" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group row mx-auto">
                                <label class="col-md-3 label-control">Stock Obat <span style="color:red;">*</span></label>
                                <div class="col-md-9">
                                    <fieldset class="form-group position-relative">
                                        <input type="number" id="txt_stock_obat" name="txt_stock_obat" class="form-control StringNumber" placeholder="Stock Obat" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group row mx-auto">
                                <label class="col-md-3 label-control">Tanggal Kedeluarsa <span style="color:red;">*</span></label>
                                <div class="col-md-9">
                                    <fieldset class="form-group position-relative">
                                        <input type="date" id="txt_tgl_kedeluarsa" name="txt_tgl_kedeluarsa" class="form-control StringOnly" placeholder="Masukan Tanggal KEdeluarsa" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="label-control red">* = Wajib Diisi</label>
                            </div>
                        </div>
                        <div class="form-actions right">
                            <button type="submit" id="btn_proses" class="btn btn-primary">
                                <i class="la la-save"></i> Simpan
                            </button>
                            <button type="button" data-dismiss="modal" class="btn btn-warning mr-1">
                                <i class="la la-refresh"></i> Batal
                            </button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal animated fade text-left" id="modalEdit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title white">Rubah Data Obat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form class="form form-horizontal striped-labels form-bordered" id="form_edit_obat" action="{{route('obat.edit')}}" method="post">
                        @csrf
                        <div class="form-body">
                            <div class="form-group row mx-auto">
                                <label class="col-md-3 label-control">Kode Obat</label>
                                <div class="col-md-9">
                                    <fieldset class="form-group position-relative">
                                        <input type="text" id="kd_obat" name="kd_obat" class="form-control" placeholder="Kode Obat" readonly required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group row mx-auto">
                                <label class="col-md-3 label-control">Nama Obat <span style="color:red;">*</span></label>
                                <div class="col-md-9">
                                    <fieldset class="form-group position-relative">
                                        <input type="text" id="nm_obat" name="nm_obat" class="form-control" placeholder="Nama Obat" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group row mx-auto">
                                <label class="col-md-3 label-control">Harga Obat <span style="color:red;">*</span></label>
                                <div class="col-md-9">
                                    <fieldset class="form-group position-relative">
                                        <input type="number" id="harga_obat" name="harga_obat" class="form-control" placeholder="Harga Obat" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group row mx-auto">
                                <label class="col-md-3 label-control">Stock Obat</label>
                                <div class="col-md-9">
                                    <fieldset class="form-group position-relative">
                                        <input type="number" id="stock_obat" name="stock_obat" class="form-control" placeholder="Stock Obat" readonly required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group row mx-auto">
                                <label class="col-md-3 label-control">Tanggal Kedeluarsa <span style="color:red;">*</span></label>
                                <div class="col-md-9">
                                    <fieldset class="form-group position-relative">
                                        <input type="date" id="tgl_kedeluarsa" name="tgl_kedeluarsa" class="form-control" placeholder="Masukan Tanggal Kedeluarsa" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="label-control red">* = Wajib Diisi</label>
                            </div>
                        </div>
                        <div class="form-actions right">
                            <button type="submit" id="btn_proses" class="btn btn-primary">
                                <i class="la la-save"></i> Simpan
                            </button>
                            <button type="button" data-dismiss="modal" class="btn btn-warning mr-1">
                                <i class="la la-refresh"></i> Batal
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

<script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script>

    var tbl_data_obat;
    $(document).ready(function(){

        // select option obat
        $.ajax({
            url         : "{{route('list.obat')}}",
            method      : "POST",
            data        : {"_token": "{{csrf_token()}}"},
            dataType    : "JSON",
            success     : function(data)
            {
                $("#txt_obat").prepend("<option> -- Pilih Obat -- </option> ").select2({                
                    width: '100%',
                    allowClear: true,
                    data: data
                });
            }

        }); // end ajax

        tbl_data_obat = $("#tbl_data_obat").DataTable({
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
                "url" : "{{route('obat.show')}}",
                "type" : "POST",
                "data" : {"_token": "{{csrf_token()}}"}
            },
            'columnDefs': [{
                'targets': 0,
                'searchable':false,
                'orderable':false,
                'visible' : true, // hidden column
                'className': 'dt-body-center',
                "render": function ( data, type, row, meta ) {
                    return row["no"];
                }
            },{
                'targets': 1,
                'searchable':true,
                'orderable':true,
                'visible' : false, // hidden column
                'className': 'dt-body-center',
                "render": function ( data, type, row, meta ) {
                    return row["id"];
                }
            },{
                'targets': 2,
                'searchable':true,
                'orderable':true,
                'className': 'dt-body-center',
                "render": function ( data, type, row, meta ) {
                    return row["kodeObat"];
                }
            },{
                'targets': 3,
                'searchable':true,
                'orderable':true,
                'className': 'dt-body-center',
                "render": function ( data, type, row, meta ) {
                    return row["nm_obat"];
                }
            },{
                'targets': 4,
                'searchable':true,
                'orderable':true,
                'className': 'dt-body-center',
                "render": function ( data, type, row, meta ) {
                    return row["hargaObat"];
                }
            },{
                'targets': 5,
                'searchable':true,
                'orderable':true,
                'className': 'dt-body-center',
                "render": function ( data, type, row, meta ) {
                    return row["stockObat"];
                }
            },{
                'targets': 6,
                'searchable':true,
                'orderable':true,
                'className': 'dt-body-center',
                "render": function ( data, type, row, meta ) {
                    return row["tglKedeluarsa"];
                }
            },{
                'targets': 7,
                'searchable':true,
                'orderable':true,
                'className': 'dt-body-center',
                "render": function ( data, type, row, meta ) {
                    return "<a class='btn primary edit' href='#' id='editData'><i class='la la-pencil'></i></a>  <a class='btn danger delete' id='konfirm_delete'><i class='la la-trash-o'></i></a>"
                }
            }],
        });

        // get selected rows
        $("#tbl_data_obat tbody").on("click", "tr", function(){

            if($(this).hasClass('selected')){
                $(this).removeClass('selected');
            }else{
                tbl_data_obat.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }

        });

        $("#txt_search").keyup(function(){
            tbl_data_obat.search($(this).val()).draw();
        });

        $(document).on("click", "#btn_tambah_obat", function(){

            var max = 10;
            var total_element = $(".element").length;
            var lastid = $(".element:last").attr("id");
            var split_id = lastid.split("_");
            var nextindex = Number(split_id[1]) + 1;
            
            if(total_element < max ){
                
                $(".element:last").after("<div class='row element pt-1' id='div_"+ nextindex +"'></div>");

                var html =  
                    "<div class='col-md-6'>"
                        +"<fieldset class='form-group'>"
                        +"<select class='form-control' id='txt_obat_"+nextindex+"' name='txt_obat[]' required></select>"
                        +"</fieldset>"
                        +"</div>"
                        +"<div class='col-md-2'>"
                        +"<fieldset class='form-group'>"
                        +"<input type='text' id='qty' name='qty[]' class='form-control' placeholder='Jumlah' maxlength='3' required>"
                        +"</fieldset>"
                        +"</div>"
                        +"<div class='col-md-1'>"
                        +"<button type='button' id='delete_"+nextindex+"'  class='btn btn-primary elementRemove'>X</button>"
                        +"</div>";
            
                $("#div_" + nextindex).append(html);

                $.ajax({
                    url         : "{{route('list.obat')}}",
                    method      : "POST",
                    data        : {"_token": "{{csrf_token()}}"},
                    dataType    : "JSON",
                    success     : function(data)
                    {
                        $("#txt_obat_"+nextindex+"").prepend("<option> -- Pilih Obat -- </option> ").select2({                
                            width: '100%',
                            allowClear: true,
                            data: data
                        });
                    }

                }); // end ajax                    
            }

        });

        
        $(document).on('click','.elementRemove',function(){
        
            var id = this.id;
            var split_id = id.split("_");
            var deleteindex = split_id[1];
            $("#div_" + deleteindex).remove();

        }); 

        // modal edit data obat
        $(document).on("click", "#editData", function(){
            $("#modalEdit").modal("show");
            var dataObat        = $(tbl_data_obat.rows(".selected").data());
            var kd_obat         = dataObat[0].kodeObat;
            var nm_obat         = dataObat[0].nm_obat;
            var harga_obat      = dataObat[0].hargaObat;
            var stock_obat      = dataObat[0].stockObat;
            var tgl_kedeluarsa  = dataObat[0].tglKedeluarsa;


            $("#kd_obat").val(kd_obat);
            $("#nm_obat").val(nm_obat);
            $("#harga_obat").val(harga_obat);
            $("#stock_obat").val(stock_obat);
            $("#tgl_kedeluarsa").val(tgl_kedeluarsa);

            

        });

        $(document).on("click", "#konfirm_delete", function(){

            Swal.fire({
                title: 'Konfirmasi',
                text: "Anda Yakin Ingin Melakukan Proses Ini",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Proses',
                cancelButtonText: 'Batal',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling: false,
            }).then(function (result) {

                // proses delete
                if (result.value) {

                    var dataObat = $(tbl_data_obat.rows(".selected").data());
                    var kodeObat     = dataObat[0].kodeObat;

                    $.ajax({
                        url         : "{{route('obat.delete')}}",
                        method      : "POST",
                        data        : {"_token": "{{csrf_token()}}", "kodeObat": kodeObat},
                        dataType    : "JSON",
                        success     : function(response)
                        {

                            if(response.status == "sukses"){

                                Swal.fire({
                                    title: 'Informasi!',
                                    text: response.message,
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK',
                                    confirmButtonClass: 'btn btn-primary',
                                    buttonsStyling: false,
                                }).then(function (result) {
                                    location.reload();
                                })

                            }else{

                                Swal.fire({
                                    title: 'Informasi!',
                                    text: response.message,
                                    type: 'info',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK',
                                    confirmButtonClass: 'btn btn-primary',
                                    buttonsStyling: false,
                                }).then(function (result) {
                                    location.reload();
                                })
                            }
                        }
                    }); // end ajax

                }else{
                    return false;
                }
            }) // end swall

            return false;

        });

    });

</script>
@endpush
