@extends('layouts.main')

@section('status-vacancy') active
@endsection

@section('content')
<div class="container pt-4">
    <script src="https://cdn.ckeditor.com/4.14.0/basic/ckeditor.js"></script>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="pr-4 pt-4 pl-4">
                    <h5>Form Undangan</h5>
                    <hr>
                </div>
                <div class="card-body mt-n4">
                    <form method="POST" action="{{ url('recruiter/inviter/store') }}" class="px-1">
                        @csrf
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Penerima:</label>
                            <div class="col-sm-10">
                              <input type="hidden" name="idUser" value="{{ $candidate->id }}">
                                <input type="text" name="name" readonly class="form-control-plaintext" id="staticEmail" value="{{ $candidate->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="subjek" class="col-sm-2 col-form-label">Subjek:</label>
                            <div class="col-sm-10">
                                <input type="text" name="subjek" class="form-control" id="subjek" placeholder="Perihal" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Pesan</label>
                            <textarea name="message" rows="3" required></textarea>
                            <script>
                                CKEDITOR.replace('message');
                            </script>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
