@extends('layouts.main')

@section('content')
<div class="container pt-5">
    <div class="row mb-2">
        @include('layouts.users-nav')
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <div class="card-header bg-c-donker">
                                <div class="lead">
                                    Lamaran
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <table class="table rounded-pill">
                                        <thead class="thead-small bg-c-donker text-white">
                                            <tr class="font-weight-light">
                                                <th scope="col">Job Site</th>
                                                {{-- <th scope="col">Company</th> --}}
                                                <th scope="col">Location</th>
                                                <th scope="col">Salary</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-left">
                                                    <a href="{{ url('lowongan-detail') }}" class="font-weight-light" style="text-decoration: none;">
                                                        <strong>
                                                            Backend Programmer
                                                        </strong>
                                                    </a>
                                                    <br>
                                                    <a href="#" class="text-muted">PT BNI 46
                                                        <i class="fa fa-check-circle fa-lg text-primary pt-2" data-toggle="tooltip" data-placement="right" title="Akun resmi terverifikasi"></i>
                                                    </a>
                                                </td>
                                                <td>Pekanbaru</td>
                                                <td>
                                                    Rp. 1.000.000 - 5.000.000
                                                    <p>
                                                        <small>IDR/Month</small>
                                                    </p>
                                                </td>
                                                <td>
                                                    <span class="badge badge-success">PROSES</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">
                                                    <a href="{{ url('lowongan-detail') }}" class="font-weight-light" style="text-decoration: none;">
                                                        <strong>
                                                            Digital Marketing Specialist
                                                        </strong>
                                                    </a>
                                                    <br>
                                                    <a href="#" class="text-muted">
                                                        Niagahoster
                                                        <i class="fa fa-check-circle fa-lg text-primary pt-2" data-toggle="tooltip" data-placement="right" title="Akun resmi terverifikasi"></i>
                                                    </a>
                                                </td>
                                                <td>Bandung</td>
                                                <td>
                                                    Rp. 12.000.000 - 15.000.000
                                                    <p>
                                                        <small>IDR/Month</small>
                                                    </p>
                                                </td>
                                                <td>
                                                    <span class="badge badge-success">PROSES</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">
                                                    <a href="{{ url('lowongan-detail') }}" class="font-weight-light" style="text-decoration: none;">
                                                        <strong>
                                                            iOS Developer
                                                        </strong>
                                                    </a>
                                                    <br>
                                                    <a href="#" class="text-muted">
                                                        Mitramas Global
                                                    </a>
                                                </td>
                                                <td>Jogjakarta</td>
                                                <td>
                                                    Rp. 90.000.000
                                                    <p>
                                                        <small>IDR/Year</small>
                                                    </p>
                                                </td>
                                                <td>
                                                    <span class="badge badge-danger">REJECT</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

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
