@extends('layouts.main')

@section('status-vacancy') active
@endsection

@section('content')
<div class="container pt-4">
    @include('layouts.alert')
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="pr-4 pt-4 pl-4">
                    <div class="float-right">
                        <a href="{{ url('recruiter/vacancy/form') }}" class="btn btn-sm btn-primary">
                            <i class="fa fa-plus"></i>
                            Add
                        </a>
                        <a href="{{ url('recruiter/vacancy/form') }}" class="btn btn-sm btn-secondary">
                            <i class="fa fa-chevron-right"></i>
                        </a>
                    </div>
                    <h5>Lowongan perusahaan anda</h5>
                    <hr>
                </div>
                <div class="pr-4 pl-4 pt-3">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Lowongan Aktif</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Lowongan Tidak Aktif</a>
                        </div>
                    </nav>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            @if(count($vacancies) > 0)
                              @foreach ($vacancies as $vacancy)
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="p-1 d-flex flex-column position-static">
                                          <div class="row">
                                              <div class="col-md-9">
                                                  <h4 class="mb-0">{{ Str::limit($vacancy->title, 31, '...') }}</h4>
                                                  <div class="mb-1 text-muted">
                                                      <small> <i class="fa fa-dollar"></i>&nbsp;&nbsp;Rp. {{ number_format($vacancy->gajimin) }} - {{ number_format($vacancy->gajimax) }} / Month
                                                          <br>
                                                          <i class="fa fa-map-marker"></i>&nbsp;&nbsp; {{ $vacancy->daerah }}
                                                          &nbsp;&nbsp; &nbsp;&nbsp;
                                                          <i class="fa fa-briefcase"></i>&nbsp;&nbsp;{{ $vacancy->type }}
                                                      </small>
                                                  </div>
                                              </div>
                                              {{-- <div class="col-md-3 mr-auto">
                                                  <div class="text-right">
                                                      <small>8 Pelamar</small>
                                                      <br>
                                                      <small>{{ $vacancy->slot }} Slot</small>
                                                  </div>
                                              </div> --}}
                                          </div>
                                          <div class="card-text mb-auto text-justify">
                                              {{ strip_tags(Str::limit($vacancy->description, 260)) }}
                                          </div>
                                          <div class="d-flex justify-content-between align-items-center pt-2">
                                              <div class="btn-group btn-group-sm">
                                                  <button type="button" class="btn btn-outline-secondary">Open
                                                  {{ Str::limit($vacancy->created_at, 10, '') }}</button>
                                                  <button type="button" class="btn btn-outline-secondary">Closed {{ $vacancy->expired }}</button>
                                              </div>
                                              <a href="{{ url('recruiter/vacancy/manage', [$vacancy->id]) }}" class="btn btn-sm btn-warning">
                                                  <i class="fa fa-pencil pr-1"></i>
                                                  Manage
                                              </a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <hr>
                              @endforeach
                              {{ $vacancies->links() }}
                            @else
                              <div class="row text-center">
                                  <div class="col">
                                  </div>
                                  <div class="col-6">
                                      <img src="{{ asset('img/blank.png') }}" class="img-fluid" alt="">
                                      <p class="lead">
                                          Oops, there is no data yet
                                      </p>
                                      <a href="{{ url('recruiter/vacancy/form') }}" class="btn btn-sm btn-success">
                                          Publish now
                                      </a>
                                  </div>
                                  <div class="col">
                                  </div>
                              </div>
                            @endif
                            {{-- <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav> --}}
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="row text-center">
                                <div class="col">
                                </div>
                                <div class="col-6">
                                    <img src="{{ asset('img/blank.png') }}" class="img-fluid" alt="">
                                    <p class="lead">
                                        Oops, there is no data yet
                                    </p>
                                    <button class="btn btn-sm btn-success">
                                        Publish now
                                    </button>
                                </div>
                                <div class="col">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="p-4">
                    <h5>Statistik Lowongan</h5>
                    <hr>
                    <div class="pt-3">
                        <p class="p-1 pl-2 border">
                            <i class="fa fa-home pr-1"></i> Lowongan Aktif
                            <span class="badge badge-pill badge-primary ml-1">0</span>
                        </p>
                        <p class="p-1 pl-2 border">
                            <i class="fa fa-user pr-1"></i> Lowongan Tidak Aktif
                            <span class="badge badge-pill badge-primary ml-1">0</span>
                        </p>
                        <p class="p-1 pl-2 border">
                            <i class="fa fa-black-tie pr-1"></i> Jumlah Pelamar
                            <span class="badge badge-pill badge-primary ml-1">0</span>
                        </p>
                        <p class="p-1 pl-2 border">
                            <i class="fa fa-check-square pr-1"></i> Pelamar Diterima
                            <span class="badge badge-pill badge-primary ml-1">0</span>
                        </p>
                        <p class="p-1 pl-2 text-white border" style="background: linear-gradient(110deg, #407cc9 50%, #f27cad 50%);">
                            <span>Laki-laki: 50%</span>
                            <span class="float-right">50% :Perempuan</span>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
