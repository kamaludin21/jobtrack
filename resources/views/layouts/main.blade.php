<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Jobtrack</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('img/microsoft.png') }}" type="image/x-icon">

    {{-- style --}}
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    {{-- Icon CDN --}}
    <script src="https://use.fontawesome.com/1d5fe44475.js"></script>
</head>

<body class="bg-grey"  role="main">
    <header class="navbar-menu">
        <nav class="navbar navbar-expand-lg navbar-dark bg-raspberry py-2">
            <div class="container">
              <a class="navbar-brand" href="{{ url('/') }}">Jobtrack</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              @guest
                <div class="collapse navbar-collapse" id="navbars">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item pr-3">
                            <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                        </li>
                        <li class="nav-item pr-3">
                            <a class="nav-link" href="#">Daftar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-dark" href="{{ url('employer/home') }}">Perusahaan</a>
                        </li>
                    </ul>
                </div>
                @else
                  <div class="collapse navbar-collapse" id="navbars">
                      <ul class="navbar-nav ml-auto">
                          <li class="nav-item">
                              <a class="nav-link" href="#">
                                  <i class="fa fa-bookmark"></i>
                              </a>
                          </li>
                          <li class="nav-item dropdown">
                            <a  class="nav-link dropleft" href="#" id="mess" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                            </a>
                            <div class="dropdown-menu ml-notification" aria-labelledby="mess" style="width: 250px !important">
                              <div class="card m-n3">
                                <div class="card-header bg-c-blue text-center text-white">
                                  Notifications
                                </div>
                                <div class="card-body">
                                  <div class="text-center">
                                    <img src="{{ asset('img/notify.png') }}"
                                    class="img-fluid" alt="Empty notification">
                                    <small>
                                      You don't have any notifications
                                    </small>
                                  </div>
                                </div>
                                <div class="card-footer text-center">
                                  <a href="#" class="btn btn-sm btn-outline-primary rounded-pill">
                                    Selengkapnya
                                    <i class="fa fa-chevron-right mt-n3 "></i>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kamaludin</a>
                              <div class="dropdown-menu" aria-labelledby="dropdown01">
                                  <a class="dropdown-item" href="{{ url('user/dashboard') }}">Profil</a>
                                  <a class="dropdown-item" href="#">Pengaturan Akun</a>
                                  <hr>
                                  <a class="dropdown-item" href="#"
                                  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                              </div>
                          </li>
                      </ul>
                  </div>
                @endguest
            </div>
        </nav>
    </header>
    <header class="navbar-menu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Jobtrack</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('employer/home') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('employer/lowongan') }}">Lowongan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('employer/candidate') }}">Cari kandidat</a>
                        </li>
                    </ul>
                    <div class="collapse navbar-collapse" id="navbars">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a  class="nav-link dropleft" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    <span class="dot" style="margin-left: -5px; margin-top: 2px;"></span>
                                </a>
                                <div class="dropdown-menu ml-notification" aria-labelledby="dropdown02" style="width: 250px !important">
                                  <div class="card m-n3">
                                    <div class="card-header bg-c-blue text-center text-white">
                                      Notifications
                                      <br>
                                      <small class="mt-n5">
                                        You have 21 unread messages
                                      </small>
                                    </div>
                                    <div class="card-body notification">

                                      <div class="notification-item">
                                        <a href="#" class="text-decoration-none notification-list no-style text-dark">
                                          <p class="mb-2">Lamaran anda id=DS987, telah penuh, segera aaa review kandidat anda</p>
                                          <p class="text-monospace text-dark mb-2 text-right">
                                            2 min ago
                                          </p>
                                        </a>
                                      </div>
                                      <div class="notification-item">
                                        <a href="#" class="text-decoration-none notification-list no-style text-dark">
                                          <p class="mb-2">Lamaran anda id=DS987, telah penuh, segera aaa review kandidat anda</p>
                                          <p class="text-monospace text-dark mb-2 text-right">
                                            2 min ago
                                          </p>
                                        </a>
                                      </div>
                                    </div>
                                    <div class="card-footer text-center">
                                      <a href="#" class="btn btn-sm btn-outline-info rounded-pill">
                                        Selengkapnya
                                        <i class="fa fa-chevron-right mt-n3 "></i>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Perusahaan</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown01">
                                    <a class="dropdown-item" href="{{ url('employer/profil') }}">Profil</a>
                                    <a class="dropdown-item" href="#">Pengaturan Akun</a>
                                    <hr>
                                    <a class="dropdown-item" href="#">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main role="main">
        @yield('content')
    </main>
    <footer class="container pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
            <div class="col-12 col-md">
                <img class="mb-2" src="{{ asset('img/Jobtrack.png') }}">
                <small class="d-block mb-3 text-muted">&copy; 2017-2019</small>
            </div>
            <div class="col-6 col-md text-right">
                <h5>Features</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Cool stuff</a></li>
                    <li><a class="text-muted" href="#">Random feature</a></li>
                    <li><a class="text-muted" href="#">Team feature</a></li>
                    <li><a class="text-muted" href="#">Stuff for developers</a></li>
                    <li><a class="text-muted" href="#">Another one</a></li>
                    <li><a class="text-muted" href="#">Last time</a></li>
                </ul>
            </div>
            <div class="col-6 col-md text-right">
                <h5>Resources</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Resource</a></li>
                    <li><a class="text-muted" href="#">Resource name</a></li>
                    <li><a class="text-muted" href="#">Another resource</a></li>
                    <li><a class="text-muted" href="#">Final resource</a></li>
                </ul>
            </div>
            <div class="col-6 col-md text-right">
                <h5>About</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Team</a></li>
                    <li><a class="text-muted" href="#">Locations</a></li>
                    <li><a class="text-muted" href="#">Privacy</a></li>
                    <li><a class="text-muted" href="#">Terms</a></li>
                </ul>
            </div>
        </div>
    </footer>

    {{-- Script --}}
    <script src="{{ asset('js/jquery-3.4.1.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/popper.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/bootstrap.js') }}" charset="utf-8"></script>
    {{-- Active script --}}
    <script src="{{ asset('js/activate.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/tools.js') }}" charset="utf-8"></script>

</body>

</html>