@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 show-forms">
            <span class="show-register-form active">Registrasi akun perusahaan</span>
        </div>
    </div>

    <div class="row register-form">
        <div class="col-sm-4 col-sm-offset-1">
            <form method="POST" action="{{ route('register') }}" role="form" class="r-form">
              <input type="hidden" name="level" value="2">
                @csrf
                <div class="form-group">
                    <label class="sr-only" for="name">First name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Your name" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="sr-only" for="email">Email</label>
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="your.email@valid.com" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="sr-only" for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Your password" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="sr-only" for="password-confirm">Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Your password again" required autocomplete="new-password">
                </div>
                <button type="submit" class="btn">Sign me up!</button>
            </form>
        </div>
        <div class="col-sm-6 forms-right-icons">
            <div class="row">
                <div class="col-sm-2 icon"><i class="fa fa-pencil"></i></div>
                <div class="col-sm-10">
                    <h3>Lengkapi data</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 icon"><i class="fa fa-commenting"></i></div>
                <div class="col-sm-10">
                    <h3>Ikuti sesuai dengan prosedur</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 icon"><i class="fa fa-magic"></i></div>
                <div class="col-sm-10">
                    <h3>Nikmati fitur yang unggul</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                </div>
            </div>
        </div>
    </div>



</div>
@endsection
