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
                                Profil
                              </div>
                          </div>
                            <div class="mt-2">
                                <div class="">
                                    <p class="lead">
                                        <strong>Data Diri</strong>
                                        <button class="btn btn-sm btn-outline-primary float-right">
                                            <i class="fa fa-pencil"></i>
                                            Sunting</button>
                                    </p>
                                </div>
                                <hr>
                                <dl class="row mt-2">
                                    <dt class="col-sm-3">Nama</dt>
                                    <dd class="col-sm-9">Kamaludin</dd>

                                    <dt class="col-sm-3">Ttl</dt>
                                    <dd class="col-sm-9">Selatpanjang, 21 Juni 2019</dd>

                                    <dt class="col-sm-3">Jenis Kelamin</dt>
                                    <dd class="col-sm-9">Laki-laki</dd>

                                    <dt class="col-sm-3">Alamat</dt>
                                    <dd class="col-sm-9">Selatpanjang, Kab. Kepulauan Meranti</dd>

                                    <dt class="col-sm-3">Agama</dt>
                                    <dd class="col-sm-9">Islam</dd>

                                    <dt class="col-sm-3">Warga Negara</dt>
                                    <dd class="col-sm-9">Indonesia</dd>

                                </dl>

                                <p class="lead">
                                    <strong>Kontak</strong>
                                    <button class="btn btn-sm btn-outline-primary float-right">
                                        <i class="fa fa-pencil"></i>
                                        Sunting</button>
                                </p>
                                <hr>
                                <dl class="row mt-2">
                                    <dt class="col-sm-3">Email</dt>
                                    <dd class="col-sm-9">kamal.zyel@gmail.com</dd>
                                    <dt class="col-sm-3">No. HP</dt>
                                    <dd class="col-sm-9">085220217759</dd>
                                    <dt class="col-sm-3">Facebook</dt>
                                    <dd class="col-sm-9">
                                        <a href="#">https://facebook.com/kamaludin21</a>
                                    </dd>
                                    <dt class="col-sm-3">Linkedin</dt>
                                    <dd class="col-sm-9">
                                        <a href="#">
                                            https://linkedin.com/kamaludin21
                                        </a>
                                    </dd>
                                </dl>

                                <p class="lead">
                                    <strong>Riwayat Pendidikan</strong>
                                    <button class="btn btn-sm btn-outline-primary float-right">
                                        <i class="fa fa-pencil"></i>
                                        Sunting</button>
                                </p>
                                <hr>
                                <dl class="row mt-2">
                                    <dt class="col-sm-3">SMA</dt>
                                    <dd class="col-sm-9">MAN Selatpanjang</dd>
                                    <dt class="col-sm-3">S1</dt>
                                    <dd class="col-sm-9">TIF UIN SUSKA RIAU (Ongoing)</dd>
                                </dl>

                                <p class="lead">
                                    <strong>Skill</strong>
                                    <button class="btn btn-sm btn-outline-primary float-right">
                                        <i class="fa fa-pencil"></i>
                                        Sunting</button>
                                </p>
                                <hr>
                                <ul>
                                    <li>HTML</li>
                                    <li>CSS</li>
                                    <li>Javascript</li>
                                </ul>

                                <p class="lead">
                                    <strong>Pengalaman</strong>
                                    <button class="btn btn-sm btn-outline-primary float-right">
                                        <i class="fa fa-plus"></i>
                                        Tambah</button>
                                </p>
                                <hr>
                                <dl class="row mt-2">
                                    <dt class="col-sm-4">
                                        2020 Januari - 2021 Desember
                                        <br>
                                        <div class="text-muted">
                                            2 years 1 month
                                        </div>

                                    </dt>
                                    <dd class="col-sm-8">
                                        <div class="">
                                            <h4>Programmer
                                              <div class="float-right">
                                                <a class="btn btn-sm btn-outline-link text-primary">
                                                    <i class="fa fa-pencil"></i>
                                                    Sunting</a>
                                                <a class="btn btn-sm btn-outline-link text-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                              </div>
                                            </h4>
                                            <h6>PT. BNI 46 | Riau, Indonesia</h6>
                                            <hr>
                                            <dl class="row">
                                                <dt class="col-sm-4">Industri</dt>
                                                <dd class="col-sm-8"> Komputer / Teknik Informatika (Perangkat Lunak)</dd>
                                                <dt class="col-sm-4">
                                                    Spesialisasi</dt>
                                                <dd class="col-sm-8"> IT/Komputer - Perangkat Lunak (Perangkat Lunak)</dd>
                                                <dt class="col-sm-4">Bidang pekerjaan</dt>
                                                <dd class="col-sm-8"> Teknisi/Programer Perangkat Lunak</dd>
                                                <dt class="col-sm-4">Jabatan</dt>
                                                <dd class="col-sm-8"> Pegawai (non-manajemen & non-supervisor)</dd>
                                                <dt class="col-sm-4">Gaji bulanan</dt>
                                                <dd class="col-sm-8"> IDR 8,000,000</dd>
                                            </dl>
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="row mt-2">
                                    <dt class="col-sm-4">
                                        2020 Januari - 2021 Desember
                                        <br>
                                        <div class="text-muted">
                                            2 years 1 month
                                        </div>

                                    </dt>
                                    <dd class="col-sm-8">
                                        <div class="">
                                            <h4>Programmer
                                                <div class="float-right">
                                                  <a class="btn btn-sm btn-outline-link text-primary">
                                                      <i class="fa fa-pencil"></i>
                                                      Sunting</a>
                                                  <a class="btn btn-sm btn-outline-link text-danger">
                                                      <i class="fa fa-trash"></i>
                                                  </a>
                                                </div>
                                            </h4>
                                            <h6>PT. BNI 46 | Riau, Indonesia</h6>
                                            <hr>
                                            <dl class="row">
                                                <dt class="col-sm-4">Industri</dt>
                                                <dd class="col-sm-8"> Komputer / Teknik Informatika (Perangkat Lunak)</dd>
                                                <dt class="col-sm-4">
                                                    Spesialisasi</dt>
                                                <dd class="col-sm-8"> IT/Komputer - Perangkat Lunak (Perangkat Lunak)</dd>
                                                <dt class="col-sm-4">Bidang pekerjaan</dt>
                                                <dd class="col-sm-8"> Teknisi/Programer Perangkat Lunak</dd>
                                                <dt class="col-sm-4">Jabatan</dt>
                                                <dd class="col-sm-8"> Pegawai (non-manajemen & non-supervisor)</dd>
                                                <dt class="col-sm-4">Gaji bulanan</dt>
                                                <dd class="col-sm-8"> IDR 4,000,000</dd>
                                            </dl>
                                        </div>
                                    </dd>
                                </dl>
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
