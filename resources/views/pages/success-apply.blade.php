@extends('layouts.main')

@section('content')
<div class="container pt-5">
    <div class="row align-center">
        <div class="col-12">
            <div class="card text-center">
                <img src="{{ asset('img/success.png') }}" class="img-fluid mx-auto d-block" width="320px" alt="...">
                <h4 class="lead">
                  Lamaran anda berhasil dikirim ke PT BNI 46
                </h4>
                <p>
                  Perusahaan akan menghubungi Anda apabila Anda terpilih. Terima kasih dan semoga sukses!
                </p>
                <div class="card-body" style="border-top: 1px solid rgba(0, 0, 0, 0.125);">

                    <div class="row">
                      <div class=" mx-auto d-block">
                        <a href="{{ url('/') }}" class="btn btn-light px-5">Kembali</a>
                        <a href="{{ url('/lowongan') }}" class="btn btn-primary">Cari lowongan lain</a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
