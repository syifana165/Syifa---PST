<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #e8eaf6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, #6a1b9a, #283593);
            color: #fff;
            min-height: 100vh;
            padding: 20px 0;
            transition: all 0.3s ease;
        }

        .sidebar a { 
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .sidebar a i {
            font-size: 18px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: linear-gradient(90deg, #ab47bc, #42a5f5);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .sidebar .nav-item {
            margin: 10px 0;
        }

        /* CONTENT AREA */
        .content {
            flex-grow: 1;
            padding: 20px;
            background-color: #f3f4fb;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        /* NAVBAR ATAS */
        .navbar-custom {
            background-color: #fff;
            border-bottom: 2px solid #6a1b9a;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            border-radius: 0 0 10px 10px;
        }

        .profile-img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #6a1b9a;
            transition: transform 0.3s ease;
        }

        .profile-img:hover {
            transform: scale(1.1);
        }

        .dropdown-menu-end {
            right: 0;
            left: auto;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            border: none;
        }

        /* Tombol Logout di Sidebar */
        .btn-logout {
            background-color: #8e24aa;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background-color: #5e35b1;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            transform: translateY(-2px);
        }

        .btn-logout i {
            margin-right: 8px;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column p-3">
        <h4 class="text-center mb-4 border-bottom pb-3">Dashboard</h4>

        <ul class="nav nav-pills flex-column mb-auto">
            <!-- Home -->
            <li class="nav-item">
                <a href="{{ route('dashboard.home') }}" 
                   class="nav-link {{ request()->routeIs('dashboard.home') ? 'active' : '' }}">
                    <i class="bi bi-house-door-fill"></i> Home
                </a>
            </li>

            <!-- Profil Perusahaan -->
            <li class="nav-item">
                <a href="{{ route('profilperusahaan.index') }}" 
                   class="nav-link {{ request()->routeIs('profil.*') ? 'active' : '' }}">
                    <i class="bi bi-building"></i> Profil Perusahaan
                </a>
            </li>

            <!-- Dokumen -->
            <li class="nav-item">
                <a href="{{ route('dokumen.index') }}" 
                   class="nav-link {{ request()->routeIs('dokumen.*') ? 'active' : '' }}">
                    <i class="bi bi-folder-fill"></i> Dokumen
                </a>
            </li>

            <!-- Artikel -->
            <li class="nav-item">
                <a href="{{ route('artikel.index') }}" 
                   class="nav-link {{ request()->routeIs('artikel.*') ? 'active' : '' }}">
                    <i class="bi bi-newspaper"></i> Artikel
                </a>
            </li>
        </ul>

        <!-- Tombol Logout -->
        <form action="{{ route('logout') }}" method="POST" class="mt-auto">
            @csrf
            <button type="submit" class="btn-logout w-100 mt-3">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </div>

    <!-- Konten -->
    <div class="content d-flex flex-column w-100">
        <!-- Navbar atas -->
        <nav class="navbar navbar-custom d-flex justify-content-between align-items-center">
            <h5 class="mb-0">@yield('page_title', 'Selamat Datang')</h5>

            <div class="dropdown">
                @php
                    $user = Auth::user();
                    $fotoPath = ($user && $user->foto && file_exists(public_path('uploads/profile/' . $user->foto)))
                        ? asset('uploads/profile/' . $user->foto)
                        : asset('img/default-user.png');
                @endphp

                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" 
                   id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ $fotoPath }}" alt="Foto Profil" class="profile-img me-2">
                    <span class="fw-semibold text-dark">{{ $user->username ?? 'User' }}</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('profile') }}">
                            <i class="bi bi-person-circle me-2"></i> Edit Profil
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Isi Halaman -->
        <div class="p-4">
            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
