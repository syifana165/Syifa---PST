@extends('layout.v_template')

@section('title', 'Edit Laporan Petugas')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Data Petugas</h2>

    <form action="{{ route('petugas.update', $petugas->id_petugas) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label><strong>Nama</strong></label>
            <input type="text" name="Nama" class="form-control" value="{{ $petugas->Nama }}" required>
        </div>

        <div class="form-group mb-3">
            <label><strong>No HP</strong></label>
            <input type="text" name="No_HP" class="form-control" value="{{ $petugas->No_HP }}" required>
        </div>

        <div class="form-group mb-3">
            <label><strong>Alamat</strong></label>
            <input type="text" name="Alamat" class="form-control" value="{{ $petugas->Alamat }}" required>
        </div>

        <div class="form-group mb-3">
            <label><strong>Keterangan</strong></label>
            <input type="text" name="keterangan" class="form-control" value="{{ $petugas->keterangan }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('petugas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
