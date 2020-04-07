@extends('layouts.main')

@section('status-vacancy') active
@endsection

@section('content')
<div class="container pt-4">
    @include('layouts.alert')
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="pr-4 pt-4 pl-4">
                    <h5>Kelola lowongan</h5>
                    <hr>
                </div>
                <div class="px-4">
                    <p class="font-weight-bold">Deskripsi
                    </p>
                    <div class="row">
                        <div class="col">
                            <p>Tiket : {{ $vacancy->ticket }} - {{ $vacancy->id }}</p>
                            <p>
                                Jabatan : {{ $vacancy->title }}
                            </p>
                        </div>
                        <div class="col">
                            <p>Lokasi Penempatan : {{ $vacancy->daerah }}</p>
                            <p>
                                Expired : {{ $vacancy->expired }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="font-weight-bold">Pelamar - Belum proses</p>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Keahlian</th>
                                <th scope="col">Pendidikan Terakhir</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($lamaran) == 0)
                            <p>Belum ada pelamar</p>
                            @else
                            @php($i = 1)
                            @foreach ($lamaran as $lamaran)
                            <tr>
                                <td scope="col">{{ $i }}.</td>
                                <td scope="col">
                                    <a href="{{ url('recruiter/applicants', [$lamaran->id]) }}" class="text-decoration-none" target="_blank">
                                        {{ $lamaran->name }}
                                    </a>
                                </td>
                                <td scope="col">
                                    @php($skil = explode(',', $lamaran->skill))
                                    @foreach ($skil as $key)
                                    <span class="badge badge-pill badge-dark">{{ $key }}</span><br>

                                    @endforeach
                                </td>
                                <td scope="col">
                                    @php($echo = explode(',', $lamaran->pendidikan))
                                    @foreach ($echo as $key)
                                    &bull; {{ Str::limit($key, 20, '...') }}
                                    <br>
                                    @endforeach
                                </td>
                                <td scope="col">

                                    <form action="{{ url('recruiter/updatestatus', [$lamaran->idLamar]) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="PATCH">
                                        <input type="hidden" name="pageId" value="{{ $vacancy->id }}">
                                        <div class="input-group input-group-sm">
                                            <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="status">
                                                <option value="1" @if($lamaran->status == '1') selected @endif>Belum proses</option>
                                                <option value="2" @if($lamaran->status == '2') selected @endif>Administrasi</option>
                                                <option value="3" @if($lamaran->status == '3') selected @endif>Interview</option>
                                                <option value="3" @if($lamaran->status == '4') selected @endif>Tolak</option>
                                                <option value="3" @if($lamaran->status == '5') selected @endif>Terima</option>
                                            </select>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary" type="submit">
                                                    <i class="fa fa-send"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>

                            @php($i++)@endforeach

                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-3 ">
            <div class="card">
                <div class="p-4">
                    <h5>Statistik</h5>
                    <hr>
                    <div class="pt-3">
                        <p class="p-1 pl-2 border">
                            <i class="fa fa-info-circle pr-1"></i> Belum proses
                            <span class="badge badge-pill badge-primary ml-1">0</span>
                        </p>
                        <p class="p-1 pl-2 border">
                            <i class="fa fa-file pr-1"></i> Administrasi
                            <span class="badge badge-pill badge-primary ml-1">0</span>
                        </p>
                        <p class="p-1 pl-2 border">
                            <i class="fa fa-black-tie pr-1"></i> Interview
                            <span class="badge badge-pill badge-primary ml-1">0</span>
                        </p>
                        <p class="p-1 pl-2 border">
                            <i class="fa fa-times pr-1"></i> Tolak
                            <span class="badge badge-pill badge-primary ml-1">0</span>
                        </p>
                        <p class="p-1 pl-2 border">
                            <i class="fa fa-check-square pr-1"></i> Diterima
                            <span class="badge badge-pill badge-primary ml-1">0</span>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
