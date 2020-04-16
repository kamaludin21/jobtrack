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
                                Ubah sertifikat
                              </div>
                          </div>
                            <div class="mt-2">
                                <form method="POST" action="{{ url('user/sertifikat/update/store', [$sertifikat->id]) }}" class="px-1" enctype="multipart/form-data">
                                  <input type="hidden" name="_method" value="PATCH">
                                  @csrf
                                    <div class="form-group">
                                        <label for="desc">Judul sertifikat</label>
                                        <input type="text" name="title" class="form-control form-control-sm" placeholder="Ex. Sertifikasi memasak" value="{{ $sertifikat->title }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Instansi</label>
                                        <input type="text" name="instansi" class="form-control form-control-sm" placeholder="Nama perusahaan sertifikasi" value="{{ $sertifikat->instansi }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Deskripsi singkat</label>
                                        <textarea name="description" class="form-control form-control-sm" rows="2" placeholder="Max. 100 huruf" required>{{ $sertifikat->description }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Berlaku</label>
                                                <input type="text" class="form-control form-control-sm" name="dari" placeholder="Masa berlaku" value="{{ $sertifikat->dari }} - {{ $sertifikat->sampai }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Foto 1</label>
                                                <input type="file" class="form-control-file" name="image1">
                                            </div>
                                            <img src="{{ url('sertifikat', [$sertifikat->image1]) }}" class="img-fluid pt-2" alt="">
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Foto 2</label>
                                                <input type="file" class="form-control-file" name="image2">
                                            </div>
                                            <img src="{{ url('sertifikat', [$sertifikat->image2]) }}" class="img-fluid pt-2" alt="">
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
