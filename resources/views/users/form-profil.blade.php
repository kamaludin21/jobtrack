@extends('layouts.main')

@section('user-profil')
nav-user-active
@endsection

@section('content')
<div class="container pt-5">
    <div class="row mb-2">
        @include('layouts.users-nav')
        <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
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
                              @if(empty($profil))
                                <form method="POST" action="{{ url('user/profil/store') }}" class="px-1">
                                  @csrf
                                    <div class="form-group">
                                        <label for="desc">Deskripsi tentang diri anda</label>
                                        <textarea class="form-control form-control-sm" name="description" rows="5"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Tempat lahir</label>
                                                <input type="text" class="form-control form-control-sm" name="tempat" placeholder="*Dalam angka">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Tanggal lahir</label>
                                                <input type="date" class="form-control form-control-sm" name="tgl" placeholder="*Dalam angka">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                          <div class="form-group">
                                              <label for="">Agama</label>
                                              <input type="text" name="Agama" class="form-control form-control-sm" placeholder="Agama">
                                          </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Jenis Kelamin</label>
                                                <select class="form-control form-control-sm" name="kelamin">
                                                  <option value="Laki-laki">Laki-laki</option>
                                                  <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <input type="text" name="alamat" class="form-control form-control-sm" placeholder="Alamat tempat tinggal">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" name="email" class="form-control form-control-sm" placeholder="Email aktif">
                                    </div>
                                    <div class="form-group">
                                        <label for="">No. Telp</label>
                                        <input type="text" name="telp" class="form-control form-control-sm" placeholder="Nomor telpon aktif">
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Sosial Media 1</label>
                                                <input type="text" class="form-control form-control-sm" name="social1" placeholder="Your social media link">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Sosial Media 2</label>
                                                <input type="text" class="form-control form-control-sm" name="social2" placeholder="Your social media link">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                              @else
                                {{-- Update --}}
                                <form method="POST" action="{{ url('recruiter/profil/update') }}" class="px-1">
                                  @csrf
                                    <div class="form-group">
                                        <label for="desc">Deskripsi tentang diri anda</label>
                                        <textarea class="form-control form-control-sm" name="description" rows="5">{{ $profil->description }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Tempat lahir</label>
                                                <input type="text" class="form-control form-control-sm" name="profil" placeholder="*Dalam angka">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Tanggal lahir</label>
                                                <input type="date" class="form-control form-control-sm" name="sampul" placeholder="*Dalam angka">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Agama</label>
                                        <input type="text" name="name" class="form-control form-control-sm" placeholder="Nama perusahaan">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Agama</label>
                                        <input type="text" name="name" class="form-control form-control-sm" placeholder="Nama perusahaan">
                                    </div>
                                    <div class="form-group">
                                        <label for="">No. Telp</label>
                                        <input type="text" name="name" class="form-control form-control-sm" placeholder="Nama perusahaan">
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Sosial Media 1</label>
                                                <input type="text" class="form-control form-control-sm" name="profil" placeholder="*Dalam angka">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Sosial Media 2</label>
                                                <input type="date" class="form-control form-control-sm" name="sampul" placeholder="*Dalam angka">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                              @endif
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
