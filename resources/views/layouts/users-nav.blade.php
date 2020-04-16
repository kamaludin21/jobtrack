<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            {{ Auth::user()->name }}
        </div>
        <div class="card-body">
            @if(empty($profil))
            <img src="{{ asset('img/profil/default.jpg') }}" class="img-fluid img-rounded" alt="">
            @else
            <img src="{{ url('img/profil',[$profil->profil]) }}" class="img-fluid" alt="">
            <div class="text-right" style="margin-top: -35px; margin-right: 5px;">
                <button type="button" class="btn btn-sm btn-primary rounded-pill" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-camera">F</i>
                </button>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ganti foto profil
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('user/profil/foto', [$profil->id]) }}" method="post"  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" value="PATCH">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Unggah</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="profil" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required>
                                        <label class="custom-file-label" for="inputGroupFile01">Pilih gambar</label>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            <hr>
            <div class="pt-3">
                <p class="p-1 pl-2 border @yield('user-dashboard')">
                    <a href="{{ url('user/dashboard') }}" class="link-nav">
                        <i class="fa fa-home pr-1"></i> Dashboard
                    </a>
                </p>
                <p class="p-1 pl-2 border @yield('user-profil')">
                    <a href="{{ url('user/profil') }}" class="link-nav">
                        <i class="fa fa-user pr-1"></i> Profil
                    </a>
                </p>
                <p class="p-1 pl-2 border @yield('user-lamaran')">
                    <a href="{{ url('user/lamaran') }}" class="link-nav">
                        <i class="fa fa-black-tie pr-1"></i> Lamaran
                    </a>
                </p>
                <p class="p-1 pl-2 border @yield('user-bookmark')">
                    <a href="{{ url('user/bookmark') }}" class="link-nav">
                        <i class="fa fa-bookmark pr-1"></i> Lowongan Tersimpan
                    </a>
                </p>
                <p class="p-1 pl-2 border @yield('user-invite')">
                    <a href="{{ url('user/invite') }}" class="link-nav">
                        <i class="fa fa-certificate pr-1"></i> Undangan
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
