@extends('include.master_landing_page')

@section('content')
    <style>
        .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/selects/select2.min.css">
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-12">
                    <b>Wilayah</b>
                    <fieldset class="form-group">
                        <select class="select2 form-control" id="list_wilayah" name="list_wilayah"></select>
                    </fieldset>
                </div>
                <div class="col-xl-2 col-md-6 col-12">
                    <b>Tanggal Mulai</b>
                    <fieldset class="form-group">
                        <input type="date" class="form-control" id="start_date" name="start_date">
                    </fieldset>
                </div>
                <div class="col-xl-2 col-md-6 col-12">
                    <b>Tanggal Akhir</b>
                    <fieldset class="form-group">
                        <input type="date" class="form-control" id="end_date" name="end_date">
                    </fieldset>
                </div>
                <br/>
                <div class="col-xl-2 col-md-6 col-12" style="padding-top:10px;">
                    <fieldset class="form-group">
                        <button type="button" class="btn btn-info col-md-1 bntProsesCari">Cari</button>
                        
                    </fieldset>
                </div>
                <div class="col-xl-2 col-md-6 col-12" style="padding-top:10px;">
                    <fieldset class="form-group">
                        <button type="button" onclick="location.reload()" class="btn btn-warning col-md-1">Refresh</button>
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-info rounded-left">
                                    <i class="la la-newspaper-o font-large-2 text-white"></i>
                                </div>
                                <div class="daftar_baru"></div>
                                <div class="p-2 media-body daftar_baru_card">
                                    <h5>Daftar Baru</h5>
                                    <h5 class="text-bold-400 mb-0 txt_daftar_baru">{{$daftar_baru}}</h5>
                                    <span class="float-right info"><a onclick="detil(1)">Lihat Detil <i class="ft-arrow-right"></i></a></span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-danger rounded-left">
                                    <i class="la la-exchange font-large-2 text-white"></i>
                                </div>
                                <div class="perpanjangan"></div>
                                <div class="p-2 media-body perpanjangan_card">
                                    <h5>Perpanjangan</h5>
                                    <h5 class="text-bold-400 mb-0 txt_perpanjangan">{{$perpanjangan}}</h5>
                                    <span class="float-right danger"><a onclick="detil(2)">Lihat Detil <i class="ft-arrow-right"></i></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-success rounded-left">
                                    <i class="la la-chain-broken font-large-2 text-white"></i>
                                </div>
                                <div class="rusak"></div>
                                <div class="p-2 media-body rusak_card">
                                    <h5>Rusak</h5>
                                    <h5 class="text-bold-400 mb-0 txt_rusak">{{$rusak}}</h5>
                                    <span class="float-right success"><a onclick="detil(3)">Lihat Detil <i class="ft-arrow-right"></i></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-warning rounded-left">
                                    <i class="la la-minus-square font-large-2 text-white"></i>
                                </div>
                                <div class="hilang"></div>
                                <div class="p-2 media-body hilang_card">
                                    <h5>Hilang</h5>
                                    <h5 class="text-bold-400 mb-0 txt_hilang">{{$hilang}}</h5>
                                    <span class="float-right warning"><a onclick="detil(4)">Lihat Detil <i class="ft-arrow-right"></i></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-primary rounded-left">
                                    <i class="la la-retweet font-large-2 text-white"></i>
                                </div>
                                <div class="numpang_uji"></div>
                                <div class="p-2 media-body numpang_uji_card">
                                    <h5>Numpang Uji</h5>
                                    <h5 class="text-bold-400 mb-0 txt_numpang_uji">{{$numpang_uji}}</h5>
                                    <span class="float-right primary"><a onclick="detil(5)">Lihat Detil <i class="ft-arrow-right"></i></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-teal rounded-left">
                                    <i class="la la-archive font-large-2 text-white"></i>
                                </div>
                                <div class="mutasi"></div>
                                <div class="p-2 media-body mutasi_card">
                                    <h5>Mutasi</h5>
                                    <h5 class="text-bold-400 mb-0 txt_mutasi">{{$mutasi}}</h5>
                                    <span class="float-right teal"><a onclick="detil(6)">Lihat Detil <i class="ft-arrow-right"></i></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row divDetil" style="display:none">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg">
                            <h4 class="card-title text-white txtTitle"></h4>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a class="text-white" data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a class="text-white" data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a class="text-white" ata-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a class="text-white" data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div class="row col-md-12">
                                                <fieldset>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <button class="btnSearch waves-effect waves-light text-white" type="button"><i class="la la-search"></i></button>
                                                        </div>
                                                        <input type="text" id="txt_search" class="form-control" placeholder="Search" aria-label="Search">
                                                     </div>
                                                </fieldset>
                                            </div>
                                            <table id="tbl_list_detil" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">No Uji</th>
                                                        <th class="text-center">Tanggal Uji</th>
                                                        <th class="text-center">Nama Pemilik</th>
                                                        <th class="text-center">Alamat Pemilik</th>
                                                        <th class="text-center">No Srut</th>
                                                        <th class="text-center">Tanggal Srut</th>
                                                        <th class="text-center">NRKB</th>
                                                        <th class="text-center">Nomor Rangka</th>
                                                        <th class="text-center">Nomor Mesin</th>
                                                        <th class="text-center">Jenis Kendaraan</th>
                                                        <th class="text-center">Merk</th>
                                                        <th class="text-center">Tipe</th>
                                                        <th class="text-center">Tahun Rakit</th>
                                                        <th class="text-center">Bahan Bakar</th>
                                                        <th class="text-center">Isi Silinder</th>
                                                        <th class="text-center">Daya Motor</th>
                                                        <th class="text-center">Ukuran Ban</th>
                                                        <th class="text-center">Sumbu</th>
                                                        <th class="text-center">Berat Kosong</th>
                                                        <th class="text-center">Panjang Kendaraan</th>
                                                        <th class="text-center">Lebar Kendaraan</th>
                                                        <th class="text-center">Tinggi Kendaraan</th>
                                                        <th class="text-center">Julur Depan</th>
                                                        <th class="text-center">Julur Belakang</th>
                                                        <th class="text-center">Jarak Sumbu 1-2</th>
                                                        <th class="text-center">Jarak Sumbu 2-3</th>
                                                        <th class="text-center">Jarak Sumbu 3-4</th>
                                                        <th class="text-center">Dimensi Bak Tangki</th>
                                                        <th class="text-center">JBB</th>
                                                        <th class="text-center">JBKB</th>
                                                        <th class="text-center">JBI</th>
                                                        <th class="text-center">JBKI</th>
                                                        <th class="text-center">Daya Angkut Orang</th>
                                                        <th class="text-center">Daya Angkut Barang</th>
                                                        <th class="text-center">Kelas Jalan</th>
                                                        <th class="text-center">Keterangan Hasil Uji</th>
                                                        <th class="text-center">Masa Berlaku</th>
                                                        <th class="text-center">Petugas Penguji</th>
                                                        <th class="text-center">NRP Petugas Penguji</th>
                                                        <th class="text-center">Kepala Dinas</th>
                                                        <th class="text-center">Pangkat Kepala Dinas</th>
                                                        <th class="text-center">NIP Kepala Dinas</th>
                                                        <th class="text-center">Unit Pelaksana Teknis</th>
                                                        <th class="text-center">Wilayah Asal</th>
                                                        <th class="text-center">Direktur</th>
                                                        <th class="text-center">Pangkat Direktur</th>
                                                        <th class="text-center">NIP Direktur</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div> <!-- table-responsive-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header card-head-inverse bg-info">
                            <h4 class="card-title text-white text-center">Penerbitan</h4>
                        </div>
                        <div class="card-content collapse show text-center">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="total_issuence m-auto"></div>
                                        <div id="total_issuence" height="400"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header card-head-inverse bg-primary">
                            <h4 class="card-title text-white text-center">Penerbitan Per Wilayah</h4>
                        </div>
                        <div class="card-content collapse show text-center">
                            <div class="card-body">
                                <div class="row">
                                    <div class="row col-md-12">
                                        <select class="select2 form-control" id="list_wilayah" name="list_wilayah"></select>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="total_issuence_wilayah m-auto"></div>
                                        <div id="total_issuence_wilayah" style="height:400px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>

