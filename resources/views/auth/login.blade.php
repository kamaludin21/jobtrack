@extends('layouts.main')

@section('content')
<div class="container pt-5">
    <div class="row featurette">
        <div class="col-md-5 pt-5">
            <h5 class="featurette-heading">Belum terdaftar? Gabung sekarang</h5>
            <button class="btn btn-lg btn-outline-primary">Register</button>
        </div>
        <div class="col-md-1">

        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">Login here</h5>
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
    </div>
    <hr class="featurette-divider">
    <div class="row featurette">
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
            <button class="btn btn-lg btn-outline-primary">Login</button>
        </div>
    </div>
</div>
@endsection
