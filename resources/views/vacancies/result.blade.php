@extends('layouts.main')

@section('lowongan-status') active
@endsection

@section('content')
<div class="container pt-5">
    <div class="row mb-2">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Search with your custom
                </div>
                <div class="card-body">
                    <form action="{{ url('lowongan/search') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="title" class="form-control form-control-sm" placeholder="Posisi/kata kunci">
                        </div>
                        <div class="form-group">
                            <select class="form-control form-control-sm" name="bidang">
                                <option value="" disabled selected>Kategori</option>
                                <option value="IT Software">Accounting and Finance</option>
                                <option value="Administration and Coordination">Administration and Coordination</option>
                                <option value="Architecture and Engineering">Architecture and Engineering</option>
                                <option value="Arts and Sports">Arts and Sports</option>
                                <option value="General Services">General Services</option>
                                <option value="IT and Software">IT and Software</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control form-control-sm" name="daerah">
                                <option value="" disabled selected>Daerah</option>
                                <option value="Banda Aceh">Banda Aceh</option>
                                <option value="Denpasar">Denpasar</option>
                                <option value="Bengkulu">Bengkulu</option>
                                <option value="Jambi">Jambi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control form-control-sm" name="type">
                                <option value="" disabled selected>Tipe pekerjaan</option>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Kontrak">Kontrak</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-block btn-sm btn-primary">Terapkan</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                @if(count($lowongans) > 0)
                @foreach($lowongans as $lowongan)
                <div class="row p-4">
                    <div class="col-md-12">
                        <div class="row no-gutters rounded overflow-hidden flex-md-row h-md-250 position-relative">
                            <div class="col d-flex flex-column position-static">
                                <div class="row mb-2">
                                    <div class="col-md-9">
                                        <a href="#" style="text-decoration: none;">
                                            <strong class="d-inline-block mb-2 text-muted">
                                                {{ $lowongan->name }}
                                            </strong>
                                        </a>
                                        @if($lowongan->status == 'verify')
                                            <i class="fa fa-check-circle fa-lg text-primary pt-2" data-toggle="tooltip" data-placement="right" title="Perusahaan terverifikasi mitra kami"></i>
                                            @endif
                                            <h4>{{ Str::limit($lowongan->title, 31, '...') }}</h4>
                                            <div class="text-muted">
                                                <small> <i class="fa fa-dollar"></i>&nbsp;&nbsp;Rp. {{ number_format($lowongan->gajimin) }} - {{ number_format($lowongan->gajimax) }} / Month
                                                    <br>
                                                    <i class="fa fa-map-marker"></i>&nbsp;&nbsp; {{ $lowongan->daerah }}
                                                    &nbsp;&nbsp; &nbsp;&nbsp;
                                                    <i class="fa fa-briefcase"></i>&nbsp;&nbsp;{{ $lowongan->type }}
                                                </small>
                                            </div>
                                    </div>
                                    <div class="col-md-3 mr-auto">
                                        <img src="{{ url('img/recruiter/profil', [$lowongan->profil]) }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="card-text mb-3 text-justify">
                                    {{ strip_tags(Str::limit($lowongan->description, 300, '...')) }}
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">{{ $lowongan->slot }} Posisi</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Posted {{ Str::limit($lowongan->created_at , 10, '') }} &bull; Apply before {{ $lowongan->expired }}</button>
                                    </div>
                                    <a href="{{ url('lowongan/detail', [$lowongan->ticket]) }}" class="btn btn-sm btn-primary">
                                        Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                @endforeach
                @else

                  <div class="p-4 text-center">
                    <img src="{{ asset('img/searching.png') }}" alt="Kosong" class="img-fluid">
                    <p>Lowongan tidak ditemukan</p>
                  </div>

                @endif
            </div>

        </div>
    </div>
</div>

@endsection
