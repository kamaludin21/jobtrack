@extends('layouts.main')

@section('status-candidate') active @endsection

@section('content')
<div class="container pt-4">
    <div class="row mb-2">
        <div class="col-12">
          <div class="card p-4">
              <form>
              <div class="form-row">
                <div class="col">
                  <input type="text" class="form-control" placeholder="Profesi">
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Pendidikan">
                </div>
                <div class="col">
                  <select class="custom-select">
                    <option selected>Pengalaman</option>
                    <option value="1">1 Tahun</option>
                    <option value="2">2 Tahun</option>
                    <option value="3">3 Tahun</option>
                    <option value="3">4 Tahun</option>
                    <option value="3">> 5 Tahun</option>
                  </select>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="gaji">Maks Gaji</label>
                    <input type="text" class="form-control" id="gaji" placeholder="Rp. 000">
                  </div>
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Daerah">
                </div>
                <div class="col-auto">
                  <button class="btn btn-primary">Search now</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-12">
            <div class="card bg-light">
                <div class="px-4 pt-4">
                  <div class="float-right">
                      <a href="#" class="btn btn-sm btn-secondary py-1">
                          Filters
                          <i class="fa fa-chevron-down"></i>
                      </a>
                      <button class="btn btn-sm btn-outline-primary">
                          <i class="fa fa-th-large"></i>
                      </button>
                      <button class="btn btn-sm btn-primary">
                          <i class="fa fa-th-list"></i>
                      </button>
                  </div>
                  <h5>Your Candidate</h5>
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
                                              <span class="badge badge-pill badge-success">Available</span>
                                            @else
                                              <span class="badge badge-pill badge-danger">not available</span>
                                            @endif
                                          </p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="">
                                      <span class="text-muted">Education</span>
                                      <div class="font-weight-light mb-2">
                                        {{-- {{ $candidate->pendidikan }} --}}
                                        @php($echo = explode(',', $candidate->pendidikan))
                                        @foreach ($echo as $key)
                                          &bull; {{ $key }}
                                          <br>
                                        @endforeach

                                        {{-- <br>
                                        &bull; S1 | Teknik Geologi UGM --}}
                                      </div>
                                      <span class="text-muted">Skill</span>
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
                                      <a href="{{ url('recruiter/inviter', [$candidate->IdUser]) }}" class="btn btn-primary btn-block">Invite a Jobs</a>
                                    </div>
                                  </div>
                              </div>
                          </div>
                        @endforeach
                      @endif
                  </div>
                  <hr>
                  <nav aria-label="Page navigation example">
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
                  </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
