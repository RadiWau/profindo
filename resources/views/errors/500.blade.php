@extends('include.master_page')

@section('title', 'Terjadi Kesalahan Sistem')

@section('content')

<div class="content-wrapper">
    <div class="content-body">
        <div class="col-10 offset-1 col-md-10 box-shadow-2">
            <div class="card border-grey border-lighten-3 px-2 my-0 row">
                <div class="card-header no-border pb-1">
                    <div class="card-body">
                        <h1 class="text-center" style="color:red">500</h1>
                        <h3 class="text-uppercase text-center">Internal Server Error</h3>
                    </div>
                </div>
                <div class="card-content px-2">
                    <div class="row py-2">
                        <div class="col-12">
                            <button class="btn btn-primary col-12 waves-effect waves-light" type="button">Kembali</button>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>


@endsection