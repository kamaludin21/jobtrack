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
                                Ubah pengalaman
                              </div>
                          </div>
                            <div class="mt-2">
                                <form method="POST" action="{{ url('user/pengalaman/store', [$pengalaman->id]) }}" class="px-1">
                                  <input type="hidden" name="_method" value="PATCH">
                                  @csrf
                                    <div class="form-group">
                                        <label for="desc">Nama Pekerjaan</label>
                                        <input type="text" name="title" class="form-control form-control-sm" placeholder="Ex. programmer, akuntan" value="{{ $pengalaman->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Bidang Pekerjaan</label>
                                        {{-- Bidang diperusahaan, ex: it support, produksi, keuangan --}}
                                        <input type="text" name="bidang" class="form-control form-control-sm" placeholder="IT Support" value="{{ $pengalaman->bidang }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Instansi</label>
                                        <input type="text" name="instansi" class="form-control form-control-sm" placeholder="Nama perusahaan" value="{{ $pengalaman->intansi }}">
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Waktu bekerja</label>
                                                <input type="text" name="dari" class="form-control form-control-sm" name="dari" value="{{ $pengalaman->dari }} - {{ $pengalaman->sampai }}">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="">Daerah tempat kerja</label>
                                        <input type="text" name="daerah" class="form-control form-control-sm" placeholder="Daerah kantor" value="{{ $pengalaman->daerah }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Industri</label>
                                        {{-- Industri dari perusahaan --}}
                                        <input type="text" name="industri" class="form-control form-control-sm" placeholder="Ex: kuliner, it software" value="{{ $pengalaman->industri }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Spesialisasi</label>
                                        {{-- spesialisasi dari industri --}}
                                        <input type="text" name="spesialisasi" class="form-control form-control-sm" placeholder="Spesialisasi industri tempat anda bekerja" value="{{ $pengalaman->spesialisasi }}">
                                    </div>

                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="">Level jabatan</label>
                                            <select class="form-control form-control-sm" name="jabatan">
                                                <option value="Internship / OJT" {{ $pengalaman->jabatan == 'Internship / OJT' ? 'selected' : '' }}>Internship / OJT</option>
                                                <option value="Entry Level / Junior" {{ $pengalaman->jabatan == 'Entry Level / Junior' ? 'selected' : '' }}>Entry Level / Junior</option>
                                                <option value="Associate / Supervisor" {{ $pengalaman->jabatan == 'Associate / Supervisor' ? 'selected' : '' }}>Associate / Supervisor</option>
                                                <option value="Mid-Senior Level / Manager" {{ $pengalaman->jabatan == 'Mid-Senior Level / Manager' ? 'selected' : '' }}>Mid-Senior Level / Manager</option>
                                                <option value="Director / Executive" {{ $pengalaman->jabatan == 'Director / Executive' ? 'selected' : '' }}>Director / Executive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Gaji</label>
                                        <input type="text" name="gaji" class="form-control form-control-sm" placeholder="Gaji" value="{{ $pengalaman->gaji }}">
                                    </div>
                                    <div class="float-right">
                                      <a href="{{ url('user/profil') }}" class="btn btn-light">Kembali</a>
                                      <button type="submit" class="btn btn-primary ml-2">Simpan</button>
                                    </div>
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
