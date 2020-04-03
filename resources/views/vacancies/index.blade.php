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
                @if(count($lowongans) > 0)
                  @foreach($lowongans as $lowongan)
                    <div class="row p-4">
                        <div class="col-md-12">
                            <div class="row no-gutters rounded overflow-hidden flex-md-row h-md-250 position-relative">
                                <div class="col d-flex flex-column position-static">
                                    <div class="row mb-2">
                                        <div class="col-md-9">
                                          <a href="#" style="text-decoration: none;">
                                              <strong class="d-inline-block mb-2 text-muted">
                                                {{ $lowongan->name }}
                                              </strong>
                                          </a>
                                          @if($lowongan->status == 'verify')
                                            <i class="fa fa-check-circle fa-lg text-primary pt-2" data-toggle="tooltip" data-placement="right" title="Perusahaan terverifikasi mitra kami"></i>
                                          @endif
                                          <h4>{{ Str::limit($lowongan->title, 31, '...') }}</h4>
                                          <div class="text-muted">
                                              <small> <i class="fa fa-dollar"></i>&nbsp;&nbsp;Rp. {{ number_format($lowongan->gajimin) }} - {{ number_format($lowongan->gajimax) }} / Month
                                                  <br>
                                                  <i class="fa fa-map-marker"></i>&nbsp;&nbsp; {{ $lowongan->daerah }}
                                                  &nbsp;&nbsp; &nbsp;&nbsp;
                                                  <i class="fa fa-briefcase"></i>&nbsp;&nbsp;{{ $lowongan->type }}
                                              </small>
                                          </div>
                                        </div>
                                        <div class="col-md-3 mr-auto">
                                            <img src="{{ url('img/recruiter/profil', [$lowongan->profil]) }}" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="card-text mb-auto text-justify">
                                      {{ strip_tags(Str::limit($lowongan->description, 300, '...')) }}
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center pt-2">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">{{ $lowongan->slot }} Posisi</button>
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
                  <div class="pl-3">

                  </div>
                @else
                  <p>Lowongan belum tersedia</p>
                @endif

                <nav aria-label="Page navigation ">
                    <ul class="pagination justify-content-end mr-4">
                        {{ $lowongans->links() }}
                    </ul>
                </nav>
            </div>

        </div>
    </div>
</div>

@endsection
