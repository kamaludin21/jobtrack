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
                  <div class="float-right">
                      <a href="{{ url('recruiter/vacancy/manage', [$lowongan->id]) }}" class="btn btn-sm btn-info">
                          <i class="fa fa-chevron-left"></i>
                          Kembali
                      </a>
                  </div>

                    <h5>Agenda lowongan</h5>
                    <hr>
                </div>
                <div class="px-4">
                    <p class="font-weight-bold">Deskripsi
                    </p>
                    <div class="row">
                        <div class="col">
                            <address>
                              <strong>Jabatan:</strong> {{ $lowongan->title }} <br>
                              <strong>Level:</strong> {{ $lowongan->subbidang }} <br>
                              <strong>Expired:</strong> {{ $lowongan->expired }} <br>
                              <strong>Slot:</strong> {{ $lowongan->slot }}

                            </address>
                        </div>
                        <div class="col">
                          <address>
                            <strong>Agenda:</strong> {{ $agendaFirst->title }} <br>
                            <strong>Jadwal:</strong> {{ $agendaFirst->tanggal }} &bull; {{ $agendaFirst->mulai }} - {{ $agendaFirst->sampai }} WIB<br>
                            <strong>Status: </strong> {{ $agendaFirst->status == '2' ? 'Administrasi' : 'Interview' }} <br>

                            <strong>Deskripsi: </strong> {{ $agendaFirst->deskripsi }}

                          </address>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="font-weight-bold">Peserta</p>
                    @if(count($pelamar) == 0)
                    {{-- @if(empty($pelamar)) --}}
                    <p>Belum ada pelamar</p>
                    @else
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Keahlian</th>
                                <th scope="col">Pendidikan Terakhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach ($pelamar as $lamaran)
                              @if($lamaran->status >= $agendaFirst->status)
                              <tr>
                                  <td scope="col">{{ $i }}.</td>
                                  <td scope="col">
                                      <a href="{{ url('recruiter/applicants', [$lamaran->id]) }}" class="text-decoration-none" target="_blank">
                                          {{ $lamaran->name }}
                                          {{ $lamaran->status }}
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
                              </tr>
                              @endif
                            @php($i++)
                            @endforeach

                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-3 ">
            <div class="card">
                <div class="p-4">
                    <h5>Agenda
                        <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary float-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>
                            Tambah</a>
                    </h5>
                    <hr>
                    <div class="pt-3">
                        @if(!empty($agenda))
                        @foreach ($agenda as $key)
                        {{-- <a href="{{ url('recruiter/agenda/detail', [$key->id]) }}">
                            <p class="p-1 pl-2 border {{ $key->id == $agendaFirst->id ? 'nav-user-active' : '' }}">
                                <i class="fa fa-info-circle pr-1">i</i> {{ $key->title }}
                            </p>
                        </a> --}}
                        <p class="p-1 pl-2 border {{ $key->id == $agendaFirst->id ? 'nav-user-active' : '' }}">
                            <a href="{{ url('recruiter/agenda/detail', [$key->id]) }}" class="link-nav">
                                {{ $key->title }}
                            </a>
                        </p>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Buat Agenda
                            <br>
                            <small>{{ $vacancy->title }}</small>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="" action="{{ url('recruiter/agenda/store') }}" method="post">
                          @csrf
                          <input type="hidden" name="idPage" value="{{ $vacancy->id }}">
                          <input type="hidden" name="ticket" value="{{ $vacancy->ticket }}">
                          <input type="hidden" name="idPerusahaan" value="{{ $vacancy->idPerusahaan }}">
                          <input type="hidden" name="namalowongan" value="{{ $vacancy->title }}">
                          <div class="form-group">
                              <label for="">Judul agenda</label>
                              <input type="text" name="title" class="form-control form-control-sm" placeholder="Agenda" autofocus autocomplete="off">
                          </div>
                          <div class="form-group">
                              <label for="">Spesifikasi</label>
                              <select class="form-control form-control-sm" name="status">
                                  <option value="2">Administrasi</option>
                                  <option value="3">Interview</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <div class="row">
                                  <div class="col">
                                      <label for="">Tanggal</label>
                                      <input type="date" id="txtDate" name="tanggal" class="form-control form-control-sm" placeholder="Agenda">
                                  </div>
                                  <div class="col">
                                      <label for="">Mulai</label>
                                      <input type="time" name="mulai" class="form-control form-control-sm">
                                  </div>
                                  <div class="col">
                                      <label for="">Sampai</label>
                                      <input type="time" name="sampai" class="form-control form-control-sm">
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="">Deskripsi</label>
                              <textarea name="deskripsi" class="form-control form-control-sm" id="deskripsi" rows="3" placeholder="Deskripsi singkat tentang agenda"></textarea>
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div> --}}
    </div>
</div>

@endsection
