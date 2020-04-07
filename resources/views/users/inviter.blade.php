@extends('layouts.main')

@section('user-invite')
  nav-user-active
@endsection

@section('content')
<div class="container pt-5">
    <div class="row mb-2">
        @include('layouts.users-nav')
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="row card no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <div class="card-header bg-c-donker">
                                <div class="lead">
                                  Invitation
                                </div>
                            </div>
                            <div class="row mt-4">
                              @if(empty($inviter))
                                <p>Anda tidak memiliki undangan</p>
                              @else
                                @foreach ($inviter as $invite)
                                  <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $invite->perusahaan }}</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">{{ $invite->subjek }}</h6>
                                            <p class="card-text">{{ strip_tags(Str::limit($invite->message, 150, '...')) }}</p>
                                            <a href="{{ url('user/invite', [$invite->id]) }}" class="btn btn-sm btn-outline-success">Selengkapnya
                                            </a>
                                        </div>
                                    </div>
                                  </div>
                                @endforeach
                              @endif
                            </div>
                            <nav aria-label="Page navigation">
                              <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                              </ul>
                            </nav>
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
