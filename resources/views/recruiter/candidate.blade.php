@extends('layouts.main')

@section('status-candidate') active @endsection

@section('content')
<div class="container pt-4">
    <div class="row mb-2">
        <div class="col-12" id="myDIV" style="display: none;">
          <div class="card p-4">
              <form action="{{ url('candidate/search') }}" method="post">
                @csrf
              <div class="form-row">
                <div class="col">
                  <input type="text" name="skill" class="form-control" placeholder="Keahlian">
                </div>
                <div class="col">
                  <select class="custom-select" name="pendidikan">
                    <option value="" disabled selected>Pendidikan</option>
                    <option value="1">D3</option>
                    <option value="2">S1</option>
                    <option value="3">S2</option>
                    <option value="4">S3</option>
                  </select>
                </div>
                <div class="col">
                  <select class="custom-select" name="daerah">
                    <option value="" disabled selected>Daerah</option>
                    <option value="1">Lhoksemawe</option>
                    <option value="2">Medan</option>
                    <option value="3">Sibolga</option>
                    <option value="4">Langkat</option>
                    <option value="5">Pekanbaru</option>
                    <option value="6">Bengkalis</option>
                    <option value="7">Dumai</option>
                    <option value="8">Padang</option>
                    <option value="9">Bukit Tinggi</option>
                    <option value="10">Payakumbuh</option>
                    <option value="11">Tanjung Pinang</option>
                    <option value="12">Tanjung Balai Karimun</option>
                    <option value="13">Batam</option>
                    <option value="14">Pangkal Pinang</option>
                    <option value="15">Bandar Lampung</option>
                    <option value="16">Metro</option>
                    <option value="17">Jambi</option>
                    <option value="18">Bangko</option>
                    <option value="19">Bengkulu</option>
                    <option value="20">Palembang</option>
                    <option value="21">Lubuk Linggau</option>
                  </select>
                </div>
                <div class="col">
                  <input type="text" name="gaji" class="form-control" placeholder="Nominal gaji">
                </div>
                <div class="col-auto">
                  <button type="submit" class="btn btn-primary">Cari</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-12">
            <div class="card bg-light">
                <div class="px-4 pt-4">
                  <div class="float-right">
                      <button type="button" onclick="myFunction()" class="btn btn-sm btn-secondary py-1">
                          Filter
                          <i class="fa fa-chevron-up"></i>
                      </button>
                      <button class="btn btn-sm btn-primary">
                          <i class="fa fa-th-large"></i>
                      </button>
                      <button class="btn btn-sm btn-outline-primary">
                          <i class="fa fa-th-list"></i>
                      </button>
                  </div>
                  <h5>Persona yang tersedia</h5>
                  <hr>
                </div>
                <div class="card-body">
                  <div class="row">
                      @if(empty($candidates))
                        <p>Tidak ada candidate</p>
                      @else
                        @foreach ($candidates as $candidate)
                          <div class="col-md-4">
                              <div class="card">
                                  <div class="card-body">
                                    <div class="row">
                                      <div class="col-4">
                                        <img src="{{ url('img/profil', [$candidate->profil]) }}" class="img-fluid rounded-circle" alt="">
                                      </div>
                                      <div class="col-8">
                                        <h5>
                                          <a target="_blank" href="#" class="text-decoration-none text-dark">
                                            {{ $candidate->name }}
                                          </a>
                                          <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" title="Additional information"></i>
                                        </h5>
                                        <div class="lead mt-n2">
                                          <p>
                                            <small>{{ Str::limit($candidate->ttl, 23, '') }}</small>
                                            @if($candidate->status == 'YES')
                                              <span class="badge badge-pill badge-success">Tersedia</span>
                                            @else
                                              <span class="badge badge-pill badge-danger">Tidak tersedia</span>
                                            @endif
                                          </p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="">
                                      <span class="text-muted">Pendidikan</span>
                                      <div class="font-weight-light mb-2">
                                        @php($echo = explode(',', $candidate->pendidikan))
                                        @foreach ($echo as $key)
                                          &bull; {{ $key }}
                                          <br>
                                        @endforeach
                                      </div>
                                      <span class="text-muted">Keahlian</span>
                                      <div class="">
                                        @php($skil = explode(',', $candidate->skill))
                                        @foreach ($skil as $key)
                                          <span class="badge badge-pill badge-dark">{{ $key }}</span>
                                        @endforeach

                                      </div>
                                    </div>
                                    <div class="row border-top p-2 mt-4">
                                      <div class="col-6 mt-2 text-center">
                                        9 Years Experience
                                      </div>
                                      <div class="col-6 mt-2 border-left text-center" >
                                        Rp. {{ number_format($candidate->gaji) }} /Month
                                        <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" title="Gaji yang diharapkan"></i>
                                      </div>
                                    </div>
                                    <div class="mt-2">
                                      <a href="{{ url('recruiter/inviter', [$candidate->IdUser]) }}" class="btn btn-primary btn-block">Undang persona</a>
                                    </div>
                                  </div>
                              </div>
                          </div>
                        @endforeach
                      @endif
                  </div>
                  {{-- <nav aria-label="Page navigation example">
                      <ul class="pagination justify-content-end">
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
                  </nav> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
