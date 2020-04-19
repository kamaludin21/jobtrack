@extends('layouts.main')

@section('status-vacancy') active
@endsection

@section('content')
<div class="container pt-4">
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="">
                    @if(empty($company))
                    <img src="{{ asset('img/recruiter/sampul/office.jpg') }}" class="card-img-top" alt="Foto sampul">
                    @else
                    <img src="{{ url('img/recruiter/sampul', [$company->sampul]) }}" class="card-img-top" alt="Foto sampul">
                    @endif
                </div>
                <div class="card-body" style="border-top: 1px solid rgba(0, 0, 0, 0.125);">
                    <div class="mt-n6 mb-2">
                        @if(empty($company))
                        <img src="{{ asset('img/recruiter/profil/company.png') }}" alt="..." class="img-thumbnail">
                        @else
                        <img src="{{ url('img/recruiter/profil', [$company->profil]) }}" alt="..." class="img-thumbnail" alt="Foto profil">
                        @endif

                        <button class="btn btn-primary float-right rounded-pill">
                            <i class="fa fa-camera"></i>&nbsp;
                            Ubah Photo</button>
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-md-9">

                            @if(empty($company))
                            <h4 class="mb-n1">{{ Auth::user()->name }}</h4>
                            <small class="text-danger">Lengkapi profil anda, tekan tombol edit profil!</small>
                            @else
                            @if($company->status == 'verify')
                                <h4 class="mb-n1">{{ $company->name }}</h4>
                                <small class="text-muted">
                                    <em>Akun ini terverifikasi</em>
                                    <i class="fa fa-check-circle fa-lg text-primary" data-toggle="tooltip" data-placement="right" title="Akun resmi terverifikasi"></i>
                                </small>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="pr-4 pt-4 pl-4">
                    <h5>Profil Perusahaan</h5>
                    <hr>
                </div>
                <div class="card-body mt-n4">
                    @if(empty($company))
                    <form method="POST" action="{{ url('recruiter/profil/store') }}" class="px-1" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Nama Perusahaan</label>
                                    <input type="text" name="name" class="form-control form-control-sm" placeholder="Nama perusahaan">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Bergerak dibidang</label>
                                    <select class="form-control form-control-sm" name="bidang">
                                        <option value="Agribusiness">Agribusiness</option>
                                        <option value="Automotive">Automotive</option>
                                        <option value="Banking">Banking</option>
                                        <option value="Banking / Mortgage">Banking / Mortgage</option>
                                        <option value="Computer Software / Engineering">Computer Software / Engineering</option>
                                        <option value="Consumer Goods">Consumer Goods</option>
                                        <option value="Education Management">Education Management</option>
                                        <option value="E-Commerce">E-Commerce</option>
                                        <option value="Financial Services">Financial Services</option>
                                        <option value="HiTech Financial Services">HiTech Financial Services</option>
                                        <option value="Information Technology / IT">Information Technology / IT</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Management and Technology Consulting">Management and Technology Consulting</option>
                                        <option value="Media Production">Media Production</option>
                                        <option value="Online Retail">Online Retail</option>
                                        <option value="Real Estate / Mortgage">RealEstate / Mortgage</option>
                                        <option value="Retail Industry">Retail Industry</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="desc">Deskripsi tentang perusahaan anda</label>
                            <textarea name="description" rows="3" placeholder="Deskripsikan perusahaan anda"></textarea>
                            <script>
                                CKEDITOR.replace('description');
                            </script>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat" rows="2" class="form-control form-control-sm" placeholder="Alamat lengkap perusahaan"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="website">Alamat Website</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">https://</span>
                                </div>
                                <input type="text" name="website" class="form-control form-control-sm" id="website" aria-describedby="basic-addon3" placeholder="Alamat website official">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Foto Profil</label>
                                    <input type="file" class="form-control-file" name="profil">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Foto Sampul</label>
                                    <input type="file" class="form-control-file" name="sampul">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    @else
                    {{-- Update --}}
                    <form method="POST" action="{{ url('recruiter/profil/store') }}" class="px-1" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Nama Perusahaan</label>
                                    <input type="text" name="name" class="form-control form-control-sm" placeholder="Nama perusahaan" value="{{ $company->name }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Bergerak dibidang</label>
                                    <select class="form-control form-control-sm" name="bidang">
                                        <option value="Agribusiness">Agribusiness</option>
                                        <option value="Automotive">Automotive</option>
                                        <option value="Banking">Banking</option>
                                        <option value="Banking / Mortgage">Banking / Mortgage</option>
                                        <option value="Computer Software / Engineering">Computer Software / Engineering</option>
                                        <option value="Consumer Goods">Consumer Goods</option>
                                        <option value="Education Management">Education Management</option>
                                        <option value="E-Commerce">E-Commerce</option>
                                        <option value="Financial Services">Financial Services</option>
                                        <option value="HiTech Financial Services">HiTech Financial Services</option>
                                        <option value="Information Technology / IT">Information Technology / IT</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Management and Technology Consulting">Management and Technology Consulting</option>
                                        <option value="Media Production">Media Production</option>
                                        <option value="Online Retail">Online Retail</option>
                                        <option value="Real Estate / Mortgage">RealEstate / Mortgage</option>
                                        <option value="Retail Industry">Retail Industry</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="desc">Deskripsi tentang perusahaan anda</label>
                            <textarea name="description" rows="3" placeholder="Deskripsikan perusahaan anda">{{ $company->description }}</textarea>
                            <script>
                                CKEDITOR.replace('description');
                            </script>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat" rows="2" class="form-control form-control-sm" placeholder="Alamat lengkap perusahaan">{{ $company->alamat }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="website">Alamat Website</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">https://</span>
                                </div>
                                <input type="text" name="website" class="form-control form-control-sm" id="website" aria-describedby="basic-addon3" placeholder="Alamat website official" value="{{ $company->website }}">
                            </div>
                        </div>
                        <div class="float-right">
                          <a href="{{ url('recruiter') }}" class="btn btn-light">Kembali</a>
                          <button type="submit" class="btn btn-primary ml-2">Ubah</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
