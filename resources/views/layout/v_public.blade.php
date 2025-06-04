<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dinas Lingkungan')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Font (optional) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: 600;
        }
        footer {
            background: #e9ecef;
            padding: 1rem 0;
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
  <a class="navbar-brand d-flex align-items-center" href="/">
    <img src="{{ asset('assets/img/logo.jpg') }}" alt="Logo" width="40" height="40" class="me-2">
        Dinas Lingkungan Hidup Persampahan
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

<!-- Content -->
<div class="container py-5">
    @yield('content')
</div>

<!-- Footer -->
<footer>
    <div class="container">
        <small>&copy; {{ date('Y') }} Dinas Lingkungan. All rights reserved.</small>
    </div>
</footer>

<!-- JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
