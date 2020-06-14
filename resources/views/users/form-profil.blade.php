@extends('layouts.main')

@section('user-profil')
nav-user-active
@endsection

@section('content')
<div class="container pt-5">
    <div class="row mb-2">
        @include('layouts.users-nav')
        <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div
                        class="row card no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <div class="card-header bg-c-donker">
                                <div class="lead">
                                    Profil
                                </div>
                            </div>
                            <div class="mt-2">
                                @if(empty($profil))
                                <form method="POST" action="{{ url('user/profil/store') }}" class="px-1"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="desc">Deskripsi tentang diri anda</label>
                                        <textarea class="form-control form-control-sm" name="description" rows="5"
                                            placeholder="Promosikan tentang diri anda dengan singkat dan jelas"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Tempat lahir</label>
                                                <input type="text" class="form-control form-control-sm" name="tempat"
                                                    placeholder="*Dalam angka">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Tanggal lahir</label>
                                                <input type="date" class="form-control form-control-sm" name="tgl"
                                                    placeholder="*Dalam angka">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Agama</label>
                                                <select class="form-control form-control-sm" name="agama">
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Katolik">Katolik</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Konghucu">Konghucu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Jenis Kelamin</label>
                                                <div class="">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="kelamin"
                                                            id="laki-laki" value="Laki-laki">
                                                        <label class="form-check-label"
                                                            for="laki-laki">Laki-laki</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="kelamin"
                                                            id="perempuan" value="Perempuan">
                                                        <label class="form-check-label"
                                                            for="perempuan">Perempuan</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <input type="text" name="alamat" class="form-control form-control-sm"
                                            placeholder="Alamat tempat tinggal">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" name="email" class="form-control form-control-sm"
                                            placeholder="Email aktif">
                                    </div>
                                    <div class="form-group">
                                        <label for="">No. Telp</label>
                                        <input type="text" name="telp" class="form-control form-control-sm"
                                            placeholder="Nomor telpon aktif">
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="social1">Facebook link</label>
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        id="basic-addon3">https://facebook.com/</span>
                                                </div>
                                                <input type="text" name="social1" class="form-control form-control-sm"
                                                    id="social1" aria-describedby="basic-addon3">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="social2">Linkedin link</label>
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        id="basic-addon3">https://linkedin.com/</span>
                                                </div>
                                                <input type="text" name="social2" class="form-control form-control-sm"
                                                    id="social2" aria-describedby="basic-addon3">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Nominal gaji yang diharapkan</label>
                                                <input type="text" class="form-control form-control-sm" name="gaji"
                                                    placeholder="nominal" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Sedang mencari kerja?</label>
                                                <div class="">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            id="yes" value="YES">
                                                        <label class="form-check-label" for="yes">Ya</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            id="no" value="NO">
                                                        <label class="form-check-label" for="no">Tidak</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="agreements"
                                            name="agreements" required>
                                        <label class="form-check-label" for="agreements">
                                            <small>Saya bertanggung jawab penuh atas kebenaran data yang tertera</small>
                                        </label>
                                    </div>
                                    <div class="float-right">
                                        <a href="{{ url('user/profil') }}" class="btn btn-light">Kembali</a>
                                        <button type="submit" class="btn btn-primary ml-2">Simpan</button>
                                    </div>
                                </form>
                                @else
                                {{-- Update --}}
                                <form method="POST" action="{{ url('user/profil/store', [$profil->id]) }}" class="px-1">
                                    <input type="hidden" name="_method" value="PATCH">
                                    @csrf
                                    <div class="form-group">
                                        <label for="desc">Deskripsi tentang diri anda</label>
                                        <textarea class="form-control form-control-sm" name="description" rows="5"
                                            placeholder="Promosikan tentang diri anda dengan singkat dan jelas">{{ $profil->description }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            @php($tempat = explode(',', $profil->ttl))
                                            <div class="form-group">
                                                <label for="">Tempat lahir</label>
                                                <input type="text" class="form-control form-control-sm" name="tempat"
                                                    placeholder="Tempat lahir" value="{{ $tempat[0] }}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Tanggal lahir</label>
                                                <input type="date" class="form-control form-control-sm" name="tgl"
                                                    value="{{ trim($tempat[1]) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Agama</label>
                                                <select class="form-control form-control-sm" name="agama">
                                                    <option value="Islam"
                                                        {{ $profil->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                                    <option value="Kristen"
                                                        {{ $profil->agama == 'Kristen' ? 'selected' : '' }}>Kristen
                                                    </option>
                                                    <option value="Katolik"
                                                        {{ $profil->agama == 'Katolik' ? 'selected' : '' }}>Katolik
                                                    </option>
                                                    <option value="Hindu"
                                                        {{ $profil->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                                    <option value="Budha"
                                                        {{ $profil->agama == 'Budha' ? 'selected' : '' }}>Budha</option>
                                                    <option value="Konghucu"
                                                        {{ $profil->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Jenis Kelamin</label>
                                                <div class="">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="kelamin"
                                                            id="laki-laki" value="Laki-laki"
                                                            {{ $profil->kelamin == 'Laki-laki' ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="inlineRadio1">Laki-laki</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="kelamin"
                                                            id="perempuan" value="Perempuan"
                                                            {{ $profil->kelamin == 'Perempuan' ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="inlineRadio2">Perempuan</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <input type="text" name="alamat" class="form-control form-control-sm"
                                            placeholder="Alamat tempat tinggal" value="{{ $profil->alamat }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" name="email" class="form-control form-control-sm"
                                            placeholder="Email aktif" value="{{ $profil->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">No. Telp</label>
                                        <input type="text" name="telp" class="form-control form-control-sm"
                                            placeholder="Nomor telpon aktif" value="{{ $profil->telp }}">
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="social1">Facebook link</label>
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        id="basic-addon3">https://facebook.com/</span>
                                                </div>
                                                <input type="text" name="social1" class="form-control form-control-sm"
                                                    id="social1" aria-describedby="basic-addon3"
                                                    value="{{ $profil->social1 }}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="social2">Linkedin link</label>
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        id="basic-addon3">https://linkedin.com/</span>
                                                </div>
                                                <input type="text" name="social2" class="form-control form-control-sm"
                                                    id="social2" aria-describedby="basic-addon3"
                                                    value="{{ $profil->social2 }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Nominal gaji yang diharapkan</label>
                                                <input type="text" class="form-control form-control-sm" name="gaji"
                                                    placeholder="nominal" value="{{ $profil->gaji }}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Sedang mencari kerja?</label>
                                                {{-- <select class="form-control form-control-sm" name="status">
                                                <option value="YES" {{ $profil->status == 'YES' ? 'selected' : '' }}>Ya
                                                </option>
                                                <option value="NO" {{ $profil->status == 'NO' ? 'selected' : '' }}>Tidak
                                                </option>
                                                </select> --}}
                                                <div class="">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            id="laki-laki" value="YES"
                                                            {{ $profil->status == 'YES' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            id="perempuan" value="NO"
                                                            {{ $profil->status == 'NO' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="float-right">
                                        <a href="{{ url('user/profil') }}" class="btn btn-light">Kembali</a>
                                        <button type="submit" class="btn btn-primary ml-2">Simpan</button>
                                    </div>
                                </form>
                                @endif
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
