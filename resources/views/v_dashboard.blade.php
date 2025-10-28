@extends('layout.v_templatee')

@section('title', 'Dashboard')

@section('content')
<style>
    body {
        background: linear-gradient(180deg, #f8f5ff 0%, #f3e8ff 40%, #faf5ff 100%);
    }

    .welcome-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(6px);
        color: #333;
        border-radius: 16px;
        padding: 35px 40px;
        box-shadow: 0 6px 20px rgba(123, 47, 247, 0.1);
        border: 1px solid rgba(123, 47, 247, 0.15);
        transition: all 0.3s ease;
    }

    .welcome-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 24px rgba(123, 47, 247, 0.15);
    }

    .welcome-text {
        font-weight: 700;
        font-size: 26px;
        color: #4b0082; 
        margin-bottom: 5px;
    }

    .username {
        color: #7b2ff7; 
    }

    .subtext {
        color: #5c5c5c;
        margin-top: 3px;
        font-size: 15px;
    }

    .welcome-icon {
        font-size: 48px;
        animation: wave 2s infinite ease-in-out;
    }

    @keyframes wave {
        0%, 100% { transform: rotate(0deg); }
        50% { transform: rotate(10deg); }
    }

    .welcome-card {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s ease forwards;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="welcome-card mb-4">
    <div class="d-flex align-items-center justify-content-between">
        <div>
            <h2 class="welcome-text">
                Selamat datang kembali, 
                <span class="username">{{ ucfirst($user->username ?? 'User') }}</span> 👋
            </h2>
            <p class="subtext">Senang melihatmu! Semoga harimu menyenangkan ✨</p>
        </div>
        <div>
            <span class="welcome-icon">🌤️</span>
        </div>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
@endsection
