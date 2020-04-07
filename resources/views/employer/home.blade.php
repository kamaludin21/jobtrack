@extends('layouts.main')

@section('home-status') active
@endsection

@section('content')
<div class="container pt-5">
    <div class="row mb-2">
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
                    <a href="#" class="btn btn-sm btn-outline-primary btn-block"><i class="fa fa-cog"></i>
                        Sunting Profil</a>
                </div>
            </div>
        </div>
        <div class="col-8">
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
    @endsection
