<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dinas Lingkungan Hidup Persampahan</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
    }
    .navbar-nav .nav-link {
      color: #333;
      font-weight: 500;
    }
    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
      color: #0d6efd;
    }
    .dropdown-menu {
      background-color: #ffffff;
      border-radius: 0.5rem;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .dropdown-item:hover {
      background-color: #e6f5ff;
    }
    .section-title {
      font-weight: bold;
      font-size: 1.8rem;
      color: #0d6efd;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="/">
        <img src="/assets/img/Logoo.png" alt="Logo" height="40" class="me-2">
        <span class="fw-bold text-primary">Dinas Lingkungan Hidup Persampahan</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              Tentang Kami
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/visimisi">Visi, Misi, Tujuan</a></li>
              <li><a class="dropdown-item" href="/profil">Profil DLH</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              Program
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('seminar') }}">Seminar</a></li>
              <li><a class="dropdown-item" href="{{ route('bersih') }}">Bersih-Bareng</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              Kontak
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/penanggungjawab">Penanggung Jawab</a></li>
              <li><a class="dropdown-item" href="/pengaduandata">Pengaduan</a></li>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link" href="/login"><i class="fas fa-sign-in-alt me-1"></i>Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="py-4">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="bg-primary text-white text-center py-3 mt-5">
    <p class="mb-0">&copy; {{ date('Y') }} Dinas Lingkungan Hidup Persampahan - Kabupaten Subang</p>
  </footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
