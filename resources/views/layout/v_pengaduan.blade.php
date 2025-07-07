<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pengaduan')</title>

    <!-- Font dan Icon -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Tambahan style global -->
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 40px 20px;
            background: url('{{ asset('assets/img/hh.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            transition: background 0.3s ease, color 0.3s ease;
            color: #111827;
        }
        body.dark {
            color: #e0e0e0;
        }
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background: transparent;
            pointer-events: none;
            z-index: 0;
            transition: background-color 0.3s ease;
        }
        body.dark::before {
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(2px);
        }

        /* Container utama semua konten */
        .main-wrapper {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 1000px;
        }
    </style>

    @yield('head') {{-- Tempat tambahan CSS jika perlu --}}
</head>
<body>
    <div class="main-wrapper">
        @yield('content')
    </div>

    @yield('scripts') {{-- Tempat tambahan JS jika perlu --}}
</body>
</html>
