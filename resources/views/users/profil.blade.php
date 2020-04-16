@extends('layouts.main')

@section('user-profil')
nav-user-active
@endsection

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
                                    Profil
                                </div>
                            </div>
                            <div class="mt-2">
                                <div class="mt-2">
                                    <p class="lead">
                                        <span class="font-weight-bold">Data Diri</span>
                                        <a href="{{ url('user/profil/form') }}" class="btn btn-sm btn-outline-primary float-right"><i class="fa fa-pencil"></i>
                                            Sunting</a>
                                    </p>
                                </div>
                                <hr>
                                @if(empty($profil))
                                <p class="text-danger">Silahkan lengkapi profil anda</p>
                                @else
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
                                        <a href="https://facebook.com/{{ $profil->social1 }}" target="_blank">https://facebook.com/{{ $profil->social1 }}</a>
                                    </dd>
                                    <dt class="col-sm-3">Linkedin</dt>
                                    <dd class="col-sm-9">
                                        <a href="https://linkedin.com/{{ $profil->social1 }}{{ $profil->social2 }}" target="_blank">https://linkedin.com/{{ $profil->social2 }}</a>
                                    </dd>
                                </dl>
                                @endif
                                <p class="lead">
                                    <span class="font-weight-bold">Riwayat Pendidikan</span>
                                    <a href="{{ url('user/pendidikan/form') }}" class="btn btn-sm btn-outline-primary float-right">
                                        <i class="fa fa-plus"></i>
                                        Tambah</a>
                                    <hr>
                                    <dl class="row mt-2">
                                        @if(count($pendidikan) == 0)
                                        <p class="text-danger ml-3">Belum ada data pendidikan</p>
                                        @else
                                        @foreach ($pendidikan as $pendidikan)
                                        <dt class="col-sm-3">{{ $pendidikan->instansi }}</dt>
                                        <dd class="col-sm-9">{{ $pendidikan->pendidikan }} &bull; {{ $pendidikan->angkatan }}
                                            <span class="mt-n5">
                                              <form action="{{ url('user/pendidikan/destroy', [$pendidikan->id]) }}" class="d-flex" method="POST">
                                                <a href="{{ url('user/pendidikan/update', [$pendidikan->id]) }}" class="btn btn-sm btn-outline-link text-warning">
                                                    <small><i class="fa fa-pencil"></i></small>
                                                </a>

                                                  @csrf
                                                  @method('DELETE')
                                                  <input type="hidden" name="_method" value="DELETE">

                                                  <button class="btn btn-sm text-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                                      <small><i class="fa fa-trash"></i></small>
                                                  </button>
                                              </form>
                                            </span>
                                        </dd>
                                        @endforeach
                                        @endif
                                    </dl>

                                    <p class="lead">
                                        <span class="font-weight-bold">Skill</span>
                                        <a href="{{ url('user/skill/form') }}" class="btn btn-sm btn-outline-primary float-right">
                                            <i class="fa fa-plus"></i>
                                            Tambah</a>
                                    </p>
                                    <hr>
                                    @if(count($skill) == 0)
                                    <p class="text-danger">
                                        Skill anda masih kosong
                                    </p>
                                    @else
                                    <ul>
                                        @foreach ($skill as $skill)
                                        <li><form action="{{ url('user/skill/destroy', [$skill->id]) }}" class="d-flex" method="POST">
                                          {{ $skill->skill }} <small class="mt-1 mx-2">{{ $skill->level }}</small> &mdash;

                                              @csrf
                                              @method('DELETE')
                                              <input type="hidden" name="_method" value="DELETE">

                                              <button class="btn btn-sm text-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                                  <small><i class="fa fa-trash"></i></small>
                                              </button>
                                          </form>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif

                                    <p class="lead">
                                        <span class="font-weight-bold">Pengalaman</span>
                                        <a href="{{ url('user/pengalaman/form') }}" class="btn btn-sm btn-outline-primary float-right">
                                            <i class="fa fa-plus"></i>
                                            Tambah</a>
                                    </p>
                                    <hr>
                                    @if(count($pengalaman) == 0)
                                    <p class="text-danger">Anda belum mempunyai data pengalaman</p>
                                    @else
                                    @foreach ($pengalaman as $pengalaman)
                                    @php
                                    $sdate = $pengalaman->dari;
                                    $edate = $pengalaman->sampai;

                                    $date_diff = abs(strtotime($edate) - strtotime($sdate));

                                    $years = floor($date_diff / (365*60*60*24));
                                    $months = floor(($date_diff - $years * 365*60*60*24) / (30*60*60*24));
                                    $days = floor(($date_diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                    @endphp
                                    <dl class="row mt-2">
                                        <dt class="col-sm-4">
                                            {{ $pengalaman->dari }}  &mdash; {{ $pengalaman->sampai }}
                                            <br>
                                            <div class="text-muted">
                                                @php(printf("%d Tahun, %d bulan", $years, $months))
                                            </div>
                                        </dt>
                                        <dd class="col-sm-8">
                                            <div class="">
                                                <h4>{{ $pengalaman->title }}
                                                    <div class="float-right">
                                                      <form action="{{ url('user/pengalaman/destroy', [$pengalaman->id]) }}" class="d-flex" method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                          <a href="{{ url('user/pengalaman/update', [$pengalaman->id]) }}" class="btn btn-sm btn-outline-link text-primary">
                                                              <i class="fa fa-pencil"></i>
                                                              Sunting</a>
                                                          <button type="submit" class="btn btn-sm btn-outline-link text-danger"  onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                                              <i class="fa fa-trash"></i>
                                                          </button>
                                                        </form>
                                                    </div>
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
                                                    <dd class="col-sm-8"> IDR {{ number_format($pengalaman->gaji) }}</dd>
                                                </dl>
                                            </div>
                                        </dd>
                                    </dl>
                                    @endforeach
                                    @endif
                                    <p class="lead">
                                        <span class="font-weight-bold">Sertifikat</span>
                                        <a href="{{ url('user/sertifikat/form') }}" class="btn btn-sm btn-outline-primary float-right">
                                            <i class="fa fa-plus"></i>
                                            Tambah</a>
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
                                            {{ $certificate->dari }} &mdash; {{ $certificate->sampai }}


                                        </dt>
                                        <dd class="col-sm-8">
                                            <div class="">
                                                <h4>{{ $certificate->title }}
                                                    <div class="float-right">
                                                        <a href="{{ url('user/sertifikat/update', [$certificate->id]) }}" class="btn btn-sm btn-outline-link text-primary">
                                                            <i class="fa fa-pencil"></i>
                                                            Sunting</a>
                                                        <a class="btn btn-sm btn-outline-link text-danger">
                                                            <i class="fa fa-trash">D/i>
                                                        </a>
                                                    </div>
                                                </h4>
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
