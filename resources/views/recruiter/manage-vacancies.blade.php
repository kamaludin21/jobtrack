@extends('layouts.main')

@section('status-vacancy') active
@endsection

@section('content')
<div class="container pt-4">
    @include('layouts.alert')
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="pr-4 pt-4 pl-4">
                    <h5>Kelola lowongan</h5>
                    <hr>
                </div>
                <div class="pr-4 pl-4 pt-3">
                  <p class="font-weight-bold">Deskripsi</p>
                    <div class="row">
                        <div class="col">
                            <p>ID Lowongan : {{ $vacancy->ticket }}</p>
                            <p>
                                Jabatan : {{ $vacancy->title }}
                            </p>
                        </div>
                        <div class="col">
                            <p>Lokasi Penempatan : {{ $vacancy->daerah }}</p>
                            <p>
                                Expired : {{ $vacancy->expired }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                  <p class="font-weight-bold">Pelamar</p>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Keahlian</th>
                                <th scope="col">Pengalaman</th>
                                <th scope="col">Pendidikan Terakhir</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-3 ">
          <div class="card">
              <div class="p-4">
                  <h5>Statistik</h5>
                  <hr>
                  <div class="pt-3">
                      <p class="p-1 pl-2 border">
                          <i class="fa fa-info-circle pr-1"></i> Belum proses
                          <span class="badge badge-pill badge-primary ml-1">0</span>
                      </p>
                      <p class="p-1 pl-2 border">
                          <i class="fa fa-file pr-1"></i> Administrasi
                          <span class="badge badge-pill badge-primary ml-1">0</span>
                      </p>
                      <p class="p-1 pl-2 border">
                          <i class="fa fa-black-tie pr-1"></i> Interview
                          <span class="badge badge-pill badge-primary ml-1">0</span>
                      </p>
                      <p class="p-1 pl-2 border">
                          <i class="fa fa-times pr-1"></i> Tolak
                          <span class="badge badge-pill badge-primary ml-1">0</span>
                      </p>
                      <p class="p-1 pl-2 border">
                          <i class="fa fa-check-square pr-1"></i> Diterima
                          <span class="badge badge-pill badge-primary ml-1">0</span>
                      </p>
                  </div>
              </div>

          </div>
        </div>
    </div>
</div>

@endsection
