@extends('layout.v_template')

@section('title', 'Edit Laporan Petugas')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #e1f5fe, #e8f5e9);
    }

    .edit-card {
        background: rgba(255, 255, 255, 0.75);
        backdrop-filter: blur(12px);
        border-radius: 18px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 2.5rem;
        max-width: 750px;
        margin: auto;
        margin-top: 3rem;
    }

    .edit-card h2 {
        text-align: center;
        font-weight: bold;
        color: #0277bd;
        margin-bottom: 1.8rem;
    }

    .form-label {
        font-weight: 600;
        color: #37474f;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #b0bec5;
    }

    .form-control:focus {
        border-color: #03a9f4;
        box-shadow: 0 0 0 0.1rem rgba(3, 169, 244, 0.2);
    }

    .btn-primary-custom {
        background-color: #0288d1;
        color: white;
        font-weight: 600;
        border-radius: 30px;
        padding: 10px 25px;
        transition: 0.2s ease-in-out;
    }

    .btn-primary-custom:hover {
        background-color: #01579b;
        transform: translateY(-1px);
    }

    .btn-secondary {
        border-radius: 30px;
        padding: 10px 25px;
        font-weight: 600;
        margin-left: 10px;
    }

</style>

<div class="edit-card">
    <h2><i class="fas fa-user-edit me-2"></i>Edit Laporan Petugas</h2>

    <form action="{{ route('petugas.update', $petugas->id_petugas) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label class="form-label"><i class="fas fa-user me-2"></i>Nama</label>
            <input type="text" name="Nama" class="form-control" value="{{ $petugas->Nama }}" required>
        </div>

        <div class="form-group mb-3">
            <label class="form-label"><i class="fas fa-phone me-2"></i>No HP</label>
            <input type="text" name="No_HP" class="form-control" value="{{ $petugas->No_HP }}" required>
        </div>

        <div class="form-group mb-3">
            <label class="form-label"><i class="fas fa-map-marker-alt me-2"></i>Alamat</label>
            <input type="text" name="Alamat" class="form-control" value="{{ $petugas->Alamat }}" required>
        </div>

        <div class="form-group mb-3">
            <label class="form-label"><i class="fas fa-info-circle me-2"></i>Keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="{{ $petugas->keterangan }}" required>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary-custom"><i class="fas fa-save me-2"></i>Update</button>
            <a href="{{ route('petugas.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Kembali</a>
        </div>
    </form>
</div>
@endsection
