<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
    }

    .login-section {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100%;
      background-color: #0B2447;
    }

    .login-card {
      background: rgba(255, 255, 255, 0.97);
      padding: 2rem 2.5rem;
      border-radius: 1rem;
      box-shadow: 0 8px 20px rgba(0,0,0,0.25);
      width: 100%;
      max-width: 400px;
    }

    .login-card .form-control {
      border-radius: 0.6rem;
      transition: 0.3s;
    }

    .login-card .form-control:focus {
      box-shadow: 0 0 0 0.2rem rgba(11, 36, 71, 0.3);
    }

    .login-card .btn-primary {
      background: #0B2447;
      border: none;
      border-radius: 0.6rem;
    }

    .login-card .btn-primary:hover {
      background: #031634;
    }

    .left-side {
      background-color: #19376D;
      color: white;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 2rem;
      text-align: center;
    }

    .left-side img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 20px;
    }

    .left-side h1 {
      font-weight: bold;
    }

    .left-side p {
      opacity: 0.9;
    }

    @media (max-width: 768px) {
      .left-side {
        display: none;
      }
    }
  </style>
</head>
<body>
  <div class="container-fluid h-100">
    <div class="row h-100">
      <!-- Kiri: Branding -->
      <div class="col-md-6 left-side">
        <img src="{{ asset('assets/img/logo.jpg') }}" alt="Logo DLH">
        <h1>Selamat Datang</h1>
        <p>Dinas Lingkungan Hidup Kabupaten Subang</p>
      </div>

      <!-- Kanan: Login -->
      <div class="col-md-6 login-section">
        <div class="login-card">
          <h4 class="text-center mb-4"><i class="fas fa-sign-in-alt me-2"></i>Login</h4>

          @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
          @endif

          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group mb-3">
              <label for="username">Username</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" name="username" class="form-control" id="username" required>
              </div>
              @error('username') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group mb-3">
              <label for="password">Password</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" name="password" class="form-control" id="password" required>
              </div>
              @error('password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
