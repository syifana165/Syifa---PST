@extends('layout.v_template')

@section('title', 'Edit Tim')
@section('page', 'Edit Data Tim')

@section('content')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header bg-warning text-dark">
            <h5 class="m-0">Form Edit Tim</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('tim.update', $tim->id_tim) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="Kelompok_Petugas">Kelompok Petugas</label>
                    <input type="text" name="Kelompok_Petugas" class="form-control"
                        value="{{ old('Kelompok_Petugas', $tim->Kelompok_Petugas) }}" required>
                    @error('Kelompok_Petugas')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="{{ route('tim.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

@endsection
