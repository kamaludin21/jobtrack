@extends('layouts.main')

@section('lowongan-status') active
@endsection

@section('content')
<div class="container pt-5">
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="border-top: 1px solid rgba(0, 0, 0, 0.125);">
                    <div class="row">
                        @if($educations->isEmpty())
                            <div class="col-12">
                                <div class="text-center">
                                <img src="{{ asset('img/cualification.png') }}" alt="Kualifikasi" class="img-fluid" width="350">
                                <h5 class="text-center">Anda tidak memenuhi kualifikasi untuk melamar pekerjaan ini</h5>
                                <br>
                                <a href="{{ url('lowongan/detail', [$lowongan->ticket]) }}" class="btn btn-secondary">Kembali</a>
                            </div>
                            </div>
                        @else
                            <div class="col-md-6">
                                <div class="">
                                    <strong class="d-inline-block mb-2 text-muted">
                                        <a href="{{ url('lowongan/employer') }}">{{ $lowongan->name }}</a>
                                    </strong>
                                    <i class="fa fa-check-circle fa-lg text-primary pt-2" data-toggle="tooltip" data-placement="right" title="Akun resmi terverifikasi"></i>
                                </div>
                                <h3 class="my-2">{{ $lowongan->title }}</h3>
                                <h6 class="mt-3">
                                    <i class="fa fa-dollar"></i>&nbsp;&nbsp;
                                    @if(!empty($lowongan->gaji))
                                    {{ $lowongan->gaji }}
                                    @else
                                    Rp. {{ number_format($lowongan->gajimin) }} - {{ number_format($lowongan->gajimax) }} / Month
                                    @endif
                                </h6>
                                <h6 class="mt-2">
                                    <i class="fa fa-map-marker"></i>&nbsp;&nbsp;{{ $lowongan->daerah }}
                                </h6>
                                <h6 class="mt-2">
                                    <i class="fa fa-briefcase"></i>&nbsp;&nbsp;{{ $lowongan->type }}
                                    </h6>
                            </div>
                            <div class="col-md-6 mr-auto mt-3">
                                @if($lowongan->keilmuan == 0)
                                <h4>Kirim Lamaran?</h4>
                                <hr>
                                <p>
                                    Ketikkan <strong>YAKIN</strong> untuk konfirmasi
                                </p>
                                <form class="" action="{{ url('lowongan/apply') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="ticket" value="{{ $lowongan->ticket }}">
                                    <input type="hidden" name="idPerusahaan" value="{{ $lowongan->idPerusahaan }}">
                                    <div class="input-group input-group-sm mb-3">
                                        <input id="confirm" type="text" class="form-control" placeholder="Gunakan huruf kapital" aria-label="Gunakan huruf kapital" aria-describedby="submit" value="YAKIN">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary" type="submit" id="submit">Lamar Sekarang</button>
                                        </div>
                                    </div>
                                </form>
                                @else
                                <h4>Kirim Lamaran?</h4>
                                <hr>
                                <p>
                                    Ketikkan <strong>YAKIN</strong> untuk konfirmasi
                                </p>
                                <form class="" action="{{ url('lowongan/apply') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="ticket" value="{{ $lowongan->ticket }}">
                                    <input type="hidden" name="idPerusahaan" value="{{ $lowongan->idPerusahaan }}">
                                    <div class="input-group input-group-sm mb-3">
                                        <input id="confirm" type="text" class="form-control" placeholder="Gunakan huruf kapital" aria-label="Gunakan huruf kapital" aria-describedby="submit" value="YAKIN">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary" type="submit" id="submit">Lamar Sekarang</button>
                                        </div>
                                    </div>
                                </form>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
