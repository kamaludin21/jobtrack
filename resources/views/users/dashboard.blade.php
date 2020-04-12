@extends('layouts.main')

@section('user-dashboard')
nav-user-active
@endsection
@section('content')
<div class="container pt-5">
    <div class="row mb-2">
        @include('layouts.users-nav')
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="card row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <div class="card-header bg-c-donker">
                                <div class="lead">
                                  Dashboard
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4 col-xl-3">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <h6 class="m-b-20">Lamaran</h6>
                                            <h2 class="text-right"><i class="fa fa-envelope-open f-left"></i><span>{{ $lamar }}</span></h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-3">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h6 class="m-b-20">Certificate</h6>
                                            <h2 class="text-right"><i class="fa fa-certificate f-left"></i><span>{{ $certificate }}</span></h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-3">
                                    <div class="card bg-c-yellow order-card">
                                        <div class="card-block">
                                            <h6 class="m-b-20">Experience</h6>
                                            <h2 class="text-right"><i class="fa fa-wrench f-left"></i><span>{{ $experience }}</span></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-3">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h6 class="m-b-20">Interview</h6>
                                            <h2 class="text-right"><i class="fa fa-headphones f-left"></i><span>{{ $agendaCount }}</span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <div class="card-header">
                                <h4>Your activity</h4>
                            </div>
                            <div class="row py-2 pt-2">
                                <div class="container">
                                    @if(count($lamaran) == 0)
                                      <div class="p-4 text-center">
                                        <img src="{{ asset('img/searching.png') }}" alt="Kosong" class="img-fluid">
                                        <p>Belum ada agenda</p>
                                      </div>

                                    @else
                                    @php($view = $lamaran[0]->ticket)
                                    @php($statusLamaran = $lamaran[0]->status)

                                    <div class="page-header">
                                        <h4 id="timeline">
                                          <a href="{{ url('lowongan/detail', [$lamaran[0]->ticket]) }}" class="text-none-decoration" target="_blank">{{ $lamaran[0]->title }}</a>
                                          <br>
                                          <small>{{ $lamaran[0]->name }}</small>
                                        </h4>
                                    </div>

                                      <ul class="timeline">
                                          @foreach ($agenda as $value)
                                            @if($value->ticket == $view && $value->status <= $statusLamaran)
                                              <li class="{{ $value->status == '2' ? '' : 'timeline-inverted' }}">
                                                  <div class="timeline-badge success"><i class="fa fa-calendar"></i></div>
                                                  <div class="timeline-panel">
                                                      <div class="timeline-heading">
                                                          <h4 class="timeline-title">{{ $value->title }}</h4>
                                                          <p><small class="text-muted"><i class="fa fa-calendar"></i> {{ $value->tanggal }} &bull; {{ $value->mulai }} - {{ $value->sampai }} WIB</small></p>
                                                      </div>
                                                      <div class="timeline-body">
                                                          <p>{{ $value->deskripsi }}</p>
                                                      </div>
                                                  </div>
                                              </li>
                                            @endif
                                          @endforeach
                                      </ul>
                                    @endif
                                </div>
                                <hr>
                                @if(count($lamaran) > 0)
                                  <div class="container mt-5">
                                      <div class="row justify-content-center">
                                          <ul class="nav nav-pills">
                                            @foreach ($lamaran as $key )


                                              <li class="nav-item pr-2">
                                                  <a class="nav-link {{ $key->ticket == $lamaran[0]->ticket  ? 'active' : '' }}" href="{{ $key->ticket }}">{{ Str::limit($key->title, 10, '') }}</a>
                                              </li>
                                              @endforeach
                                          </ul>
                                      </div>
                                  </div>
                                @endif

                            </div>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
