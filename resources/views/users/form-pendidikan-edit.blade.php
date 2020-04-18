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
                                Ubah pendidikan
                              </div>
                          </div>
                            <div class="mt-2">
                                <form method="POST" action="{{ url('user/pendidikan/update/store', [$pendidikan->id]) }}" class="px-1">
                                  <input type="hidden" name="_method" value="PATCH">
                                  @csrf
                                    <div class="form-group">
                                        <label for="desc">Pendidikan</label>
                                        <input type="text" name="pendidikan" class="form-control form-control-sm" placeholder="Ex: Teknik Informatika" value="{{ $pendidikan->pendidikan }}">
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Instansi/Lembaga</label>
                                                <select class="form-control form-control-sm" name="instansi">
                                                  <option value="SD" {{ $pendidikan->instansi == 'SD' ? 'selected' : '' }}>SD</option>
                                                  <option value="SMP" {{ $pendidikan->instansi == 'SMP' ? 'selected' : '' }}>SMP</option>
                                                  <option value="SMA" {{ $pendidikan->instansi == 'SMA' ? 'selected' : '' }}>SMA</option>
                                                  <option value="S1" {{ $pendidikan->instansi == 'S1' ? 'selected' : '' }}>S1</option>
                                                  <option value="S2" {{ $pendidikan->instansi == 'S2' ? 'selected' : '' }}>S2</option>
                                                  <option value="S3" {{ $pendidikan->instansi == 'S3' ? 'selected' : '' }}>S3</option>
                                                  <option value="khusus" {{ $pendidikan->instansi == 'khusus' ? 'selected' : '' }}>Pendidikan Khusus</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Angkatan</label>
                                                <input type="text"  name="angkatan" class="form-control form-control-sm" onkeypress="return numberFilter(event)" placeholder="Ex: 2015" value="{{ $pendidikan->angkatan }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="float-right">
                                      <a href="{{ url('user/profil') }}" class="btn btn-light">Kembali</a>
                                      <button type="submit" class="btn btn-primary ml-2">Ubah</button>
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
