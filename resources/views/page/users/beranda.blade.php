@extends('include.master_page')

@section('title', 'Sistem Apoteker')

@section('content')

    <div class="content-header row">
        <div class="content-header-dark col-12">
            <div class="row">
                <div class="content-header-left col-md-12 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/home"><i class="fas fa-home"></i> Beranda </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-wrapper">
        <div class="content-body">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-info rounded-left">
                                    <i class="icon-camera font-large-2 text-white"></i>
                                </div>
                                <div class="p-2 media-body">
                                    <h5>Total Semua Hasil Uji</h5>
                                    <h5 class="text-bold-400 mb-0">28</h5>
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
                                    <i class="icon-user font-large-2 text-white"></i>
                                </div>
                                <div class="p-2 media-body">
                                    <h5>Total Hasil Uji Tahun Ini</h5>
                                    <h5 class="text-bold-400 mb-0">1,22,356</h5>
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
                                    <i class="icon-basket-loaded font-large-2 text-white"></i>
                                </div>
                                <div class="p-2 media-body">
                                    <h5>Total Hasil Uji Bulan Ini</h5>
                                    <h5 class="text-bold-400 mb-0">4,65,879</h5>
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
                                    <i class="icon-wallet font-large-2 text-white"></i>
                                </div>
                                <div class="p-2 media-body">
                                    <h5>Total User</h5>
                                    <h5 class="text-bold-400 mb-0">5.6 M</h5>
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
                                    <i class="icon-wallet font-large-2 text-white"></i>
                                </div>
                                <div class="p-2 media-body">
                                    <h5>Penerimaan Kartu Hasil Uji</h5>
                                    <h5 class="text-bold-400 mb-0">5.6 M</h5>
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
                                    <i class="icon-wallet font-large-2 text-white"></i>
                                </div>
                                <div class="p-2 media-body">
                                    <h5>Stok Kartu Hasil Uji</h5>
                                    <h5 class="text-bold-400 mb-0">5.6 M</h5>
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
                                    <i class="icon-wallet font-large-2 text-white"></i>
                                </div>
                                <div class="p-2 media-body">
                                    <h5>Stok Kartu Hasil Uji Terdistribusi</h5>
                                    <h5 class="text-bold-400 mb-0">5.6 M</h5>
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
                                    <i class="icon-wallet font-large-2 text-white"></i>
                                </div>
                                <div class="p-2 media-body">
                                    <h5>Total Penggunaan SAM</h5>
                                    <h5 class="text-bold-400 mb-0">5.6 M</h5>
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
                                    <i class="icon-wallet font-large-2 text-white"></i>
                                </div>
                                <div class="p-2 media-body">
                                    <h5>Total Penerimaan SAM</h5>
                                    <h5 class="text-bold-400 mb-0">5.6 M</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div> 
        </div>
    </div>






@endsection
@push('scripts')
    <script>
    </script>
@endpush
