@extends('layout.v_templatee')

@section('title', 'Ubah Profil')

@section('content')
<style>

    body {
        background: #f5f4fb;
    }

    .profile-card {
        background: #fff;
        border-radius: 12px;
        padding: 20px 25px;
        max-width: 360px;
        margin: 30px auto;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .profile-card h3 {
        color: #4b0082;
        font-weight: 700;
        font-size: 18px;
        margin-bottom: 3px;
    }

    .profile-card p {
        color: #6c757d;
        font-size: 12px;
        margin-bottom: 12px;
    }

    .profile-image {
        width: 75px;
        height: 75px;
        border-radius: 50%;
        background: #f0f0f0;
        border: 2px solid #e0e0e0;
        object-fit: cover;
    }

    .form-label {
        font-weight: 500;
        color: #4b0082;
        font-size: 13px;
        margin-bottom: 3px;
    }

    .form-control {
        font-size: 13px;
        padding: 5px 8px;
        height: 32px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #7b2ff7 0%, #f107a3 100%);
        border: none;
        font-weight: 600;
        transition: 0.3s;
        font-size: 13px;
        padding: 6px 0;
    }

    .btn-primary:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }

    .alert {
        font-size: 13px;
        padding: 5px 10px;
        margin-bottom: 8px;
    }

    input[type="file"] {
        font-size: 12px;
    }
</style>

<div class="profile-card">
    <h3>Ubah Profil</h3>
    <p>Perbarui informasi akun Anda</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- FOTO PROFIL --}}
        <div class="mb-2">
            <div class="d-flex justify-content-center mb-2">
                @if($user->foto)
                    <img src="{{ asset('uploads/profile/' . $user->foto) }}" alt="Foto Profil" class="profile-image">
                @else
                    <div class="profile-image"></div>
                @endif
            </div>
            <input type="file" name="foto" class="form-control text-center" accept="image/*">
            @error('foto')
                <small class="text-danger d-block mt-1">{{ $message }}</small>
            @enderror
        </div>

        {{-- USERNAME --}}
        <div class="mb-2 text-start">
            <label class="form-label">Username</label>
            <input type="text" name="username" value="{{ old('username', $user->username) }}" class="form-control" required>
        </div>

        {{-- EMAIL --}}
        <div class="mb-2 text-start">
            <label class="form-label">Email</label>
            <input type="text" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
        </div>

        {{-- PASSWORD BARU --}}
        <div class="mb-2 text-start">
            <label class="form-label">Password Baru (opsional)</label>
            <input type="password" name="password" class="form-control">
        </div>

        {{-- KONFIRMASI PASSWORD --}}
        <div class="mb-3 text-start">
            <label class="form-label">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary w-100 mt-2">Simpan Perubahan</button>
    </form>
</div>
@endsection
