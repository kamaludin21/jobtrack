@extends('layouts.main')

@section('content')
<div class="container pt-4">
    <div class="row mb-2">
        <div class="col-md-12">
            <div class="card">
                <div class="">
                    @if(empty($company))
                    <img src="{{ asset('img/recruiter/sampul/office.jpg') }}" class="card-img-top" alt="Foto sampul">
                    @else
                    <img src="{{ url('img/recruiter/sampul', [$company->sampul]) }}" class="card-img-top" alt="Foto sampul">
                    @endif
                </div>
                <div class="card-body" style="border-top: 1px solid rgba(0, 0, 0, 0.125);">
                    <div class="mt-n6 mb-2">
                        @if(empty($company))
                        <img src="{{ asset('img/recruiter/profil/company.png') }}" alt="..." class="img-thumbnail">
                        @else
                        <img src="{{ url('img/recruiter/profil', [$company->profil]) }}" alt="..." class="img-thumbnail" alt="Foto profil">
                        @endif

                        <button class="btn btn-primary float-right rounded-pill">
                            <i class="fa fa-camera"></i>&nbsp;
                            Ubah Photo</button>
                        <br>
                        <a href="{{ url('recruiter/edit/profil') }}" class="btn float-right btn-outline-primary rounded-pill" style="margin-top: -40px;">
                            <i class="fa fa-cog"></i>
                            Edit Profil
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-md-9">

                            @if(empty($company))
                            <h4 class="mb-n1">{{ Auth::user()->name }}</h4>
                            <small class="text-danger">Lengkapi profil anda, tekan tombol edit profil!</small>
                            @else
                            @if($company->status == 'verify')
                              <h4 class="mb-n1">{{ $company->name }}</h4>
                              <small class="text-muted">
                                  <em>Akun ini terverifikasi</em>
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
                                    <strong>Industry</strong>
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
                            @endif
                        </div>
                        <div class="col-md-3 mr-auto text-right ">
                            {{-- <p><small>
                                    <span class="badge badge-pill badge-success">Online</span>
                                    &bull;
                                    <span class="badge badge-pill badge-danger">Offline</span></small></p> --}}
                            {{-- <p class="mt-n3"><small>2 vacancies available</small></p> --}}
                            <div class="text-justify" style="border-top: 1px solid rgba(0, 0, 0, 0.125);">
                                <p class="pt-2" style="line-height: 1.0;">
                                    <small>
                                        Feel secure when applying: look for the verified icon <i class="fa fa-check-circle text-primary"></i> and always do your research on a company. avoid and report if the content is suspicious
                                </p>
                                <a href="#" class="text-info">
                                    <i class="fa fa-flag"></i>
                                    Verify your account here
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5>Tentang Perusahaan</h5>
                    <hr>
                    @if(empty($company))
                    <small class="text-danger">Lengkapi profil anda, tekan tombol dibawah!</small>
                    @else
                    <div class="text-justify">
                        {!! $company->description !!}
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="px-4 pt-4">
                    <h5>Dashboard</h5>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card p-3">
                                <small>Applications</small>
                                <p>
                                    5
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-3">
                                <small>Approve </small>
                                <p>
                                    5
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-3">
                                <small>Rejected Candidate </small>
                                <p>
                                    5
                                </p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
