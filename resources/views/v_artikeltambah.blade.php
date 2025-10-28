@extends('layout.v_templatee')
@section('title', 'Tambah Artikel')

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

    h3 {
        font-weight: 700;
        color: #5b2ccf;
        margin-bottom: 30px;
        text-align: center;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
    }

    .form-control {
        border-radius: 12px;
        padding: 10px 15px;
        box-shadow: none;
        border: 1px solid #ccc;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #7c3aed;
        box-shadow: 0 0 8px rgba(124, 58, 237, 0.3);
        outline: none;
    }

    .btn-gradient {
        background: linear-gradient(135deg, #8b5cf6, #6d28d9);
        color: #fff;
        font-weight: 600;
        border-radius: 12px;
        padding: 8px 20px;
        font-size: 15px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
    }

    .btn-gradient:hover {
        background: linear-gradient(135deg, #a78bfa, #7c3aed);
        transform: scale(1.05);
        color: #fff;
    }

    .btn-secondary {
        border-radius: 12px;
        padding: 8px 20px;
        font-size: 15px;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    label {
        font-weight: 600;
        color: #5b2ccf;
    }

    textarea.form-control {
        resize: none;
    }
</style>

<div class="container">
    <h3>📝 Tambah Artikel Baru</h3>
    <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Judul Artikel</label>
            <input type="text" name="judul" class="form-control" placeholder="Masukkan judul artikel" required>
        </div>
        <div class="mb-3">
            <label>Gambar Utama</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        <div class="mb-3">
            <label>Isi Artikel</label>
            <textarea name="isi" rows="8" class="form-control" placeholder="Tulis isi artikel di sini..." required></textarea>
        </div>
        <div class="d-flex justify-content-center gap-3 mt-4">
            <button type="submit" class="btn btn-gradient">
                <i class="bi bi-save"></i> Simpan
            </button>
            <a href="{{ route('artikel.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
        </div>
    </form>
</div>
@endsection
