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
    <script type="text/javascript">
        var maxDate = year + '-' + month + '-' + day;
        // alert(maxDate);
        $('#txtDate').attr('min', maxDate);

    </script>
</head>

<body class="bg-grey" role="main">
    <header class="navbar-menu">
        <nav class="navbar navbar-expand-lg navbar-dark bg-raspberry py-3">
            <div class="container">
                <a class="navbar-brand font-weight-bold" href="{{ url('/') }}">JOBTRACK</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars"
                    aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @guest
                <div class="collapse navbar-collapse" id="navbars">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item @yield('lowongan-status')">
                            <a class="nav-link" href="{{ url('lowongan') }}">Lowongan</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item pr-3">
                            <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                        </li>
                        <li class="nav-item pr-3">
                            <a class="nav-link" href="{{ url('daftar') }}">Daftar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-outline-link"
                                href="{{ url('perusahaan/registrasi') }}">Perusahaan</a>
                        </li>
                    </ul>
                </div>
                @else
                @if(Auth::user()->level == 1)
                <div class="collapse navbar-collapse" id="navbars">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item @yield('home-status')">
                            <a class="nav-link" href="{{ url('home') }}">Beranda</a>
                        </li>
                        <li class="nav-item @yield('lowongan-status')">
                            <a class="nav-link" href="{{ url('lowongan') }}">Lowongan</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('user/bookmark') }}">
                                <i class="fa fa-bookmark"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropleft" id="mess" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="{{ DotNotify(Auth::user()->id) }}"></span>
                            </a>
                            <div class="dropdown-menu ml-notification" aria-labelledby="mess"
                                style="width: 250px !important">
                                <div class="card m-n3">
                                    <div class="card-header bg-c-blue text-center text-white">
                                        Notifikasi

                                    </div>
                                    @php($data = UserNotifications(Auth::user()->id))
                                    @if($data->isEmpty())
                                    <div class="card-body">
                                        <div class="text-center">
                                            <img src="{{ asset('img/notify.png') }}" class="img-fluid"
                                                alt="Empty notification">
                                            <small>
                                                You don't have any notifications
                                            </small>
                                        </div>
                                    </div>
                                    @else
                                    <div class="card-body notification">
                                        @foreach (UserNotifications(Auth::user()->id) as $item)
                                        <div class="notification-item">
                                            <a href="{{ url('read/notification', [$item->id]) }}"
                                                class="text-decoration-none notification-list no-style text-dark">
                                                <p class="mb-2">{!! $item->content !!}</p>
                                                <p class="text-monospace text-dark mb-2 text-right">
                                                    {{ TanggalIndonesia($item->created_at, false) }}
                                                </p>
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
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
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01" style="right: 0; left: auto;">
                                <a class="dropdown-item" href="{{ url('user/dashboard') }}">Profil</a>
                                <a class="dropdown-item" href="{{ url('user/account') }}">Pengaturan Akun</a>
                                <hr>
                                <a class="dropdown-item" href="#" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">Keluar</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
                @endif
                @if(Auth::user()->level == 2)
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item @yield('status-home')">
                            <a class="nav-link" href="{{ url('recruiter/home') }}">Home</a>
                        </li>
                        <li class="nav-item @yield('status-vacancy')">
                            <a class="nav-link" href="{{ url('recruiter/vacancy') }}">Lowongan</a>
                        </li>
                        <li class="nav-item @yield('status-candidate')">
                            <a class="nav-link" href="{{ url('candidate') }}">Cari kandidat</a>
                        </li>
                    </ul>
                    <div class="collapse navbar-collapse" id="navbars">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown01" style="right: 0; left: autso;">
                                    <a class="dropdown-item" href="{{ url('recruiter') }}">Profil</a>
                                    <a class="dropdown-item" href="{{ url('recruiter/account') }}">Pengaturan Akun</a>
                                    <hr>
                                    <a class="dropdown-item" href="#" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                               document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                @endif
                @endguest
            </div>
        </nav>
    </header>
    <main role="main" style="background-image: url('{{ asset('img/wave.svg') }}'); background-repeat: no-repeat;">
        @yield('content')
    </main>
    <footer class="container pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
            <div class="col-12 col-md">
                <img class="mb-2" src="{{ asset('img/Jobtrack.png') }}">
                <small class="d-block mb-3 text-muted">Copyright &copy; 2020</small>
            </div>
            <div class="col-6 col-md text-right">
                <h5>About</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Team</a></li>
                    <li><a class="text-muted" href="#">Credits</a></li>
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    {{-- Active script --}}
    <script src="{{ asset('js/activate.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/tools.js') }}" charset="utf-8"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="keilmuan"]').on('change', function () {
                $("option[class='pilih_keilmuan']").remove();
                let idkeilmuan = $(this).val();
                console.log(idkeilmuan);
                if (idkeilmuan) {
                    jQuery.ajax({
                        url: '/api/getSubkeilmuan/' + idkeilmuan,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="subkeilmuan"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="subkeilmuan"]').append(
                                    '<option value="' + value + '">' + value +
                                    '</option>');
                            });
                        },
                    });
                } else {
                    $('select[name="subkeilmuan"]').empty();
                }
            });
        });

        $(document).ready(function () {
            $('input[name="gajimax"]').on('change keyup paste click', function () {
                $('input[name="gaji"]').prop("checked", false);
            });
            $('input[name="gajimin"]').on('change keyup paste click', function () {
                $('input[name="gaji"]').prop("checked", false);
            });
            $('input[name="gaji"]').on('change', function () {
                $('input[name="gajimin"]').val('');
                $('input[name="gajimax"]').val('');
            });
        });
        // TOols
        $(function () {
            $('input[name="dari"]').daterangepicker({
                opens: 'left'
            }, function (start, end, label) {
                // console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                // $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            });
        });

        function numberFilter(evt) {
            let charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;
            return true;
        }

        $(function () {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            // alert(maxDate);
            $('#txtDate').attr('min', maxDate);
        });

        function myFunction() {
            let x = document.getElementById("myDIV");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        $(document).ready(function() {
            $('select[name="keilmuan"]').on('change', function() {
                let idkeilmuan = $(this).val();
                if(idkeilmuan) {
                    jQuery.ajax({
                        url: 'api/getSubkeilmuan/'+idkeilmuan,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subkeilmuan"]').empty();
                            $('select[name="subkeilmuan"]').append('<option value="" disabled selected>Subkeilmuan</option>');
                            $('select[name="subkeilmuan"]').append('<option value="">Keseluruhan</option>');
                            $.each(data, function(key, value){
                                $('select[name="subkeilmuan"]').append('<option value="'+value+'">'+value+'</option>');
                            });
                        },
                    });
                } else {
                    $('select[name="subkeilmuan"]').empty();
                            $('select[name="subkeilmuan"]').append('<option value="" disabled selected>Subkeilmuan</option>');
                }
            });
        });

    </script>

</body>

</html>
