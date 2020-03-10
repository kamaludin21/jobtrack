@extends('layouts.main')

@section('content')
<div class="container pt-5">
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <img src="https://www.bni.co.id/Portals/1/DNNGalleryPro/uploads/2020/1/22/Buka%20Tabungan%20Digital.jpg" class="card-img-top" alt="...">
                <div class="card-body" style="border-top: 1px solid rgba(0, 0, 0, 0.125);">
                    <div class="mt-n6 mb-2">
                        <img src="{{ asset('img/argapro.png') }}" alt="..." class="img-thumbnail">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
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
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-outline-secondary">
                                    <i class="fa fa-bookmark"></i>&nbsp;&nbsp;
                                    Simpan</button>
                                <button type="button" class="btn btn-outline-secondary">
                                    <i class="fa fa-share-alt"></i>&nbsp;&nbsp;
                                    Share</button>
                            </div>
                        </div>
                        <div class="col-md-6 mr-auto mt-3">
                          <h4>Kirim Lamaran</h4>
                          <hr>
                          {{-- <p class="lead">
                            <small>*Pastikan anda sudah melengkapi profil dan data diri anda. dan pastikan anda memenuhi kriteria lowongan pekerjaan ini.</small>
                          </p> --}}
                          <p>
                            Ketikkan <strong>Yakin</strong> untuk konfirmasi
                          </p>
                          <form class="" action="index.html" method="post">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Ketik disini">
                            </div>
                            <div class="float-right">
                              <a href="{{ url('lowongan/success-apply') }}" class="btn btn-sm btn-primary" name="button">Lamar Sekarang</a>
                            </div>
                          </form>
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
                    <p>
                        <ul>
                            <li>Deliver across entire full mobile apps cycle in Agile environment.</li>
                            <li>Develops software solutions by studying information needs; conferring with users; studying systems flow, data usage, and work processes; investigating problem areas; following the software development lifecycle</li>
                            <li>Documents and demonstrates solutions by developing documentation, flowcharts, layouts, diagrams, charts, code comments and clear code;</li>
                        </ul>
                    </p>
                    <h5>Minimum Qualifications</h5>
                    <p>
                        <ul>
                            <li>Proficiency in React Native for mobile apps</li>
                            <li>Candidate with experience in graphical visualization or gamification will be preferred.</li>
                            <li>Solid skills in debugging and provide optimal solutions in problem solving;</li>
                        </ul>
                    </p>
                    <h5>Required Skills</h5>
                    <p>
                        <ul>
                            <li>Data Visualization</li>
                            <li>User Research</li>
                            <li>React</li>
                        </ul>
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5>Lowongan</h5>
                    <p>
                        <ul>
                            <li>Deliver across entire full mobile apps cycle in Agile environment.</li>
                            <li>Develops software solutions by studying information needs; conferring with users; studying systems flow, data usage, and work processes; investigating problem areas; following the software development lifecycle</li>
                            <li>Documents and demonstrates solutions by developing documentation, flowcharts, layouts, diagrams, charts, code comments and clear code;</li>
                        </ul>
                    </p>
                    <h5>Minimum Qualifications</h5>
                    <p>
                        <ul>
                            <li>Proficiency in React Native for mobile apps</li>
                            <li>Candidate with experience in graphical visualization or gamification will be preferred.</li>
                            <li>Solid skills in debugging and provide optimal solutions in problem solving;</li>
                        </ul>
                    </p>
                    <h5>Required Skills</h5>
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
</div>

@endsection
