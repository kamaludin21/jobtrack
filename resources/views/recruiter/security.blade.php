@extends('layouts.main')

@section('status-vacancy') active
@endsection

@section('content')
<div class="container pt-4">
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <div class="row">
        <div class="col-md-12">
          @include('layouts.alert')
            <div class="card">
                <div class="">
                    @if(empty($company))
                    <img src="{{ asset('img/recruiter/sampul/office.jpg') }}" class="card-img-top" alt="Foto sampul">
                    @else
                    <img src="{{ url('img/recruiter/sampul', [$company->sampul]) }}" class="card-img-top" alt="Foto sampul">
                    @endif
                </div>
                <div class="card-body" style="border-top: 1px solid rgba(0, 0, 0, 0.125);">
                    <div class="mt-n6 mb-2">
                        @if(empty($company))
                        <img src="{{ asset('img/recruiter/profil/company.png') }}" alt="..." class="img-thumbnail">
                        @else
                        <img src="{{ url('img/recruiter/profil', [$company->profil]) }}" alt="..." class="img-thumbnail" alt="Foto profil">
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-9">

                            @if(empty($company))
                            <h4 class="mb-n1">{{ Auth::user()->name }}</h4>
                            <small class="text-danger">Lengkapi profil anda, tekan tombol edit profil!</small>
                            @else
                            @if($company->status == 'verify')
                                <h4 class="mb-n1">{{ $company->name }}</h4>
                                <small class="text-muted">
                                    <em>Akun ini terverifikasi</em>
                                    <i class="fa fa-check-circle fa-lg text-primary" data-toggle="tooltip" data-placement="right" title="Akun resmi terverifikasi"></i>
                                </small>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="pr-4 pt-4 pl-4">
                    <h5>Informasi akun</h5>
                    <hr>
                </div>
                <div class="card-body mt-n4">
                  <div class="row">
                    <div class="col-md-6">
                      <p>
                          <strong>Informasi Umum</strong>
                      </p>
                      <form method="POST" action="{{ url('recruiter/account/umum', [$user->id]) }}" class="px-1">
                          <input type="hidden" name="_method" value="PATCH">
                        @csrf
                          <div class="form-group">
                              <label for="">Nama</label>
                              <input type="text" class="form-control form-control-sm" name="name" placeholder="Nama akun" value="{{ $user->name }}" autocomplete="off" required>
                          </div>
                          <div class="form-group">
                              <label for="">Email</label>
                              <input type="text" class="form-control form-control-sm" name="email" placeholder="Email akun" value="{{ $user->email }}" autocomplete="off" required>
                          </div>
                          <button type="submit" class="btn btn-sm btn-primary">
                              Simpan
                          </button>
                      </form>
                    </div>
                    <div class="col-md-6">
                      <p class="">
                          <strong>Keamanan</strong>
                      </p>
                      @foreach ($errors->all() as $error)
                      <p class="text-danger"><small>{{ $error }}</small></p>
                      @endforeach

                      <form class="" action="{{ url('recruiter/account/password') }}" method="post">
                          @csrf
                          <div class="form-group">
                              <label for="">Kata sandi lama</label>
                              <input type="password" class="form-control form-control-sm" name="current_password" placeholder="Masukkan kata sandi lama" autocomplete="off">
                          </div>
                          <div class="form-group">
                              <label for="">Kata sandi baru</label>
                              <input type="password" class="form-control form-control-sm" name="new_password" placeholder="Masukkan kata sandi baru" autocomplete="off">
                          </div>
                          <div class="form-group">
                              <label for="">Kata sandi baru</label>
                              <input type="password" class="form-control form-control-sm" name="new_confirm_password" placeholder="Masukkan kata sandi baru" autocomplete="off">
                          </div>
                          <button type="submit" class="btn  btn-sm btn-primary">
                              Simpan
                          </button>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
