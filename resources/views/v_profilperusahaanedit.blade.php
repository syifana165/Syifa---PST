@extends('layout.v_templatee')
@section('title', 'Edit Profil Perusahaan')

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
        margin-bottom: 30px;
        font-size: 26px;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    label {
        font-weight: 600;
        color: #4b3bff;
    }

    .form-control {
        border-radius: 12px;
        padding: 10px 12px;
        border: 1px solid #d1c4ff;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #7c3aed;
        box-shadow: 0 0 8px rgba(123, 47, 247, 0.3);
    }

    img {
        margin-top: 10px;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(123, 47, 247, 0.2);
    }

    .btn-primary, .btn-secondary {
        font-weight: 600;
        border-radius: 12px;
        padding: 8px 20px;
        font-size: 15px;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: linear-gradient(135deg, #8b5cf6, #6d28d9);
        color: #fff;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #a78bfa, #7c3aed);
        transform: scale(1.05);
    }

    .btn-secondary {
        background: #d1c4ff;
        color: #4b3bff;
    }

    .btn-secondary:hover {
        background: #b794f4;
        color: #fff;
        transform: scale(1.05);
    }

    .btn-group {
        display: flex;
        justify-content: space-between;
        gap: 15px;
        margin-top: 20px;
    }

    @media(max-width:768px) {
        .btn-group {
            flex-direction: column;
        }
    }
</style>

<div class="container">
    <h2>Edit Profil Perusahaan</h2>

    <form action="{{ route('profilperusahaan.update', $profil->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Tipe</label>
            <select name="tipe" class="form-control" required>
                <option value="tentang_kami" {{ $profil->tipe == 'tentang_kami' ? 'selected' : '' }}>Tentang Kami</option>
                <option value="visi_misi" {{ $profil->tipe == 'visi_misi' ? 'selected' : '' }}>Visi dan Misi</option>
                <option value="sejarah" {{ $profil->tipe == 'sejarah' ? 'selected' : '' }}>Sejarah</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" value="{{ $profil->judul }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Isi</label>
            <textarea name="isi" class="form-control" rows="5" required>{{ $profil->isi }}</textarea>
        </div>

        <div class="mb-3">
            <label>Gambar Saat Ini</label><br>
            @if($profil->gambar)
                <img src="{{ asset('storage/'.$profil->gambar) }}" width="200">
            @else
                <em>Tidak ada gambar</em>
            @endif
        </div>

        <div class="mb-3">
            <label>Ganti Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Perbarui</button>
            <a href="{{ route('profilperusahaan.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
        </div>
    </form>
</div>
@endsection
