<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Jobtrack</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('img/microsoft.png') }}" type="image/x-icon">

    {{-- style --}}
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400" rel="stylesheet" />
    {{-- login --}}
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('auth/css/bootstrap-min.css') }}">
    <link rel="stylesheet" href="{{ asset('auth/css/form-elements.css') }}">
    <link rel="stylesheet" href="{{ asset('auth/css/style.css') }}">
</head>

<body role="main" >
    <header class="navbar-menu text-white">
        <nav class="navbar navbar-expand-lg py-3">
            <div class="container">
                <h3><a class="navbar-brand font-weight-bold" href="{{ url('/') }}" style="color: #fff;">JOBTRACK</a></h3>
            </div>
        </nav>
    </header>
    <main role="main">
        @yield('content')
    </main>


    {{-- Script --}}
    <script src="{{ asset('js/jquery-3.4.1.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/bootstrap.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/tools.js') }}" charset="utf-8"></script>

</body>

</html>
