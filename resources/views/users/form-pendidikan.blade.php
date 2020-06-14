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
                                Tambah Pendidikan
                              </div>
                          </div>
                            <div class="mt-2">
                                <form method="POST" action="{{ url('user/pendidikan/store') }}" class="px-1">
                                  @csrf
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="">Keilmuwan</label>
                                            <select class="form-control form-control-sm" name="keilmuan">
                                                <option value="" class="pilih_keilmuan">Pilih Bidang Keilmuan</option>
                                                @foreach ($keilmuan as $item)
                                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="">Sub keilmuwan</label>
                                            <select class="form-control form-control-sm" name="subkeilmuan">
                                                <option value="" class="pilih_subkeilmuan">Pilih Sub Bidang Keilmuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label for="">Instansi - Jurusan</label>
                                            <input type="text" class="form-control form-control-sm" name="pendidikan">
                                        </div>
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
                                                <input type="text"  name="angkatan" class="form-control form-control-sm" onkeypress="return numberFilter(event)" placeholder="Ex: 2015" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="agreements" name="agreements" required>
                                        <label class="form-check-label" for="agreements">
                                            <small>Saya bertanggung jawab penuh atas kebenaran data yang tertera</small>
                                        </label>
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


