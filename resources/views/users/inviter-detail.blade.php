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
                            <dl class="row mt-3">
                                <dt class="col-sm-2">Pengirim</dt>
                                <dd class="col-sm-10">
                                  <small>{{ $inviter->perusahaan }}</small>
                                </dd>
                                <dt class="col-sm-2">Subjek</dt>
                                <dd class="col-sm-10">
                                  <small>{{ $inviter->subjek }}</small>
                                </dd>
                                <dt class="col-12">Pesan</dt>

                                <div class="col">
                                  {!! $inviter->message !!}
                                </div>
                            </dl>
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
