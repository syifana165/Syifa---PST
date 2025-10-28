<!doctype html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
    html[data-theme='light'] {
        /* Ganti background ke putih keunguan lembut */
        --bg-gradient: linear-gradient(135deg, #ffffff 0%, #f5ebff 40%, #f1e6ff 100%);
        --card-bg: rgba(255, 255, 255, 0.95);
        --text-color: #2c245c;
        --btn-gradient: linear-gradient(90deg, #8e44ad, #6c5ce7);
        --btn-hover-gradient: linear-gradient(90deg, #7d3c98, #5a4ae3);
        --input-focus: #8e44ad;
    }

    html[data-theme='dark'] {
        --bg-gradient: linear-gradient(135deg, #3a275a 0%, #5b3f7e 100%);
        --card-bg: rgba(25, 25, 35, 0.9);
        --text-color: #f5f5f5;
        --btn-gradient: linear-gradient(90deg, #a56ef5, #7a5df0);
        --btn-hover-gradient: linear-gradient(90deg, #9050e3, #674fe0);
        --input-focus: #a56ef5;
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
            <!-- Judul login dengan ikon -->
            <h4 class="mb-4 login-title">
                <i class="fa-solid fa-right-to-bracket" style="color: #8e44ad; margin-right: 8px;"></i>
                Login
            </h4>


            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('login.post') }}">
                @csrf

                <div class="mb-3 text-start">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
                    </div>
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3 text-start">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <div class="g-recaptcha d-flex justify-content-center" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                    @if ($errors->has('g-recaptcha-response') || $errors->has('captcha'))
                        <small class="text-danger">
                            {{ $errors->first('g-recaptcha-response') ?? $errors->first('captcha') }}
                        </small>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-2" id="loginBtn">Masuk</button>

                <div class="text-center mt-3">
    <small><a href="{{ route('password.request') }}">Lupa Password?</a></small>
</div>


                <div class="text-center mt-3">
                    <small>Belum punya akun? <a href="{{ route('register') }}">Daftar</a></small>
                </div>
            </form>
        </div>
    </div>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        // Optional: Tambah efek loading
        document.querySelector("form").addEventListener("submit", function() {
            const btn = document.getElementById("loginBtn");
            btn.disabled = true;
            btn.innerHTML = "Memproses...";
        });
    </script>
</body>
</html>
