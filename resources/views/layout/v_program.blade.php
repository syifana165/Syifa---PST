<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Program Dinas Lingkungan Hidup')</title>

    <!-- Fonts & Icons -->
    <link href="{{ asset('Template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet">

    <!-- Main CSS -->
    <link href="{{ asset('Template/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        .program-box {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        .section-title {
            font-weight: bold;
            font-size: 32px;
            margin-top: 40px;
            border-left: 5px solid #ff6600;
            padding-left: 10px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">

        {{-- Header / Navbar --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm py-3">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/img/logo.jpg') }}" height="40" alt="Logo">
                Dinas Lingkungan Hidup
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="halaman">Beranda</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="programDropdown" data-toggle="dropdown">
                            Program
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('seminar') }}">Seminar</a>
                            <a class="dropdown-item" href="{{ route('bersih') }}">Bersih-Bareng</a>
                        </div>
                    </li>
                    <!-- Tambah menu lainnya -->
                </ul>
            </div>
        </nav>

        {{-- Konten --}}
        <div class="container">
            @yield('content')
        </div>

        {{-- Footer --}}
        <footer class="footer mt-5 py-4 bg-white shadow-sm text-center">
            <div class="container">
                <p class="mb-0">&copy; 2025 Dinas Lingkungan Hidup</p>
            </div>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('Template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('Template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
