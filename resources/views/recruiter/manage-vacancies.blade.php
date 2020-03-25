@extends('layouts.main')

@section('status-vacancy') active
@endsection

@section('content')
<div class="container pt-4">
    @include('layouts.alert')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="pr-4 pt-4 pl-4">
                    <h5>Kelola lowongan</h5>
                    <hr>
                </div>
                <div class="pr-4 pl-4 pt-3">
                  <p class="font-weight-bold">Deskripsi</p>
                    <div class="row">
                        <div class="col">
                            <p>ID Lowongan : {tiket}</p>
                            <p>
                                Jabatan : {posisi}
                            </p>
                        </div>
                        <div class="col">
                            <p>Lokasi Penempatan : {tiket}</p>
                            <p>
                                Expired : {posisi}
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
    </div>
</div>

@endsection
