@extends('layout.v_template')

@section('title', 'Tambah Tim')
@section('page', 'Tambah Data Tim')

@section('content')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="m-0">Form Tambah Tim</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('tim.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="Kelompok_Petugas">Kelompok Petugas</label>
                    <input type="text" name="Kelompok_Petugas" class="form-control" placeholder="Masukkan nama kelompok" required>
                    @error('Kelompok_Petugas')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('tim.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

@endsection
