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
                      <a href="{{ url('recruiter/vacancy') }}" class="btn btn-sm btn-info">
                          <i class="fa fa-chevron-left"></i>
                          Kembali
                      </a>
                  </div>

                    <h5>Kelola lowongan</h5>
                    <hr>
                </div>
                <div class="px-4">
                    <p class="font-weight-bold">Deskripsi
                    </p>
                    <div class="row">
                        <div class="col-6">
                            <address>
                                Ticket : <kbd>{{ $vacancy[0]->ticket }}</kbd> <br>
                                Jabatan : <strong>{{ $vacancy[0]->title }} </strong> <br>
                                Slot : <strong>{{ $vacancy[0]->slot }}</strong> <br>
                                Level : <strong>{{ $vacancy[0]->subbidang }}</strong> <br>
                                Keilmuan : <strong>{{ $vacancy[0]->keilmuan }}</strong>
                            </address>
                        </div>
                        <div class="row">
                            <address>
                                Lokasi penempatan : <strong>{{ $vacancy[0]->daerah }}</strong> <br>
                                Expired : <strong>{{ TanggalIndonesia($vacancy[0]->expired)  }}</strong> <br>
                                Salary : 
                                @if(!empty($vacancy[0]->gaji))
                                                        <strong>{{ $vacancy[0]->gaji }}</strong>
                                                        @else
                                                        Rp. <strong>{{ number_format($vacancy[0]->gajimin) }} - {{ number_format($vacancy[0]->gajimax) }}</strong>
                                                        @endif <br>
                                Tipe : <strong>{{ $vacancy[0]->type }}</strong> <br>
                                Sub Keilmuan : <strong>{{ $vacancy[0]->subkeilmuan }}</strong>
                            </address>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="font-weight-bold">Pelamar</p>
                    @if(count($lamaran) == 0)
                    <p>Belum ada pelamar</p>
                    @else
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Keahlian</th>
                                <th scope="col">Pendidikan Terakhir</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach ($lamaran as $lamaran)
                            <tr>
                                <td scope="col">{{ $i }}.</td>
                                <td scope="col">
                                    <a href="{{ url('recruiter/applicants', [$lamaran->id]) }}" class="text-decoration-none" target="_blank">
                                        {{ $lamaran->name }}
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
                                <td scope="col">
                                    <form action="{{ url('recruiter/updatestatus', [$lamaran->idLamar]) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="PATCH">
                                        <input type="hidden" name="pageId" value="{{ $vacancy[0]->id }}">
                                        <div class="input-group input-group-sm">
                                            <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="status">
                                                <option value="1" @if($lamaran->status == '1') selected @endif>Belum proses</option>
                                                <option value="2" @if($lamaran->status == '2') selected @endif>Administrasi</option>
                                                <option value="3" @if($lamaran->status == '3') selected @endif>Interview</option>
                                                <option value="4" @if($lamaran->status == '4') selected @endif>Terima</option>
                                                <option value="5" @if($lamaran->status == '5') selected @endif>Tolak</option>
                                            </select>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary" type="submit">
                                                    <i class="fa fa-send"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
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
                        <a href="{{ url('recruiter/agenda/detail', [$key->id]) }}" class="text-decoration-none">
                            <p class="p-1 pl-2 border">
                                <i class="fa fa-info-circle pr-1"></i> {{ $key->title }}
                            </p>
                        </a>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Buat Agenda
                            <br>
                            <small>{{ $vacancy[0]->title }}</small>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="" action="{{ url('recruiter/agenda/store') }}" method="post">
                          @csrf
                          <input type="hidden" name="idPage" value="{{ $vacancy[0]->id }}">
                          <input type="hidden" name="ticket" value="{{ $vacancy[0]->ticket }}">
                          <input type="hidden" name="idPerusahaan" value="{{ $vacancy[0]->idPerusahaan }}">
                          <input type="hidden" name="namalowongan" value="{{ $vacancy[0]->title }}">
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
        </div>
    </div>
</div>

@endsection
