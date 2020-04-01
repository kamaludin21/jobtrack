@extends('layouts.main')

@section('user-profil')
nav-user-active
@endsection

@section('content')
<div class="container pt-5">
    <div class="row mb-2">
        @include('layouts.users-nav')
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="row card no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                          <div class="card-header bg-c-donker">
                              <div class="lead">
                                Profil
                              </div>
                          </div>
                            <div class="mt-2">
                              <p class="lead">
                                  <strong>Tambah Pengalaman</strong>
                              </p>
                                <form method="POST" action="{{ url('user/pengalaman/store') }}" class="px-1">
                                  @csrf
                                    <div class="form-group">
                                        <label for="desc">Nama Pekerjaan</label>
                                        <input type="text" name="title" class="form-control form-control-sm" placeholder="Ex. programmer, akuntan">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Bidang Pekerjaan</label>
                                        {{-- Bidang diperusahaan, ex: it support, produksi, keuangan --}}
                                        <input type="text" name="bidang" class="form-control form-control-sm" placeholder="IT Support">
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Instansi</label>
                                        <input type="text" name="instansi" class="form-control form-control-sm" placeholder="Nama perusahaan">
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Dari</label>
                                                <input type="date" class="form-control form-control-sm" name="dari">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Sampai</label>
                                                <input type="date" class="form-control form-control-sm" name="sampai" placeholder="*Dalam angka">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Daerah tempat kerja</label>
                                        <input type="text" name="daerah" class="form-control form-control-sm" placeholder="Daerah kantor">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Industri</label>
                                        {{-- Industri dari perusahaan --}}
                                        <input type="text" name="industri" class="form-control form-control-sm" placeholder="Ex: kuliner, it software">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Spesialisasi</label>
                                        {{-- spesialisasi dari industri --}}
                                        <input type="text" name="spesialisasi" class="form-control form-control-sm" placeholder="Nomor telpon aktif">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Jabatan</label>
                                        {{-- Jabatan diperusahaan --}}
                                        <input type="text" name="jabatan" class="form-control form-control-sm" placeholder="Ex. Supervisor">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Gaji</label>
                                        <input type="text" name="gaji" class="form-control form-control-sm" placeholder="Gaji">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

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
