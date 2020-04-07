@extends('layouts.main')

@section('user-bookmark')
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
                    <div class="card row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <div class="card-header bg-c-donker">
                                <div class="lead">
                                  Bookmark
                                </div>
                            </div>
                            <div class="row mt-4">
                              @if(empty($bookmarks))
                                <p>Belum ada lowongan tersimpan</p>
                              @else
                                @foreach ($bookmarks as $bookmark)
                                  <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                              <a href="{{ url('lowongan/detail', [$bookmark->ticket]) }}">{{ Str::limit($bookmark->title, 35, '...') }}</a>
                                            </h5>
                                            <h6 class="card-subtitle mb-2 text-muted">Rp. {{ number_format($bookmark->gajimin) }} - {{ number_format($bookmark->gajimax) }}</h6>
                                            <div class="card-text">
                                              {{ strip_tags(Str::limit($bookmark->description, 100, '...')) }}

                                            </div>
                                            <div class="float-right">
                                              <a href="#" class="card-link">
                                                <i class="fa fa-trash"></i> Hapus
                                              </a>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                @endforeach
                              @endif

                            </div>
                            {{-- <nav aria-label="Page navigation">
                              <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                              </ul>
                            </nav> --}}
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
