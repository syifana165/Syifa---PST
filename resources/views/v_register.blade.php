<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
  <style>
    body {
      background: linear-gradient(to right, #43cea2, #185a9d);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .register-card {
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
      background-color: #fff;
      width: 100%;
      max-width: 400px;
    }
    .register-card .form-control {
      border-radius: 0.5rem;
    }
    .register-card .btn-success {
      border-radius: 0.5rem;
      background-color: #28a745;
      border: none;
    }
    .register-card .btn-success:hover {
      background-color: #218838;
    }
  </style>
</head>
<body>
  <div class="register-card">
    <h4 class="text-center mb-4"><i class="fas fa-user-plus mr-2"></i>Register</h4>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div class="form-group">
        <label for="nama">Nama</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-user"></i></div>
          </div>
          <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required />
        </div>
        @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-envelope"></i></div>
          </div>
          <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required />
        </div>
        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-lock"></i></div>
          </div>
          <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required />
        </div>
        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
      </div>

      <div class="form-group">
        <label for="password_confirmation">Konfirmasi Password</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-lock"></i></div>
          </div>
          <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required />
        </div>
      </div>

      <div class="form-group">
        <label for="level">Level</label>
        <select name="level" id="level" class="form-control @error('level') is-invalid @enderror" required>
          <option value="">-- Pilih Level --</option>
          <option value="1" {{ old('level') == '1' ? 'selected' : '' }}>Kepala Bidang</option>
          <option value="2" {{ old('level') == '2' ? 'selected' : '' }}>Penanggung Jawab</option>
          <option value="3" {{ old('level') == '3' ? 'selected' : '' }}>Petugas</option>
        </select>
        @error('level') <small class="text-danger">{{ $message }}</small> @enderror
      </div>

      <button type="submit" class="btn btn-success btn-block mt-3">Daftar</button>
      <p class="mt-3 text-center">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
    </form>
  </div>
</body>
</html>
