@extends('layouts.main')

@section('content')
<div class="container pt-5">
    <div class="row mb-2">
        <div class="col-12">
            <div class="card">
                <img src="https://www.bni.co.id/Portals/1/DNNGalleryPro/uploads/2020/1/22/Buka%20Tabungan%20Digital.jpg" class="card-img-top" alt="...">
                <div class="card-body" style="border-top: 1px solid rgba(0, 0, 0, 0.125);">
                    <div class="mt-n6 mb-2">
                        <img src="{{ asset('img/argapro.png') }}" alt="..." class="img-thumbnail">
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <h4 class="mb-n1">PT BNI 46</h4>
                            <small class="text-muted">
                                <em>this is a verified account employer</em>
                                <i class="fa fa-check-circle fa-lg text-primary" data-toggle="tooltip" data-placement="right" title="Akun resmi terverifikasi"></i>
                            </small>
                            <div class="mt-3">
                                <strong >Alamat</strong>
                                <p>
                                    Jl. Kebayoran Baru No.73<br />
                                    Kebayoran Lama - Jakarta Selatan<br />
                                    DKI Jakarta - 12240<br />
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
                                    https://www.pricebook.co.id/
                                </a>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-3 mr-auto text-right pt-5">
                            <p><small>
                              <span class="badge badge-pill badge-success">Online</span>
                              &bull;
                              <span class="badge badge-pill badge-danger">Offline</span></small></p>
                            <p class="mt-n3"><small>2 vacancies available</small></p>
                            <div class="text-justify" style="border-top: 1px solid rgba(0, 0, 0, 0.125);">
                                <p class="pt-2" style="line-height: 1.0;">
                                    <small>
                                        Feel secure when applying: look for the verified icon <i class="fa fa-check-circle text-primary"></i> and always do your research on a company. avoid and report if the content is suspicious
                                </p>
                                <a href="#" class="text-danger">
                                    <i class="fa fa-clipboard"></i> Report this company
                                </a>
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
                    <h5>About</h5>
                    <hr>
                    <div id="carouselExampleInterval" class="carousel slide border rounded my-2" data-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active" data-interval="10000">
                          <img src="{{ asset('img/carousel1.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-interval="2000">
                          <img src="{{ asset('img/carousel2.png') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                          <img src="{{ asset('img/carousel3.png') }}" class="d-block w-100" alt="...">
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                    <p class="text-justify">mHealthBank is a Digital Health apps connecting Users to healthcare service providers (doctors, pharmacies, laboratories) seamlessly for holistic healthcare in an eco-system. It transforms healthcare from
                        reactive to proactive by empowering Users with own health data, health risk profiling, health tips advising on symptoms and medication symptoms.</p>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5>Lowongan Tersedia</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column position-static">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h6 class="mb-0">Sales Marketing</h6>
                                            <div class="mb-1 text-muted">
                                                <small>Rp. 1.200.000 - 2.500.000</small>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-text mb-auto text-justify">Menciptakan hubungan baik dengan customer. Melakukan SOP pembukaan dan penutupan toko, serta Melakukan stock opname...</p>
                                    {{-- <a href="#" class="stretched-link pt-3">Continue reading</a> --}}
                                    <div class="d-flex justify-content-between align-items-center pt-2">
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn btn-outline-secondary">Pekanbaru</button>
                                            <button type="button" class="btn btn-outline-secondary">Posted 5 days ago &bull; Apply before 4 Sept </button>
                                        </div>
                                        <a href="{{ url('lowongan-detail') }}" class="btn btn-sm btn-primary">
                                            Selengkapnya
                                        </a>
                                    </div>
                                </div>
                                <div class="col-auto d-none d-lg-block">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column position-static">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h6 class="mb-0">System Administrator</h6>
                                            <div class="mb-1 text-muted">
                                                <small>Rp. 12.000.000 - 15.000.000</small>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-text mb-auto text-justify">Sejauh ini kita menyaring seluruh kandidat dengan dua syarat utama: memiliki attitude positive, dan melihat keadaan apapun dengan pandangan yang optimis. Jam kerja saya buat fleksibel, tiap karyawan dapat jatah remote working 2 hari/bulan, dan jatah cuti 1 hari/bulan.</p>
                                    {{-- <a href="#" class="stretched-link pt-3">Continue reading</a> --}}
                                    <div class="d-flex justify-content-between align-items-center pt-2">
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn btn-outline-secondary">Bandung</button>
                                            <button type="button" class="btn btn-outline-secondary">Posted 1 days ago &bull; Apply before 12 Feb</button>
                                        </div>
                                        <button class="btn btn-sm btn-primary">
                                            Selengkapnya
                                        </button>
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
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5>Kontak</h5>
                    <hr>
                    <p>
                        <strong>Telepon : </strong> +62 (21) 2751 8857
                    </p>
                    <p>
                        <strong>Email : </strong> <a href="#">
                          hi@bni.co.id
                        </a>
                    </p>
                    <p>
                      <strong>Sosial Media</strong>
                    </p>
                    <div class="">
                      <a href="#" class="btn btn-primary my-1">
                        <i class="fa fa-facebook"></i>
                        Facebook
                      </a>
                      <a href="#" class="btn btn-info my-1">
                        <i class="fa fa-twitter"></i>
                        Twitter
                      </a>
                      <a href="#" class="btn btn-primary btn-info my-1">
                        <i class="fa fa-linkedin"></i>
                        Linkedin
                      </a>
                      <a href="#" class="btn btn-info my-1">
                        <i class="fa fa-youtube"></i>
                        Youtube
                      </a>
                      <a href="#" class="btn btn-info my-1">
                        <i class="fa fa-envelope"></i>
                        Gmail
                      </a>
                      <a href="#" class="btn btn-info my-1">
                        <i class="fa fa-instagram"></i>
                        Instagram
                      </a>
                      <a href="#" class="btn btn-info my-1">
                        <i class="fa fa-github"></i>
                        Github
                      </a>
                      <a href="#" class="btn btn-info my-1">
                        <i class="fa fa-slack"></i>
                        Slack
                      </a>
                      <a href="#" class="btn btn-info my-1">
                        <i class="fa fa-pinterest"></i>
                        Pinterest
                      </a>
                      <a href="#" class="btn btn-info my-1">
                        <i class="fa fa-vine"></i>
                        Vine
                      </a>
                      <a href="#" class="btn btn-info my-1">
                        <i class="fa fa-twitch"></i>
                        Twitch
                      </a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection
