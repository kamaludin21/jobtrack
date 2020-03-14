@extends('layouts.main')

@section('content')
<div style="background-image: url('{{ asset('img/computer.jpg') }}');">
    <div class="container pt-5">
        <div class="row featurette py-6" id="login">
            <div class="col-md-5 pt-5">
                <h5 class="featurette-heading">Belum terdaftar? Gabung sekarang</h5>
                <button class="btn btn-lg btn-outline-primary" onclick="auth()">Register</button>
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-4">Login here</h5>
                        <form method="POST" action="{{ route('login') }}">
                            <div class="form-group">
                                <label for="email">Username/email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>
                            <button type="submit" type="button" class="btn btn-block btn-lg btn-outline-success">LOGIN</button>
                            <a href="#" class="btn btn-block btn-outline-link">Lupa Password?</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="row featurette" id="register" style="display: none;">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-4">Register here</h5>
                        <form>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Username/email</label>
                                <input type="search" class="form-control" id="formGroupExampleInput" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Password</label>
                                <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Password">
                            </div>
                            <button class="btn btn-block btn-lg btn-outline-success">LOGIN</button>
                            <button class="btn btn-block btn-outline-link">Lupa Password?</button>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-5 pt-5">
                <h5 class="featurette-heading">Sudah terdaftar? login sekarang</h5>
                <button class="btn btn-lg btn-outline-primary" onclick="auth()">Login</button>
            </div>
        </div>
    </div>
</div>
@endsection
