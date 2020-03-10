@extends('layouts.main')

@section('content')
<div class="container pt-5">
    <div class="row mb-2">
        @include('layouts.users-nav')
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
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
                                            <h2 class="text-right"><i class="fa fa-envelope-open f-left"></i><span>6</span></h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-3">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h6 class="m-b-20">Certificate</h6>
                                            <h2 class="text-right"><i class="fa fa-certificate f-left"></i><span>3</span></h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-3">
                                    <div class="card bg-c-yellow order-card">
                                        <div class="card-block">
                                            <h6 class="m-b-20">Experience</h6>
                                            <h2 class="text-right"><i class="fa fa-wrench f-left"></i><span>5</span></h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-3">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h6 class="m-b-20">Interview</h6>
                                            <h2 class="text-right"><i class="fa fa-headphones f-left"></i><span>8</span></h2>
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
                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <div class="card-header">
                                <h4>Your activity now</h4>
                            </div>
                            <div class="row py-2 pt-2">
                                <div class="container">
                                    <div class="page-header">
                                        <h4 id="timeline">Programmer BACK END</h4>
                                        <p>PT BNI</p>
                                    </div>
                                    <ul class="timeline">
                                        <li>
                                            <div class="timeline-badge success"><i class="fa fa-check"></i></div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4 class="timeline-title">Administrasi</h4>
                                                    <p><small class="text-muted"><i class="fa fa-calendar"></i> 12 Juni 2020 &bull; 09:00 - 16:00 WIB</small></p>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-inverted">
                                            <div class="timeline-badge warning"><i class="fa fa-clock-o"></i></div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4 class="timeline-title">Test Wawancara</h4>
                                                    <p><small class="text-muted"><i class="fa fa-calendar"></i> 12 Juni 2020 &bull; 09:00 - 16:00 WIB</small></p>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá, depois divoltis porris, paradis. Paisis, filhis, espiritis santis</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-badge danger"><i class="fa fa-ban"></i></div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4 class="timeline-title">TEST PNS</h4>
                                                    <p><small class="text-muted"><i class="fa fa-calendar"></i> 12 Juni 2020 &bull; 09:00 - 16:00 WIB</small></p>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-inverted">
                                            <div class="timeline-badge info"><i class="fa fa-genderless"></i></div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4 class="timeline-title">Congratulations</h4>
                                                </div>
                                                <div class="timeline-body">

                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-badge danger"><i class="fa fa-close"></i></div>
                                            {{-- <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4 class="timeline-title">Maybe next time buddy</h4>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>
                                                        Good luck and succeed in finding other desired positions
                                                    </p>
                                                </div>
                                            </div> --}}
                                        </li>
                                    </ul>
                                </div>
                                <hr>
                                <div class="container mt-5">
                                    <div class="row justify-content-center">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item pr-2">
                                                <a class="nav-link " href="#">Argapro</a>
                                            </li>
                                            <li class="nav-item pr-2">
                                                <a class="nav-link active" href="#">BNI</a>
                                            </li>
                                            <li class="nav-item pr-2">
                                                <a class="nav-link " href="#">BPJS Kesehatan</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="#">KPK</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

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
