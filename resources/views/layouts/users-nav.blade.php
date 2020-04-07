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
            {{-- <a href="#" class="btn btn-block btn-sm btn-primary">Sunting</a> --}}
        </div>
    </div>
</div>
