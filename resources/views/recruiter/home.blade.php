@extends('layouts.main')

@section('status-home') active
@endsection
@section('content')
<div class="container pt-4">
    <div class="row mb-2 text-center">
        <div class="col-md-6">
            <div class="jumbotron">
                <h1 class="display-4">Pasang lowongan</h1>
                <p class="lead">Postingan lowongan, dan dapatkan kemudahan dalam memanajemen kebutuhan-kebutuhan perusahaan anda</p>
                <hr class="my-4">
                <a class="btn btn-primary btn-lg" href="#" role="button">Pasang sekarang!</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="jumbotron">
                <h1 class="display-4">Cari kandidat</h1>
                <p class="lead">Cari ribuan kandidat yang memiliki kemampuan sesuai dengan yang anda butuhkan. Segera cari sekarang juga</p>
                <hr class="my-4">
                <a class="btn btn-primary btn-lg" href="#" role="button">Cari sekarang!</a>
            </div>
        </div>
    </div>
</div>
@endsection
