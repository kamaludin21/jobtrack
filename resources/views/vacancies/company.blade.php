@extends('layouts.main')

@section('lowongan-status') active
@endsection

@section('content')
<div class="container pt-4">
    <div class="row mb-2">
        <div class="col-md-12">
            <div class="card">
                <div class="">
                    <img src="{{ url('img/recruiter/sampul', [$company->sampul]) }}" class="card-img-top" alt="Foto sampul">
                </div>
                <div class="card-body" style="border-top: 1px solid rgba(0, 0, 0, 0.125);">
                    <div class="mt-n6 mb-2">
                        <img src="{{ url('img/recruiter/profil', [$company->profil]) }}" alt="..." class="img-thumbnail" alt="Foto profil">
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <h4 class="mb-n1">{{ $company->name }}</h4>
                            @if($company->status == 'verify')
                              <small class="text-muted">
                                  <em>This account is verified</em>
                                  <i class="fa fa-check-circle fa-lg text-primary" data-toggle="tooltip" data-placement="right" title="Akun resmi terverifikasi"></i>
                              </small>
                            @endif
                            <div class="mt-3">
                                <strong>Alamat</strong>
                                <p>
                                    {{ $company->alamat }}
                                </p>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <strong>Industri</strong>
                                    <br>
                                    Information Technology / IT
                                </div>
                                <div class="col">
                                    <strong>Website</strong>
                                    <br>
                                    <a href="#">
                                        {{ $company->website }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mr-auto text-right ">
                            <div class="text-justify" style="border-top: 1px solid rgba(0, 0, 0, 0.125);">
                                <p class="pt-2" style="line-height: 1.0;">
                                    <small>
                                        Feel secure when applying: look for the verified icon <i class="fa fa-check-circle text-primary"></i> and always do your research on a company. avoid and report if the content is suspicious
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5>Tentang Perusahaan</h5>
                    <hr>
                    <div class="text-justify">
                        {!! $company->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5>Lowongan Pekerjaan</h5>
                    <hr>
                    @if(count($lowongans) > 0)
                      @foreach($lowongans as $lowongan)
                        <div class="row">
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
                                              <button type="button" class="btn btn-sm btn-outline-secondary">Di posting {{ Str::limit($lowongan->created_at , 10, '') }} &bull; Lamar sebelum {{ $lowongan->expired }}</button>
                                          </div>
                                            {{-- <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-secondary">{{ $lowongan->slot }} Posisi</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Posted {{ Str::limit($lowongan->created_at , 10, '') }} &bull; Apply before {{ $lowongan->expired }}</button>
                                            </div> --}}
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
                      <div class="pl-3">

                      </div>
                    @else
                      <p>Lowongan belum tersedia</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
