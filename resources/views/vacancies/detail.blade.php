@extends('layouts.main')

@section('lowongan-status') active
@endsection

@section('content')
<div class="container pt-5">
    <div class="row mb-n3">
        <div class="col-12">
            <div class="card">
                @if(empty($lowongan))
                <img src="{{ asset('img/recruiter/sampul/office.jpg') }}" class="card-img-top" alt="Foto sampul">
                @else
                <img src="{{ url('img/recruiter/sampul', [$lowongan->sampul]) }}" class="card-img-top" alt="Foto sampul">
                @endif
                <div class="card-body" style="border-top: 1px solid rgba(0, 0, 0, 0.125);">
                    <div class="mt-n6 mb-2">
                      @if(empty($lowongan))
                      <img src="{{ asset('img/recruiter/profil/company.png') }}" alt="..." class="img-thumbnail">
                      @else
                      <img src="{{ url('img/recruiter/profil', [$lowongan->profil]) }}" alt="..." class="img-thumbnail" alt="Foto profil">
                      @endif
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="">
                                <strong class="d-inline-block mb-2 text-muted">
                                    <a href="{{ url('lowongan/employer') }}" class="text-decoration-none text-muted">{{ $lowongan->name }}</a>
                                </strong>
                                <i class="fa fa-check-circle fa-lg text-primary pt-2" data-toggle="tooltip" data-placement="right" title="Akun resmi terverifikasi"></i>
                            </div>
                            <h3 class="">{{ $lowongan->title }}</h3>
                            <h6 class="mt-3">
                                <i class="fa fa-dollar"></i>&nbsp;&nbsp;Rp. {{ number_format($lowongan->gajimin) }} - {{ number_format($lowongan->gajimax) }} / Month
                            </h6>
                            <h6 class="mt-2">
                                <i class="fa fa-map-marker"></i>&nbsp;&nbsp;{{ $lowongan->daerah }}
                            </h6>
                            <h6 class="mt-2">
                                <i class="fa fa-briefcase"></i>&nbsp;&nbsp;{{ $lowongan->type }}
                            </h6>
                        </div>
                        <div class="col-md-3 mr-auto text-right">
                            <p><small>Apply before {{ $lowongan->expired }}</small></p>
                            <p class="mt-n3"><small>{{ $lowongan->slot }} Slots Available</small></p>
                            <div class="text-justify" style="border-top: 1px solid rgba(0, 0, 0, 0.125);">
                                <p class="pt-2" style="line-height: 1.0;">
                                    <small>
                                        Feel secure when applying: look for the verified icon <i class="fa fa-check-circle text-primary"></i> and always do your research on a company. avoid and report if the content is suspicious
                                </p>
                                <a href="#" class="text-danger">
                                    <i class="fa fa-clipboard"></i> Report this job
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="float-left">
                              @include('layouts.alert')
                              @if(count($lamaran) == 0)
                                <a href="{{ url('lowongan/detail/apply', [$lowongan->ticket]) }}" class="btn btn-outline-primary">
                                    APPLYS NOW
                                </a>
                              @endif
                              {{-- @if(empty($lamaran))
                                <a href="{{ url('lowongan/detail/apply', [$lowongan->ticket]) }}" class="btn btn-outline-primary">
                                    APPLY NOW
                                </a>
                              @endif --}}
                              @guest
                                <a href="{{ url('login') }}" class="btn btn-primary">
                                    Login untuk melamar
                                </a>
                              @endguest
                            </div>
                            <div class="float-right">
                                <form action="{{ url('user/bookmark/store') }}" method="post">
                                  @csrf
                                  <input type="hidden" name="ticket" value="{{ $lowongan->ticket }}">
                                  <input type="hidden" name="idPerusahaan" value="{{ $lowongan->idPerusahaan }}">
                                  <input type="hidden" name="idVacancies" value="{{ $lowongan->id }}">
                                  <input type="hidden" name="title" value="{{ $lowongan->title }}">
                                  <input type="hidden" name="gajimin" value="{{ $lowongan->gajimin }}">
                                  <input type="hidden" name="gajimax" value="{{ $lowongan->gajimax }}">
                                  <input type="hidden" name="description" value="{{ $lowongan->description }}">

                                  <div class="btn-group mr-auto" role="group" aria-label="Basic example">
                                      <button type="submit" class="btn btn-outline-secondary">
                                          <i class="fa fa-bookmark"></i>&nbsp;&nbsp;
                                          Simpan</button>
                                      {{-- <button type="button" class="btn btn-outline-secondary">
                                          <i class="fa fa-share-alt"></i>&nbsp;&nbsp;
                                          Share</button> --}}
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8 pr-sm-0">
            <div class="card">
                <div class="card-body">
                    <h5>Job Descriptions</h5>
                    <hr>
                    <div class="font-weight-lighter">
                    {!! $lowongan->description !!}
                    </div>
                    <h5>Informasi lainnya</h5>
                    <hr>
                    <div class="row font-weight-lighter">
                      <div class="col-6 mb-3">
                        <p class="font-weight-bold mb-n1">Job Level</p>
                        {{ $lowongan->subbidang }}
                      </div>
                      <div class="col-6">
                        <p class="font-weight-bold mb-n1">Industry</p>
                        {{ $lowongan->bidangperusahaan }}
                      </div>

                      <div class="col-6">
                        <p class="font-weight-bold mb-n1">Job Category</p>
                        {{ $lowongan->bidang }}
                      </div>
                      <div class="col-6">
                        <p class="font-weight-bold mb-n1">Slot</p>
                        {{ $lowongan->slot }} Posisi
                      </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5>Tentang Perusahaan</h5>
                    <hr>
                    <div class="">
                        <img src="https://www.mobihealthnews.com/sites/default/files/merger.jpg" class="img-fluid rounded" alt="">
                    </div>
                    <hr>
                    <div class="text-justify mb-2">
                      {{ Str::limit(strip_tags($lowongan->deskripsi), 350, '') }}
                    </div>
                    <p>
                        <strong>Alamat : </strong>{{ $lowongan->alamat }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-header-no-style">
                    <h5>
                        Lowongan Terkait
                    </h5>
                </div>
                <div class="card-body bg-light">
                    <div class="row">
                        @foreach ($lowongans as $key)
                          <div class="col-md-3">
                              <div class="card ">
                                  <div class="card-body" >
                                      <strong class="d-inline-block mb-2 text-muted">
                                          <a href="{{ url('lowongan/employer') }}" class="text-muted">{{ Str::limit($key->name, 23, '') }}</a>
                                      </strong>
                                      <i class="fa fa-check-circle fa-lg text-primary pt-2" data-toggle="tooltip" data-placement="right" title="Akun resmi terverifikasi"></i>
                                      <h5 class="card-title text-muted mb-n1">
                                          <a href="#" style="text-decoration: none;">
                                              {{ $key->title }}
                                          </a>
                                      </h5>
                                      <small class="text-muted">
                                          Rp. {{ number_format($key->gajimin) }} - {{ number_format($key->gajimax) }}
                                      </small >
                                      <p class="mt-2">
                                          <i class="fa fa-map-marker"></i>&nbsp;&nbsp;{{ $key->daerah }}
                                          <br>
                                          <i class="fa fa-briefcase"></i>&nbsp;&nbsp;{{ $key->type }}
                                      </p>
                                      <div class="mt-n2">
                                          <strong style="text-decoration: underline;">Desc</strong>
                                          <br>
                                          <div style="line-height: 90%;">
                                            <small>
                                              {{ Str::limit(strip_tags($key->description), 110, '...') }}
                                            </small>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
