@extends('layouts.main')

@section('content')
<div class="container pt-4">
    <div class="row">
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

                        @if(!empty($company))
                          <button type="button" class="btn btn-primary float-right rounded-pill" data-toggle="modal" data-target="#profil">
                              <i class="fa fa-camera"></i>&nbsp;
                              Ubah Photo
                          </button>
                        <div class="modal fade" id="profil" tabindex="-1" role="dialog" aria-labelledby="profil" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Ubah gambar profil</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('recruiter/profil', [$company->id]) }}" method="post" enctype="multipart/form-data">
                                          @csrf
                                          @method('patch')
                                          <div class="form-group">
                                              <label for="">Foto profil</label>
                                              {{-- <input type="file" class="form-control-file"> --}}
                                              <input type="file" name="profil" class="form-control-file">
                                          </div>
                                          <div class="form-group">
                                              <label for="">Foto sampul</label>
                                              <input type="file" name="sampul" class="form-control-file">
                                          </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
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
        <div class="col-md-12">
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
    </div>
</div>
@endsection
