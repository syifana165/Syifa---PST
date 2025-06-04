<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #6dd5ed, #2193b0);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-card {
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      background-color: #fff;
    }
    .login-card .form-control {
      border-radius: 0.5rem;
    }
    .login-card .btn-primary {
      border-radius: 0.5rem;
      background-color: #2193b0;
      border: none;
    }
    .login-card .btn-primary:hover {
      background-color: #176B87;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="login-card">
          <h4 class="text-center mb-4"><i class="fas fa-sign-in-alt mr-2"></i>Login</h4>
          @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
              <label for="email">Email</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                </div>
                <input type="email" name="email" class="form-control" id="email" required>
              </div>
              @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-lock"></i></div>
                </div>
                <input type="password" name="password" class="form-control" id="password" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-3">Login</button>
            <p class="mt-3 text-center">Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
