<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        html[data-theme='light'] {
            --bg-gradient: linear-gradient(135deg, #f8f3fc 0%, #f0e6fa 40%, #eae2ff 100%);
            --card-bg: rgba(255, 255, 255, 0.95);
            --text-color: #2c245c;
            --btn-gradient: linear-gradient(90deg, #8e44ad, #6c5ce7);
            --btn-hover-gradient: linear-gradient(90deg, #7d3c98, #5a4ae3);
            --input-focus: #8e44ad;
        }

        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: var(--bg-gradient);
            color: var(--text-color);
            transition: all 0.4s ease;
        }

        .login-section {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            padding: 2rem;
        }

        .login-card {
            background: var(--card-bg);
            padding: 2.5rem;
            border-radius: 1.2rem;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
            width: 100%;
            max-width: 400px;
            backdrop-filter: blur(10px);
            transition: 0.4s;
        }

        .login-card:hover {
            transform: translateY(-5px);
        }

        .btn-primary {
            background: var(--btn-gradient);
            border: none;
            border-radius: 0.6rem;
            transition: 0.4s;
            color: white;
            font-weight: 500;
        }

        .btn-primary:hover {
            background: var(--btn-hover-gradient);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(140, 82, 255, 0.4);
        }

        .login-title {
            font-weight: 700;
            background: linear-gradient(90deg, #8e44ad, #6c5ce7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1.2rem;
        }

        .form-control:focus {
            border-color: var(--input-focus);
            box-shadow: 0 0 0 0.2rem rgba(142, 68, 173, 0.25);
        }

        .input-group-text {
            background: transparent;
            border-right: none;
            color: var(--input-focus);
        }

        .form-control {
            border-left: none;
        }

        .text-muted a {
            color: #8e44ad;
            font-weight: 500;
            text-decoration: none;
        }

        .text-muted a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container login-section">
        <div class="login-card text-center">
            <h4 class="login-title">Lupa Password</h4>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan Email Anda" required>
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-2">
                    Kirim Link Reset Password
                </button>
            </form>

            <div class="text-center mt-4">
                <p class="text-muted">
                    <a href="{{ route('login') }}"><i class="bi bi-arrow-left"></i> Kembali ke Login</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
