@extends('layout.v_templatee')
@section('title', 'Edit Artikel')

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

    .card-preview img {
        width: 100%;
        max-width: 200px;
        border-radius: 12px;
        margin-bottom: 10px;
        box-shadow: 0 5px 15px rgba(123, 47, 247, 0.15);
    }

    /* Tombol utama gradasi ungu-biru */
    .btn-gradient {
        background: linear-gradient(135deg, #8b5cf6, #6d28d9);
        color: #fff;
        font-weight: 600;
        border-radius: 12px;
        padding: 8px 20px;
        font-size: 15px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: all 0.3s ease;
        border: none;
        text-decoration: none;
    }

    .btn-gradient:hover {
        background: linear-gradient(135deg, #a78bfa, #7c3aed);
        transform: scale(1.05);
        color: #fff;
    }

    /* Tombol sekunder (kembali) */
    .btn-secondary {
        background: #d1c4ff;
        color: #4b3bff;
        font-weight: 600;
        border-radius: 12px;
        padding: 8px 20px;
        font-size: 15px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: all 0.3s ease;
        text-decoration: none;
        border: none;
    }

    .btn-secondary:hover {
        background: #b794f4;
        color: #fff;
        transform: scale(1.05);
    }

    label {
        font-weight: 600;
        color: #5b2ccf;
    }

    input.form-control, textarea.form-control {
        border-radius: 12px;
        border: 1px solid #c4b5fd;
        padding: 10px;
    }

    input.form-control:focus, textarea.form-control:focus {
        border-color: #7c3aed;
        box-shadow: 0 0 8px rgba(124, 58, 237, 0.3);
    }
</style>

<div class="container">
    <h3><i class="bi bi-pencil-square"></i> Edit Artikel</h3>
    <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul Artikel</label>
            <input type="text" name="judul" class="form-control" value="{{ $artikel->judul }}" required>
        </div>

        <div class="mb-3 card-preview">
            <label>Gambar Saat Ini</label><br>
            @if ($artikel->gambar)
                <img src="{{ asset('uploads/artikel/' . $artikel->gambar) }}" alt="Gambar Artikel">
            @else
                <p><em>Tidak ada gambar</em></p>
            @endif
            <input type="file" name="gambar" class="form-control mt-2">
        </div>

        <div class="mb-3">
            <label>Isi Artikel</label>
            <textarea name="isi" rows="8" class="form-control" required>{{ $artikel->isi }}</textarea>
        </div>

        <div class="d-flex gap-3">
            <!-- Tombol Perbarui sama persis seperti tombol Tambah Dokumen -->
            <button type="submit" class="btn-gradient">
                <i class="bi bi-check-circle"></i> Perbarui
            </button>

            <!-- Tombol Kembali sama persis style tombol sekunder CRUD lain -->
            <a href="{{ route('artikel.index') }}" class="btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
        </div>
    </form>
</div>
@endsection
