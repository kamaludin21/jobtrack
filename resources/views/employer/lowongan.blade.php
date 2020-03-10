@extends('layouts.main')

@section('content')
<div class="container pt-5">
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="pr-4 pt-4 pl-4">
                    <div class="float-right">
                        <a href="{{ url('employer/form') }}" class="btn btn-sm btn-primary">
                            <i class="fa fa-plus"></i>
                            Add
                        </a>
                        <a href="{{ url('employer/form') }}" class="btn btn-sm btn-secondary">
                            <i class="fa fa-chevron-right"></i>
                        </a>
                    </div>
                    <h5>Lowongan</h5>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="p-1 d-flex flex-column position-static">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <h4 class="mb-0">Sales Marketing</h4>
                                                <div class="mb-1 text-muted">
                                                    <small> <i class="fa fa-dollar"></i>&nbsp;&nbsp;Rp. 1.200.000 - 2.500.000 / Month
                                                        <br>
                                                        <i class="fa fa-map-marker"></i>&nbsp;&nbsp;Jawa Timur, Bandung
                                                        &nbsp;&nbsp; &nbsp;&nbsp;
                                                        <i class="fa fa-briefcase"></i>&nbsp;&nbsp;Full Time
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mr-auto">
                                                <div class="text-right">
                                                    <small>8 Pelamar</small>
                                                    <br>
                                                    <small>2 Slot</small>
                                                </div>

                                            </div>
                                        </div>
                                        <p class="card-text mb-auto text-justify">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                            aliquip ex ea commodo consequat.
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center pt-2">
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn btn-outline-secondary">Open 21 March 2020</button>
                                                <button type="button" class="btn btn-outline-secondary">Closed 19 June 2020</button>
                                            </div>
                                            <a href="{{ url('lowongan-detail') }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil"></i>
                                                Kelola
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="p-1 d-flex flex-column position-static">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <h4 class="mb-0">Full-Stack Progammer</h4>
                                                <div class="mb-1 text-muted">
                                                    <small> <i class="fa fa-dollar"></i>&nbsp;&nbsp;Rp. 1.200.000 - 2.500.000 / Month
                                                        <br>
                                                        <i class="fa fa-map-marker"></i>&nbsp;&nbsp;Jawa Timur, Bandung
                                                        &nbsp;&nbsp; &nbsp;&nbsp;
                                                        <i class="fa fa-briefcase"></i>&nbsp;&nbsp;Full Time
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mr-auto">
                                                <div class="text-right">
                                                    <small>8 Pelamar</small>
                                                    <br>
                                                    <small>2 Slot</small>
                                                </div>

                                            </div>
                                        </div>
                                        <p class="card-text mb-auto text-justify">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                            aliquip ex ea commodo consequat.
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center pt-2">
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn btn-outline-secondary">Open 21 March 2020</button>
                                                <button type="button" class="btn btn-outline-secondary">Closed 19 June 2020</button>
                                            </div>
                                            <a href="{{ url('lowongan-detail') }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil"></i>
                                                Kelola
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <nav aria-label="Page navigation example">
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
                            </nav>
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
                            <span class="badge badge-pill badge-primary ml-1">4</span>
                        </p>
                        <p class="p-1 pl-2 border">
                            <i class="fa fa-user pr-1"></i> Lowongan Tidak Aktif
                            <span class="badge badge-pill badge-primary ml-1">4</span>
                        </p>
                        <p class="p-1 pl-2 border">
                            <i class="fa fa-black-tie pr-1"></i> Jumlah Pelamar
                            <span class="badge badge-pill badge-primary ml-1">4</span>
                        </p>
                        <p class="p-1 pl-2 border">
                            <i class="fa fa-bookmark pr-1"></i> Pelamar Diterima
                            <span class="badge badge-pill badge-primary ml-1">4</span>
                        </p>
                        <p class="p-1 pl-2 text-white border" style="background: linear-gradient(110deg, #407cc9 50%, #f27cad 50%);">
                            <span>Laki-laki: 50%</span>
                            <span class="float-right">Perempuan: 50%</span>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endsection
