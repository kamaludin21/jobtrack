@extends('layouts.main')


@section('content')
<div class="container pt-5">
    <div class="row mb-2">
        <div class="col-12">
            <div class="card">
                <div class="">
                    <img src="{{ asset('img/office.jpg') }}" class="card-img-top" alt="Foto sampul">
                </div>
                <div class="card-body" style="border-top: 1px solid rgba(0, 0, 0, 0.125);">
                    <div class="mt-n6 mb-2">
                        <img src="{{ asset('img/argapro.png') }}" alt="..." class="img-thumbnail">
                        <button class="btn btn-primary float-right rounded-pill">
                            <i class="fa fa-camera"></i>&nbsp;
                            Upload Photo</button><br>
                        <a href="#" class="btn float-right btn-outline-primary rounded-pill" style="margin-top: -40px;">
                            <i class="fa fa-cog"></i>
                            Edit Profil
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <h4 class="mb-n1">PT BNI 46</h4>
                            <small class="text-muted">
                                <em>This account is verified</em>
                                <i class="fa fa-check-circle fa-lg text-primary" data-toggle="tooltip" data-placement="right" title="Akun resmi terverifikasi"></i>
                            </small>
                            <br>

                            <div class="mt-2">
                                <strong>Alamat</strong>
                                <p>
                                    Jl. Kebayoran Baru No.73<br />
                                    Kebayoran Lama - Jakarta Selatan<br />
                                    DKI Jakarta - 12240<br />
                                </p>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <strong>Industry</strong>
                                    <br>
                                    Information Technology / IT
                                </div>
                                <div class="col">
                                    <strong>Website</strong>
                                    <br>
                                    <a href="#">
                                        https://www.pricebook.co.id/
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mr-auto text-right pt-5">
                            <p><small>
                                    <span class="badge badge-pill badge-success">Online</span>
                                    &bull;
                                    <span class="badge badge-pill badge-danger">Offline</span></small></p>
                            <p class="mt-n3"><small>2 vacancies available</small></p>
                            <div class="text-justify" style="border-top: 1px solid rgba(0, 0, 0, 0.125);">
                                <p class="pt-2" style="line-height: 1.0;">
                                    <small>
                                        Feel secure when applying: look for the verified icon <i class="fa fa-check-circle text-primary"></i> and always do your research on a company. avoid and report if the content is suspicious
                                </p>
                                <a href="#" class="text-info">
                                    <i class="fa fa-flag"></i>
                                    Verify your account here
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">

        </div>
    </div>
    @endsection
