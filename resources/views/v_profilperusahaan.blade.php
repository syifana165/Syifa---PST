@extends('layout.v_templatee')
@section('title', 'Profil Perusahaan')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #b794f4, #7b2ff7);
        min-height: 100vh;
        font-family: 'Nunito', sans-serif;
    }

    .container {
        background: #f6f3ff;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(123, 47, 247, 0.2);
        margin-top: 50px;
    }

    h2 {
        font-weight: 800;
        color: #5b2ccf;
        text-align: center;
        margin-bottom: 40px;
        font-size: 28px;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
        background: linear-gradient(135deg, #8b5cf6, #6d28d9);
        border: none;
        font-weight: 600;
        border-radius: 12px;
        transition: all 0.3s ease;
        color: white;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #a78bfa, #7c3aed);
        transform: scale(1.05);
    }

    .alert-success {
        background: linear-gradient(135deg, #a78bfa, #6d28d9);
        color: white;
        border-radius: 10px;
        font-weight: 600;
        margin-bottom: 30px;
    }

    .row .card {
        border-radius: 18px;
        overflow: hidden;
        border: none;
        background: #fff;
        box-shadow: 0 8px 25px rgba(123, 47, 247, 0.15);
        transition: all 0.3s ease;
    }

    .row .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(123, 47, 247, 0.25);
    }

    .card-header {
        background: linear-gradient(135deg, #8b5cf6, #7c3aed);
        color: #fff;
        font-weight: 700;
        font-size: 16px;
        text-align: center;
        padding: 15px;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }

    .card-body {
        padding: 20px;
        text-align: center;
    }

    .card-body p {
        color: #4b4b4b;
        font-size: 15px;
        line-height: 1.6;
        margin-top: 15px;
    }

    .card-body img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        border-radius: 12px;
        margin-bottom: 15px;
    }

    .btn-action {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .btn-warning, .btn-danger {
        font-weight: 600;
        border-radius: 10px;
        padding: 7px 14px;
        font-size: 14px;
        transition: all 0.3s ease;
        border: none;
    }

    .btn-warning {
        background: #facc15;
        color: #3b3b3b;
    }

    .btn-warning:hover {
        background: #eab308;
        transform: scale(1.05);
    }

    .btn-danger {
        background: #e11d48;
        color: #fff;
    }

    .btn-danger:hover {
        background: #be123c;
        transform: scale(1.05);
    }

    @media(max-width:768px) {
        h2 {
            font-size: 24px;
        }

        .container {
            padding: 25px;
        }

        .btn-action {
            flex-direction: column;
            gap: 10px;
        }
    }
</style>

<div class="container">
    <h2>Kelola Profil Perusahaan</h2>

    <div class="text-center mb-5">
        <a href="{{ route('profilperusahaan.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle"></i> Tambah Profil
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="row g-4 justify-content-center">
        @foreach($data as $item)
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    {{ ucfirst(str_replace('_', ' ', $item->tipe)) }}
                </div>
                <div class="card-body">
                    @if($item->gambar)
                        <img src="{{ asset('storage/'.$item->gambar) }}" alt="{{ $item->judul }}">
                    @endif
                    <p>{{ Str::limit($item->isi, 150) }}</p>
                    <div class="btn-action">
                        <a href="{{ route('profilperusahaan.edit', $item->id) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('profilperusahaan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="bi bi-trash3"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
