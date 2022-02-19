
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Kemenhub</title>
    <link rel="apple-touch-icon" href="{{URL::to('/') }}/public/assets/images/logo_kemenhub.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('storage/files/'. config('setting_value.favicon'))}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/fonts/material-icons/material-icons.css">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/material-vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/material.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/material-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/material-colors.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/material-horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/charts/morris.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/material-palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/datatables.min.css">
    <!-- END: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/datatables.min.css">

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/sweetalert2.min.css">

</head>

<body class="horizontal-layout horizontal-menu material-horizontal-layout material-horizontal-nav material-layout 2-columns  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center">
        <div class="navbar-wrapper" style="background-image: linear-gradient(#0A0E45, #0A246A);">
			<div class="navbar-header">
				<ul class="nav navbar-nav flex-row">
					<li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
					<li class="nav-item">
						<a class="navbar-brand" href="index.html">
							<img class="brand-logo" alt="modern admin logo" src="http://ekir-core.jaring.host/storage/files/40/HhIaQrHPChS9tIa7ClpmhXftcQRUNyfo5w0URi67.png">
							<strong class="text-white">KEMENHUB</strong>
						</a>
						
					</li>
						
					<li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
				</ul>
			</div>
			<div class="navbar-container content">
				<div class="collapse navbar-collapse" id="navbar-mobile">
					<ul class="nav navbar-nav mr-auto float-left">
						<li class="nav-item"><a class="nav-link nav-link-expand mx-md-1 mx-0" href="#"><i class="ficon ft-maximize"></i></a></li>

					</ul>
					
				</div>
			</div>
		</div>
    </nav>
    <!-- END: Header-->

    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-header row"></div>
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12">
                        <center><h3> UJI BERKALA KENDARAAN BERMOTOR </h3></center>
                        @if($status == "data_kosong")
                            {{$message}}
                        @else
                            @if($status == "belum_disinkron")
                                <center><h3 class="text-danger"> <b>{{$message}}</b></h3></center>
                            @elseif($status == "masa_berlaku_off")
                                <center><h3 class="text-danger"> <b>{{$message}}</b></h3></center>
                                <center><h3> Masa Berlaku Uji : {{$masa_berlaku}} </h3></center>
                            @elseif($status == "masa_berlaku_on")
                                <center><h3 class="text-success"> <b>{{$message}}</b></h3></center>
                                <center><h3> Masa Berlaku Uji : {{$masa_berlaku}} </h3></center>
                            @endif
                        @endif
                        
                    </div>
                </div>
                <div class="row">
                    <!--=== Adresses ===-->
                    <div class="col-md-6">
                        <div class="well">
                            <p><strong>IDENTITAS PEMILIK KENDARAAN </strong></p>
                           
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td>Nama Pemilik</td>
                                        <td>: {{$status == "belum_disinkron" ? "-" : $data->nama}} </td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Pemilik</td>
                                        <td>: {{$status == "belum_disinkron" ? "-" :  $data->alamat}} </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- </div> -->
                            <!-- /Table -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="well">
                            <p><strong>IDENTITAS KENDARAAN BERMOTOR</strong></p>
                            <!--=== Table ===-->
                            <!-- <div class="col-md-12"> -->
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td>Nomor Uji Kendaraan</td>
                                        <td>: {{$status == "belum_disinkron" ? "-" : $data->nouji}} </td>
                                    </tr>
                                    <tr>
                                        <td>Nomor dan Tanggal Sertifikat Registrasi </td>
                                        <td>: {{$status == "belum_disinkron" ? "-" : $tgl_uji.' - ' .$data->nosertifikatreg}} </td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Registrasi Kendaraan</td>
                                        <td>: {{$status == "belum_disinkron" ? "-" : $data->noregistrasikendaraan}} </td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Rangka Kendaraan</td>
                                        <td>: {{$status == "belum_disinkron" ? "-" :  $data->norangka}} </td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Motor Penggerak</td>
                                        <td>: {{$status == "belum_disinkron" ? "-" :  $data->nomesin}} </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- </div> -->
                            <!-- /Table -->
                        </div>
                    </div>
                    <!-- /Adresses -->
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h5 class="text-center"><b>FOTO DEPAN</b></h5>
                                    <div class="col-md-12">
                                        @if($status == "belum_disinkron")
                                        @else
                                            <a data-toggle="modal" href="#myModal11"><img class="img-thumbnail img-responsive" width="293" height="164" src="data:image/jpeg;base64, {{$data->fotodepansmall}}"></a>		
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h5 class="text-center"><b>FOTO BELAKANG</b></h5>
                                    <div class="col-md-12">
                                        @if($status == "belum_disinkron")
                                        @else
                                            <a data-toggle="modal" href="#myModal11"><img class="img-thumbnail img-responsive" width="293" height="164" src="data:image/jpeg;base64, {{$data->fotobelakangsmall}}"></a>				
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h5 class="text-center"><b>FOTO KANAN</b></h5>
                                    <div class="col-md-12">
                                        @if($status == "belum_disinkron")
                                        @else
                                            <a data-toggle="modal" href="#myModal11"><img class="img-thumbnail img-responsive" width="293" height="164" src="data:image/jpeg;base64, {{$data->fotokanansmall}}"></a>			
                                        @endif
                                        	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h5 class="text-center"><b>FOTO KIRI</b></h5>
                                    <div class="col-md-12">
                                        @if($status == "belum_disinkron")
                                        @else
                                            <a data-toggle="modal" href="#myModal11"><img class="img-thumbnail img-responsive" width="293" height="164" src="data:image/jpeg;base64, {{$data->fotokirismall}}"></a>					
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="well">
                            <p><strong>SPESIFIKASI TEKNIS KENDARAAN BERMOTOR</strong></p>
                            <!--=== Table ===-->
                            <!-- <div class="col-md-12"> -->
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td colspan="2">Jenis</td>
                                        <td colspan="2">: {{$status == "belum_disinkron" ? "-" : $data->jenis}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Merk / Tipe</td>
                                        <td colspan="2">: {{$status == "belum_disinkron" ? "-" : $data->merek.'/'.$data->tipe}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Tahun Pembuatan / Perakitan</td>
                                        <td colspan="2">: {{$status == "belum_disinkron" ? "-" : $data->thpembuatan}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Bahan Bakar / Sumber Energi</td>
                                        <td colspan="2">: {{$status == "belum_disinkron" ? "-" : $data->bahanbakar}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Isi Silinder</td>
                                        <td colspan="2">: {{$status == "belum_disinkron" ? "-" : number_format($data->isisilinder)}} cc</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Daya Motor</td>
                                        <td colspan="2">: {{$status == "belum_disinkron" ? "-" : $data->dayamotorpenggerak}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Ukuran Ban</td>
                                        <td colspan="2">: {{$status == "belum_disinkron" ? "-" : $data->ukuranban}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Konfigurasi Sumbu</td>
                                        <td colspan="2">: {{$status == "belum_disinkron" ? "-" :  $data->konfigurasisumburoda}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Berat Kosong Kendaraan</td>
                                        <td colspan="2">: {{$status == "belum_disinkron" ? "-" : number_format($data->beratkosong)}} kg</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Dimensi utama kendaraan bermotor</td>
                                        <td colspan="2"></td>
                                    </tr>
                                    <tr>
                                        <td width="20%"><i class="icon-check"></i> Panjang</td>
                                        <td width="10%">: {{$status == "belum_disinkron" ? "-" : number_format($data->panjangkendaraan)}} mm</td>
                                        <td width="20%">, <i class="icon-check"></i> Julur Depan</td>
                                        <td width="10%">: {{$status == "belum_disinkron" ? "-" : number_format($data->julurdepan)}} mm</td>
                                    </tr>
                                    <tr>
                                        <td width="20%"><i class="icon-check"></i> Lebar</td>
                                        <td width="10%">: {{$status == "belum_disinkron" ? "-" : number_format($data->lebarkendaraan)}} mm</td>
                                        <td width="20%">, <i class="icon-check"></i> Julur Belakang</td>
                                        <td width="10%">: {{$status == "belum_disinkron" ? "-" : number_format($data->julurbelakang)}} mm</td>
                                    </tr>
                                    <tr>
                                        <td width="20%"><i class="icon-check"></i> Tinggi</td>
                                        <td width="10%">: {{$status == "belum_disinkron" ? "-": number_format($data->tinggikendaraan)}} mm</td>
                                        <td colspan="2"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Jarak Sumbu</td>
                                        <td colspan="2"></td>
                                    </tr>
                                    <tr>
                                        <td width="20%"><i class="icon-check"></i> Sumbu I - II</td>
                                        <td width="10%"></td>
                                        <td width="20%">: {{$status == "belum_disinkron" ? "-" : number_format($data->jaraksumbu1_2)}} mm</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td width="20%"><i class="icon-check"></i> Sumbu II - III</td>
                                        <td width="10%"></td>
                                        <td width="20%">: {{$status == "belum_disinkron" ? "-": number_format($data->jaraksumbu2_3)}} mm</td>
                                        <td></td>

                                    </tr>
                                    <tr>
                                        <td width="20%"><i class="icon-check"></i> Sumbu III - IV</td>
                                        <td width="10%"></td>
                                        <td width="20%">: {{$status == "belum_disinkron" ? "-": number_format($data->jaraksumbu3_4)}} mm</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Dimensi bak muatan / tangki</td>
                                        <td colspan="2"></td>
                                    </tr>
                                    <tr>
                                        <td width="20%"><i class="icon-check"></i> Panjang x Lebar x Tinggi</td>
                                        <td width="10%"></td>
                                        <td width="20%">: {{$status == "belum_disinkron" ? "-" : number_format($data->panjangbakatautangki)}} x {{$status == "belum_disinkron" ? "-" : number_format($data->lebarbakatautangki)}} x {{$status == "belum_disinkron" ? "-" :  number_format($data->tinggibakatautangki)}} mm</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">JBB / JBKB</td>
                                        <td colspan="2">: {{$status == "belum_disinkron" ? "-" :  number_format($data->jbb).' kg / '. number_format($data->jbkb)}} kg</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">JBI / JBKI</td>
                                        <td colspan="2">: {{$status == "belum_disinkron" ? "-" :  number_format($data->jbi).' kg / '. number_format($data->jbki)}} kg</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Daya angkut (orang / kg)</td>
                                        <td colspan="2">: {{$status == "belum_disinkron" ? "-" : number_format($data->dayaangkutorang).' Orang / '. number_format($data->dayaangkutbarang).' kg'}} </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">Kelas jalan terendah yang boleh dilalui</td>
                                        <td colspan="2">: {{$status == "belum_disinkron" ? "-" : $data->kelasjalanterendah}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- </div> -->
                            <!-- /Table -->
                        </div>
                    </div>

                    <div class="col-md-6">
                    <div class="well">
                            <p><strong>KETERANGAN HASIL UJI </strong></p>
                            <!--=== Table ===-->
                            <!-- <div class="col-md-12"> -->

                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td>Rem Utama</td>
                                        <td colspan="3">:
                                            {{$status == "belum_disinkron" ? "-" : number_format($data->alatuji_remutamatotalgayapengereman)}} kg
                                    	</td>
                                    </tr>
                                    <tr>
                                        <td>Rem Utama Sumbu I</td>
                                        <td colspan="3">: {{$status == "belum_disinkron" ? "-" : $data->alatuji_remutamaselisihgayapengeremanrodakirikanan1}} %</td>
                                    </tr>
                                    <tr>
                                        <td>Rem Utama Sumbu II</td>
                                        <td colspan="3">: {{$status == "belum_disinkron" ? "-" : $data->alatuji_remutamaselisihgayapengeremanrodakirikanan2}} %</td>
                                    </tr>
                                    <tr>
                                        <td>Rem Utama Sumbu III</td>
                                        <td colspan="3">: {{$status == "belum_disinkron" ? "-" : $data->alatuji_remutamaselisihgayapengeremanrodakirikanan3}} %</td>
                                    </tr>
                                    <tr>
                                        <td>Rem Utama Sumbu IV</td>
                                        <td colspan="3">: {{$status == "belum_disinkron" ? "-" : $data->alatuji_remutamaselisihgayapengeremanrodakirikanan4}} %</td>
                                    </tr>
                                    <tr>
                                        <td>Lampu Utama Kanan</td>
                                        <td colspan="3">: {{$status == "belum_disinkron" ? "-" : number_format($data->alatuji_lampuutamakekuatanpancarlampukanan)}} cd</td>
                                    </tr>
                                    <tr>
                                        <td>Lampu Utama Kiri</td>
                                        <td colspan="3">: {{$status == "belum_disinkron" ? "-" : number_format($data->alatuji_lampuutamakekuatanpancarlampukiri)}} cd</td>
                                    </tr>
                                    <tr>
                                        <td>Lampu Utama Penyimpangan Kanan </td>
                                        <td colspan="3">: {{$status == "belum_disinkron" ? "-" : $data->alatuji_lampuutamapenyimpanganlampukanan}}</td>
                                    </tr>
                                    <tr>
                                        <td>Lampu Utama Penyimpangan Kiri</td>
                                        <td colspan="3">: {{$status == "belum_disinkron" ? "-" : $data->alatuji_lampuutamapenyimpanganlampukiri}}</td>
                                    </tr>
                                    <tr>
                                        <td>Emisi CO</td>
                                        <td colspan="3">: {{$status == "belum_disinkron" ? "-" : $data->alatuji_emisicobahanbakarbensin}} %</td>
                                    </tr>
                                    <tr>
                                        <td>Emisi HC</td>
                                        <td colspan="3">: {{$status == "belum_disinkron" ? "-" : $data->alatuji_emisihcbahanbakarbensin}} ppm</td>
                                    </tr>
									<tr>
                                        <td>Ketebalan Asap</td>
                                        <td colspan="3">: {{$status == "belum_disinkron" ? "-" : $data->alatuji_emisiasapbahanbakarsolar}} %</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="well">
                            <!--=== Table ===-->
                            <!-- <div class="col-md-12"> -->

                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td>KETERANGAN</td>
                                        <td colspan="3">:
                                        @if($status == "belum_disinkron") - @else {{$data->statuslulusuji == false ? "LULUS UJI BERKALA" : "TIDAK LULUS UJI BERKALA"}} @endif
                                    	</td>
                                    </tr>
                                    <tr>
                                        <td>Masa berlaku uji berkala</td>
                                        <td colspan="3">: {{$status == "belum_disinkron" ? "-" : $masa_berlaku}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Petugas Penguji</td>
                                        <td colspan="3">: {{$status == "belum_disinkron" ? "-" : $data->nama_penguji}}</td>
                                    </tr>
                                    <tr>
                                        <td>NRP Petugas Penguji</td>
                                        <td colspan="3">: {{$status == "belum_disinkron" ? "-" : $data->nrp_penguji}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Kepala Dinas</td>
                                        <td colspan="3">: {{$status == "belum_disinkron" ? "-" : $data->nama_kepaladinas}}</td>
                                    </tr>
                                    <tr>
                                        <td>Pangkat Kepala Dinas</td>
                                        <td colspan="3">: {{$status == "belum_disinkron" ? "-" : $data->pangkat_kepaladinas}}</td>
                                    </tr>
                                    <tr>
                                        <td>NIP Kepala Dinas</td>
                                        <td colspan="3">: {{$status == "belum_disinkron" ? "-" : $data->nip_kepaladinas}}</td>
                                    </tr>
                                    <tr>
                                        <td>Unit Pelaksana Teknis Daerah Pengujian </td>
                                        <td>: {{$status == "belum_disinkron" ? "-" : $data->namawilayah}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Direktur</td>
                                        <td colspan="3">: {{$status == "belum_disinkron" ? "-" : $data->nama_direktur}}</td>
                                    </tr>
                                    <tr>
                                        <td>Pangkat Direktur</td>
                                        <td colspan="3">: {{$status == "belum_disinkron" ? "-" : $data->pangkat_direktur}}</td>
                                    </tr>
                                    <tr>
                                        <td>NIP Direktur</td>
                                        <td colspan="3">: {{$status == "belum_disinkron" ? "-" : $data->nip_direktur}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <script src="../../../app-assets/vendors/js/material-vendors.min.js"></script>
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <script src="../../../app-assets/js/scripts/pages/material-app.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>

    <!-- END: Page JS-->
    @stack('scripts')
</body>
<!-- END: Body-->

</html>
