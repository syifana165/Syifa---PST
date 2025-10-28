@extends('layout.v_templatee')

@section('title', 'Tambah Dokumen')

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
        font-size: 26px;
        text-align: center;
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

    .btn-success, .btn-secondary {
        font-weight: 600;
        border-radius: 12px;
        padding: 8px 20px;
        font-size: 15px;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-success {
        background: linear-gradient(135deg, #8b5cf6, #6d28d9);
        color: #fff;
    }

    .btn-success:hover {
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
    <h3><i class="bi bi-plus-circle"></i> Tambah Dokumen Baru</h3>

    <form action="{{ route('dokumen.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Dokumen</label>
            <input type="text" name="nama_dokumen" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Tipe Dokumen</label>
            <select name="tipe" id="tipe" class="form-select" required>
                <option value="">-- Pilih Tipe --</option>
                <option value="foto">Foto</option>
                <option value="video">Video (YouTube)</option>
                <option value="pdf">PDF</option>
            </select>
        </div>

        <div class="mb-3" id="fileInputDiv">
            <label class="form-label">File Dokumen</label>
            <input type="file" name="file_dokumen" class="form-control">
        </div>

        <div class="mb-3" id="linkInputDiv" style="display:none;">
            <label class="form-label">Link Video</label>
            <input type="text" name="file_dokumen" class="form-control" placeholder="Masukkan URL YouTube">
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan</button>
            <a href="{{ route('dokumen.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
        </div>
    </form>
</div>

<script>
document.getElementById('tipe').addEventListener('change', function() {
    if (this.value === 'video') {
        document.getElementById('fileInputDiv').style.display = 'none';
        document.getElementById('linkInputDiv').style.display = 'block';
    } else {
        document.getElementById('fileInputDiv').style.display = 'block';
        document.getElementById('linkInputDiv').style.display = 'none';
    }
});
</script>
@endsection