@endsection
@push('scripts')
    <script src="../../../app-assets/vendors/js/charts/apexcharts/apexcharts.min.js"></script>
    <script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script>

        var tbl_list_detil;
        var chartIssuence = "", chartIssuenceWilayah = "";
        var $primary = "#666ee8",
        $secondary = "#6B6F82",
        $success = "#1C9066",
        $info = "#1E9FF2",
        $warning = "#FF9149",
        $danger = "#FF4961";

        var $themeColor = [$primary, $success, $info, $warning, $danger, $secondary];

        function detil(type){

            $(".divDetil").fadeIn("slow");
            if(type == 1){
                $(".bg").removeClass("bg-danger bg-success bg-warning bg-primary bg-teal");
                $(".btnSearch").removeClass("btn-danger btn-success btn-warning btn-primary btn-teal");

                $(".bg").addClass("bg-info");
                $(".btnSearch").addClass("bg-info");
                $(".txtTitle").text("Daftar Baru");

                detilRows(1);
            }
            if(type == 2){
                $(".bg").removeClass("bg-info bg-success bg-warning bg-primary bg-teal");
                $(".btnSearch").removeClass("bg-info bg-success bg-warning bg-primary bg-teal");

                $(".btnSearch").addClass("bg-danger");
                $(".bg").addClass("bg-danger");
                $(".txtTitle").text("Perpanjangan");
                detilRows(2);
            }
            if(type == 3){
                $(".bg").removeClass("bg-info bg-danger bg-warning bg-primary bg-teal");
                $(".btnSearch").removeClass("bg-info bg-danger bg-warning bg-primary bg-teal");

                $(".btnSearch").addClass("bg-success");
                $(".bg").addClass("bg-success");
                $(".txtTitle").text("Rusak");
                detilRows(3);
            }
            if(type == 4){
                $(".bg").removeClass("bg-info bg-danger bg-success bg-primary bg-teal");
                $(".btnSearch").removeClass("bg-info bg-danger bg-success bg-primary bg-teal");

                $(".btnSearch").addClass("bg-warning");
                $(".bg").addClass("bg-warning");
                $(".txtTitle").text("Hilang");
                detilRows(4);
            }
            if(type == 5){
                $(".bg").removeClass("bg-info bg-danger bg-success bg-warning bg-teal");
                $(".btnSearch").removeClass("bg-info bg-danger bg-success bg-warning bg-teal");

                $(".btnSearch").addClass("bg-primary");
                $(".bg").addClass("bg-primary");
                $(".txtTitle").text("Numpang Uji");
                detilRows(5);
            }
            if(type == 6){
                $(".bg").removeClass("bg-info bg-danger bg-success bg-warning bg-primary");
                $(".btnSearch").removeClass("bg-info bg-danger bg-success bg-warning bg-primary");

                $(".btnSearch").addClass("bg-teal");
                $(".bg").addClass("bg-teal");
                $(".txtTitle").text("Mutasi");
                detilRows(6);
            }
        }

        function detilRows(type){

            var wilayah     = $("#list_wilayah option:selected").val();
            var start_date  = $("#start_date").val();
            var end_date    = $("#end_date").val();
            var ajax        = "";

            tbl_list_detil = $("#tbl_list_detil").DataTable({
                "bLengthChange": false,
                "bFilter": true,
                "dom":"lrtip",
                "destroy": true,
                "language": {
                    "paginate": {
                        "previous": "Sebelumnya",
                        "next"    : "Berikutnya"
                    }
                },

                "ajax" : {
                    "url" : "{{route('list.data_detil_exam')}}",
                    "type" : "POST",
                    "data" : {
                        "_token": "{{csrf_token()}}",
                        "type_issuance" : type,
                        "wilayah" : wilayah,
                        "start_date" : start_date,
                        "end_date" : end_date
                    }
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
                    'visible' : true, // hidden column
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["nouji"];
                    }
                },{
                    'targets': 2,
                    'searchable':true,
                    'orderable':true,
                    'visible' : true, // hidden column
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["tgl_uji"];
                    }
                },{
                    'targets': 3,
                    'searchable':true,
                    'orderable':true,
                    'visible' : true, // hidden column
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["nama"];
                    }
                },{
                    'targets': 4,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["alamat"];
                    }
                },{
                    'targets': 5,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["nosertifikatreg"];
                    }
                },{
                    'targets': 6,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["tglsertifikatreg"];
                    }
                },{
                    'targets': 7,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["nrkb"];
                    }
                },{
                    'targets': 8,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["norangka"];
                    }
                },{
                    'targets': 9,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["nomesin"];
                    }
                },{
                    'targets': 10,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["jenis"];
                    }
                },{
                    'targets': 11,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["merek"];
                    }
                },{
                    'targets': 12,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["tipe"];
                    }
                },{
                    'targets': 13,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["thpembuatan"];
                    }
                },{
                    'targets': 14,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["bahanbakar"];
                    }
                },{
                    'targets': 15,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["isisilinder"];
                    }
                },{
                    'targets': 16,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["dayamotorpenggerak"];
                    }
                },{
                    'targets': 17,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["ukuranban"];
                    }
                },{
                    'targets': 18,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["konfigurasisumburoda"];
                    }
                },{
                    'targets': 19,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["beratkosong"];
                    }
                },{
                    'targets': 20,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["panjangkendaraan"];
                    }
                },{
                    'targets': 21,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["lebarkendaraan"];
                    }
                },{
                    'targets': 22,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["tinggikendaraan"];
                    }
                },{
                    'targets': 23,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["julurdepan"];
                    }
                },{
                    'targets': 24,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["julurbelakang"];
                    }
                },{
                    'targets': 25,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["jaraksumbu1_2"];
                    }
                },{
                    'targets': 26,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["jaraksumbu2_3"];
                    }
                },{
                    'targets': 27,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["jaraksumbu3_4"];
                    }
                },{
                    'targets': 28,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["panjangbakatautangki"] +'X'+ row["lebarbakatautangki"] +'X'+ row["tinggibakatautangki"];
                    }
                },{
                    'targets': 29,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["jbb"];
                    }
                },{
                    'targets': 30,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["jbkb"];
                    }
                },{
                    'targets': 31,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["jbi"];
                    }
                },{
                    'targets': 32,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["jbki"];
                    }
                },{
                    'targets': 33,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["dayaangkutorang"];
                    }
                },{
                    'targets': 34,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["dayaangkutbarang"];
                    }
                },{
                    'targets': 35,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["kelasjalanterendah"];
                    }
                },{
                    'targets': 36,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["status"];
                    }
                },{
                    'targets': 37,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["masa_berlaku"];
                    }
                },{
                    'targets': 38,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["petugas"];
                    }
                },{
                    'targets': 39,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["nrp"];
                    }
                },{
                    'targets': 40,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["nama_kepaladinas"];
                    }
                },{
                    'targets': 41,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["pangkat_kepaladinas"];
                    }
                },{
                    'targets': 42,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["nip_kepaladinas"];
                    }
                },{
                    'targets': 43,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["wilayah"];
                    }
                },{
                    'targets': 44,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["wilayah_asal"];
                    }
                },{
                    'targets': 45,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["nama_direktur"];
                    }
                },{
                    'targets': 46,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["pangkat_direktur"];
                    }
                },{
                    'targets': 47,
                    'searchable':true,
                    'orderable':true,
                    'className': 'dt-body-center',
                    "render": function ( data, type, row, meta ) {
                        return row["nip_direktur"];
                    }
                }],
            });

            $("#txt_search").keyup(function(){
                tbl_list_detil.search($(this).val()).draw();
            });
        }

        function configBarIssuence(daftar_baru, perpanjangan, rusak, hilang, numpang_uji, mutasi){

            var options = {

                series: [{
                    data : [daftar_baru, perpanjangan, rusak, hilang, numpang_uji, mutasi]
                }],
                chart: {
                    type: 'bar',
                    height: 350,
                    // stacked: true,
                    labels: {
                        style: {
                            colors: "black",
                        }
                    },
                    
                },
                colors: ['#2E93fA', '#66DA26', '#546E7A', '#E91E63', '#FF9800',  '#FF9800'],
                responsive: [{
                breakpoint: 480,
                options: {
                    legend: {
                        position: 'bottom',
                        offsetX: -10,
                        offsetY: 0
                    }
                }
                }],
                xaxis: {
                    type: 'category',
                    categories: ["Daftar Baru", "Perpanjangan", "Rusak", "Hilang", "Numpang Uji", "Mutasi"],
                    position: 'buttom',                  
                    labels: {
                        style: {
                            colors: "black"
                        }
                    }
                },
                
                legend: {
                    position: 'top',
                    offsetX: 0,
                    offsetY: 0
                }
            };
            return options;
        }

        // load ajax issuence
        function issuenceChart(){

            $.ajax({
                url         : "{{route('chart.issuence')}}",
                method      : "POST",
                data        : {"_token": "{{csrf_token()}}"},
                dataType    : "JSON",
                beforeSend	: function(){
                    $(".total_issuence").addClass("loader");
                    $("#total_issuence").hide();
                },
                success 	: function(data){
                    $(".total_issuence").removeClass("loader");
                    $("#total_issuence").show();

                    chartIssuence = new ApexCharts(
                        document.querySelector("#total_issuence"),
                        configBarIssuence(data.daftar_baru, data.perpanjangan, data.rusak, data.hilang, data.numpang_uji, data.mutasi)
                    );
                    chartIssuence.render();
                }
            }); // end ajax
        }

        $(document).ready(function(){
            // load chart issuence
            issuenceChart();
            setInterval(() => {

                issuenceChart();

            }, 300000);

            // load data jenis wilayah/area
            $.ajax({
                url         : "{{route('list_wilayah')}}",
                method      : "POST",
                data        : {"_token": "{{csrf_token()}}"},
                dataType    : "JSON",
                success     : function(data)
                {
                    $("#list_wilayah").prepend('<option value="" selected>-- Pilih Wilayah --</option>').select2({
                        width: '100%',
                        allowClear: true,
                        data: data
                    });
                
                }

            }); // end ajax
            
        });

        
        $(document).on("click", ".bntProsesCari", function(){

            var wilayah     = $("#list_wilayah option:selected").val();
            var start_date  = $("#start_date").val();
            var end_date    = $("#end_date").val();

            if(wilayah == "" || start_date == "" || end_date == ""){

                Swal.fire({
                    title: 'Error',
                    text: 'Pastikan Wilayah Atau Tanggal Mulai & Akhir Sudah dipilih',
                    type: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                })
                
            }else{

                $.ajax({
                    url 		: "{{route('chart.filter')}}",
                    method 		: "POST",
                    dataType 	: "JSON",
                    data 		: {"_token" : "{{csrf_token()}}", "start_date" : start_date, "end_date" : end_date, "txt_wilayah" : wilayah},
                    beforeSend	: function(){

                        $(".daftar_baru").addClass("loader");
                        $(".daftar_baru_card").hide();
                        $(".perpanjangan").addClass("loader");
                        $(".perpanjangan_card").hide();
                        $(".rusak").addClass("loader");
                        $(".rusak_card").hide();
                        $(".hilang").addClass("loader");
                        $(".hilang_card").hide();
                        $(".numpang_uji").addClass("loader");
                        $(".numpang_uji_card").hide();
                        $(".mutasi").addClass("loader");
                        $(".mutasi_card").hide();
                        $(".total_issuence").addClass("loader");
                        $("#total_issuence").hide();
                        
                    },
                    success 	: function(data){
                        
                        $('#tbl_list_detil').DataTable().clear().draw();
                        $(".daftar_baru").removeClass("loader");
                        $(".daftar_baru_card").show();
                        $(".perpanjangan").removeClass("loader");
                        $(".perpanjangan_card").show();
                        $(".rusak").removeClass("loader");
                        $(".rusak_card").show();
                        $(".hilang").removeClass("loader");
                        $(".hilang_card").show();
                        $(".numpang_uji").removeClass("loader");
                        $(".numpang_uji_card").show();
                        $(".mutasi").removeClass("loader");
                        $(".mutasi_card").show();
                        $(".total_issuence").removeClass("loader");
                        $("#total_issuence").show();

                        // set text summary
                        $(".txt_daftar_baru").text(data.daftar_baru);
                        $(".txt_perpanjangan").text(data.perpanjangan);
                        $(".txt_rusak").text(data.rusak);
                        $(".txt_hilang").text(data.hilang);
                        $(".txt_numpang_uji").text(data.numpang_uji);
                        $(".txt_mutasi").text(data.mutasi);


                        // update chart
                        chartIssuence.updateSeries([
                            {
                                data: [data.daftar_baru, data.perpanjangan, data.rusak, data.hilang, data.numpang_uji, data.mutasi] //pass them here 
                            }
                        ])
                        

                    }
                })
            }
        });
    </script>
@endpush
