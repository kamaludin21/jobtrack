@extends('layouts.main')

@section('user-profil')
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
                                    Profil
                                </div>
                            </div>
                            <div class="mt-2">
                                <p class="lead">
                                    <strong>Tambah Skill</strong>
                                </p>
                                <form method="POST" action="{{ url('user/skill/store') }}" class="px-1">
                                    @csrf
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="">Skill</label>
                                                <input list="browsers" class="form-control form-control-sm" name="skill" placeholder="Skill anda">
                                                <datalist id="browsers">
                                                    <option value="PHP">
                                                    <option value="Java">
                                                    <option value="Back End">
                                                    <option value="Front End">
                                                    <option value="Android Dev">
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="">Level</label>
                                                <select class="form-control form-control-sm" name="level">
                                                    <option value="Basic">Basic</option>
                                                    <option value="Novice">Novice</option>
                                                    <option value="Intermediate">Intermediate</option>
                                                    <option value="Advanced">Advanced</option>
                                                    <option value="Expert">Expert</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
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
