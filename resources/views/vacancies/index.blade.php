@extends('layouts.main')

@section('content')
<div class="container pt-5">
    <div class="row mb-2">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Search with your custom
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" placeholder="Posisi/kata kunci">
                        </div>
                        <div class="form-group">
                            <input list="daerah" class="form-control form-control-sm" placeholder="Lokasi">
                            <datalist id="daerah">
                                <option value="Riau">Riau</option>
                                <option value="Palembang">Palembang</option>
                                <option value="Medan">Medan</option>
                            </datalist>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" placeholder="Minimun Gaji (Rp.)">
                        </div>
                        <div class="form-group">
                            <input list="daerah" class="form-control form-control-sm" placeholder="Kategori">
                            <datalist id="daerah">
                                <option value="Riau">UX Designer</option>
                                <option value="Palembang">Accounting</option>
                                <option value="Medan">Art</option>
                            </datalist>
                        </div>
                        <div class="form-group">
                            <input list="daerah" class="form-control form-control-sm" placeholder="Tipe">
                            <datalist id="daerah">
                                <option value="Riau">Full Time</option>
                                <option value="Palembang">Part Time</option>
                                <option value="Palembang">Remote</option>
                                <option value="Medan">Intern</option>
                            </datalist>
                        </div>
                    </form>
                    <a href="#" class="btn btn-block btn-sm btn-primary">Terapkan</a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                @if(count($lowongan) > 0)
                  @foreach($lowongan as $lowongan)
                    <div class="row p-4">
                        <div class="col-md-12">
                            <div class="row no-gutters rounded overflow-hidden flex-md-row h-md-250 position-relative">
                                <div class="col d-flex flex-column position-static">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <a href="#" style="text-decoration: none;">
                                                <strong class="d-inline-block mb-2 text-muted">PT BNI 46</strong>
                                            </a>
                                            <i class="fa fa-check-circle fa-lg text-primary pt-2" data-toggle="tooltip" data-placement="right" title="Perusahaan terverifikasi mitra kami"></i>
                                            <h4 class="mb-0">{{ $lowongan->title }}</h4>
                                            <div class="mb-1 text-muted">
                                                <small>Rp. {{ $lowongan->gajimin }} - {{ $lowongan->gajimax }}</small>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mr-auto">
                                            <img src="{{ asset('img/bni.svg') }}" class="img-fluid pt-2" alt="">
                                        </div>
                                    </div>
                                    <div class="card-text mb-auto text-justify">
                                      {!! Str::limit( $lowongan->description, 300, '...') !!}
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center pt-2">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">{{ $lowongan->daerah }}</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Posted {{ Str::limit($lowongan->created_at , 10, '') }} &bull; Apply before {{ $lowongan->expired }}</button>
                                        </div>
                                        <a href="{{ url('lowongan-detail') }}" class="btn btn-sm btn-primary">
                                            Selengkapnya
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                  @endforeach
                @else
                  <p>Lowongan belum tersedia</p>
                @endif
              
                <nav aria-label="Page navigation ">
                    <ul class="pagination justify-content-end mr-4">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>
</div>

@endsection
