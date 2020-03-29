@extends('layouts.main')

@section('status-home') active @endsection
@section('content')
<div class="container pt-4">
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
                    <h4 class="font-weight-bold">{{ Auth::user()->name }}</h4>
                    @if(empty($company))
                        <small class="text-danger">Lengkapi profil anda, tekan tombol dibawah!</small>
                    @else
                    <div class="text-justify">
                      {!! $company->description !!}
                    </div>
                    <p>
                        <strong>Alamat : </strong>{{ $company->alamat }}
                    </p>
                    <p>
                        <strong>Website : </strong>{{ $company->website }}
                    </p>
                    @endif
                    <a href="{{ url('recruiter/edit/profil') }}" class="btn btn-sm btn-outline-primary btn-block"><i class="fa fa-cog"></i>
                    Sunting Profil
                    </a>
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
                          0
                        </p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card p-3">
                        <small>Approve </small>
                        <p>
                          0
                        </p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card p-3">
                        <small>Rejected Candidate </small>
                        <p>
                          0
                        </p>
                      </div>
                    </div>

                  </div>

                </div>
            </div>
        </div>

    </div>
    @endsection
