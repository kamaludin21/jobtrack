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
                                  <strong>Tambah Sertifikat</strong>
                              </p>
                                <form method="POST" action="{{ url('user/sertifikat/store') }}" class="px-1" enctype="multipart/form-data">
                                  @csrf
                                    <div class="form-group">
                                        <label for="desc">Judul sertifikat</label>
                                        <input type="text" name="title" class="form-control form-control-sm" placeholder="Ex. Sertifikasi memasak">
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Instansi</label>
                                        <input type="text" name="instansi" class="form-control form-control-sm" placeholder="Nama perusahaan sertifikasi">
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Deskripsi singkat</label>
                                        <textarea name="description" class="form-control form-control-sm" rows="2" placeholder="Max. 100 huruf"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Berlaku Dari</label>
                                                <input type="date" class="form-control form-control-sm" name="dari" placeholder="Masa berlaku">
                                            </div>
                                        </div>
                                        {{-- <div class="col">
                                            <div class="form-group">
                                                <label for="">Sampai</label>
                                                <input type="date" class="form-control form-control-sm" name="sampai" placeholder="*Dalam angka">
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Foto 1</label>
                                                <input type="file" class="form-control-file" name="image1">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Foto 2</label>
                                                <input type="file" class="form-control-file" name="image2">
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
