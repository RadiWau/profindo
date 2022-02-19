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
                                    <a href="#"> Master Apoteker </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    List Apoteker
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
                            <h4 class="card-title">Data Apoteker</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                            <div class="heading-elements">
                                <button class="btn btn-primary btn-sm" title="Tambah Apoteker" data-target="#modalTambah" data-toggle="modal"><i class="ft-plus white"></i> Tambah Apoteker</button>
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
                                    <table id="tbl_data_apoteker" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Kode Apoteker</th>
                                                <th class="text-center">Nama Apoteker</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Tanggal Lahir</th>
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
    <div class="modal animated fade text-left" id="modalTambah" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title white">Masukan Data Apoteker</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form form-horizontal striped-labels form-bordered" id="form_tambah_apoteker" action="{{route('apoteker.add')}}" method="post">
                        @csrf
                        <div class="form-body">
                            <div class="form-group row mx-auto">
                                <label class="col-md-3 label-control">Nama Apoteker <span style="color:red;">*</span></label>
                                <div class="col-md-9">
                                    <fieldset class="form-group position-relative">
                                        <input type="text" id="txt_nm_apoteker" name="txt_nm_apoteker" class="form-control StringNumber" placeholder="Nama Apoteker" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group row mx-auto">
                                <label class="col-md-3 label-control">Email <span style="color:red;">*</span></label>
                                <div class="col-md-9">
                                    <fieldset class="form-group position-relative">
                                        <input type="email" id="txt_email" name="txt_email" class="form-control StringOnly" placeholder="Masukan Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group row mx-auto">
                                <label class="col-md-3 label-control">Tanggal Lahir <span style="color:red;">*</span></label>
                                <div class="col-md-9">
                                    <fieldset class="form-group position-relative">
                                        <input type="date" id="txt_tgl_lahir" name="txt_tgl_lahir" class="form-control StringOnly" placeholder="Masukan Tanggal Lahir" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group row mx-auto">
                                <label class="col-md-3 label-control">Password <span style="color:red;">*</span></label>
                                <div class="col-md-9">
                                    <fieldset class="form-group position-relative">
                                        <input type="password" id="password" name="password" class="form-control StringOnly" placeholder="Masukan Kata Sandi">
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
                    <h4 class="modal-title white">Rubah Data Apoteker</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form form-horizontal striped-labels form-bordered" id="form_edit_apoteker" action="{{route('apoteker.edit')}}" method="post">
                        @csrf
                        <div class="form-body">
                            <div class="form-group row mx-auto">
                                <label class="col-md-3 label-control">Kode Apoteker</label>
                                <div class="col-md-9">
                                    <fieldset class="form-group position-relative">
                                        <input type="text" id="kodeApoteker" name="kodeApoteker" class="form-control StringNumber" placeholder="Nama Apoteker" readonly required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group row mx-auto">
                                <label class="col-md-3 label-control">Nama Apoteker <span style="color:red;">*</span></label>
                                <div class="col-md-9">
                                    <fieldset class="form-group position-relative">
                                        <input type="text" id="nm_apoteker" name="nm_apoteker" class="form-control StringNumber" placeholder="Nama Apoteker" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group row mx-auto">
                                <label class="col-md-3 label-control">Email <span style="color:red;">*</span></label>
                                <div class="col-md-9">
                                    <fieldset class="form-group position-relative">
                                        <input type="email" id="email" name="email" class="form-control StringOnly" placeholder="Masukan Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group row mx-auto">
                                <label class="col-md-3 label-control">Tanggal Lahir <span style="color:red;">*</span></label>
                                <div class="col-md-9">
                                    <fieldset class="form-group position-relative">
                                        <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control StringOnly" placeholder="Masukan Tanggal Lahir" required>
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
<script>

    var tbl_data_apoteker;
    $(document).ready(function(){

        tbl_data_apoteker = $("#tbl_data_apoteker").DataTable({
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
                "url" : "{{route('apoteker.show')}}",
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
                    return row["kodeApoteker"];
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
                    return row["email"];
                }
            },{
                'targets': 5,
                'searchable':true,
                'orderable':true,
                'className': 'dt-body-center',
                "render": function ( data, type, row, meta ) {
                    return row["tgl_lahir"];
                }
            },{
                'targets': 6,
                'searchable':true,
                'orderable':true,
                'className': 'dt-body-center',
                "render": function ( data, type, row, meta ) {
                    return "<a class='btn primary edit' href='#' id='editData'><i class='la la-pencil'></i></a>  <a class='btn danger delete' id='konfirm_delete'><i class='la la-trash-o'></i></a>"
                }
            }],
        });

        // get selected rows
        $("#tbl_data_apoteker tbody").on("click", "tr", function(){

            if($(this).hasClass('selected')){
                $(this).removeClass('selected');
            }else{
                tbl_data_apoteker.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }

        });

        $("#txt_search").keyup(function(){
            tbl_data_apoteker.search($(this).val()).draw();
        });

        // modal edit data apotekers
        $(document).on("click", "#editData", function(){
            $("#modalEdit").modal("show");
            var dataApoteker    = $(tbl_data_apoteker.rows(".selected").data());
            var kd_apoteker     = dataApoteker[0].kodeApoteker;
            var nm_apoteker     = dataApoteker[0].nm_apoteker;
            var email           = dataApoteker[0].email;
            var tgl_lahir       = dataApoteker[0].tgl_lahir;


            $("#kodeApoteker").val(kd_apoteker);
            $("#nm_apoteker").val(nm_apoteker);
            $("#email").val(email);
            $("#tgl_lahir").val(tgl_lahir);

            

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

                    var dataApoteker = $(tbl_data_apoteker.rows(".selected").data());
                    var kodeApoteker     = dataApoteker[0].kodeApoteker;

                    $.ajax({
                        url         : "{{route('apoteker.delete')}}",
                        method      : "POST",
                        data        : {"_token": "{{csrf_token()}}", "kodeApoteker": kodeApoteker},
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
