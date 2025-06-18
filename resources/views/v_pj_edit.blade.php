@extends('layout.v_template')

@section('title', 'Edit Data Penanggung Jawab')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #e0f7fa, #f1f8e9);
    }

    .edit-card {
        background: rgba(255, 255, 255, 0.75);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        max-width: 700px;
        margin: auto;
        margin-top: 3rem;
        transition: 0.3s ease;
    }

    .edit-card h2 {
        text-align: center;
        font-weight: 700;
        color: #00796b;
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-weight: 600;
        color: #37474f;
    }

    .form-control {
        border-radius: 12px;
        box-shadow: none;
        border: 1px solid #b0bec5;
    }

    .form-control:focus {
        border-color: #009688;
        box-shadow: 0 0 0 0.1rem rgba(0, 150, 136, 0.25);
    }

    .btn-custom {
        background-color: #00796b;
        color: white;
        font-weight: 600;
        border-radius: 30px;
        padding: 10px 25px;
        box-shadow: 0 4px 12px rgba(0, 121, 107, 0.3);
        transition: 0.2s ease-in-out;
    }

    .btn-custom:hover {
        background-color: #004d40;
        transform: translateY(-2px);
    }

    .btn-secondary {
        border-radius: 30px;
        padding: 10px 25px;
        font-weight: 600;
        margin-left: 10px;
    }

</style>

<div class="edit-card">
    <h2><i class="fas fa-user-edit me-2"></i>Edit Data Penanggung Jawab</h2>

    <form action="{{ route('pj.update', $pj->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label class="form-label"><i class="fas fa-user me-2"></i>Nama</label>
            <input type="text" name="Nama" class="form-control" value="{{ $pj->Nama }}" required>
        </div>

        <div class="form-group mb-3">
            <label class="form-label"><i class="fas fa-phone-alt me-2"></i>No HP</label>
            <input type="text" name="No_HP" class="form-control" value="{{ $pj->No_HP }}" required>
        </div>

        <div class="form-group mb-3">
            <label class="form-label"><i class="fas fa-map-marker-alt me-2"></i>Alamat</label>
            <input type="text" name="Alamat" class="form-control" value="{{ $pj->Alamat }}" required>
        </div>

        <div class="form-group mb-3">
            <label class="form-label"><i class="fas fa-trash me-2"></i>TPS</label>
            <input type="text" name="TPS" class="form-control" value="{{ $pj->TPS }}" required>
        </div>

        <div class="form-group mb-3">
            <label class="form-label"><i class="fas fa-info-circle me-2"></i>Keterangan</label>
            <input type="text" name="Keterangan" class="form-control" value="{{ $pj->Keterangan }}" required>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-custom"><i class="fas fa-save me-2"></i>Update</button>
            <a href="{{ route('pj.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Kembali</a>
        </div>
    </form>
</div>
@endsection
