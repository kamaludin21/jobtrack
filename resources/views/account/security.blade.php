@extends('layouts.main')

@section('content')
<div class="container pt-5">
    <div class="row mb-2">
        @include('layouts.users-nav')
        <div class="col-md-9">
          @include('layouts.alert')
            <div class="row">
                <div class="col-md-12">
                    <div class="row card no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <div class="card-header bg-c-donker">
                                <div class="lead">
                                    Pengaturan akun
                                </div>
                            </div>
                            <div class="mt-2">
                                <form method="POST" action="{{ url('user/account/umum', [$user->id]) }}" class="px-1">
                                    @csrf
                                    <input type="hidden" name="_method" value="PATCH">
                                    <p>
                                        <strong>Informasi Umum</strong>
                                    </p>
                                    <form class="" action="index.html" method="post">
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
                                    <hr>
                                    <p class="">
                                        <strong>Keamanan</strong>
                                    </p>
                                      @foreach ($errors->all() as $error)
                                          <p class="text-danger"><small>{{ $error }}</small></p>
                                       @endforeach

                                    <form class="" action="{{ url('user/account/password') }}" method="post">
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
