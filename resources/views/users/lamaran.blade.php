@extends('layouts.main')

@section('user-lamaran')
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
                                    Lamaran
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <table class="table rounded-pill">
                                        <thead class="thead-small bg-c-donker text-white">
                                            <tr class="font-weight-light">
                                                <th scope="col">Job Site</th>
                                                <th scope="col">Location</th>
                                                <th scope="col">Salary</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(empty($lamaran))
                                            <p>Anda belum Anda melamar</p>
                                            @else
                                            @foreach ($lamaran as $lamaran)
                                            <tr>
                                                <td class="text-left">
                                                    <a href="{{ url('lowongan/detail', [$lamaran->ticket]) }}" class="font-weight-light" style="text-decoration: none;">
                                                        <strong>
                                                            {{ $lamaran->title }}
                                                        </strong>
                                                    </a>
                                                    <br>
                                                    <a href="#" class="text-muted">
                                                      <small>{{ $lamaran->name }}
                                                          <i class="fa fa-check-circle fa-lg text-primary pt-2" data-toggle="tooltip" data-placement="right" title="Akun resmi terverifikasi"></i></small>
                                                    </a>
                                                </td>
                                                <td>{{ $lamaran->daerah }}</td>
                                                <td>
                                                    Rp. {{ number_format($lamaran->gajimin) }} - {{ number_format($lamaran->gajimax) }}
                                                    <p>
                                                        <small>IDR/Month</small>
                                                    </p>
                                                </td>
                                                <td>
                                                  @switch($lamaran->status)
                                                    @case(1)
                                                        <span class="badge badge-success">PROSES</span>
                                                        @break

                                                    @case(2)
                                                        <span class="badge badge-success">Administrasi</span>
                                                        @break
                                                    @case(3)
                                                        <span class="badge badge-success">Interview</span>
                                                        @break
                                                    @case(4)
                                                        <span class="badge badge-success">Terima</span>
                                                        @break
                                                    @case(5)
                                                        <span class="badge badge-success">Terima</span>
                                                        @break

                                                    @default
                                                        <span class="badge badge-success">PROSES</span>
                                                  @endswitch

                                                </td>
                                            </tr>
                                            @endforeach

                                            @endif


                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
