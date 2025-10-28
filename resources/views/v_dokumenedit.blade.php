@extends('layout.v_templatee')
@section('title', 'Edit Dokumentasi')

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

    h4 {
        font-weight: 700;
        color: #5b2ccf;
        text-align: center;
        margin-bottom: 30px;
        font-size: 24px;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
    }

    label {
        font-weight: 600;
        color: #4b3bff;
    }

    .form-control, .form-select {
        border-radius: 12px;
        padding: 10px 12px;
        border: 1px solid #d1c4ff;
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #7c3aed;
        box-shadow: 0 0 8px rgba(123, 47, 247, 0.3);
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
    <h4>Edit Dokumentasi</h4>

    <form action="{{ route('dokumen.update', $dokumen->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Dokumentasi</label>
            <input type="text" name="nama_dokumen" class="form-control" value="{{ $dokumen->nama_dokumen }}" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4">{{ $dokumen->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label>Tipe Dokumentasi</label>
            <select name="tipe" id="tipe" class="form-select" onchange="toggleInput()" required>
                <option value="pdf" {{ $dokumen->tipe == 'pdf' ? 'selected' : '' }}>PDF</option>
                <option value="foto" {{ $dokumen->tipe == 'foto' ? 'selected' : '' }}>Foto</option>
                <option value="video" {{ $dokumen->tipe == 'video' ? 'selected' : '' }}>Video (YouTube Embed)</option>
            </select>
        </div>

        <div class="mb-3" id="fileInput" style="display:none;">
            <label>Upload File Baru (Opsional)</label>
            <input type="file" name="file_dokumen" class="form-control">
        </div>

        <div class="mb-3" id="videoInput" style="display:none;">
            <label>Link Embed Video</label>
            <!-- Ganti name menjadi file_dokumen supaya controller update bisa membaca -->
            <input type="text" name="file_dokumen" class="form-control" value="{{ $dokumen->tipe === 'video' ? $dokumen->file_dokumen : '' }}">
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Update</button>
            <a href="{{ route('dokumen.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
        </div>
    </form>
</div>

<script>
function toggleInput() {
    const tipe = document.getElementById('tipe').value;
    document.getElementById('fileInput').style.display = (tipe === 'pdf' || tipe === 'foto') ? 'block' : 'none';
    document.getElementById('videoInput').style.display = (tipe === 'video') ? 'block' : 'none';
}
// Jalankan saat halaman load
toggleInput();
</script>
@endsection
