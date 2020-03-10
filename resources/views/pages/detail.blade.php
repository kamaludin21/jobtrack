@extends('layouts.main')

@section('content')
<div class="container pt-5">
    <div class="row mb-n3">
        <div class="col-12">
            <div class="card">
                <img src="https://www.bni.co.id/Portals/1/DNNGalleryPro/uploads/2020/1/22/Buka%20Tabungan%20Digital.jpg" class="card-img-top" alt="...">
                <div class="card-body" style="border-top: 1px solid rgba(0, 0, 0, 0.125);">
                    <div class="mt-n6 mb-2">
                        <img src="{{ asset('img/argapro.png') }}" alt="..." class="img-thumbnail">
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="">
                                <strong class="d-inline-block mb-2 text-muted">
                                    <a href="{{ url('lowongan/employer') }}">PT BNI 46</a>
                                </strong>
                                <i class="fa fa-check-circle fa-lg text-primary pt-2" data-toggle="tooltip" data-placement="right" title="Akun resmi terverifikasi"></i>
                            </div>
                            <h3 class="my-2">Sales Marketing</h3>
                            <h6 class="mt-3">
                                <i class="fa fa-dollar"></i>&nbsp;&nbsp;Rp. 1.500.000 - 4.000.000 / Month
                            </h6>
                            <h6 class="mt-2">
                                <i class="fa fa-map-marker"></i>&nbsp;&nbsp;Jawa Timur, Bandung
                            </h6>
                            <h6 class="mt-2">
                                <i class="fa fa-briefcase"></i>&nbsp;&nbsp;Full Time
                            </h6>
                        </div>
                        <div class="col-md-3 mr-auto text-right">
                            <p><small>Posted 1 days ago &bull; Apply before 12 Feb</small></p>
                            <p class="mt-n3"><small>2 Slots Available</small></p>
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
                                <a href="{{ asset('lowongan/apply') }}" class="btn btn-outline-primary">
                                    APPLY NOW
                                </a>
                            </div>
                            <div class="float-right">
                                <div class="btn-group mr-auto" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-outline-secondary">
                                        <i class="fa fa-bookmark"></i>&nbsp;&nbsp;
                                        Simpan</button>
                                    <button type="button" class="btn btn-outline-secondary">
                                        <i class="fa fa-share-alt"></i>&nbsp;&nbsp;
                                        Share</button>
                                </div>
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
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <h6>Minimum Qualifications</h6>
                    <p>
                        <ul>
                            <li>Proficiency in React Native for mobile apps</li>
                            <li>Candidate with experience in graphical visualization or gamification will be preferred.</li>
                            <li>Solid skills in debugging and provide optimal solutions in problem solving;</li>
                        </ul>
                    </p>
                    <h6>Required Skills</h6>
                    <p>
                        <ul>
                            <li>Data Visualization</li>
                            <li>User Research</li>
                            <li>React</li>
                        </ul>
                    </p>
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
                    <p class="text-justify">mHealthBank is a Digital Health apps connecting Users to healthcare service providers (doctors, pharmacies, laboratories) seamlessly for holistic healthcare in an eco-system. It transforms healthcare from
                        reactive to proactive by empowering Users with own health data, health risk profiling, health tips advising on symptoms and medication symptoms.</p>
                    <p>
                        <strong>Alamat : </strong>Jl. Jend. Ahmad Yani No.3, Tanah Datar, Kec. Sukajadi, Kota Pekanbaru, Riau 28128
                    </p>
                    <p>
                        <strong>Jam Buka : </strong> 08.00 - 16.00 WIB &bull; Senin - Sabtu
                    </p>
                    <p>
                        <strong>Telepon : </strong> (021) 40000995
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
                        <div class="col-md-3">
                            <div class="card ">
                                <div class="card-body">
                                    <strong class="d-inline-block mb-2 text-muted">
                                        <a href="{{ url('lowongan/employer') }}" class="text-muted">PT BNI 46</a>
                                    </strong>
                                    <i class="fa fa-check-circle fa-lg text-primary pt-2" data-toggle="tooltip" data-placement="right" title="Akun resmi terverifikasi"></i>
                                    <h5 class="card-title text-muted mb-n1">
                                      <a href="#" style="text-decoration: none;">
                                        IT Consultant
                                      </a>
                                    </h5>
                                    <small class="text-muted">
                                        Rp. 1.000.000 - 2.000.000
                                    </small>
                                    <p class="mt-2">
                                        <i class="fa fa-map-marker"></i>&nbsp;&nbsp;Jawa Timur, Bandung
                                        <br>
                                        <i class="fa fa-briefcase"></i>&nbsp;&nbsp;Full Time
                                    </p>
                                    <div class="mt-n2">
                                      <small>Required skill</small>
                                      <br>
                                        <span class="badge badge-pill badge-dark">Digital Marketing</span>
                                        <span class="badge badge-pill badge-dark">Leadership</span>
                                        <span class="badge badge-pill badge-dark">Innovative</span>
                                    </div>
                                </div>
                                <div class="card-footer text-right  ">
                                    <a href="#" class="btn btn-sm btn-light px-2">
                                        <i class="fa fa-bookmark"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-primary">
                                        Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card ">
                                <div class="card-body">
                                    <strong class="d-inline-block mb-2 text-muted">
                                        <a href="{{ url('lowongan/employer') }}" class="text-muted">PT BNI 46</a>
                                    </strong>
                                    <i class="fa fa-check-circle fa-lg text-primary pt-2" data-toggle="tooltip" data-placement="right" title="Akun resmi terverifikasi"></i>
                                    <h5 class="card-title text-muted mb-n1">
                                      <a href="#" style="text-decoration: none;">
                                        IT Consultant
                                      </a>
                                    </h5>
                                    <small class="text-muted">
                                        Rp. 1.000.000 - 2.000.000
                                    </small>
                                    <p class="mt-2">
                                        <i class="fa fa-map-marker"></i>&nbsp;&nbsp;Jawa Timur, Bandung
                                        <br>
                                        <i class="fa fa-briefcase"></i>&nbsp;&nbsp;Full Time
                                    </p>
                                    <div class="mt-n2">
                                      <small>Required skill</small>
                                      <br>
                                        <span class="badge badge-pill badge-dark">Digital Marketing</span>
                                        <span class="badge badge-pill badge-dark">Leadership</span>
                                        <span class="badge badge-pill badge-dark">Innovative</span>
                                    </div>
                                </div>
                                <div class="card-footer text-right  ">
                                    <a href="#" class="btn btn-sm btn-outline-secondary">
                                        <i class="fa fa-bookmark"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-secondary">
                                        Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card ">
                                <div class="card-body">
                                    <strong class="d-inline-block mb-2 text-muted">
                                        <a href="{{ url('lowongan/employer') }}" class="text-muted">PT BNI 46</a>
                                    </strong>
                                    <i class="fa fa-check-circle fa-lg text-primary pt-2" data-toggle="tooltip" data-placement="right" title="Akun resmi terverifikasi"></i>
                                    <h5 class="card-title text-muted mb-n1">
                                      <a href="#" style="text-decoration: none;">
                                        IT Consultant
                                      </a>
                                    </h5>
                                    <small class="text-muted">
                                        Rp. 1.000.000 - 2.000.000
                                    </small>
                                    <p class="mt-2">
                                        <i class="fa fa-map-marker"></i>&nbsp;&nbsp;Jawa Timur, Bandung
                                        <br>
                                        <i class="fa fa-briefcase"></i>&nbsp;&nbsp;Full Time
                                    </p>
                                    <div class="mt-n2">
                                      <small>Required skill</small>
                                      <br>
                                        <span class="badge badge-pill badge-dark">Digital Marketing</span>
                                        <span class="badge badge-pill badge-dark">Leadership</span>
                                        <span class="badge badge-pill badge-dark">Innovative</span>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="#" class="btn btn-sm btn-light">
                                        Selengkapnya
                                    </a>
                                    <a href="#" class="btn btn-sm btn-light">
                                        <i class="fa fa-bookmark"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card ">
                                <div class="card-body">
                                    <strong class="d-inline-block mb-2 text-muted">
                                        <a href="{{ url('lowongan/employer') }}" class="text-muted">PT BNI 46</a>
                                    </strong>
                                    <i class="fa fa-check-circle fa-lg text-primary pt-2" data-toggle="tooltip" data-placement="right" title="Akun resmi terverifikasi"></i>
                                    <h5 class="card-title text-muted mb-n1">
                                      <a href="#" style="text-decoration: none;">
                                        IT Consultant
                                      </a>
                                    </h5>
                                    <small class="text-muted">
                                        Rp. 1.000.000 - 2.000.000
                                    </small>
                                    <p class="mt-2">
                                        <i class="fa fa-map-marker"></i>&nbsp;&nbsp;Jawa Timur, Bandung
                                        <br>
                                        <i class="fa fa-briefcase"></i>&nbsp;&nbsp;Full Time
                                    </p>
                                    <div class="mt-n2">
                                      <small>Required skill</small>
                                      <br>
                                        <span class="badge badge-pill badge-dark">Digital Marketing</span>
                                        <span class="badge badge-pill badge-dark">Leadership</span>
                                        <span class="badge badge-pill badge-dark">Innovative</span>
                                    </div>
                                </div>
                                <div class="card-footer text-right  ">
                                    <a href="#" class="btn btn-sm btn-light">
                                        <i class="fa fa-bookmark"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                        Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
