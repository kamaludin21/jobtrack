@extends('layouts.main')

@section('content')
<div class="container pt-5">
    <div class="row mb-2">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="row card no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <div class="card-header">
                                  {{ $user->name }}
                            </div>
                            <div>
                              <div class="float-right d-flex">
                                <img src="{{ url('img/profil', [$profil->profil]) }}" class="img-thumbnail" width="200px">
                              </div>
                                @if(empty($profil))
                                <p class="text-danger">Silahkan lengkapi profil anda</p>
                                @else
                                <div class="ml-n3 pl-1">
                                  <dl class="row mt-2">
                                      <dt class="col-sm-3">Tentang saya</dt>
                                      <dd class="col-sm-9">{{ $profil->description }}</dd>

                                      <dt class="col-sm-3">Status</dt>
                                      <dd class="col-sm-9">
                                          @if($profil->status == 'YES')
                                              <span class="badge badge-pill badge-success">Mencari Kerja</span>
                                              @else
                                              <span class="badge badge-pill badge-danger">Tidak Mencari</span>
                                              @endif
                                      </dd>

                                      <dt class="col-sm-3">Gaji yang diharapkan</dt>
                                      <dd class="col-sm-9">Rp. {{ number_format($profil->gaji) }}</dd>

                                      <dt class="col-sm-3">Ttl</dt>
                                      <dd class="col-sm-9">{{ $profil->ttl }}</dd>

                                      <dt class="col-sm-3">Jenis Kelamin</dt>
                                      <dd class="col-sm-9">{{ $profil->kelamin }}</dd>

                                      <dt class="col-sm-3">Alamat</dt>
                                      <dd class="col-sm-9">{{ $profil->alamat }}</dd>

                                      <dt class="col-sm-3">Agama</dt>
                                      <dd class="col-sm-9">{{ $profil->agama }}</dd>
                                  </dl>
                                </div>
                                <p class="lead">
                                    <span class="font-weight-bold">Kontak</span>
                                </p>
                                <hr>
                                <dl class="row mt-2">
                                    <dt class="col-sm-3">Email</dt>
                                    <dd class="col-sm-9">{{ $profil->email }}</dd>
                                    <dt class="col-sm-3">No. HP</dt>
                                    <dd class="col-sm-9">{{ $profil->telp }}</dd>
                                    <dt class="col-sm-3">Facebook</dt>
                                    <dd class="col-sm-9">
                                        <a href="#">{{ $profil->social1 }}</a>
                                    </dd>
                                    <dt class="col-sm-3">Linkedin</dt>
                                    <dd class="col-sm-9">
                                        <a href="#">{{ $profil->social2 }}</a>
                                    </dd>
                                </dl>
                                @endif
                                <p class="lead">
                                    <span class="font-weight-bold">Riwayat Pendidikan</span>
                                    <hr>
                                    <dl class="row mt-2">
                                        @if(count($pendidikan) == 0)
                                        <p class="text-danger ml-3">Belum ada data pendidikan</p>
                                        @else
                                        @foreach ($pendidikan as $pendidikan)
                                        <dt class="col-sm-3">{{ $pendidikan->instansi }}</dt>
                                        <dd class="col-sm-9">{{ $pendidikan->pendidikan }} &bull; {{ $pendidikan->angkatan }}

                                        </dd>
                                        @endforeach
                                        @endif
                                    </dl>

                                    <p class="lead">
                                        <span class="font-weight-bold">Skill</span>
                                    </p>
                                    <hr>
                                    @if(count($skill) == 0)
                                    <p class="text-danger">
                                        Skill anda masih kosong
                                    </p>
                                    @else
                                    <ul>
                                        @foreach ($skill as $skill)
                                        <li>{{ $skill->skill }} <small>{{ $skill->level }}</small> </li>
                                        @endforeach
                                    </ul>
                                    @endif

                                    <p class="lead">
                                        <span class="font-weight-bold">Pengalaman</span>
                                    </p>
                                    <hr>
                                    @if(count($pengalaman) == 0)
                                    <p class="text-danger">Anda belum mempunyai data pengalaman</p>
                                    @else
                                    @foreach ($pengalaman as $pengalaman)
                                    <dl class="row mt-2">
                                        <dt class="col-sm-4">
                                            {{ $pengalaman->dari }} - {{ $pengalaman->sampai }}
                                            <br>
                                            <div class="text-muted">
                                                2 years 1 month
                                            </div>
                                        </dt>
                                        <dd class="col-sm-8">
                                            <div class="">
                                                <h4>{{ $pengalaman->title }}
                                                </h4>
                                                <h6>{{ $pengalaman->intansi }} | {{ $pengalaman->daerah }}</h6>
                                                <hr>
                                                <dl class="row">
                                                    <dt class="col-sm-4">Industri</dt>
                                                    <dd class="col-sm-8">{{ $pengalaman->industri }}</dd>
                                                    <dt class="col-sm-4">Spesialisasi</dt>
                                                    <dd class="col-sm-8">{{ $pengalaman->spesialisasi }}</dd>
                                                    <dt class="col-sm-4">Bidang pekerjaan</dt>
                                                    <dd class="col-sm-8">{{ $pengalaman->bidang }}</dd>
                                                    <dt class="col-sm-4">Jabatan</dt>
                                                    <dd class="col-sm-8">{{ $pengalaman->jabatan }}</dd>
                                                    <dt class="col-sm-4">Gaji bulanan</dt>
                                                    <dd class="col-sm-8"> IDR {{ $pengalaman->gaji }}</dd>
                                                </dl>
                                            </div>
                                        </dd>
                                    </dl>
                                    @endforeach
                                    @endif
                                    <p class="lead">
                                        <span class="font-weight-bold">Sertifikat</span>
                                    </p>
                                    <hr>
                                    @if(count($certificate) == 0)
                                    <p class="text-danger">
                                        Sertifikat anda masih kosong
                                    </p>
                                    @else
                                    @foreach ($certificate as $certificate)
                                    <dl class="row mt-2">
                                        <dt class="col-sm-4">
                                            {{ $certificate->dari }} - {{ $certificate->sampai }}
                                            <br>
                                            <div class="text-muted">
                                                3 years
                                            </div>

                                        </dt>
                                        <dd class="col-sm-8">
                                            <div class="">
                                                <h4>{{ $certificate->title }}</h4>
                                                <h6>{{ $certificate->instansi }}</h6>
                                                <hr>
                                                <dl class="row">
                                                    <dt class="col-sm-2">Desc</dt>
                                                    <dd class="col-sm-10">
                                                        <small>{{ $certificate->description }}</small>
                                                    </dd>
                                                    <dt class="col-sm-6">
                                                        <img src="{{ url('sertifikat', [$certificate->image1]) }}" class="img-fluid" alt="">
                                                    </dt>
                                                    <dd class="col-sm-6">
                                                        <img src="{{ url('sertifikat', [$certificate->image2]) }}" class="img-fluid" alt="">
                                                    </dd>
                                                </dl>
                                            </div>
                                        </dd>
                                    </dl>
                                    @endforeach

                                    @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection
