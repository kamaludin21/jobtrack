@extends('layouts.main')

@section('status-vacancy') active
@endsection

@section('content')
<div class="container pt-4">
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="pr-4 pt-4 pl-4">
                    <h5>Profil Perusahaan</h5>
                    <hr>
                </div>
                <div class="card-body mt-n4">
                    @if(empty($company))
                      <form method="POST" action="{{ url('recruiter/profil/store') }}" class="px-1" enctype="multipart/form-data">
                        @csrf
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                  <label for="">Nama Perusahaan</label>
                                  <input type="text" name="name" class="form-control form-control-sm" placeholder="Nama perusahaan">
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                  <label for="">Bergerak dibidang</label>
                                  <select class="form-control form-control-sm" name="bidang">
                                      <option value="Banda Aceh">Konstruksi bangunan</option>
                                      <option value="Denpasar">IT Software</option>
                                      <option value="Bengkulu">Firma Hukum</option>
                                  </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                              <label for="desc">Deskripsi tentang perusahaan anda</label>
                              <textarea name="description" rows="3" placeholder="Deskripsikan perusahaan anda"></textarea>
                              <script>
                                CKEDITOR.replace( 'description' );
                              </script>
                          </div>
                          <div class="form-group">
                              <label for="">Alamat</label>
                              <textarea name="alamat" rows="2" class="form-control form-control-sm" placeholder="Alamat lengkap perusahaan"></textarea>
                          </div>

                          <div class="form-group">
                              <label for="website">Alamat Website</label>
                              <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon3">https://</span>
                                </div>
                                <input type="text" name="website" class="form-control form-control-sm" id="website" aria-describedby="basic-addon3" placeholder="Alamat website official">
                              </div>
                          </div>
                          <div class="row">
                              <div class="col">
                                  <div class="form-group">
                                      <label for="">Foto Profil</label>
                                      <input type="file" class="form-control-file" name="profil">
                                  </div>
                              </div>
                              <div class="col">
                                  <div class="form-group">
                                      <label for="">Foto Sampul</label>
                                      <input type="file" class="form-control-file" name="sampul">
                                  </div>
                              </div>
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    @else
                      {{-- Update --}}
                      <form method="POST" action="{{ url('recruiter/profil/store') }}" class="px-1" enctype="multipart/form-data">
                        @csrf
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                  <label for="">Nama Perusahaan</label>
                                  <input type="text" name="name" class="form-control form-control-sm" placeholder="Nama perusahaan" value="{{ $company->name }}">
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                  <label for="">Bergerak dibidang</label>
                                  <select class="form-control form-control-sm" name="bidang">
                                      <option value="Banda Aceh">Konstruksi bangunan</option>
                                      <option value="Denpasar">IT Software</option>
                                      <option value="Bengkulu">Firma Hukum</option>
                                  </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                              <label for="desc">Deskripsi tentang perusahaan anda</label>
                              <textarea name="description" rows="3" placeholder="Deskripsikan perusahaan anda">{{ $company->description }}</textarea>
                              <script>
                                CKEDITOR.replace( 'description' );
                              </script>
                          </div>
                          <div class="form-group">
                              <label for="">Alamat</label>
                              <textarea name="alamat" rows="2" class="form-control form-control-sm" placeholder="Alamat lengkap perusahaan">{{ $company->alamat }}</textarea>
                          </div>

                          <div class="form-group">
                              <label for="website">Alamat Website</label>
                              <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon3">https://</span>
                                </div>
                                <input type="text" name="website" class="form-control form-control-sm" id="website" aria-describedby="basic-addon3" placeholder="Alamat website official" value="{{ $company->website }}">
                              </div>
                          </div>
                          <div class="row">
                              <div class="col">
                                  <div class="form-group">
                                      <label for="">Foto Profil</label>
                                      <input type="file" class="form-control-file" name="profil">
                                  </div>
                              </div>
                              <div class="col">
                                  <div class="form-group">
                                      <label for="">Foto Sampul</label>
                                      <input type="file" class="form-control-file" name="sampul">
                                  </div>
                              </div>
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
