@extends('layout.v_templatee')
@section('title', 'Kelola Artikel')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

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
    font-weight: 700;
    color: #5b2ccf;
    margin-bottom: 30px;
    text-align: center;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
}

.btn-gradient {
    background: linear-gradient(135deg, #8b5cf6, #6d28d9);
    color: #fff;
    font-weight: 600;
    border-radius: 12px;
    padding: 8px 20px;
    font-size: 15px;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

.btn-gradient:hover {
    background: linear-gradient(135deg, #a78bfa, #7c3aed);
    transform: scale(1.05);
    color: #fff;
}

.card {
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(90, 41, 160, 0.15);
    transition: all 0.3s ease-in-out;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(90, 41, 160, 0.25);
}

.btn-warning, .btn-danger {
    border-radius: 12px;
    font-size: 13px;
    padding: 6px 12px;
    font-weight: 600;
    transition: all 0.3s ease;
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

.btn-group {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 10px;
}

@media(max-width:768px) {
    .btn-group {
        flex-direction: column;
    }
}
</style>

<div class="container">
    <h2>📰 Kelola Artikel</h2>

    <div class="mb-3 text-center">
        <a href="{{ route('v_artikeltambah') }}" class="btn btn-gradient mb-3">
            <i class="bi bi-plus-circle"></i> Tambah Artikel
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach ($artikel as $item)
        <div class="col-md-4 mb-4">
            <div class="card">
            @if ($item->gambar)
                <img src="{{ asset('storage/' . $item->gambar) }}" 
                    alt="{{ $item->judul }}" 
                    class="card-img-top" 
                    style="height:200px; object-fit:cover;">
            @endif
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $item->judul }}</h5>
                    <p class="card-text text-muted">{{ Str::limit(strip_tags($item->isi), 100) }}</p>
                    <div class="btn-group">
                        <a href="{{ route('artikel.edit', $item->id) }}" class="btn btn-warning btn-sm text-white">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('artikel.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus artikel ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
