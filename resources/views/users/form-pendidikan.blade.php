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
                                  <strong>Tambah Pendidikan</strong>
                              </p>
                                <form method="POST" action="{{ url('user/pendidikan/store') }}" class="px-1">
                                  @csrf
                                    <div class="form-group">
                                        <label for="desc">Pendidikan</label>
                                        <input type="text" name="pendidikan" class="form-control form-control-sm" placeholder="Ex: Teknik Informatik">
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Instansi/Lembaga</label>
                                                <select class="form-control form-control-sm" name="instansi">
                                                  <option value="SD">SD</option>
                                                  <option value="SMP">SMP</option>
                                                  <option value="SMA">SMA</option>
                                                  <option value="S1">S1</option>
                                                  <option value="S2">S2</option>
                                                  <option value="S3">S3</option>
                                                  <option value="khusus">Pendidikan Khusus</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Angkatan</label>
                                                <select class="form-control form-control-sm" name="angkatan">
                                                  <option value="2020">2020</option>
                                                  <option value="2020">2021</option>
                                                </select>
                                            </div>
                                        </div>
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
